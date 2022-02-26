<?php
namespace App\Controllers\Student;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;
use App\Models\Teacher\tchFunctions_Model;


class Reschedule extends BaseController
{
    public function reschedule_class()
    {
        if ($this->request->getMethod('POST')) {
            $email= $this->request->getPost('email');
            $phone= $this->request->getPost('phone');
            $date= $this->request->getPost('date');
            $time= $this->request->getPost('time');
            $message = $this->request->getPost('message');
            $rules = [
                'email'=>'required',
                'phone'=>'required',
                'date'=>'required',
                'time'=>'required',
                'message'=>'required'
            ]; 
            $student = session()->get('STUDENT');
            if ($this->validate($rules)) {
                    $inputs = ['student'=>$student,'email'=>$email,'phone'=>$phone,'date'=>$date,'time'=>$time,'message'=>$message,'status'=>'1'];
                    $validate_data = ['email'=>$email,'phone'=>$phone,'date'=>$date,'time'=>$time,'message'=>$message,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('reschedule_class',$inputs,$validate_data);
                    if($res == '1'){
                        $data['message'] = 'Request sent successfully !';
                        return view('Student/Dashboard', $data);
                    }elseif($res=='2'){
                        echo $data['reg_error'] = 'Error sending request retry !';
                        exit();
                        return view('Student/Dashboard', $data);
                    }elseif($res =='3'){
                        echo  $data['reg_error'] = 'Request Already sent !';
                        exit();
                        return view('Student/Dashboard', $data);
                    }else{
                        echo  $data['reg_error'] = 'Error sending request contact your admin !';
                        exit();
                        return view('Student/Dashboard', $data);
                    }    
                
            }else{     
                echo  $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                exit();
                return view('Student/Dashboard', $data);
            }
        }
    }
  

}

?>