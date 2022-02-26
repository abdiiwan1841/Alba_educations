<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Admin\Session_model;


class Plans extends BaseController
{
    public function adminRegularPlan()
    {   
        $get_model = new Functions_Model();
        $table_name = 'regular_plan';
        $validate_data = ['status'=>2,'plan_type'=>'1'];
        $data['regular_plan'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/adminRegularPlan',$data);
    }
   public function adminWeeklyPlan()
    {   
         $get_model = new Functions_Model();
        $table_name = 'regular_plan';
        $validate_data = ['status'=>2,'plan_type'=>'2'];
        $data['regular_plan'] = $get_model->get_table_data($table_name,$validate_data);        
        return view('Admin/adminWeeklyPlan',$data);
    }
    public function adminMonthlyPlan()
    {   
         $get_model = new Functions_Model();
        $table_name = 'regular_plan';
        $validate_data = ['status'=>2,'plan_type'=>'3'];
        $data['regular_plan'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/adminMonthlyPlan',$data);
    }
 
}

?>