<?php
namespace App\Models\Admin;
use CodeIgniter\Model;

class Billing_model extends Model
{
     public function getStdBill()
    {
        $db = \config\Database::connect();
        $table_data = $db->table('remarks_sessions')->select('remarks_sessions.status ','sessionStatus')->where(['remarks_sessions.status'=>'1','remarks_sessions.payment_status'=>'0']);
        $table_data->join('class_sessions', 'remarks_sessions.sessionID = class_sessions.session_id')->select(['class_sessions.subject','class_sessions.student'])->select('SUM(sessionStatus) as totalAttendance')->groupBy(['class_sessions.student','class_sessions.grade'])->where(['remarks_sessions.sessionStatus'=>'1','remarks_sessions.payment_status'=>'0','class_sessions.status'=>'2'])->orderBy('remarks_sessions.remark_id','DESC');
        $table_data->join('users_students', 'class_sessions.student = users_students.user_student_id')->select(['users_students.name','users_students.grade','users_students.feePerSession']);
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
     public function getTchBill()
    {
        $db = \config\Database::connect();
        $table_data = $db->table('remarks_sessions')->select('remarks_sessions.status ','sessionStatus')->where(['remarks_sessions.status'=>'1','remarks_sessions.payment_status'=>'0']);
        $table_data->join('class_sessions', 'remarks_sessions.sessionID = class_sessions.session_id')->select(['class_sessions.subject','class_sessions.teacher'])->select('SUM(sessionStatus) as totalAttendance')->groupBy(['class_sessions.teacher','class_sessions.grade'])->where(['remarks_sessions.sessionStatus'=>'1','remarks_sessions.payment_status'=>'0','class_sessions.status'=>'2'])->orderBy('remarks_sessions.remark_id','DESC');
        $table_data->join('users_teachers', 'class_sessions.teacher = users_teachers.user_teacher_id')->select(['users_teachers.name','users_teachers.grade','users_teachers.feePerSession']);
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    
    public function getSessionStd($student_id)
    {
        $db = \config\Database::connect();
        $result = $db->table('class_sessions')->select('*')->where(['student'=>$student_id,'status'=>'2'])->countAllResults();
        $table_data = $db->table('class_sessions')->select('session_id')->where(['student'=>$student_id,'status'=>'2']);
        $table_res = $table_data->get()->getResult();
        if ($result > 0) {
            return $table_res;
        }else{
            return '0';
        }   
    }

     public function update_billings($sessionID,$amount)
    {
        $db = \config\Database::connect();
        $result = $db->table('remarks_sessions')->select('*')->where(['sessionID'=>$sessionID,'payment_status'=>'0'])->countAllResults();
        $table_data = $db->table('remarks_sessions')->select('*')->where(['sessionID'=>$sessionID,'payment_status'=>'0']);
        if ($result > 0) {
            if($table_data->where(['sessionID'=>$sessionID,'payment_status'=>'0'])->update(['payment_status'=>'1','payable_amount'=>$amount])){
                return '1';
            }else {
                return '2';
            }
        }else{
            return '0';
        }  
    }

    
}