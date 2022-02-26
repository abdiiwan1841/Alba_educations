<?php
namespace App\Controllers\Teacher;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Teacher\tchFunctions_Model;
// use App\Models\Student\stdFunctions_Model;


class Dashboard extends BaseController
{
    public function dashboard_page()
    {
        $get_model = new Functions_Model();
        // get all teachers
        $table_name = 'users_students';
        $select_col = 'user_student_id,name,grade';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        
        // get all attended classes
        $table_name = 'class_sessions';
        $teacher_id = session()->get('TEACHER');
        $validate_data = ['status'=>2,'teacher'=>$teacher_id];
        $select_col = '*';
        $attended_classes = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        if(is_array($attended_classes)){
            $data['attended_classes'] = count($attended_classes);
        };

        // get all  classes
        $table_name = 'class_sessions';
        $teacher_id = session()->get('TEACHER');
        $validate_data = ['teacher'=>$teacher_id];
        $select_col = '*';
        $teacher_classes = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        if(is_array($teacher_classes)){
            $data['teacher_classes'] = count($teacher_classes);
        };

        
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
        return view('Teacher/Dashboard',$data);
    }
    
    

}

?>