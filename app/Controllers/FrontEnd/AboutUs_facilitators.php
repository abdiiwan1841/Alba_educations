<?php
namespace App\Controllers\FrontEnd;
Use App\Controllers\BaseController;

class AboutUs_facilitators extends BaseController
{
    public function index()
    {
        return view('FrontEnd/AboutUs_facilitators');
    }
}

?>