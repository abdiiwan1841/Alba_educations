<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;


class Sessions extends BaseController
{
    public function SessionHistory_page()
    {
         $get_model = new Functions_Model();
        //get all students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);

        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);


        $get_model = new Functions_Model();
        //get  all_sessions
        $data['all_sessions'] = $get_model->get_all_sessions();
        return view('Admin/SessionHistory',$data);
    }
    

    
}

?>