<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class ReportCard extends BaseController
{
    public function delete_ReportCard()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "report_card";
        $where_clause = ['report_card_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

            $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        
         // all report_card 
        $functions_Model = new functions_Model();
        $table_name = 'report_card';
        $validate_data = ['status'=>1];
        $data['report_cards'] = $functions_Model->get_table_data($table_name,$validate_data);
       
        return view('Admin/adminRequestReportCard',$data);
    }
    public function adminStudentNotification()
    {       
        $get_model = new Functions_Model();
        $table_name = 'newsletter_subscriptions';
        $validate_data = ['status'=>1];
        $data['newsletter_subscriptions'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/adminStudentNotification',$data);
    }
    public function add_report_card()
    {
           $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        
         // all report_card 
        $functions_Model = new functions_Model();
        $table_name = 'report_card';
        $validate_data = ['status'=>1];
        $data['report_cards'] = $functions_Model->get_table_data($table_name,$validate_data);
        if ($this->request->getMethod('POST')) {
            $grade = $this->request->getPost('grade');
            $student = $this->request->getPost('student');
            $subject = $this->request->getPost('subject');
            $topic = $this->request->getPost('topic');
            $strength = $this->request->getPost('strength');
            $weekness = $this->request->getPost('weekness');
            $suggestions = $this->request->getPost('suggestions');
            $upcoming_events = $this->request->getPost('upcoming_events');
            $rules = [
                'grade'=>'required',
                'student'=>'required',
                'subject'=>'required',
                'topic'=>'required',
                'strength'=>'required',
                'weekness'=>'required',
                'suggestions'=>'required',
                'upcoming_events'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                    $inputs = ['grade'=>$grade,'student'=>$student,'subject'=>$subject,'topic'=>$topic,'strength'=>$strength,'weekness'=>$weekness,'suggestions'=>$suggestions,'upcoming_events'=>$upcoming_events,'status'=>'1'];
                    $validate_data = ['grade'=>$grade,'student'=>$student,'subject'=>$subject,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('report_card',$inputs,$validate_data);
                    if($res == '1'){
                           $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        
         // all report_card 
        $functions_Model = new functions_Model();
        $table_name = 'report_card';
        $validate_data = ['status'=>1];
        $data['report_cards'] = $functions_Model->get_table_data($table_name,$validate_data);
                        $data['message'] = 'Report card sent successfully !';
                        return view('Admin/adminRequestReportCard', $data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error sending Report card retry !';
                        return view('Admin/adminRequestReportCard', $data);
                    }elseif($res =='3'){
                           $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        
         // all report_card 
        $functions_Model = new functions_Model();
        $table_name = 'report_card';
        $validate_data = ['status'=>1];
        $data['report_cards'] = $functions_Model->get_table_data($table_name,$validate_data);
                        $data['reg_error'] = 'Report card Already sent !';
                        return view('Admin/adminRequestReportCard', $data);
                    }else{
                        $data['reg_error'] = 'Error sending Report card contact your developer !';
                        return view('Admin/adminRequestReportCard', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/adminRequestReportCard', $data);
            }
        }
    }
}

?>