<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class Assignments extends BaseController
{
    public function index()
    {       
        $get_model = new Functions_Model();
        $table_name = 'assignment_help';
        $validate_data = ['status'=>1];
        $data['assignment_helps'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/Assignment_help',$data);
    }
 
}

?>