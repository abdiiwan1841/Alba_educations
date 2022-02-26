<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class LiveClass_Model extends Model
{
    public function get_liveClasses_desc($table_name,$validate_data){
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
}