<?php

namespace App\Models\Student;
use CodeIgniter\Model;

class Quiz_Model extends Model
{

    public function get_grade($id){
        $db = \config\Database::connect();
        $table_data = $db->table('users_students')->select('grade')->where(['status'=>'1','user_student_id'=>$id]);
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }
    
    public function get_ques_ids($quiz_id){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz_questions')->select('question_id')->where(['status'=>'1','quiz_id'=>$quiz_id]);
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }

        public function  check_answers($answer,$quiz_id,$question_id){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz_questions')->select('*')->where(['quiz_id'=>$quiz_id,'question_id'=>$question_id,'answer'=>$answer]);
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return '1';
        }else{
            return '0';
        } 
    }


    public function all_student_quizs($grade){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz')->select('*')->where(['status'=>'3','grade'=>$grade])->orderBy('quiz_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        } 
    }



    public function all_quizs(){
        $db = \config\Database::connect();
        $table_data = $db->table('quiz_questions')->select('*')->where(['status'=>'1'])->orderBy('quiz_id','DESC');
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

     public function add_new_data_withoutDuplicate($table_name,$data,$validate_data){
        $db = \config\Database::connect();
        $table = $db->table($table_name)->where($validate_data)->countAllResults();
        if($table > 0){
            return '3';
        }else {
            $insert_table = $db->table($table_name);
            if ($insert_table->insert($data)){
                return '1';
            }else {
                return '0';
            };                
        } 
    }
}