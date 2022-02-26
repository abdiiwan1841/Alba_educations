<?php
namespace App\Controllers\Student;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\Quiz_Model;
use App\Models\Student\stdFunctions_Model;


class Quiz extends BaseController
{
    public function quiz_page()
    {
        $get_model = new Quiz_Model();
        $student_id = session()->get('STUDENT');

        $stdGrade = $get_model->get_grade($student_id);
        $data['all_quizs'] = $get_model->all_student_quizs($stdGrade[0]->grade);
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);

        $data['quizs'] = $get_model->all_quizs();
        return view('Student/quiz',$data);
    }

    public function submit_quiz()
    {
        $get_model = new Quiz_Model();
        $student_id = session()->get('STUDENT');

        $stdGrade = $get_model->get_grade($student_id);
        $data['all_quizs'] = $get_model->all_student_quizs($stdGrade[0]->grade);
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);

        $data['quizs'] = $get_model->all_quizs();
        if ($this->request->getMethod('POST')) {
            $quiz_id = $this->request->getPost('quiz_id');
            $total_questions = $this->request->getPost('total_questions');
            
            $rules = [
                'quiz_id'=>'required',
                'total_questions'=>'required',
            ]; 
            
            if ($this->validate($rules)) {
                
                $upload_fun = new Quiz_Model();
                $student_id = session()->get('STUDENT');
                $j = 0;
                $ques = $upload_fun->get_ques_ids($quiz_id);
                $questions = [];
                foreach($ques as $que)
                {
                    array_push($questions,$que->question_id);
                }
                for ($i=0; $i < count($questions); $i++) { 
                    $answer = $this->request->getPost('answer'.$i);
                    $question_id = $questions[$i];
                    $checkRes = $upload_fun->check_answers($answer,$quiz_id,$question_id);    
                    if($checkRes == '1'){
                         $j++;
                    };               
                };
                 $j;
                    $student_score = ['quiz_id'=>$quiz_id,'score'=>$j,'status'=>'1'];
                    $validate_data = ['quiz_id'=>$quiz_id,'student_id'=>$student_id,'status'=>'1'];
                    $upload_fun = new Quiz_Model();
                    $student_id = session()->get('STUDENT');
                    $res = $upload_fun->add_new_data_withoutDuplicate('quiz_scores',$student_score,$validate_data);
                    if($res == '1'){
                        $get_model = new Quiz_Model();
                        $student_id = session()->get('STUDENT');

                        $stdGrade = $get_model->get_grade($student_id);
                        $data['all_quizs'] = $get_model->all_student_quizs($stdGrade[0]->grade);
                        //get all subjects
                        $model = new Functions_Model();
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $model->get_table_data($table_name,$validate_data);

                        $data['quizs'] = $get_model->all_quizs();
                        $data['message'] = 'Your correct answers ';
                        $data['score'] = $j;
                        $data['total_questions'] = $total_questions;
                        return view('Student/quiz', $data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error sending notification retry !';
                        return view('Student/quiz', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Notification Already sent !';
                        return view('Student/quiz', $data);
                    }else{
                        $data['reg_error'] = 'Error sending notification contact your developer !';
                        return view('Student/quiz', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Student/quiz', $data);
            }
        }
    }
    public function testTestResults()
    {

        // all test
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'tests_results';
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id = $session->get('STUDENT');
        }else{
            return view('FrontEnd/Login');
        }
        $validate_data = ['student'=>$user_id,'status'=>2];
        $data['tests_results'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);

        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);  
        return view('Student/testTestResults',$data);
    }
    
    public function reportCard()
    {
         $get_model = new Quiz_Model();
        $student_id = session()->get('STUDENT');

        $stdGrade = $get_model->get_grade($student_id);
        $data['all_quizs'] = $get_model->all_student_quizs($stdGrade[0]->grade);
        //get all subjects
        $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);  
        
         // all report_card 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'report_card';
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id = $session->get('STUDENT');
        }else{
            return view('FrontEnd/Login');
        }
        $validate_data = ['student'=>$user_id,'status'=>1];
        $data['report_card'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
        return view('Student/reportCard',$data);
    }
    public function certificates()
    {
        $row_id = $this->request->uri->getSegment(3);
        $student = session()->get('STUDENT');
        //get all subjects
         $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);  
        
        $model = new Functions_Model();
        $table_name = 'certifications';
        $validate_data = ['student'=>$student,'status'=>'1'];
        $data['certifications'] = $model->get_table_data($table_name,$validate_data);
        return view('Student/certificates',$data);
        
    }
    
   public function get_report()
   { 
        $row_id = $this->request->uri->getSegment(3);
        $student = session()->get('STUDENT');
        //get all subjects
         $model = new Functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $model->get_table_data($table_name,$validate_data);  
        
        $model = new Functions_Model();
        $table_name = 'report_card';
        $validate_data = ['student'=>$student,'status'=>'1'];
        $data['report_card'] = $model->get_table_data($table_name,$validate_data);
        

        return view('Student/reportCardPreview',$data);
    }

}

?>