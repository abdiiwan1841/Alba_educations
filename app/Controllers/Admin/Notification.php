<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class Notification extends BaseController
{
    public function adminStudentNotification()
    {       
        $get_model = new Functions_Model();
        $table_name = 'newsletter_subscriptions';
        $validate_data = ['status'=>1];
        $data['newsletter_subscriptions'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/adminStudentNotification',$data);
    }
    public function send_notification()
    {
        if ($this->request->getMethod('POST')) {
            $message = $this->request->getPost('message');
            $rules = [
                'message'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                    $inputs = ['message'=>$message,'status'=>'1'];
                    $validate_data = ['message'=>$message,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('notifications',$inputs,$validate_data);
                    if($res == '1'){
                        $data['message'] = 'Notification sent successfully !';
                        return view('Admin/adminStudentNotification', $data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error sending notification retry !';
                        return view('Admin/adminStudentNotification', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Notification Already sent !';
                        return view('Admin/adminStudentNotification', $data);
                    }else{
                        $data['reg_error'] = 'Error sending notification contact your developer !';
                        return view('Admin/adminStudentNotification', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/adminStudentNotification', $data);
            }
        }
    }
}

?>