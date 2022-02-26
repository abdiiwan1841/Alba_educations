<?php

namespace App\Models\Student;
use CodeIgniter\Model;

class stdFunctions_Model extends Model
{
    public function get_my_data($table_name,$validate_data){
        $db = \config\Database::connect();
        $result = $db->table($table_name)->select('*')->where($validate_data)->countAllResults();
        $table_data = $db->table($table_name)->select('*')->where($validate_data);
        $table_res = $table_data->get()->getResult();
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
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
}


?>