<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
use App\Models\frontEnd\Functions_Model;
class Home extends BaseController
{
    public function index()
    {
        return view('FrontEnd/Home');
    }

    public function termsAndConditions()
    {
        return view('FrontEnd/termsAndConditions');
    }
    public function privacyPolicy()
    {
        return view('FrontEnd/privacyPolicy');
    }

         public function subscribe_updates()
    {
        if ($this->request->getMethod('POST')) {
            $name = esc(htmlspecialchars($this->request->getPost('name')));
            $email = esc(htmlspecialchars($this->request->getPost('email')))  ;
            $number = esc(htmlspecialchars($this->request->getPost('number')))  ;
            $terms = esc(htmlspecialchars($this->request->getPost('terms')))  ;
            $rules = [
                'name'=>'required',
                'email'=>'required|valid_email',
                'number'=>'required',
                'terms'=>'required'
            ]; 
            if ($this->validate($rules)) {
                
                    $inputs = ['name'=>$name,'email'=>$email,'number'=>$number,'status'=>'1'];
                    $validate_data = ['name'=>$name,'email'=>$email,'number'=>$number,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('subscribe_updates',$inputs,$validate_data);
                    if($res == '1'){
                            $data['message'] = 'Thankyou for your subscription will reach you very soon !';
                            return view('FrontEnd/Home',$data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error applying for subscription !';
                        return view('FrontEnd/Home',$data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Already Subscribed with this email !';
                        return view('FrontEnd/Home',$data);
                    }else{
                        $data['reg_error'] = 'Error retry after some time !';
                        return view('FrontEnd/Home',$data);
                    }    
                }else{
                    $data['reg_error'] = $this->validator->listErrors();
                    return view('FrontEnd/Home', $data);
                };
        }
    
    }
    
    public function subscribe_newsletter()
    {
        if ($this->request->getMethod('POST')) {
            $uEmail = esc(htmlspecialchars($this->request->getPost('user_email')))  ;
            $rules = [
                'user_email'=>'required|valid_email',
            ]; 
            
            if ($this->validate($rules)) {
                    $inputs = ['user_email'=>$uEmail,'status'=>'1'];
                    $validate_data = ['user_email'=>$uEmail,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('newsletter_subscriptions',$inputs,$validate_data);
                    if($res == '1'){
                            $data['message'] = 'Thankyou for your subscription will reach you very soon !';
                            return view('FrontEnd/Home',$data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error applying for subscription !';
                        return view('FrontEnd/Home',$data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Already Subscribed with this email !';
                        return view('FrontEnd/Home',$data);
                    }else{
                        $data['reg_error'] = 'Error retry after some time !';
                        return view('FrontEnd/Home',$data);
                    }    
                }else{
                    $data['reg_error'] = $this->validator->listErrors();
                    return view('FrontEnd/Home', $data);
                }
        }
    
    }
}

?>