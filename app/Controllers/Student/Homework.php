<?php
namespace App\Controllers\Student;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;

class Homework extends BaseController
{
    public function homework_page()
    {
        // all homeworks 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'homework';
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id = $session->get('STUDENT');
        }else{
            return view('FrontEnd/Login');
        }
        $validate_data = ['student'=>$user_id,'status'=>2];
        $data['homeworks'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);

            return view('Student/Homework', $data);
    }
    public function submit_homework()
    {
        // all homeworks 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'homework';
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id = $session->get('STUDENT');
        }else{
            return view('FrontEnd/Login');
        }
        $validate_data = ['student'=>$user_id,'status'=>2];
        $data['homeworks'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
         if ($this->request->getMethod('POST')) {
            $file = $this->request->getFile('stdHomework_file');
            $rowID = esc($this->request->getPost('status'));
            $rules = [
                'status'=>'required',
            ]; 
            if ($this->validate($rules)) {
                if($file == "" ){
                    $data['reg_error'] = 'File for homework required !';
                    return view('Student/Homework', $data); 
                }
                if ($file->isValid()){
                    $file_name =  $file->getName();
                    $file_path =  'public/Students/uploads/homeworks/'.$file_name;
                    $get_model = new stdFunctions_Model();
                    $table_name = "homework";
                    $where_clause = ['homework_id'=>$rowID,'status'=>'2'];
                    $update_data =['student_submitted_file'=>$file_path,'student_submitted_at'=>date('Y-m-d', time()),'status'=>'4'];
                    $res= $get_model->update_row($table_name,$where_clause,$update_data);
                    // return view('Admin/HomeworkRequests',$data);
                    if($res == '1'){
                         // all homeworks 
                        $stdFunctions_Model = new stdFunctions_Model();
                        $table_name = 'homework';
                        $session = session();
                        if ($session->has('STUDENT_LOGIN')) {
                            $user_id = $session->get('STUDENT');
                        }else{
                            return view('FrontEnd/Login');
                        }
                        $validate_data = ['student'=>$user_id,'status'=>2];
                        $data['homeworks'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
                        if($file->move('public/Students/uploads/homeworks/', $file_name)){
                            $data['message'] = 'Homework submitted successfully !';
                            return view('Student/Homework', $data);
                        }else{
                            $data['reg_error'] = 'Homework created but Error uplaoding file';
                            return view('Student/Homework', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding Homework retry !';
                        return view('Student/Homework', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Homework Already Exist !';
                        return view('Student/Homework', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading file contact your organisation !';
                        return view('Student/Homework', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Student/Homework', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [];
                return view('Student/Homework', $data);
            }
        }
    }

}

?>