<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
use App\Models\frontEnd\Functions_Model;

class Parents extends BaseController
{
    public function submit_parent_counseling_forms()
    {
        if ($this->request->getMethod('POST')) {

            $rules = [
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'subject'=>'required',
                'date_of_counselling'=>'required',
                'time_for_counselling'=>'required',
                'timezone'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                $inputs = ['name' => esc($this->request->getPost('name')),'email' => esc($this->request->getPost('email')),'phone' => esc($this->request->getPost('phone')),'subject' => esc($this->request->getPost('subject')),'date_for_counselling' => esc($this->request->getPost('date_of_counselling')),'time_for_counselling' => esc($this->request->getPost('time_for_counselling')),'timezone' => esc($this->request->getPost('timezone')),'status'=>'1'];
                $validate_data = ['email' => esc($this->request->getPost('email')),'phone' => esc($this->request->getPost('phone')),'status'=>'1'];
                $upload_fun = new Functions_Model();
                $res = $upload_fun->add_new_data_withoutDuplicate('parent_counselling',$inputs,$validate_data);
                if($res == '1'){
                    $data['message'] = 'Form submitted successfully will back to you very soon !';
                    return view('FrontEnd/ParentSupport_parentCounselling', $data);
                }elseif($res=='2'){
                    $data['reg_error'] = 'Error submitting  retry !';
                    return view('FrontEnd/ParentSupport_parentCounselling', $data);
                }elseif($res =='3'){
                    $data['reg_error'] = 'User with this email or phone  already enquired !';
                    return view('FrontEnd/ParentSupport_parentCounselling', $data);
                }else{
                    $data['reg_error'] = 'Error in requesting  you can contact us diretly via email or phone !';
                    return view('FrontEnd/ParentSupport_parentCounselling', $data);
                }    
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                return view('FrontEnd/ParentSupport_parentCounselling', $data);
            }
        }
    }
   
}

?>