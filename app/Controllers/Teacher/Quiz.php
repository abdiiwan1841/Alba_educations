<?php
namespace App\Controllers\Teacher;
Use App\Controllers\BaseController;
use App\Models\Teacher\functions_Model;
use App\Models\Admin\Quiz_Model;
use App\Models\Teacher\tchFunctions_Model;
use App\Models\Student\stdFunctions_Model;


class Quiz extends BaseController
{
    public function teacherQuiz()
    {
        $get_model = new Quiz_Model();
        $teacher_id = session()->get('TEACHER');
        $data['all_quizs'] = $get_model->all_teacher_quizs($teacher_id);
        
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);
        
        $data['pending_quizs'] = $get_model->pending_teacher_quizs($teacher_id);
        $data['pending_approvals'] = $get_model->pending_approvals();
        
        return view('Teacher/teacherQuiz',$data);
    }


    public function create_quiz()
    {
        if ($this->request->getMethod('POST')) {
            $title = $this->request->getPost('title');
            $grade = $this->request->getPost('grade');
            $subject = $this->request->getPost('subject');
            $total_marks = $this->request->getPost('total_marks');
            $teacher_id = session()->get('TEACHER');
            $rules = [
                'grade'=>'required',
                'subject'=>'required',
                'title'=>'required',
                'total_marks'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                    $inputs = ['title'=>$title,'grade'=>$grade,'subject'=>$subject,'user_created'=>$teacher_id,'total_marks'=>$total_marks,'status'=>'1'];
                    $validate_data = ['grade'=>$grade,'subject'=>$subject,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_quiz('quiz',$inputs,$validate_data);
                    if($res[0] == '1'){
                        $data['quiz_id'] = $res[1];
                        $data['message'] = 'Quiz created successfully assign questions to the quiz now !';
                        return view('Teacher/teacherAddQuiz', $data);
                    }elseif($res[0]=='2'){
                        $data['reg_error'] = 'Error creating quiz retry !';
                        return view('Teacher/teacherQuiz', $data);
                    }elseif($res[0] =='3'){
                        $data['reg_error'] = 'Quiz of this subject already assigned to the selected class !';
                        return view('Teacher/teacherQuiz', $data);
                    }else{
                        $data['reg_error'] = 'Error creating quiz contact your developer !';
                        return view('Teacher/teacherQuiz', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Teacher/teacherQuiz', $data);
            }
        }
    }

    public function quiz_make_live()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "quiz";
        $teacher_id = session()->get('TEACHER');
        $where_clause = ['quiz_id'=>$row_id,'user_created'=>$teacher_id,'status'=>'1'];
        $update_data =['status'=>'2'];
        $res= $get_model->update_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

        $get_model = new Quiz_Model();
        $data['all_quizs'] = $get_model->all_teacher_quizs($teacher_id);
        
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);
        
        $data['pending_quizs'] = $get_model->pending_quizs_teacher($teacher_id);
        $data['pending_approvals'] = $get_model->pending_approvals();


        return view('Teacher/teacherQuiz',$data);
    }
    public function teacherTestResults()
    {
        $get_model = new Functions_Model();
        //get all students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);
        
        
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        // all tests_results 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'tests_results';
        $session = session();
        if ($session->has('TEACHER_LOGIN')) {
            $user_id = $session->get('TEACHER');
        }else {
            return view('FrontEnd/teacher_login');
        }
        $validate_data = ['teacher'=>$user_id,'status'=>2];
        $data['tests_results'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);

        $validate_data = ['teacher'=>$user_id,'status'=>4];
        $data['submitted_homeworks'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
        return view('Teacher/teacherTestResults',$data);
    }
    public function teacherAddQuiz()
    {
        return view('Teacher/teacherAddQuiz');
    }

    public function add_new_question()
    {
         if ($this->request->getMethod('POST')) {
            $file = $this->request->getFile('file');
            $title = $this->request->getPost('title');
            $quiz_id = $this->request->getPost('quiz_id');
            $option1 = $this->request->getPost('option1');
            $option2 = $this->request->getPost('option2');
            $option3 = $this->request->getPost('option3');
            $option4 = $this->request->getPost('option4');
            $answer = $this->request->getPost('answer');
            
            $rules = [
                'title'=>'required',
                'quiz_id'=>'required',
                'option1'=>'required',
                'option2'=>'required',
                'option3'=>'required',
                'option4'=>'required',
                'answer'=>'required'
            ]; 
            if ($this->validate($rules)) {
                if($file != "" ){
                        $file_name =  $file->getName();
                        if($file->move('public/quiz/', $file_name)){
                            $file_path =  'public/quiz/'.$file_name;
                       
                    };
                }else {
                    $file_path = "";
                };
                
                $inputs = ['title'=>$title,'quiz_id'=>$quiz_id,'option1'=>$option1,'option2'=>$option2,'option3'=>$option3,'option4'=>$option4,'answer'=>$answer,'file'=>$file_path,'status'=>'1'];
                $validate_data = ['title'=>$title,'quiz_id'=>$quiz_id,'status'=>'1'];
                $upload_fun = new functions_Model();
                $res = $upload_fun->add_new_data_withoutDuplicate('quiz_questions',$inputs,$validate_data);
                if($res == '1'){
                    $t_name = 'quiz';
                    $total_ques =  $upload_fun->get_total_questions($quiz_id);
                    $ques =  $total_ques[0]->total_questions;
                    $w_clause = ['quiz_id'=>$quiz_id,'status'=>'1'];
                    $u_data = ['total_questions'=>$ques +1];
                    $u_res = $upload_fun->update_row($t_name,$w_clause,$u_data);
                    if ($u_res == '1') {
                        $data['quiz_id'] = $quiz_id;
                        $data['message'] = 'Question added successfully added !';
                        return view('Teacher/teacherAddQuiz', $data);
                    }else{
                        $data['quiz_id'] = $quiz_id;
                        $data['reg_error'] = 'Error updating question contact your admin !';
                        return view('Teacher/teacherAddQuiz', $data);
                    }
                }elseif($res=='2'){
                    $data['quiz_id'] = $quiz_id;
                    $data['reg_error'] = 'Error adding Question retry !';
                    return view('Teacher/teacherAddQuiz', $data);
                }elseif($res =='3'){
                    $data['quiz_id'] = $quiz_id;
                    $data['reg_error'] = 'Question Already Exist !';
                    return view('Teacher/teacherAddQuiz', $data);
                }else{
                    $data['quiz_id'] = $quiz_id;
                    $data['reg_error'] = 'Error uploading categories contact your developer !';
                    return view('Teacher/teacherAddQuiz', $data);
                }    
                
            }else{     
                $data['quiz_id'] = $quiz_id;
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [];
                return view('Teacher/teacherAddQuiz', $data);
            }
        }
    }

    


}

?>