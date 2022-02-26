<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;
use App\Models\frontEnd\Functions_Model;
class Gallery extends BaseController
{
    public function index()
    {
        $get_model = new Functions_Model();
        $table_name = 'gallery';
        $validate_data = ['status'=>1];
        $data['gallery'] = $get_model->get_table_data($table_name,$validate_data);
        return view('FrontEnd/Gallery', $data);
    }
    public function gallery_videos()
    {
        $get_model = new Functions_Model();
        $table_name = 'gallery';
        $validate_data = ['status'=>1];
        $data['gallery'] = $get_model->get_table_data($table_name,$validate_data);
        return view('FrontEnd/gallery_videos', $data);
    }
    
}

?>