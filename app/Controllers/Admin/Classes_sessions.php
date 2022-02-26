<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
Use App\Models\Admin\functions_Model;
Use App\Models\Admin\LiveClass_Model;

class Classes_sessions extends BaseController
{
    public function adminLiveClasses_page()
    {
     
        $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        // users_students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all liveclasses
        $LiveClass_Model= new LiveClass_Model();
        $table_name = 'class_sessions';
        $validate_data = ['status'=>1];
        $data['class_sessions'] = $LiveClass_Model->get_liveClasses_desc($table_name,$validate_data);
        return view('Admin/AdminLiveClasses_page',$data);
    }
    public function adminLiveClasses()
    {
             
            $get_model = new Functions_Model();
            //get all teachers
            $table_name = 'users_teachers';
            $validate_data = ['status'=>1];
            $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
            
            // users_students
            $table_name = 'users_students';
            $validate_data = ['status'=>1];
            $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

            //get all grades
            $table_name = 'grades';
            $validate_data = ['status'=>1];
            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

            //get all subjects
            $get_model = new functions_Model();
            $table_name = 'subjects';
            $validate_data = ['status'=>1];
            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);


            //get all liveclasses
            $LiveClass_Model= new LiveClass_Model();
            $table_name = 'class_sessions';
            $validate_data = ['status'=>1];
            $data['class_sessions'] = $LiveClass_Model->get_liveClasses_desc($table_name,$validate_data);

        if ($this->request->getMethod('POST')) {
            $title = $this->request->getPost('title'); 
            $date = $this->request->getPost('for_date');
            $teacher = $this->request->getPost('teacher');
            $grade = $this->request->getPost('grade');
            $subject = $this->request->getPost('subject');
            $student = $this->request->getPost('student');
            $strt_time = $this->request->getPost('strt_time');
            $time = $this->request->getPost('time');
            $rules = [
                'teacher'=>'required',
                'grade'=>'required',
                'subject'=>'required',
                'student'=>'required',
                'time'=>'required',
                'strt_time'=>'required'
            ]; 
              
            if ($this->validate($rules)) {
                $API_KEY = "o45F8YFZR1u2POy4aTQ9ZA";
                $API_SECRET = "iFB1V8XUpessgBd9EdVvmGJeemOnBwOVMuZu";
                $EMAIL_ID = "hemantwebbackdev@gmail.com"; 
                require APPPATH.'Views/apiZoom.php';
                $arr['topic']=$title;
                $arr['start_date']= date("d-m-Y", strtotime($date));
                $arr['start_time']= $strt_time;
                // exit();
                $arr['timezone']='Asia/Kolkata';
                
                $arr['duration']=$time;
                $arr['password']='';
                $arr['type']='2';
                
                $result=createMeeting($arr,$API_KEY,$API_SECRET,$EMAIL_ID);
                if(isset($result->id)){
                    $zoom_link = $result->join_url;
                    // echo "Join URL: <a href='".$result->join_url."'>".$result->join_url."</a><br/>";
                    // echo "Password: ".$result->password."<br/>";
                    // echo "Start Time: ".$result->start_time."<br/>";
                    // echo "Duration: ".$result->duration."<br/>";
                }else{
                    // echo '<pre> ERROR <br>';
                    // print_r($result);
                    $data['reg_error'] = 'Error creating zoom link retry contact your developer !';
                    return view('Admin/AdminLiveClasses_page', $data);
                }
                    $inputs = ['title'=>$title,'for_date'=>$date,'teacher'=>$teacher,'grade'=>$grade,'subject'=>$subject,'student'=>$student,'timing'=>$time,'strt_time'=>$strt_time,'zoom_link'=>$zoom_link,'status'=>'1'];
                    $validate_data = ['for_date'=>$date,'teacher'=>$teacher,'grade'=>$grade,'subject'=>$subject,'student'=>$student,'timing'=>$time,'strt_time'=>$strt_time,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('class_sessions',$inputs,$validate_data);
                    if($res == '1'){
                        $data['message'] = 'Class added successfully !';
                        return view('Admin/AdminLiveClasses_page', $data);
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding Class retry !';
                        return view('Admin/AdminLiveClasses_page', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Class Already Assigned !';
                        return view('Admin/AdminLiveClasses_page', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading Class contact your developer !';
                        return view('Admin/AdminLiveClasses_page', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/AdminLiveClasses_page', $data);
            }
        }
}
   
}

?>