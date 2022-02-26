<?php

namespace App\Models\frontEnd;
use CodeIgniter\Model;

class User_model extends Model
{
    public function login_request($data)
    {   
        $db = \config\Database::connect();
        $result = $db->table('users_students')->select('*')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1']);$count_user = $result->countAllResults();
        $user_id = $db->table('users_students')->select('user_student_id')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1'])->get()->getResult();
        if($count_user > 0){
            return $user_id[0]->user_student_id;
        }else{
            return '00';   
        }
    }
    public function getUser($data)
    {   
        $db = \config\Database::connect();
        $result = $db->table('users_students')->select('name')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1']);$count_user = $result->countAllResults();
        $user_id = $db->table('users_students')->select('name')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1'])->get()->getResult();
        if($count_user > 0){
            return $user_id[0]->name;
        }else{
            return '00';   
        }
    }
    
    public function teacher_login_request($data)
    {   
        $db = \config\Database::connect();
        $result = $db->table('users_teachers')->select('*')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1']);$count_user = $result->countAllResults();
        $user_id = $db->table('users_teachers')->select('user_teacher_id')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1'])->get()->getResult();
        if($count_user > 0){
            return $user_id[0]->user_teacher_id;
        }else{
            return '00';   
        }
    }
    public function getTeacher($data)
    {   
        $db = \config\Database::connect();
        $result = $db->table('users_teachers')->select('name')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1']);$count_user = $result->countAllResults();
        $user_id = $db->table('users_teachers')->select('name')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1'])->get()->getResult();
        if($count_user > 0){
            return $user_id[0]->name;
        }else{
            return '00';   
        }
    }

    public function admin_login_request($data)
    {   
        $db = \config\Database::connect();
        $result = $db->table('users_admin')->select('*')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1']);$count_user = $result->countAllResults();
        $user_id = $db->table('users_admin')->select('admin_id')->where(['username'=>$data['username'],'password'=>$data['password'],'status'=>'1'])->get()->getResult();
        if($count_user > 0){
            return '1';
        }else{
            return '2';   
        }
    }



    public function register_user($inputs){
        $db = \config\Database::connect();
        $result = $db->table('users')->select('*')->where(['email'=>$inputs['email']])->countAllResults();
        $builder = $db->table('users');
        if($result > 0){
            return 'User already exist !';
        }else{
            $insert_query = $builder->insert($inputs);
            if($insert_query) {
                return 'Please check your email inbox and confirm registration !';
            }else{
                return 'Error on user registration with these credientials !';
            }    
        }
    }

    public function activate_user($email)
    {
        $db = \config\Database::connect();
        $result = $db->table('users')->select('*')->where(['email'=>$email,'status'=>'2']);
        $count_user = $result->countAllResults();
        if($count_user > 0){
            if($result->update(['status'=>'1'])){
                return 'User Account is activated !';
            }else {
                return 'Invalid User request !';
            };
        }else{
            return 'User already activated you can login directly !';   
        }
    }

}


?>