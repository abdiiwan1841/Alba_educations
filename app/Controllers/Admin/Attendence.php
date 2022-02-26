<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Admin\Session_model;


class Attendence extends BaseController
{
    public function AttendenceStudent()
    {   
         $get_model = new Functions_Model();
        //get all students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

        //get all teachers
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
    
        $Session_model = new Session_model();
        $res = $Session_model->get_attended_sessions_allStd();
        $data['stdAttendance'] = $res;
        return view('Admin/AttendanceStudent',$data);
    }
    public function AttendenceTeacher()
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
 
        $Session_model = new Session_model();
        $res = $Session_model->get_attended_sessions_allTch();
        $data['tchAttendance'] = $res;
        return view('Admin/AttendanceTeacher',$data);
    }
 
}

?>