<?php
namespace App\Controllers\Teacher;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;
use App\Models\Teacher\tchFunctions_Model;


class Billing extends BaseController
{
    public function teacherProfileDetails()
    {
        return view('Teacher/teacherProfileDetails');
    }
    public function teacherBilling()
    {
        return view('Teacher/teacherBilling');
    }
    
}

?>