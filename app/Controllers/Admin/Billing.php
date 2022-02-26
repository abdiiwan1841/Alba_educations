<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
Use App\Models\Admin\Billing_model;
use App\Models\Admin\functions_Model;

class Billing extends BaseController
{
    public function adminTeacherBilling()
    {
        $Billing_model = new Billing_model();
        $data['respo'] = $Billing_model ->getTchBill();

       //get all grades
        $get_model = new functions_Model();
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $get_model = new functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/adminTeacherBilling',$data);
   }
   public function adminStudentBilling()
   {
       $Billing_model = new Billing_model();
       $data['respo'] = $Billing_model ->getStdBill();

       //get all grades
        $get_model = new functions_Model();
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $get_model = new functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
        
       return view('Admin/adminStudentBilling',$data);
   }
   public function finalStdBill()
   {
       $Billing_model = new Billing_model();
       $data['respo'] = $Billing_model ->getStdBill();

       //get all grades
        $get_model = new functions_Model();
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $get_model = new functions_Model();
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
       if ($this->request->getMethod('POST')) {
            $Amount = $this->request->getPost('Amount');
            $student_id = $this->request->getPost('student_id');
            $rules = [
                'Amount'=>'required',
                'student_id'=>'required'
            ]; 
            if ($this->validate($rules)) {
                    // $inputs = ['grade'=>$Amount];
                    // $validate_data = ['grade'=>$Amount,'subject'=>$student_id,'status'=>'2'];
                    $upload_fun = new Billing_model();
                    $sess = $upload_fun->getSessionStd($student_id);
                    
                    foreach($sess as $ids){
                        // remarks_sessions
                        $res = $upload_fun->update_billings($ids->session_id,$Amount);
                    }
                    $Billing_model = new Billing_model();
                    $data['respo'] = $Billing_model ->getStdBill();

                    //get all grades
                        $get_model = new functions_Model();
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

                        //get all grades
                        $get_model = new functions_Model();
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
                    if($res == '1'){
                        $data['message'] = 'Updated successfully !';
                        return view('Admin/adminStudentBilling', $data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error Updated retry !';
                        return view('Admin/adminStudentBilling', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Updated Already sent !';
                        return view('Admin/adminStudentBilling', $data);
                    }else{
                        $data['reg_error'] = 'Error Updating billing contact your developer !';
                        return view('Admin/adminStudentBilling', $data);
                    }    
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/adminStudentBilling', $data);
            }
        }
   }
}

?>