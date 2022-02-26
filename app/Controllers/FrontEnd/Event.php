<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
use App\Models\frontEnd\Functions_Model;

class Event extends BaseController
{
    public function index()
    {
         $get_model = new Functions_Model();
        $table_name = 'events';
        $validate_data = ['status'=>1];
        $data['events'] = $get_model->get_table_data($table_name,$validate_data);
        return view('FrontEnd/Event',$data);
    }
}

?>