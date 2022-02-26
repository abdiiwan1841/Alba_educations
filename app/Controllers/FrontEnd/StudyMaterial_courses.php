<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;

class StudyMaterial_courses extends BaseController
{
    public function index()
    {
        return view('FrontEnd/StudyMaterial_courses');
    }
}

?>