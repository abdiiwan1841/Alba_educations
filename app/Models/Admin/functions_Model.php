<?php
namespace App\Models\Admin;
use CodeIgniter\Model;

class functions_Model extends Model
{
    public function get_table_data($table_name,$validate_data){
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->countAllResults();
        $table_data = $db->table($table_name)->select('*')->where($validate_data);
        $table_res = $table_data->get()->getResult();
        if ($result > 0) {
            return $table_res;
        }else{
            return '0';
        }   
    }
    
    public function get_table_data_aas($table_name,$validate_data,$id){
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->countAllResults();
        $table_data = $db->table($table_name)->select('user_teacher_id')->where($validate_data);
        $table_res_O = $table_data->get()->getResult();
        $all_teachers = [];
        
        foreach($table_res_O as $t){
            array_push($all_teachers,$t->user_teacher_id);
        }
        $result1 = $db->table('subjects_teachers')->select('*')->where(['subjects_teachers.subject_id'=>$id])->countAllResults();
        if($result1> 0){
            // $table_data->join('subjects_teachers', 'users_teachers.user_teacher_id = subjects_teachers.teacher_id')->select('subjects_teachers.teacher_id AS user_teacher_id')->where(['subjects_teachers.subject_id'=>$id]);
            $table_data = $db->table('subjects_teachers')->select('teacher_id')->where(['subject_id'=>$id]);
            $table_res_A = $table_data->get()->getResult();
            
            foreach($table_res_A as $q){
                array_push($all_teachers,$q->teacher_id);
            }
        }

        if (count($all_teachers) > 0) {
            return $all_teachers;
        }else{
            return '0';
        }   
    }
    
    public function get_table_data_des($table_name,$validate_data,$id){
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->countAllResults();
        $table_data = $db->table($table_name)->select('*')->where($validate_data);
        
        $result1 = $db->table('subjects_students')->select('*')->where(['subjects_students.student_id' =>$id])->countAllResults();
        if($result1> 0){
        $table_data->join('subjects_students', 'users_students.user_student_id = subjects_students.student_id')->select('subjects_students.subject_id AS subject')->where(['subjects_students.student_id'=>$id]);
        }
        if ($result > 0) {
            $table_res = $table_data->get()->getResult();
            return $table_res;
        }else{
            return '0';
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
    public function get_selected_data($table_name,$select_col,$validate_data){
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->countAllResults();
        $table_data = $db->table($table_name)->select($select_col)->where($validate_data);
        
        if ($result > 0) {
        $table_res = $table_data->get()->getResult();
            return $table_res;
        }else{
            return '0';
        }   
    }

    //remove rows
    public function remove_row($table_name,$where_clause)
    {
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($where_clause)->countAllResults();
        $table_data = $db->table($table_name)->select('*')->where($where_clause);
        if ($result > 0) {
            if($table_data->delete($where_clause)){
                return '1';
            }else {
                return '2';
            }
        }else{
            return '0';
        }  
    }

    //update rows
    public function update_row($table_name,$where_clause,$update_data)
    {
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($where_clause)->countAllResults();
        $table_data = $db->table($table_name)->select('*')->where($where_clause);
        if ($result > 0) {
            if($table_data->where($where_clause)->update($update_data)){
                return '1';
            }else {
                return '2';
            }
        }else{
            return '0';
        }  
    }

    public function get_grades()
    {
        $db = \config\Database::connect();
        $result = $db->table('grades')->select('*')->where(['status'=>'1'])->countAllResults();
        $table_data = $db->table('grades')->select('*')->where(['status'=>'1']);
        $table_res = $table_data->get()->getResult();
        if ($result > 0) {
            return $table_res;
        }else{
            return '0';
        }  
    }
    public function get_all_sessions()
    {
        $db = \config\Database::connect();
        $table_data = $db->table('remarks_sessions')->select('*')->where(['remarks_sessions.status'=>'1']);
        $table_data->join('class_sessions', 'remarks_sessions.sessionID = class_sessions.session_id')->where(['class_sessions.status'=>'2'])->orderBy('remarks_sessions.remark_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        }    
    }

    public function add_quiz($table_name,$data,$validate_data){
        $db = \config\Database::connect();
        $table = $db->table($table_name)->where($validate_data)->countAllResults();
        if($table > 0){
            return ['3'];
        }else {
            $insert_table = $db->table($table_name);
            if ($insert_table->insert($data)){
                // return  $db->insertID();
                return ['1',$db->insertID()];
            }else {
                return ['0'];
            };                
        } 
    }
    public function get_total_questions($quiz_id)
    {
        $db = \config\Database::connect();
        $result = $db->table('quiz')->select('total_questions')->where(['quiz_id'=>$quiz_id,'status'=>'1'])->countAllResults();
        $table_data = $db->table('quiz')->select('total_questions')->where(['status'=>'1','quiz_id'=>$quiz_id,]);
        $table_res = $table_data->get()->getResult();
        if ($result > 0) {
            return $table_res;
        }else{
            return '0';
        }  
    }
}


?>