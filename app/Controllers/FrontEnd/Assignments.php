<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
use App\Models\frontEnd\Functions_Model;

class Assignments extends BaseController
{
    public function index()
    {
        return view('FrontEnd/AssignmentsHelp');
    }
    public function assignment_help_submittion()
    {
        if ($this->request->getMethod('POST')) {
            $first_name = esc(htmlspecialchars($this->request->getPost('first_name')));
            $last_name = esc(htmlspecialchars($this->request->getPost('last_name')));
            $email = esc(htmlspecialchars($this->request->getPost('email')));
            $phone = esc(htmlspecialchars($this->request->getPost('phone')));
            $subject = esc(htmlspecialchars($this->request->getPost('subject')));
            $grade = esc(htmlspecialchars($this->request->getPost('grade')));
            $assignment_type = esc(htmlspecialchars($this->request->getPost('assignment_type')));
            $due_date = esc(htmlspecialchars($this->request->getPost('due_date')));
            $due_time = esc(htmlspecialchars($this->request->getPost('due_time')));
            $budget = esc(htmlspecialchars($this->request->getPost('budget')));
            $currency_type = esc(htmlspecialchars($this->request->getPost('currency_type')));
            $asignment_description = esc(htmlspecialchars($this->request->getPost('asignment_description')));
            $time_zone = esc(htmlspecialchars($this->request->getPost('time_zone')));
            $attached_file = $this->request->getFile('attached_file');
            
            $rules = [
                'first_name'=>'required',
                'email'=>'required|valid_email',
                'asignment_description'=>'required',
                'phone'=>'required',
                'budget'=>'required',
                'currency_type'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                if($attached_file == "" ){
                    $data['reg_error'] = 'Image for the post required !';
                    return view('frontEnd/AssignmentsHelp', $data); 
                }
                if ($attached_file->isValid()){
                    $file_name =  $attached_file->getName();
                    $file_path =  'public/Admin/uploads/assignment_help/'.$file_name;
                    $inputs = ['first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phone'=>$phone,'subject'=>$subject,'grade'=>$grade,'assignment_type'=>$assignment_type,'due_date'=>$due_date,'due_time'=>$due_time,'budget'=>$budget,'time_zone'=>$time_zone,'currency_type'=>$currency_type,'asignment_description'=>$asignment_description,'attached_file'=>$file_path,'status'=>'1'];
                    $validate_data = $inputs;
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('assignment_help',$inputs,$validate_data);
                    if($res == '1'){
                        if($attached_file->move('public/Admin/uploads/assignment_help', $file_name)){
                            $data['message'] = 'Requested successfully !';
                            return view('FrontEnd/AssignmentsHelp', $data);
                        }else{
                            $data['reg_error'] = 'Requested but Error uplaoding file';
                            return view('FrontEnd/AssignmentsHelp', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error retry after sometime !';
                        return view('FrontEnd/AssignmentsHelp', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Already Requested !';
                        return view('FrontEnd/AssignmentsHelp', $data);
                    }else{
                        $data['reg_error'] = 'Error retry after some time !';
                        return view('FrontEnd/AssignmentsHelp', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('FrontEnd/AssignmentsHelp', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] =  ['first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phone'=>$phone,'subject'=>$subject,'grade'=>$grade,'assignment_type'=>$assignment_type,'due_date'=>$due_date,'due_time'=>$due_time,'budget'=>$budget,'currency_type'=>$currency_type,'asignment_description'=>$asignment_description,'status'=>'1'];
                return view('FrontEnd/AssignmentsHelp', $data);
            }
        }
    }
}

?>