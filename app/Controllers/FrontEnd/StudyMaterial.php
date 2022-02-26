<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
use App\Models\frontEnd\Functions_Model;
use App\Models\frontEnd\Plans_Model;
use CodeIgniter\Validation\Rules;

require APPPATH.'Views/razorpay/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
class StudyMaterial extends BaseController
{
    public function regular_plan()
    {
        return view('FrontEnd/RegularPlan');
    }
    
    public function regular_plan_submit()
    {
        if ($this->request->getMethod('post')) {
            helper(['form']);
            $rules = [
                'name'=>'required',
                'parentName'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'grade'=>'required',
                'subject'=>'required',
                'topic'=>'required'
            ];       
            if ($this->validate($rules)) {
                $inputs = ['name'=>esc($this->request->getPost('name')),'parentName'=>esc($this->request->getPost('parentName')),'email'=>esc($this->request->getPost('email')),'phone'=>esc($this->request->getPost('phone')),'grade'=>esc($this->request->getPost('grade')),'subject'=>esc($this->request->getPost('subject')),'topic'=>esc($this->request->getPost('topic')),'plan_type'=>'1','status'=>'1'];
                $Functions_Model = new Functions_Model();
                $table_name = 'regular_plan';
                $validate_data = ['email'=>esc($this->request->getPost('email')),'plan_type'=>'1','status'=>'2'];
                $respo = $Functions_Model->add_new_data_withoutDuplicate($table_name,$inputs,$validate_data); 
                if($respo == '1'){
                    $session = session();
                    $session->set('regular_user_email',$inputs['email']);
                    //pay here
                    $to_pay = '5';
                    //now payment 

                    //user deatils 
                        // $user_details_payemnt =  $user_id;
                        $key_id = 'rzp_test_Bq9pShlQsMtIQH';
                        $secret = 'yszCyIqk9CyIaMFVKUABmJdf';
                        $api = new Api($key_id, $secret);
                        $amount_to_pay = ($to_pay*100);
                        $orderData = [    
                            'receipt'         => 'rcptid_11',
                            'amount'          => $amount_to_pay, 
                            'currency'        => 'USD'
                        ];
                        $customerdata = [
                            'name'=>$inputs['name'],
                            'email'=>$inputs['email'],
                            'contact'=>$inputs['phone']
                        ];
                        $razorpayOrder = $api->order->create($orderData);
                        return view('subscriptionWorkbooks.php', ['customerdata'=>$customerdata, 'order'=>$razorpayOrder,'key_id'=>$key_id, 'secret'=>$secret, ]);
                        //payement ends
                   
                    // return view('Frontend/ParentSupport_parentCounselling', $data);
                }elseif($respo=='2'){
                    $data['reg_error'] = 'Error submitting  retry !';
                    return view('FrontEnd/RegularPlan', $data);
                }elseif($respo =='3'){
                    $data['reg_error'] = 'User with this email or phone  already enquired !';
                    return view('FrontEnd/RegularPlan', $data);
                }else{
                    $data['reg_error'] = 'Error in requesting  you can contact us diretly via email or phone !';
                    return view('FrontEnd/RegularPlan', $data);
                }    
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                return view('FrontEnd/RegularPlan', $data);
            }
        
            exit();

            
        }else {
            echo $data['reg_error'] = 'Invalid request';
        }
    }

    public function successRegularPlan()
    {   
        $razorpay_order_id = $this->request->getPost('razorpay_order_id');
        $razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
        $razorpay_signature = $this->request->getPost('razorpay_signature');
        $config_data  = $razorpay_order_id . "|" . $razorpay_payment_id;
        $generated_signature = hash_hmac('sha256', $config_data , 'yszCyIqk9CyIaMFVKUABmJdf');
        
        $session = session();
        $email = $session->get('regular_user_email');
           
        if ($generated_signature == $razorpay_signature) 
        { 
            $Functions_Model = new Functions_Model();
            $table_name = 'regular_plan';
            $where_clause=['email'=>$email,'plan_type'=>'1','status'=>'1'];
            $update_data = ['status'=>'2'];
            $final_response = $Functions_Model->update_row($table_name,$where_clause,$update_data);
            if ($final_response == '1') { 
                $session->remove('regular_user_email');
                $data['message'] = 'Form submitted successfully will back to you very soon !';
                return view('frontEnd/RegularPlan', $data);                
            }else {
                $session->remove('regular_user_email');
                $data['message'] = 'Form submitted successfully will back to you very soon !';    
                return view('FrontEnd/RegularPlan');  
            }
        }
        else
        {
            $session->remove('regular_user_email');
            $data['message'] = 'Error during payment processing retry or contact us directly if payed from your side !';
            return view('frontEnd/RegularPlan', $data); 
        }
    }

    public function weekly_plan()
    {
        return view('FrontEnd/WeeklyPlan');
    }
    
    public function weekly_plan_submit()
    {
        if ($this->request->getMethod('post')) {
            helper(['form']);
            $rules = [
                'name'=>'required',
                'parentName'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'grade'=>'required',
                'subject'=>'required',
                'topic'=>'required'
            ];       
            if ($this->validate($rules)) {
                $inputs = ['name'=>esc($this->request->getPost('name')),'parentName'=>esc($this->request->getPost('parentName')),'email'=>esc($this->request->getPost('email')),'phone'=>esc($this->request->getPost('phone')),'grade'=>esc($this->request->getPost('grade')),'subject'=>esc($this->request->getPost('subject')),'topic'=>esc($this->request->getPost('topic')),'plan_type'=>'2','status'=>'1'];
                $Functions_Model = new Functions_Model();
                $table_name = 'regular_plan';
                $validate_data = ['email'=>esc($this->request->getPost('email')),'plan_type'=>'2','status'=>'2'];
                $respo = $Functions_Model->add_new_data_withoutDuplicate($table_name,$inputs,$validate_data); 
                if($respo == '1'){
                    $session = session();
                    $session->set('regular_user_email',$inputs['email']);
                    //pay here
                    $to_pay = '20';
                    //now payment 

                    //user deatils 
                        // $user_details_payemnt =  $user_id;
                        $key_id = 'rzp_test_Bq9pShlQsMtIQH';
                        $secret = 'yszCyIqk9CyIaMFVKUABmJdf';
                        $api = new Api($key_id, $secret);
                        $amount_to_pay = ($to_pay*100);
                        $orderData = [    
                            'receipt'         => 'rcptid_11',
                            'amount'          => $amount_to_pay, 
                            'currency'        => 'USD'
                        ];
                        $customerdata = [
                            'name'=>$inputs['name'],
                            'email'=>$inputs['email'],
                            'contact'=>$inputs['phone']
                        ];
                        $razorpayOrder = $api->order->create($orderData);
                        return view('subscriptionWorkbooksweekly.php', ['customerdata'=>$customerdata, 'order'=>$razorpayOrder,'key_id'=>$key_id, 'secret'=>$secret, ]);
                        //payement ends
                   
                    // return view('Frontend/ParentSupport_parentCounselling', $data);
                }elseif($respo=='2'){
                    $data['reg_error'] = 'Error submitting  retry !';
                    return view('FrontEnd/WeeklyPlan', $data);
                }elseif($respo =='3'){
                    $data['reg_error'] = 'User with this email or phone  already enquired !';
                    return view('FrontEnd/WeeklyPlan', $data);
                }else{
                    $data['reg_error'] = 'Error in requesting  you can contact us diretly via email or phone !';
                    return view('FrontEnd/WeeklyPlan', $data);
                }    
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                return view('FrontEnd/WeeklyPlan', $data);
            }
        
            exit();

            
        }else {
            echo $data['reg_error'] = 'Invalid request';
        }
    }

    public function successWeeklyPlan()
    {   
        $razorpay_order_id = $this->request->getPost('razorpay_order_id');
        $razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
        $razorpay_signature = $this->request->getPost('razorpay_signature');
        $config_data  = $razorpay_order_id . "|" . $razorpay_payment_id;
        $generated_signature = hash_hmac('sha256', $config_data , 'yszCyIqk9CyIaMFVKUABmJdf');
        
        $session = session();
         $email = $session->get('regular_user_email');
           
        if ($generated_signature == $razorpay_signature) 
        { 
            $Functions_Model = new Functions_Model();
            $table_name = 'regular_plan';
            $where_clause=['email'=>$email,'plan_type'=>'2','status'=>'1'];
            $update_data = ['status'=>'2'];
            $final_response = $Functions_Model->update_row($table_name,$where_clause,$update_data);
            if ($final_response == '1') { 
                $session->remove('regular_user_email');
                $data['message'] = 'Form submitted successfully will back to you very soon !';
                return view('frontEnd/WeeklyPlan', $data);                
            }else {
                $session->remove('regular_user_email');
                $data['message'] = 'Form submitted successfully will back to you very soon !';    
                return view('FrontEnd/WeeklyPlan');  
            }
        }
        else
        {
            $session->remove('regular_user_email');
            $data['message'] = 'Error during payment processing retry or contact us directly if payed from your side !';
            return view('frontEnd/WeeklyPlan', $data); 
        }
    }
    
    public function studyMaterial_monthlyPlan()
    {
        return view('FrontEnd/MonthlyPlan');
    }
    
    public function monthly_plan()
    {
        if ($this->request->getMethod('post')) {
            helper(['form']);
            $rules = [
                'name'=>'required',
                'parentName'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'grade'=>'required',
                'subject'=>'required',
                'topic'=>'required'
            ];       
            if ($this->validate($rules)) {
                $inputs = ['name'=>esc($this->request->getPost('name')),'parentName'=>esc($this->request->getPost('parentName')),'email'=>esc($this->request->getPost('email')),'phone'=>esc($this->request->getPost('phone')),'grade'=>esc($this->request->getPost('grade')),'subject'=>esc($this->request->getPost('subject')),'topic'=>esc($this->request->getPost('topic')),'plan_type'=>'3','status'=>'1'];
                $Functions_Model = new Functions_Model();
                $table_name = 'regular_plan';
                $validate_data = ['email'=>esc($this->request->getPost('email')),'plan_type'=>'3','status'=>'2'];
                $respo = $Functions_Model->add_new_data_withoutDuplicate($table_name,$inputs,$validate_data); 
                if($respo == '1'){
                    $session = session();
                    $session->set('regular_user_email',$inputs['email']);
                    //pay here
                    $to_pay = '75';
                    //now payment 

                    //user deatils 
                        // $user_details_payemnt =  $user_id;
                        $key_id = 'rzp_test_Bq9pShlQsMtIQH';
                        $secret = 'yszCyIqk9CyIaMFVKUABmJdf';
                        $api = new Api($key_id, $secret);
                        $amount_to_pay = ($to_pay*100);
                        $orderData = [    
                            'receipt'         => 'rcptid_11',
                            'amount'          => $amount_to_pay, 
                            'currency'        => 'USD'
                        ];
                        $customerdata = [
                            'name'=>$inputs['name'],
                            'email'=>$inputs['email'],
                            'contact'=>$inputs['phone']
                        ];
                        $razorpayOrder = $api->order->create($orderData);
                        return view('subscriptionWorkbooksMonthly.php', ['customerdata'=>$customerdata, 'order'=>$razorpayOrder,'key_id'=>$key_id, 'secret'=>$secret, ]);
                        //payement ends
                   
                    // return view('Frontend/ParentSupport_parentCounselling', $data);
                }elseif($respo=='2'){
                    $data['reg_error'] = 'Error submitting  retry !';
                    return view('FrontEnd/MonthlyPlan', $data);
                }elseif($respo =='3'){
                    $data['reg_error'] = 'User with this email or phone  already enquired !';
                    return view('FrontEnd/MonthlyPlan', $data);
                }else{
                    $data['reg_error'] = 'Error in requesting  you can contact us diretly via email or phone !';
                    return view('FrontEnd/MonthlyPlan', $data);
                }    
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                return view('FrontEnd/MonthlyPlan', $data);
            }
        
           
            
        }else {
            echo $data['reg_error'] = 'Invalid request';
        }
    }

    public function successMonthlyPlan()
    {   
        $razorpay_order_id = $this->request->getPost('razorpay_order_id');
        $razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
        $razorpay_signature = $this->request->getPost('razorpay_signature');
        $config_data  = $razorpay_order_id . "|" . $razorpay_payment_id;
        $generated_signature = hash_hmac('sha256', $config_data , 'yszCyIqk9CyIaMFVKUABmJdf');
        
        $session = session();
        $email = $session->get('regular_user_email');
           
        if ($generated_signature == $razorpay_signature) 
        { 
            $Functions_Model = new Functions_Model();
            $table_name = 'regular_plan';
            $where_clause=['email'=>$email,'plan_type'=>'3','status'=>'1'];
            $update_data = ['status'=>'2'];
            $final_response = $Functions_Model->update_row($table_name,$where_clause,$update_data);
            if ($final_response == '1') { 
                $session->remove('regular_user_email');
                $data['message'] = 'Form submitted successfully will back to you very soon !';
                return view('frontEnd/MonthlyPlan', $data);                
            }else {
                $session->remove('regular_user_email');
                $data['message'] = 'Form submitted successfully will back to you very soon !';    
                return view('FrontEnd/MonthlyPlan');  
            }
        }
        else
        {
            $session->remove('regular_user_email');
            $data['message'] = 'Error during payment processing retry or contact us directly if payed from your side !';
            return view('frontEnd/MonthlyPlan', $data); 
        }
    }
    

    public function book_your_demo()
    {
        if ($this->request->getMethod('post')) {
            helper(['form']);
            $rules = [
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'grade'=>'required',
                'subject'=>'required',
                'topic'=>'required',
                'timezone'=>'required'
            ];       
            if ($this->validate($rules)) {
                $inputs = ['name'=>esc($this->request->getPost('name')),'topic'=>esc($this->request->getPost('topic')),'email'=>esc($this->request->getPost('email')),'phone'=>esc($this->request->getPost('phone')),'grade'=>esc($this->request->getPost('grade')),'subject'=>esc($this->request->getPost('subject')),'timezone'=>esc($this->request->getPost('timezone')),'date'=>esc($this->request->getPost('date')),'timing'=>esc($this->request->getPost('timing'))];
                $Functions_Model = new Functions_Model();
                $table_name = 'book_your_demo';
                $validate_data = ['email'=>esc($this->request->getPost('email'))];
                $respo = $Functions_Model->add_new_data_withoutDuplicate($table_name,$inputs,$validate_data); 
                if($respo == '1'){
                    $data['message'] = 'Form submitted Will back to your very soon !';
                    return view('FrontEnd/StudyMaterial_bookYourDemo', $data);
                }elseif($respo=='2'){
                    $data['reg_error'] = 'Error submitting  retry !';
                    return view('FrontEnd/StudyMaterial_bookYourDemo', $data);
                }elseif($respo =='3'){
                    $data['reg_error'] = 'User with this email or phone  already enquired !';
                    return view('FrontEnd/StudyMaterial_bookYourDemo', $data);
                }else{
                    $data['reg_error'] = 'Error in requesting  you can contact us diretly via email or phone !';
                    return view('FrontEnd/StudyMaterial_bookYourDemo', $data);
                }    
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                return view('FrontEnd/StudyMaterial_bookYourDemo', $data);
            }
        
        
        }else {
            echo $data['reg_error'] = 'Invalid request';
        }
    }

    public function weeklyRegularPlan()
    {   
        echo $razorpay_order_id = $this->request->getPost('razorpay_order_id');
        echo $razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
        echo $razorpay_signature = $this->request->getPost('razorpay_signature');
        echo $config_data  = $razorpay_order_id . "|" . $razorpay_payment_id;
        echo $generated_signature = hash_hmac('sha256', $config_data , 'yszCyIqk9CyIaMFVKUABmJdf');
    
        $user_id = time();
          
        if ($generated_signature == $razorpay_signature) 
        { 
            echo 'Payment process is successful (we can decide where to redirect/ response after successful payment)'.'<br>'.'<br>'.'<br>'; 
            exit();

            $Plan_Model = new Plans_Model();
            $final_response = $Plan_Model->update_Plans_impressions($razorpay_order_id, $razorpay_payment_id, $razorpay_signature);
            if ($final_response == '1') { 
                $user_id = time();
                $session = session();
                $payment_time = $session->get('PAYMENT_TIME');
                $Plan_Model = new Plans_Model();
                $confirm_res = $Plan_Model->confirm_payment($user_id, $payment_time);
                if ($confirm_res == 1) {
                    echo 'plan subscribed will back to you very soon .. !';
                }else {
                    echo 'Problem processing your payment please retry !';
                }
            }else {
                return view('FrontEnd/RegularPlan');  
            }
        }
        else
        {
            echo 'Payment failed';
        }
        echo '<br>';
        print_r($_POST);
    }

}
?>