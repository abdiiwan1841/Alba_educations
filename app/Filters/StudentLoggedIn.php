<?php
namespace App\Filters;
use \CodeIgniter\Filters\FilterInterface;
Use \CodeIgniter\HTTP\RequestInterface;
Use \CodeIgniter\HTTP\ResponseInterface;
class StudentLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if(! $session->has('STUDENT_LOGIN')){
            // echo 'admin is not logged in';
            return redirect()->to(base_url().'/student_login');
        };
        // else here considered as optional 

    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //code here 
    }
}


?>