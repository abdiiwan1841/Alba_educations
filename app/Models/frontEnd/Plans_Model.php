<?php
namespace App\Models\frontEnd;
use CodeIgniter\Model;

class Plans_Model extends Model
{
    
    public function update_Plans_impressions($razorpay_order_id, $razorpay_payment_id, $razorpay_signature){
        $db = \config\Database::connect();
        $result = $db->table('regular_plan_impressions')->select('*')->where(['email'=>$inputs['email']])->countAllResults();
        $builder = $db->table('regular_plan_impressions');
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