<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
use App\Models\frontEnd\User_Model;
class Student extends BaseController
{
    public function login_page()
    {
        return view('FrontEnd/Login');
    }
    public function student_login()
    {
        if ($this->request->getMethod()=="post") {
            $username = esc(htmlspecialchars($this->request->getPost('username')));
            $password = esc(htmlspecialchars($this->request->getPost('password')));
            $hash_pass = md5($password);
            $rememberMe = esc(htmlspecialchars($this->request->getPost('rememberMe')));
            $user_input = ['username' => $username,'password' => $hash_pass];
            if ($username != "" && $password != ""){
                if($rememberMe === '1'){
                    helper("cookie");
                    setcookie('std_username', $username);
                    setcookie('std_pass',$password);
                }
                // $user_email = $user_input['email'];
                $model  = new User_Model();
                $res = $model->login_request($user_input);
                $uName = $model->getUser($user_input);
                if ($res === '00'){
                    $data['login_res'] = 'Retry with valid Credientials !';
                    return view('FrontEnd/Login', $data);  
                }elseif($res > 0){
                    $session = session();
                    $session->set('STUDENT_LOGIN', '1');
                    $session->set('STUDENT', $res);
                    $session->set('STUDENT_NAME', $uName);
                    return view('Student/Dashboard');
                }else {
                    $data['login_res'] = 'Retry with valid Credientials !';
                    return view('FrontEnd/Login', $data);  
                }
            }else{
                $data['login_res'] =  'All fields are mandatory check before submiting !';
                return view('FrontEnd/Login', $data);
            }
                
        }else{
            $data['login_res'] =  'invalid method !';
            return view('FrontEnd/Login', $data);        
        }
    
    }
    public function adminStudentPromotion()
    {
        return view('Admin/adminStudentPromotion');
    }
    public function student_logout()
    {
        $session = session();
        $session->remove('STUDENT_LOGIN');
        $session->remove('STUDENT');
        $session->remove('STUDENT_NAME');
        $session->destroy();
        return view('FrontEnd/Login');
    }
}

?>