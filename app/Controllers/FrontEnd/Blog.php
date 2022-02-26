<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
Use App\Models\frontEnd\Functions_Model;

class Blog extends BaseController
{
    public function index()
    {
        $get_model = new Functions_Model();
        $table_name = 'blogs';
        $validate_data = ['status'=>1];
        $data['blogs'] = $get_model->get_table_data($table_name,$validate_data);
        return view('FrontEnd/Blog', $data);
    }
}

?>