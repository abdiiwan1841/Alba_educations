<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
use App\Models\frontEnd\User_Model;

class Teacher extends BaseController
{
    public function login_page()
    {
        return view('FrontEnd/Teacher_login');
    }
    public function teacher_login()
    {
        if ($this->request->getMethod()=="post") {
            $username = esc(htmlspecialchars($this->request->getPost('username')));
            $password = esc(htmlspecialchars($this->request->getPost('password')));
            $hash_pass = md5($password);
            // $rememberMe = esc(htmlspecialchars($this->request->getPost('rememberMe')));
            $user_input = ['username' => $username,'password' => $hash_pass];
            if ($username != "" && $password != ""){
                // if($rememberMe === '1'){
                //     helper("cookie");
                //     setcookie('std_username', $username);
                //     setcookie('std_pass',$password);
                // }
                // $user_email = $user_input['email'];
                $model  = new User_Model();
                $res = $model->teacher_login_request($user_input);
                $uName = $model->getTeacher($user_input);
                if ($res === '00'){
                    $data['login_res'] = 'Retry with valid Credientials !';
                    return view('FrontEnd/Teacher_login', $data);  
                }elseif($res > 0){
                    $session = session();
                    $session->set('TEACHER_LOGIN', '1');
                    $session->set('TEACHER', $res);
                    $session->set('TEACHER_NAME', $uName);
                    return view('Teacher/Dashboard');
                }else {
                    $data['login_res'] = 'Retry with valid Credientials !';
                    return view('FrontEnd/Teacher_login', $data);  
                }
            }else{
                $data['login_res'] =  'All fields are mandatory check before submiting !';
                return view('FrontEnd/Teacher_login', $data);
            }
                
        }else{
            $data['login_res'] =  'invalid method !';
            return view('FrontEnd/Teacher_login', $data);        
        }
    
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