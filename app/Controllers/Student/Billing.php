<?php
namespace App\Controllers\Student;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\Billing_Model;
require APPPATH.'Views/razorpay/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
use CodeIgniter\I18n\Time;

class Billing extends BaseController
{
    public function student_pay_bill()
    {
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id =  $session->get('STUDENT');
            $timeStamp = new Time('now');
            
            //get amount and details of student
            $stdModel = new Billing_Model();
            $validate_data = [];
            $resBill = $stdModel->getStdBill($user_id,$validate_data);
            // echo '<pre>';
            // print_r($resBill);
            // exit();
            $to_pay = 999;
             //now payment 

            //user deatils 
            $user_details_payemnt =  $user_id;
            $key_id = 'rzp_test_Bq9pShlQsMtIQH';
                    $secret = 'yszCyIqk9CyIaMFVKUABmJdf';
                    $api = new Api($key_id, $secret);
                    $amount_to_pay = ($to_pay*100);
                    $orderData = [    
                        'receipt'         => 'rcptid_11',
                        'amount'          => $amount_to_pay, 
                        'currency'        => 'INR'
                    ];
                    $customerdata = [
                        'name'=>'hemant',
                        'email'=>'hemant@gmail.com',
                        'contact'=>'6343545545'
                    ];
                    $razorpayOrder = $api->order->create($orderData);
                    return view('razorpay-checkout.php', ['customerdata'=>$customerdata, 'order'=>$razorpayOrder,'key_id'=>$key_id, 'secret'=>$secret, ]);
                    
                    //payement ends

        }else{
            return redirect()->to('/login');
        }
    }
  
     public function paymentStatus()
    {   
        echo $razorpay_order_id = $this->request->getPost('razorpay_order_id');
        echo $razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
        echo $razorpay_signature = $this->request->getPost('razorpay_signature');
        echo $config_data  = $razorpay_order_id . "|" . $razorpay_payment_id;
        echo $generated_signature = hash_hmac('sha256', $config_data , 'yszCyIqk9CyIaMFVKUABmJdf');
        $session = session();
        if ($session->has('STUDENT_LOGIN')) 
        {
            $user_id = $session->get('STUDENT');
        }else {
            return view('Student/Billing');
        }  
        if ($generated_signature == $razorpay_signature) 
        { 
            echo 'Payment process is successful (we can decide where to redirect/ response after successful payment)'.'<br>'.'<br>'.'<br>'; 
            exit(); 
            $Billing_Model = new Billing_Model();
            $final_response = $Billing_Model->update_impressions($user_id,$razorpay_order_id, $razorpay_payment_id, $razorpay_signature);
            if ($final_response == '1') {
                $session = session(); 
                if ($session->has('STUDENT_LOGIN')) 
                {
                    $user_id = $session->get('STUDENT_LOGIN');
                    $payment_time = $session->get('PAYMENT_TIME');
                    $Billing_Model = new Billing_Model();
                    $confirm_res = $Billing_Model->confirm_payment($user_id, $payment_time);
                    if ($confirm_res == 1) {
                        // orders_details status update
                        $confirm_res = $Billing_Model->orders_details_confirm($user_id, $payment_time);
                        if ($confirm_res == 1) {
                            $session->remove('PAYMENT_TIME');
                            echo  'Payment process is successful (we can decide where to redirect/ response after successful payment)'.'<br>'.'<br>'.'<br>';  
                        }else {
                            echo 'Problem processing your payment please retry !';    
                        }
                    }else {
                        echo 'Problem processing your payment please retry !';
                    }
                }else {
                    return view('/my-account');
                }
            }else {
                return view('Student/Billing');  
            }
        }
        else
        {
            echo 'Payment failed';
        }
        echo '<br>';
        print_r($_POST);
    }

    public function student_billing()
    {
        $get_model = new Functions_Model();
        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        // all curriculums 
        $stdFunctions_Model = new Billing_Model();
        $table_name = 'curriculum';
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id = $session->get('STUDENT');
        }else {
            return view('FrontEnd/Login');
        }
        $data['stdBilling'] = $stdFunctions_Model->get_sessions_billing($user_id);

        return view('Student/Billing', $data);
    }
  

}

?>