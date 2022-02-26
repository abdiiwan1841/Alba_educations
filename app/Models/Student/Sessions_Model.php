<?php

namespace App\Models\Student;

use App\Controllers\FrontEnd\Student;
use CodeIgniter\Model;

class Sessions_Model extends Model
{
    public function get_sessions_history($user_id){
        $db = \config\Database::connect();
        $table_data = $db->table('remarks_sessions')->select('*')->where(['remarks_sessions.status'=>'1']);
        $table_data->join('class_sessions', 'remarks_sessions.sessionID = class_sessions.session_id')->where(['class_sessions.Student'=>$user_id,'class_sessions.status'=>'2'])->orderBy('remarks_sessions.remark_id','DESC');
        $table_res = $table_data->get()->getResult();
        $result = count($table_res);
        if ($result > 0) {
            return $table_res;
        }else{
            return [];
        }  
    }
    public function get_sessions_attendance($user_id)
    {
        $db = \config\Database::connect();
        $table_data = $db->table('remarks_sessions')->select('*')->where(['remarks_sessions.status'=>'1']);
        $table_data->join('class_sessions', 'remarks_sessions.sessionID = class_sessions.session_id')->where(['class_sessions.Student'=>$user_id,'class_sessions.status'=>'2'])->orderBy('remarks_sessions.remark_id','DESC');
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