<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;

use CodeIgniter\CodeIgniter;

class Tests extends BaseController
{
 
    public function approve_test()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "tests_results";
        $where_clause = ['test_id'=>$row_id,'status'=>'1'];
        $update_data =['status'=>'2'];
        $res= $get_model->update_row($table_name,$where_clause,$update_data);
        $data['test_approved_status'] = $res;

        $get_model = new Functions_Model();
        //get_teachers        
        $table_name = 'users_teachers';
        $select_col = ['name','user_teacher_id'];
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // all tests_results 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'tests_results';
        $validate_data = ['status'=>1];
        $data['tests_results'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
        return view('Admin/adminRequestTest',$data);
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

          $get_model = new Functions_Model();
        //get_teachers        
        $table_name = 'users_teachers';
        $select_col = ['name','user_teacher_id'];
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // all tests_results 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'tests_results';
        $validate_data = ['status'=>1];
        $data['tests_results'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);




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
                    return view('Admin/adminRequestTest', $data); 
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
                             // all tests_results 
                            $stdFunctions_Model = new stdFunctions_Model();
                            $table_name = 'tests_results';
                            $validate_data = ['status'=>1];
                            $data['tests_results'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
                            return view('Admin/adminRequestTest', $data);
                        }else{
                            $data['reg_error'] = 'Test created but Error uplaoding file';
                            return view('Admin/adminRequestTest', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding test retry !';
                        return view('Admin/adminRequestTest', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'test Already Exist !';
                        return view('Admin/adminRequestTest', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading test contact your admin !';
                        return view('Admin/adminRequestTest', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/adminRequestTest', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [];
                return view('Admin/adminRequestTest', $data);
            }
        }
    }
   
}

?>