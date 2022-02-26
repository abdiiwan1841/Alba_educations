<?php

namespace App\Models\Student;

use App\Controllers\FrontEnd\Student;
use CodeIgniter\Model;

class Billing_Model extends Model
{
    public function get_sessions_billing($user_id)
    {
        $db = \config\Database::connect();
        $table_data = $db->table('remarks_sessions')->select('*')->where(['remarks_sessions.status'=>'1','remarks_sessions.payment_status'=>'1']);
        $table_data->join('class_sessions', 'remarks_sessions.sessionID = class_sessions.session_id')->select(['class_sessions.subject'])->select('SUM(sessionStatus) as totalAttendance')->where(['remarks_sessions.sessionStatus'=>'1','remarks_sessions.payment_status'=>'1','class_sessions.status'=>'2','class_sessions.student'=>$user_id])->orderBy('remarks_sessions.remark_id','DESC');
        $table_data->join('users_students', 'class_sessions.student = users_students.user_student_id')->select(['users_students.name']);
        $table_res = $table_data->get()->getResult();
        
        $result = $db->table('class_sessions')->select('*')->where(['status'=>'2','student'=>$user_id])->countAllResults();
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    public function getStdBill($user_id)
    {
        $db = \config\Database::connect();
        $table_data = $db->table('remarks_sessions')->select('remarks_sessions.status ','sessionStatus')->where(['remarks_sessions.status'=>'1']);
        $table_data->join('class_sessions', 'remarks_sessions.sessionID = class_sessions.session_id')->select(['class_sessions.subject'])->select('SUM(sessionStatus) as totalAttendance')->groupBy('class_sessions.student')->where(['remarks_sessions.sessionStatus'=>'1','remarks_sessions.payment_status'=>'0','class_sessions.status'=>'2','class_sessions.student'=>$user_id])->orderBy('remarks_sessions.remark_id','DESC');
        $table_data->join('users_students', 'class_sessions.student = users_students.user_student_id')->select('users_students.feePerSession');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    
}


?>