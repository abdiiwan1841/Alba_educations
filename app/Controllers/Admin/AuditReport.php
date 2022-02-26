<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class AuditReport extends BaseController
{
    public function adminAuditReport()
    {
            $get_model = new Functions_Model();
            //get all teachers
            $table_name = 'users_teachers';
            $validate_data = ['status'=>1];
            $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
            
            $get_model = new Functions_Model();
            //get all students
            $table_name = 'admin_audit_report';
            $validate_data = ['status'=>2];
            $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);

            return view('Admin/adminAuditReport',$data);
    }
    public function audit_report()
    {
            $get_model = new Functions_Model();
            //get all teachers
            $table_name = 'users_teachers';
            $validate_data = ['status'=>1];
            $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
            
            $get_model = new Functions_Model();
            //get all students
            $table_name = 'admin_audit_report';
            $validate_data = ['status'=>2];
            $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);
       if ($this->request->getMethod('POST')) {
            $teacher = $this->request->getPost('teacher');
            $comment = $this->request->getPost('comment');
            $rules = [
                'teacher'=>'required',
                'comment'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                    $inputs = ['teacher'=>$teacher,'comment'=>$comment,'status'=>'1'];
                    $validate_data = ['teacher'=>$teacher,'comment'=>$comment,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('admin_audit_report',$inputs,$validate_data);
                    if($res == '1'){
                        $get_model = new Functions_Model();
                        //get all teachers
                        $table_name = 'users_teachers';
                        $validate_data = ['status'=>1];
                        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $get_model = new Functions_Model();
                        //get all students
                        $table_name = 'admin_audit_report';
                        $validate_data = ['status'=>2];
                        $data['admin_audit_report'] = $get_model->get_table_data($table_name,$validate_data);
                        $data['message'] = 'Report  sent successfully !';
                        return view('Admin/adminAuditReport', $data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error sending report  retry !';
                        return view('Admin/adminAuditReport', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Report  Already sent !';
                        return view('Admin/adminAuditReport', $data);
                    }else{
                        $data['reg_error'] = 'Error sending report contact your developer !';
                        return view('Admin/adminAuditReport', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/adminAuditReport', $data);
            }
        }
    }

    public function adminWarning()
    {
        $get_model = new Functions_Model();
            //get all teachers
            $table_name = 'users_teachers';
            $validate_data = ['status'=>1];
            $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
            
        return view('Admin/adminWarning',$data);
    }
    public function send_warning_to_teacher()
    {
        $data = [];
        helper(['form']);
		$rules = [
			'email'=>'required|valid_email',
			'teacher'=>'required', 
			'message'=>'required'
		];
		if($this->request->getMethod()=='post'){
		// sanitize inputs 
		$userEmail = htmlspecialchars($this->request->getPost('email'));
		$userEmail = stripslashes($userEmail);
		$teacher = htmlspecialchars($this->request->getPost('teacher'));
		$message = htmlspecialchars($this->request->getPost('message'));
		 if ($this->validate($rules)) {

	    	//send email
    		$email = \config\Services::email();
    		$to = $userEmail;
    		$email->setTo($to);
    		$email->setFrom('albaeducation1@gmail.com','ALBA EDUCATION');
    		$subject = 'Warning Email from Alba educations';
    		$message = "Warning Message :".$message;
    		$email->setSubject($subject);
    		$email->setMessage($message);
    		if ($email->send()) {
    				$data['email_res'] = 'Email is sent'; 
    		}else{
    		    $data['email_res'] = 'Retry sending or contact your developer !';
    			// $email->printDebugger(['headers']));			
    		}	     
		 }else{
		     $data['formError'] = $this->validator->listErrors();
                return view('Admin/adminWarning', $data);
		 }
	
		}
		return view('Admin/adminWarning',$data);
    }
    
    
}

?>