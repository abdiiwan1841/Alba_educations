<?php
namespace App\Controllers\Student;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;
use App\Models\Teacher\tchFunctions_Model;


class Feedback extends BaseController
{
    public function teacher_feedback()
    {
        if ($this->request->getMethod('POST')) {
            $teacher= $this->request->getPost('teacher');
            $feedback= $this->request->getPost('feedback');
            $rules = [
                'teacher'=>'required',
                'feedback'=>'required'
            ]; 
            $student = session()->get('STUDENT');
            if ($this->validate($rules)) {
                    $inputs = ['student'=>$student,'teacher'=>$teacher,'feedback'=>$feedback,'status'=>'1'];
                    $validate_data = ['student'=>$student,'teacher'=>$teacher,'feedback'=>$feedback,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('teacher_feedback',$inputs,$validate_data);
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