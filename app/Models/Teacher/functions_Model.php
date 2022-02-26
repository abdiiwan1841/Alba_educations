<?php

namespace App\Models\Teacher;
use CodeIgniter\Model;

class functions_Model extends Model
{
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
    public function get_selected_data($table_name,$select_col,$validate_data){
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->countAllResults();
        $table_data = $db->table($table_name)->select($select_col)->where($validate_data);
        $table_res = $table_data->get()->getResult();
        if ($result > 0) {
            return $table_res;
        }else{
            return '0';
        }   
    }
    public function get_where_data($table_name,$select_col,$validate_data,$where_clause)
    {
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->countAllResults();
        $table_data = $db->table($table_name)->select($select_col)->where($validate_data)->where($where_clause);
        $table_res = $table_data->get()->getResult();
        if ($result > 0) {
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

    
}


?>