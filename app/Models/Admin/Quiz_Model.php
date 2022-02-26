<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class Quiz_Model extends Model
{
    public function all_quizs(){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz')->select('*')->where(['status'=>'3'])->orderBy('quiz_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    public function all_teacher_quizs($teacher_id){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz')->select('*')->where(['status'=>'3','user_created'=>$teacher_id])->orderBy('quiz_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    public function pending_quizs(){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz')->select('*')->where(['status'=>'1','user_created'=>'0'])->orderBy('quiz_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    public function pending_quizs_teacher($id){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz')->select('*')->where(['status'=>'1','user_created'=>$id])->orderBy('quiz_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    public function pending_teacher_quizs($id){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz')->select('*')->where(['status'=>'1','user_created'=>$id])->orderBy('quiz_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
        public function pending_approvals(){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz')->select('*')->where(['status'=>'2'])->orderBy('quiz_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }


    public function get_attended_sessions_allTch(){
        $db = \config\Database::connect();
        $table_data = $db->table('remarks_sessions')->select(['subject','teacher'])->select('remarks_sessions.status ','sessionStatus')->where(['remarks_sessions.status'=>'1']);
        $table_data->join('class_sessions', 'remarks_sessions.sessionID = class_sessions.session_id')->select('SUM(sessionStatus) as totalAttendance')->groupBy('class_sessions.teacher')->where(['remarks_sessions.sessionStatus'=>'1','class_sessions.status'=>'2'])->orderBy('remarks_sessions.remark_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    
}