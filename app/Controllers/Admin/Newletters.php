<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class Newletters extends BaseController
{
    public function AdminNewletter_page()
    {       
        $get_model = new Functions_Model();
        $table_name = 'newsletter_subscriptions';
        $validate_data = ['status'=>1];
        $data['newsletter_subscriptions'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/AdminNewletter_page',$data);
    }
 
}

?>