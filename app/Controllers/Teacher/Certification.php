<?php
namespace App\Controllers\Teacher;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;
// use App\Models\Teacher\tchFunctions_Model;


class Certification extends BaseController
{
    public function teacherCertification()
    {
        return view('Teacher/teacherCertification');
    }
    
    public function teacherStudyMaterial()
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

        return view('Teacher/teacherStudyMaterial',$data);
    }
    
    public function teacherAuditReport()
    {

        $get_model = new Functions_Model();
        //get all students
        $table_name = 'admin_audit_report';
        $session = session();
        $id = session()->get('TEACHER');
        $validate_data = ['teacher'=>$id,'status'=>1];
        $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Teacher/teacherAuditReport',$data);
    }
    public function audit_reply()
    {
         $get_model = new Functions_Model();
        //get all students
        $table_name = 'admin_audit_report';
        $session = session();
        $id = session()->get('TEACHER');
        $validate_data = ['teacher'=>$id,'status'=>1];
        $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);
        if ($this->request->getMethod('POST')) {
            $audit_id = $this->request->getPost('audit_id');
            $teacher_comment = $this->request->getPost('teacher_comment');
            $rules = [
                'audit_id'=>'required',
                'teacher_comment'=>'required'
            ]; 
            $session = session();
            $audit_id.'<br>';
            $teacher = $session->get('TEACHER');
            if ($this->validate($rules)) {
                    $update_data = ['teacher_reply'=>$teacher_comment,'status'=>'2'];
                    $upload_fun = new functions_Model();
                    $table_name='admin_audit_report';
                    $where_clause= ['audit_id'=>$audit_id,'teacher'=>$teacher,'status'=>'1'];
                    $res = $upload_fun->update_row($table_name,$where_clause,$update_data);
                    
                    if($res == '1'){
                         $get_model = new Functions_Model();
                        //get all students
                        $table_name = 'admin_audit_report';
                        $session = session();
                        $id = session()->get('TEACHER');
                        $validate_data = ['teacher'=>$id,'status'=>1];
                        $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);
                        $data['message'] = 'Comment sent successfully !';
                        return view('Teacher/teacherAuditReport', $data);
                    }elseif($res=='2'){
                         $get_model = new Functions_Model();
                        //get all students
                        $table_name = 'admin_audit_report';
                        $session = session();
                        $id = session()->get('TEACHER');
                        $validate_data = ['teacher'=>$id,'status'=>1];
                        $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);                        
                        $data['reg_error'] = 'Error sending Comment retry !';
                        return view('Teacher/teacherAuditReport', $data);
                    }elseif($res =='3'){
                         $get_model = new Functions_Model();
                        //get all students
                        $table_name = 'admin_audit_report';
                        $session = session();
                        $id = session()->get('TEACHER');
                        $validate_data = ['teacher'=>$id,'status'=>1];
                        $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);                        
                        $data['reg_error'] = 'Comment Already sent !';
                        return view('Teacher/teacherAuditReport', $data);
                    }else{
                         $get_model = new Functions_Model();
                        //get all students
                        $table_name = 'admin_audit_report';
                        $session = session();
                        $id = session()->get('TEACHER');
                        $validate_data = ['teacher'=>$id,'status'=>1];
                        $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);                        
                        $data['reg_error'] = 'Error sending Comment contact your developer !';
                        return view('Teacher/teacherAuditReport', $data);
                    }    
                
            }else{
                    $get_model = new Functions_Model();
                //get all students
                $table_name = 'admin_audit_report';
                $session = session();
                $id = session()->get('TEACHER');
                $validate_data = ['teacher'=>$id,'status'=>1];
                $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);                     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Teacher/teacherAuditReport', $data);
            }
        }
    }

     public function request_certificate()
    {
         if ($this->request->getMethod('POST')) {
            $grade = $this->request->getPost('grade');
            $subject = $this->request->getPost('subject');
            $student = $this->request->getPost('student');
            $achievement = $this->request->getPost('achievement');
            $rules = [
                'grade'=>'required',
                'subject'=>'required',
                'student'=>'required',
                'achievement'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                    $inputs = ['grade'=>$grade,'subject'=>$subject,'student'=>$student,'achievement'=>$achievement,'status'=>'1'];
                    $validate_data = ['grade'=>$grade,'subject'=>$subject,'student'=>$student,'achievement'=>$achievement,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('teacher_request_certificate',$inputs,$validate_data);
                    if($res == '1'){
                        $data['message'] = 'Request sent successfully !';
                        
                        return view('Teacher/teacherCertification', $data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error sending Request retry !';
                                                
                        return view('Teacher/teacherCertification', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Request Already sent !';
                                                
                        return view('Teacher/teacherCertification', $data);
                    }else{
                        
                        $data['reg_error'] = 'Error sending Request contact your admin !';
                        
                        return view('Teacher/teacherCertification', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];                        
                return view('Teacher/teacherCertification', $data);
            }
        }
    }

}

?>