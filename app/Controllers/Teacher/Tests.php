<?php
namespace App\Controllers\Teacher;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;
use App\Models\Teacher\tchFunctions_Model;


class Tests extends BaseController
{
    public function Homework_page()
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

        // all curriculums 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'homework';
        $session = session();
        if ($session->has('TEACHER_LOGIN')) {
            $user_id = $session->get('TEACHER');
        }else {
            return view('FrontEnd/teacher_login');
        }
        $validate_data = ['teacher'=>$user_id,'status'=>1];
        $data['homeworks'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);

        $validate_data = ['teacher'=>$user_id,'status'=>4];
        $data['submitted_homeworks'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
        return view('Teacher/Homework', $data);
    }
  
    public function upload_tests()
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

        // all curriculums 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'tests_results';
        $session = session();
        if ($session->has('TEACHER_LOGIN')) {
            $user_id = $session->get('TEACHER');
        }else {
            return view('FrontEnd/teacher_login');
        }
        $validate_data = ['teacher'=>$user_id,'status'=>1];
        $data['curriculums'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
        if ($this->request->getMethod('POST')) {
            $file = $this->request->getFile('h_file');
            $title = $this->request->getPost('title');
            $grade = $this->request->getPost('grade');
            $student = $this->request->getPost('student');
            $subject = $this->request->getPost('subject');
            $rules = [
                'title'=>'required',
                'grade'=>'required',
                'subject'=>'required',
                'student'=>'required',
            ]; 
            if ($this->validate($rules)) {
                if($file == "" ){
                    $data['reg_error'] = 'File for tests required !';
                    return view('Teacher/teacherTestResults', $data); 
                }
                if ($file->isValid()){
                    $file_name =  $file->getName();
                    $file_path =  'public/Teachers/uploads/tests/'.$file_name;
                    if (session()->has('TEACHER')){
                        $teacher = session()->get('TEACHER');
                    }else {
                        return redirect()->to('/');
                    }
                    $inputs = ['h_title'=>$title,'grade'=>$grade,'student'=>$student,'teacher'=>$teacher,'subject'=>$subject,'h_file'=>$file_path,'status'=>'1'];
                    $validate_data = ['h_title'=>$title,'grade'=>$grade,'student'=>$student,'teacher'=>$teacher,'h_file'=>$file_path,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('tests_results',$inputs,$validate_data);
                    if($res == '1'){
                        if($file->move('public/Teachers/uploads/tests', $file_name)){
                            $data['message'] = 'Test added successfully !';
                            return view('Teacher/teacherTestResults', $data);
                        }else{
                            $data['reg_error'] = 'Test created but Error uplaoding file';
                            return view('Teacher/teacherTestResults', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding test retry !';
                        return view('Teacher/teacherTestResults', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'test Already Exist !';
                        return view('Teacher/teacherTestResults', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading test contact your admin !';
                        return view('Teacher/teacherTestResults', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Teacher/teacherTestResults', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [];
                return view('Teacher/teacherTestResults', $data);
            }
        }
    }
}

?>