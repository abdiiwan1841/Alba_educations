<?php
namespace App\Filters;
use \CodeIgniter\Filters\FilterInterface;
Use \CodeIgniter\HTTP\RequestInterface;
Use \CodeIgniter\HTTP\ResponseInterface;
class TeacherLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if(! $session->has('TEACHER_LOGIN')){
            echo 'teacher is not logged in';
            return redirect()->to(base_url().'/teacher_login');
        };
        // else here considered as optional 

    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //code here 
    }
}


?>