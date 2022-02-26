<?php

namespace App\Models\Teacher;
use CodeIgniter\Model;

class tchFunctions_Model extends Model
{
    public function get_my_data($table_name,$validate_data){
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
    public function get_data_desc($table_name,$validate_data){
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->countAllResults();
        $table_data = $db->table($table_name)->select('*')->where($validate_data);
        $table_res = $table_data->orderBy('session_id','desc')->get()->getResult();
        if ($result > 0) {
            return $table_res;
        }else{
            return '0';
        }   
    }
    public function next_classes($table_name,$validate_data,$validate_data_next,$validate_data_last){
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->where($validate_data_next)->countAllResults();
        $table_data = $db->table($table_name)->select('*')->where($validate_data)->where($validate_data_next)->where($validate_data_last);
        $table_res = $table_data->orderBy('session_id','desc')->get()->getResult();
        if ($result > 0) {
            return $table_res;
        }else{
            return '0';
        }   
    }
    public function updateData($table_name,$data,$validate_data,$where_clause)
    {
        $db = \config\Database::connect();
        $table = $db->table($table_name)->where($validate_data)->countAllResults();
        if($table > 0){
            return '3';
        }else {
            $update_table = $db->table($table_name)->where($where_clause);
            if ($update_table->update($data)){
                return '1';
            }else {
                return '0';
            };                
        } 
    }
    
    
}


?>