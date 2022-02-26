<?php
namespace App\Controllers\Student;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\Sessions_Model;


class Sessions extends BaseController
{
    public function sessionHistory_page()
    {
        $get_model = new Functions_Model();
        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        $table_name = 'class_sessions';
        $session = session();
        if ($session->has('STUDENT_LOGIN')) {
            $user_id = $session->get('STUDENT');
        }else{
            return redirect()->to('/login');
        }
        $sessionModel = new Sessions_Model();
        $result = $sessionModel->get_sessions_history($user_id);
        $data['sessions_history'] = $result; 
        return view('Student/SessionHistory', $data);
    }
  

}

?>