<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\Subject_Model;
use App\Models\Admin\functions_Model;



class Subjects extends BaseController
{
    public function index()
    {
        $get_model = new functions_Model();
        //get all grades
        $table_name = 'grades_subjects';
        $validate_data = [];
        $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
        
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/Add_subject',$data);
    }
    
    public function add_new_subject()
    {
        if ($this->request->getMethod('POST')) {
            $grade = $this->request->getPost('grade');
            $subject = $this->request->getPost('subject');
            $rules = [
                'grade'=>'required',
                'subject'=>'required'
            ]; 
            $get_model = new functions_Model();
            //get all grades
            $table_name = 'grades_subjects';
            $validate_data = [];
            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
            //get all grades
            $table_name = 'grades';
            $validate_data = ['status'=>1];
            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
            $table_name = 'subjects';
            $validate_data = ['status'=>1];
            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

            if ($this->validate($rules)) {
                    // $inputs = ['grade'=>$grade,'subject'=>$subject,'status'=>'1'];
                    $upload_fun = new Subject_Model();
                    $res = $upload_fun->add_subject($subject);
                    if($res != '0'){
                        $upload_fun = new Subject_Model();
                        $totalRes = $upload_fun->add_subject_grade($res,$grade);
                        if ($totalRes == '1') {
                            $get_model = new functions_Model();
                            //get all grades
                            $table_name = 'grades_subjects';
                            $validate_data = [];
                            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                             //get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

                            $data['message'] = 'Subject added successfully !';
                            return view('Admin/Add_subject', $data);
                        }elseif($totalRes =='2'){
                            $get_model = new functions_Model();
                            //get all grades
                            $table_name = 'grades_subjects';
                            $validate_data = [];
                            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        //    get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

                            
                            $data['reg_error'] = 'Subject already exist with this grade !';
                            return view('Admin/Add_subject', $data);
                        }elseif($totalRes=='0'){
                            $get_model = new functions_Model();
                            //get all grades
                            $table_name = 'grades_subjects';
                            $validate_data = [];
                            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        
                            //get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);


                            $data['reg_error'] = 'Error adding subject retry !';
                            return view('Admin/Add_subject', $data);
                        }else{
                            $get_model = new functions_Model();
                            //get all grades
                            $table_name = 'grades_subjects';
                            $validate_data = [];
                            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                            
                            //get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

       
                            $data['reg_error'] = 'Error uploading subject contact your developer !';
                            return view('Admin/Add_subject', $data);
                        }
                    }elseif($res=='0'){
                        $get_model = new functions_Model();
                        //get all grades
                        $table_name = 'grades_subjects';
                        $validate_data = [];
                        $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        //get all grades
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

                        
                        $data['reg_error'] = 'Error adding subject retry !';
                        return view('Admin/Add_subject', $data);
                    }else{
                        $get_model = new functions_Model();
                        //get all grades
                        $table_name = 'grades_subjects';
                        $validate_data = [];
                        $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        //get all grades
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

                        $data['reg_error'] = 'Error uploading subject contact your developer !';
                        return view('Admin/Add_subject', $data);
                    }    
                
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/Add_subject', $data);
            }
        }
    }
    
    public function add_new_subject_globaly()
    {
        if ($this->request->getMethod('POST')) {
            $subject = $this->request->getPost('subject');
            $rules = [
                'subject'=>'required'
            ]; 
            $get_model = new functions_Model();
            //get all grades
            $table_name = 'grades_subjects';
            $validate_data = [];
            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
            //get all grades
            $table_name = 'grades';
            $validate_data = ['status'=>1];
            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
            $table_name = 'subjects';
            $validate_data = ['status'=>1];
            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

            
            if ($this->validate($rules)) {
                    // $inputs = ['grade'=>$grade,'subject'=>$subject,'status'=>'1'];
                    $upload_fun = new Subject_Model();
                    $res = $upload_fun->add_subject($subject);
                    if($res != '0'){
                        $fun_model  = new functions_Model();
                        $allGrades = $fun_model->get_selected_data('grades','*',['status'=>'1']);
                        $upload_fun = new Subject_Model();
                        $trs['totalRes'] = "";
                        foreach($allGrades as $allGrade){
                            $g = $allGrade->grade_id;
                            $trs['totalRes'] = $upload_fun->add_subject_grade($res,$g);
                        }
                        if ($trs['totalRes'] == '1') {
                            $get_model = new functions_Model();
                            //get all grades
                            $table_name = 'grades_subjects';
                            $validate_data = [];
                            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                             //get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

                            $data['message_g'] = 'Subject added successfully !';
                            return view('Admin/Add_subject', $data);
                        }elseif($trs['totalRes'] =='2'){
                            $get_model = new functions_Model();
                            //get all grades
                            $table_name = 'grades_subjects';
                            $validate_data = [];
                            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        //    get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

                            
                            $data['reg_error_g'] = $subject.' Subject already exist with every category !';
                            return view('Admin/Add_subject', $data);
                        }elseif($trs['totalRes']=='0'){
                            $get_model = new functions_Model();
                            //get all grades
                            $table_name = 'grades_subjects';
                            $validate_data = [];
                            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        
                            //get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);


                            $data['reg_error_g'] = 'Error adding subject retry !';
                            return view('Admin/Add_subject', $data);
                        }else{
                            $get_model = new functions_Model();
                            //get all grades
                            $table_name = 'grades_subjects';
                            $validate_data = [];
                            $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                            
                            //get all grades
                            $table_name = 'grades';
                            $validate_data = ['status'=>1];
                            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                            $table_name = 'subjects';
                            $validate_data = ['status'=>1];
                            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

       
                            $data['reg_error_g'] = 'Error uploading subject contact your developer !';
                            return view('Admin/Add_subject', $data);
                        }
                    }elseif($res=='0'){
                        $get_model = new functions_Model();
                        //get all grades
                        $table_name = 'grades_subjects';
                        $validate_data = [];
                        $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        //get all grades
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);                        
                        $data['reg_error_g'] = 'Error adding subject retry !';
                        return view('Admin/Add_subject', $data);
                    }else{
                        $get_model = new functions_Model();
                        //get all grades
                        $table_name = 'grades_subjects';
                        $validate_data = [];
                        $data['grades_subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        //get all grades
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

                        $data['reg_error_g'] = 'Error uploading subject contact your developer !';
                        return view('Admin/Add_subject', $data);
                    }    
                
            }else{     
                $data['reg_error_g'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/Add_subject', $data);
            }
        }
    }
}

?>