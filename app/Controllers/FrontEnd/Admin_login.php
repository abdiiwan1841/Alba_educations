<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
Use App\Models\frontEnd\User_Model;

class Admin_login extends BaseController
{
      public function admin_login_page()
    {
        return view('FrontEnd/Admin_login');
    }
    
    public function teacher_logout()
    {
        $session = session();
        $session->remove('TEACHER_LOGIN');
        helper('cookie');
        $session->destroy();
        // delete_cookie('teacher_username');
        // delete_cookie('admin_pass');
        return redirect()->to(base_url('/'));
    }
    public function admin_login()
    {
        if ($this->request->getMethod()=="post") {
            $username = esc(htmlspecialchars($this->request->getPost('username')));
            $password = esc(htmlspecialchars($this->request->getPost('password')));
            // $hash_pass = md5($password);
            $rememberMe = esc(htmlspecialchars($this->request->getPost('rememberMe')) );
            $user_input = ['username' => $username,'password' => $password];
            if ($username != "" && $password != ""){
                if($rememberMe === '1'){
                    helper("cookie");
                    setcookie('admin_username', $username);
                    setcookie('admin_pass',$password);
                }
                // $user_email = $user_input['email'];
                $model  = new User_Model();
                $res = $model->admin_login_request($user_input);
                if ($res === '2'){
                    $data['login_res'] = 'Retry with valid Credientials !';
                    return view('FrontEnd/Admin_login', $data);  
                }elseif($res === '1'){
                    $session = session();
                    $session->set('ADMIN_LOGIN', $res);
                    return view('Admin/Dashboard'); 
                } 
            }else{
                $data['login_res'] =  'All fields are mandatory check before submiting !';
                return view('FrontEnd/Admin_login', $data);
            }
        }else{
            $data['login_res'] =  'invalid method !';
            return view('FrontEnd/Admin_login', $data);        
        }
    
    }
    public function admin_logout()
    {
        $session = session();
        $session->remove('ADMIN_LOGIN');
        helper('cookie');
        delete_cookie('admin_username');
        delete_cookie('admin_pass');
        return redirect()->to(base_url('/'));
    }
}

?>