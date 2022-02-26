<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class Certification extends BaseController
{
    public function adminStudentCertification()
    {
        $get_model = new Functions_Model();
            //get all teachers
            $table_name = 'users_teachers';
            $validate_data = ['status'=>1];
            $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
            
            // users_students
            $table_name = 'users_students';
            $validate_data = ['status'=>1];
            $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

             // subjects
            $table_name = 'subjects';
            $validate_data = ['status'=>1];
            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

            //get all grades
            $table_name = 'grades';
            $validate_data = ['status'=>1];
            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

            //all certifications 
            $table_name = 'certifications';
            $validate_data = ['status'=>1];
            $data['certifications'] = $get_model->get_table_data($table_name,$validate_data);

            return view('Admin/adminStudentCertification',$data);
    }
    public function send_certificate()
    {
        $get_model = new Functions_Model();
            //get all teachers
            $table_name = 'users_teachers';
            $validate_data = ['status'=>1];
            $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
            
            // users_students
            $table_name = 'users_students';
            $validate_data = ['status'=>1];
            $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

             // subjects
            $table_name = 'subjects';
            $validate_data = ['status'=>1];
            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

            //get all grades
            $table_name = 'grades';
            $validate_data = ['status'=>1];
            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

            //all certifications 
            $table_name = 'certifications';
            $validate_data = ['status'=>1];
            $data['certifications'] = $get_model->get_table_data($table_name,$validate_data);
        if ($this->request->getMethod('POST')) {
            $grade = $this->request->getPost('grade');
            $student = $this->request->getPost('student');
            $subject = $this->request->getPost('subject');
            $achivement = $this->request->getPost('achivement');
            $image = $this->request->getFile('file');
            $rules = [
                'grade'=>'required',
                'student'=>'required',
                'achivement'=>'required',
            ]; 
            
            if ($this->validate($rules)) {
                if($image == NULL ){
                    $data['reg_error'] = 'Image for the post required !';
                    return view('Admin/adminStudentCertification', $data); 
                }
                if ($image->isValid()){
                    $file_name =  $image->getName();
                    $file_path =  'public/Admin/uploads/certifications/'.$file_name;
                    $inputs = ['grade'=>$grade,'student'=>$student,'subject'=>$subject,'file'=>$file_path,'achivement'=>$achivement,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $validate_data = ['grade'=>$grade,'student'=>$student,'subject'=>$subject,'file'=>$file_path,'achivement'=>$achivement,'status'=>'1'];
                    $res = $upload_fun->add_new_data_withoutDuplicate('certifications',$inputs,$validate_data);
                    if($res == '1'){
                        if($image->move('public/Admin/uploads/certifications', $file_name)){
                            $get_model = new Functions_Model();
                        //get all teachers
                        $table_name = 'users_teachers';
                        $validate_data = ['status'=>1];
                        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        // users_students
                        $table_name = 'users_students';
                        $validate_data = ['status'=>1];
                        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);
            
                         // subjects
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
            
                        //get all grades
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
            
                        //all certifications 
                        $table_name = 'certifications';
                        $validate_data = ['status'=>1];
                        $data['certifications'] = $get_model->get_table_data($table_name,$validate_data);
                            $data['message'] = 'certificate sent successfully !';
                            return view('Admin/adminStudentCertification', $data);
                        }else{
                            $data['reg_error'] = 'Please retry with valid file ';
                            return view('Admin/adminStudentCertification', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error sending please file retry !';
                        return view('Admin/adminStudentCertification', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Error sending document please retry with other file or rename file  !';
                        return view('Admin/adminStudentCertification', $data);
                    }else{
                        $data['reg_error'] = 'Error sending please file retry or contact your developer !';
                        return view('Admin/adminStudentCertification', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/adminStudentCertification', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [];
                return view('Admin/adminStudentCertification', $data);
            }
        }
    }

    
    
}

?>