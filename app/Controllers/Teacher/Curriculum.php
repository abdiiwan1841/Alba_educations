<?php
namespace App\Controllers\Teacher;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;
use App\Models\Teacher\tchFunctions_Model;


class Curriculum extends BaseController
{
    public function Curriculum_page()
    {
         $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);
        
        
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        // all curriculums 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'teachers_curriculums';
        $session = session();
        if ($session->has('TEACHER_LOGIN')) {
            $user_id = $session->get('TEACHER');
        }else {
            return view('FrontEnd/teacher_login');
        }
        $validate_data = ['teacher'=>$user_id,'status'=>1];
        $data['teachers_curriculums'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);

            return view('Teacher/Curriculum', $data);
    }
  
    public function request_curriculum()
    {
        $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);
        
        
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        // all curriculums 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'teachers_curriculums';
        $session = session();
        if ($session->has('TEACHER_LOGIN')) {
            $user_id = $session->get('TEACHER');
        }else {
            return view('FrontEnd/teacher_login');
        }
        $validate_data = ['teacher'=>$user_id,'status'=>1];
        $data['teachers_curriculums'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
        
        if ($this->request->getMethod('POST')) {
            $remarks = $this->request->getPost('remarks');
            $mySession = $this->request->getPost('mySession');
            $rules = [
                'remarks'=>'required',
                'mySession'=>'required'   
            ]; 
            
            
            if ($this->validate($rules)) {
                    $inputs = ['requested_text'=>$remarks,'curriculum_id'=>$mySession,'status'=>'1'];
                    $validate_data = ['requested_text'=>$remarks,'curriculum_id'=>$mySession,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('teacher_request_curriculum',$inputs,$validate_data);
                    if($res == '1'){
                       
                        $get_model = new Functions_Model();
                        //get all teachers
                        $table_name = 'users_students';
                        $validate_data = ['status'=>1];
                        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        
                        //get all grades
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

                        //get all subjects
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

                        // all curriculums 
                        $stdFunctions_Model = new stdFunctions_Model();
                        $table_name = 'teachers_curriculums';
                        $session = session();
                        if ($session->has('TEACHER_LOGIN')) {
                            $user_id = $session->get('TEACHER');
                        }else {
                            return view('FrontEnd/teacher_login');
                        }
                        $validate_data = ['teacher'=>$user_id,'status'=>1];
                        $data['teachers_curriculums'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
                        
                        $data['message'] = 'Requested  successfully !';
                        return view('Teacher/Curriculum', $data);
                }elseif($res=='2'){
                    $data['reg_error'] = 'Error requesting for curriculum retry !';
                    return view('Teacher/Curriculum', $data);
                }elseif($res =='3'){
                    $data['reg_error'] = 'Already requested for this session !';
                    return view('Teacher/Curriculum', $data);
                }else{
                    $data['reg_error'] = 'Error taking Attendance retry !';
                    return view('Teacher/Curriculum', $data);
                }    
                
                }else{     
                    $data['reg_error'] = $this->validator->listErrors();
                    $data['form_inputs'] = [];
                    return view('Teacher/Curriculum', $data);
                }
            
        }
    }
}

?>