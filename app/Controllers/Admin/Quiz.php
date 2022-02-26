<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Admin\Quiz_Model;

class Quiz extends BaseController
{
    public function adminRequestQuiz()
    {       
        $get_model = new Quiz_Model();
        $data['all_quizs'] = $get_model->all_quizs();
        
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);
        
        $data['pending_quizs'] = $get_model->pending_quizs();
        $data['pending_approvals'] = $get_model->pending_approvals();
        
        return view('Admin/adminRequestQuiz',$data);
    }
    
    public function adminAddQuiz()
    {       
        $get_model = new Quiz_Model();
        $data['all_quizs'] = $get_model->all_quizs();
        return view('Admin/adminAddQuiz',$data);
    }
    public function create_quiz()
    {
        if ($this->request->getMethod('POST')) {
            $title = $this->request->getPost('title');
            $grade = $this->request->getPost('grade');
            $subject = $this->request->getPost('subject');
            $total_marks = $this->request->getPost('total_marks');
            $rules = [
                'grade'=>'required',
                'subject'=>'required',
                'title'=>'required',
                'total_marks'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                    $inputs = ['title'=>$title,'grade'=>$grade,'subject'=>$subject,'user_created'=>'0','total_marks'=>$total_marks,'status'=>'1'];
                    $validate_data = ['grade'=>$grade,'subject'=>$subject,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_quiz('quiz',$inputs,$validate_data);
                    if($res[0] == '1'){
                        $data['quiz_id'] = $res[1];
                        $data['message'] = 'Quiz created successfully assign questions to the quiz now !';
                        return view('Admin/adminAddQuiz', $data);
                    }elseif($res[0]=='2'){
                        $data['reg_error'] = 'Error creating quiz retry !';
                        return view('Admin/adminRequestQuiz', $data);
                    }elseif($res[0] =='3'){
                        $data['reg_error'] = 'Quiz of this subject already assigned to the selected class !';
                        return view('Admin/adminRequestQuiz', $data);
                    }else{
                        $data['reg_error'] = 'Error creating quiz contact your developer !';
                        return view('Admin/adminRequestQuiz', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/adminRequestQuiz', $data);
            }
        }
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
                        $data['message'] = 'Question added successfully added !';
                        return view('Admin/adminAddQuiz', $data);
                    }else {
                        $data['quiz_id'] = $quiz_id;
                        $data['reg_error'] = 'Error updating question contact your admin !';
                        return view('Admin/adminAddQuiz', $data);
                    }
                }elseif($res=='2'){
                    $data['quiz_id'] = $quiz_id;
                    $data['reg_error'] = 'Error adding Question retry !';
                    return view('Admin/adminAddQuiz', $data);
                }elseif($res =='3'){
                    $data['quiz_id'] = $quiz_id;
                    $data['reg_error'] = 'Question Already Exist !';
                    return view('Admin/adminAddQuiz', $data);
                }else{
                    $data['quiz_id'] = $quiz_id;
                    $data['reg_error'] = 'Error uploading categories contact your developer !';
                    return view('Admin/adminAddQuiz', $data);
                }    
                
            }else{     
                $data['quiz_id'] = $quiz_id;
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [];
                return view('Admin/adminAddQuiz', $data);
            }
        }
    }
    public function quiz_make_live()
    { 
        
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "quiz";
        $where_clause = ['quiz_id'=>$row_id,'status'=>'1'];
        $update_data =['status'=>'3'];
        $res= $get_model->update_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

        $get_model = new Quiz_Model();
        $data['all_quizs'] = $get_model->all_quizs();
        
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);
        
        $data['pending_quizs'] = $get_model->pending_quizs();
        $data['pending_approvals'] = $get_model->pending_approvals();


        return view('Admin/adminRequestQuiz',$data);
    }

     public function pending_quiz_make_live()
    { 
        
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "quiz";
        $where_clause = ['quiz_id'=>$row_id,'status'=>'2'];
        $update_data =['status'=>'3'];
        $res= $get_model->update_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

        $get_model = new Quiz_Model();
        $data['all_quizs'] = $get_model->all_quizs();
        
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);
        
        $data['pending_quizs'] = $get_model->pending_quizs();
        $data['pending_approvals'] = $get_model->pending_approvals();


        return view('Admin/adminRequestQuiz',$data);
    }
    public function quiz_delete()
    { 
        
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "quiz";
        $where_clause = ['quiz_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

        $get_model = new Quiz_Model();
        $data['all_quizs'] = $get_model->all_quizs();
        
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);
        
        $data['pending_quizs'] = $get_model->pending_quizs();
        $data['pending_approvals'] = $get_model->pending_approvals();


        return view('Admin/adminRequestQuiz',$data);
    }
    
 
}

?>