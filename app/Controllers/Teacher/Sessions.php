<?php
namespace App\Controllers\Teacher;
Use App\Controllers\BaseController;
use App\Models\Teacher\functions_Model;
use App\Models\Teacher\tchFunctions_Model;

class Sessions extends BaseController
{
    public function teacherTodaySession_page()
    {
        $get_model = new Functions_Model();
        // get all teachers
        $table_name = 'users_students';
        $select_col = 'user_student_id,name,grade';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);


        // get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $select_col = '*';
        $data['grades'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $select_col = 'subject_id,subject_name';
        $data['subjects'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // all class_sessions 
        $stdFunctions_Model = new tchFunctions_Model();
        $table_name = 'class_sessions';
        $session = session();
        if ($session->has('TEACHER_LOGIN')) {
            $user_id = $session->get('TEACHER');
        }else {
            return redirect()->to('/teacher_login');
            // return view('FrontEnd/teacher_login');
        }
        $validate_data = ['teacher'=>$user_id,'status'=>1];
        $validate_data_next = ('for_date < DATE_ADD(NOW(), INTERVAL 1 DAY)');
        $validate_data_last = ('for_date > DATE_ADD(NOW(), INTERVAL -1 DAY)');
        // $select_col = 'table_name.the_date > DATE_SUB(CURDATE(), INTERVAL 1 DAY)';
        $data['class_sessions'] = $stdFunctions_Model->next_classes($table_name,$validate_data,$validate_data_next,$validate_data_last);
        return view('Teacher/TodaySession', $data);
    }
    public function student_attendance()
    {
        $get_model = new Functions_Model();
        // get all teachers
        $table_name = 'users_students';
        $select_col = 'user_student_id,name,grade';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $select_col = '*';
        $data['grades'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $select_col = 'subject_id,subject_name';
        $data['subjects'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // all class_sessions 
        $stdFunctions_Model = new tchFunctions_Model();
        $table_name = 'class_sessions';
        $session = session();
        if ($session->has('TEACHER_LOGIN')) {
            $user_id = $session->get('TEACHER');
        }else {
            return redirect()->to('/teacher_login');
            // return view('FrontEnd/teacher_login');
        }
        $validate_data = ['teacher'=>$user_id,'status'=>1];
        $validate_data_next = ('for_date < DATE_ADD(NOW(), INTERVAL 1 DAY)');
        $validate_data_last = ('for_date > DATE_ADD(NOW(), INTERVAL -1 DAY)');
        // $select_col = 'table_name.the_date > DATE_SUB(CURDATE(), INTERVAL 1 DAY)';
        $data['class_sessions'] = $stdFunctions_Model->next_classes($table_name,$validate_data,$validate_data_next,$validate_data_last);
        
        if ($this->request->getMethod('POST')) {
            $remarks = esc($this->request->getPost('remarks'));
            $mySession = esc($this->request->getPost('mySession'));
            $sessionStatus = esc($this->request->getPost('sessionStatus'));
            $topic_covered = esc($this->request->getPost('topic_covered'));
            $homework_status = esc($this->request->getPost('homework_status'));
            $next_topic = esc($this->request->getPost('next_topic'));
            $rules = [
                'remarks'=>'required',
                'mySession'=>'required',
                'sessionStatus'=>'required',
                'topic_covered'=>'required',
                'homework_status'=>'required',
                'next_topic'=>'required'    
            ]; 
            
            $sel_get_model = new functions_Model();
            $validate_data = ['status'=>'1'];
            $where_clause = ['session_id'=>$mySession];
            $check_date = $sel_get_model->get_where_data('class_sessions','for_date,strt_time',$validate_data,$where_clause);
            foreach($check_date as $today){ 
                $check_date_today = $today->for_date;
                $check_time = $today->strt_time;
            }
            if(date('Y-m-d') === $check_date_today ){
                if (date('H-i-s') <= $check_time) {
                    if ($this->validate($rules)) {
                    $inputs = ['remarks'=>$remarks,'sessionID'=>$mySession,'sessionStatus'=>$sessionStatus,'topic_covered'=>$topic_covered,'homework_status'=>$homework_status,'next_topic'=>$next_topic,'status'=>'1'];
                    $validate_data = ['remarks'=>$remarks,'sessionID'=>$mySession,'sessionStatus'=>$sessionStatus,'status'=>'1','topic_covered'=>$topic_covered,'homework_status'=>$homework_status,'next_topic'=>$next_topic];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('remarks_sessions',$inputs,$validate_data);
                    if($res == '1'){
                        $update_data = ['status'=>2];
                        $update_table = "class_sessions";
                        $validate_data = ['session_id'=>$mySession,'status'=>2];
                        $where_clause =['session_id'=>$mySession];
                        $update_model = new tchFunctions_Model();
                        $upRes = $update_model->updateData($update_table,$update_data,$validate_data,$where_clause);

                            $get_model = new Functions_Model();
                            // get all teachers
                            $table_name = 'users_students';
                            $select_col = 'user_student_id,name,grade';
                            $validate_data = ['status'=>1];
                            $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);


                            // get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $select_col = '*';
                            $data['grades'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

                            // get all subjects
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $select_col = 'subject_id,subject_name';
                            $data['subjects'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

                            // all class_sessions 
                            $stdFunctions_Model = new tchFunctions_Model();
                            $table_name = 'class_sessions';
                            $session = session();
                            if ($session->has('TEACHER_LOGIN')) {
                                $user_id = $session->get('TEACHER');
                            }else {
                                return redirect()->to('/teacher_login');
                                // return view('FrontEnd/teacher_login');
                            }
                            $validate_data = ['teacher'=>$user_id,'status'=>1];
                            $validate_data_next = ('for_date < DATE_ADD(NOW(), INTERVAL 1 DAY)');
                            $validate_data_last = ('for_date > DATE_ADD(NOW(), INTERVAL -1 DAY)');
                            // $select_col = 'table_name.the_date > DATE_SUB(CURDATE(), INTERVAL 1 DAY)';
                            $data['class_sessions'] = $stdFunctions_Model->next_classes($table_name,$validate_data,$validate_data_next,$validate_data_last);
                    
                        if ($upRes == "3") {
                            $data['reg_error'] = 'Already done !';
                            return view('Teacher/TodaySession', $data);
                        }elseif ($upRes == '1') {
                            $data['message'] = 'Attendance done successfully !';
                            return view('Teacher/TodaySession', $data);
                        }else {
                            $data['reg_error'] = 'Error taking Attendance retry !';
                            return view('Teacher/TodaySession', $data);    
                        }
                }elseif($res=='2'){
                    $data['reg_error'] = 'Error taking Attendance retry !';
                    return view('Teacher/TodaySession', $data);
                }elseif($res =='3'){
                    $data['reg_error'] = 'Attendance Already done !';
                    return view('Teacher/TodaySession', $data);
                }else{
                    $data['reg_error'] = 'Error taking Attendance retry !';
                    return view('Teacher/TodaySession', $data);
                }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Teacher/TodaySession', $data);
            }
                }else {
                    $data['reg_error'] = 'This is not todays session !';
                    return view('Teacher/TodaySession', $data);                      
                }
            }else{
                $data['reg_error'] = 'This is not todays session !';
                return view('Teacher/TodaySession', $data);
            }
        }
    }

}

?>