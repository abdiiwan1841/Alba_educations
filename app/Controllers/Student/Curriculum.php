<?php
namespace App\Controllers\Student;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;

class Curriculum extends BaseController
{
    public function Curriculum_page()
    {
         $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
        
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        // all curriculums 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'curriculum';
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id = $session->get('STUDENT');
        }else {
            return view('FrontEnd/Login');
        }
        $validate_data = ['student'=>$user_id,'status'=>1];
        $data['curriculums'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);

            return view('Student/Curriculum', $data);
    }
  

}

?>