<?php
namespace App\Controllers\Student;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;
use App\Models\Teacher\tchFunctions_Model;


class Dashboard extends BaseController
{
    public function Dashboard_page()
    {
        $row_id = $this->request->uri->getSegment(3);
        $student = session()->get('STUDENT');
        
        $model = new Functions_Model();
        $table_name = 'users_students';
        $validate_data = ['user_student_id'=>$student,'status'=>'1'];
        $data['users_students'] = $model->get_table_data($table_name,$validate_data);


          $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
         //get notifications
        $table_name = 'notifications';
        $validate_data = ['status'=>'1'];
        $data['notifications'] = $model->get_table_data($table_name,$validate_data);

      
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

         $stdFunctions_Model = new tchFunctions_Model();
        $table_name = 'class_sessions';
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id = $session->get('STUDENT');
        }else{
            return redirect()->to('/login');
        }
        $validate_data = ['student'=>$user_id,'status'=>1];
        // echo date('Y-m-d'); exit();
        $validate_data_next = ('for_date < DATE_ADD(NOW(), INTERVAL 1 DAY)');
        $validate_data_last = ('for_date > DATE_ADD(NOW(), INTERVAL -1 DAY)');
        // $select_col = 'table_name.the_date > DATE_SUB(CURDATE(), INTERVAL 1 DAY)';
        $data['class_sessions'] = $stdFunctions_Model->next_classes($table_name,$validate_data,$validate_data_next,$validate_data_last);
         return view('Student/Dashboard',$data);
    }
  

}

?>