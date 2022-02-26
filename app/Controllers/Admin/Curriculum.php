<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class Curriculum extends BaseController
{
    public function adminCurriculumTeacher()
    {
            $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
        // users_students
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


        //all teachers_curriculumss 
        $table_name = 'teachers_curriculums';
        $validate_data = ['status'=>1];
        $data['teachers_curriculums'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/adminCurriculumTeacher',$data);
    }
    
    public function assignCurriculumToTeachers()
    {
        $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
        // users_students
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //all curriculums 
        $table_name = 'teachers_curriculums';
        $validate_data = ['status'=>1];
        $data['teachers_curriculums'] = $get_model->get_table_data($table_name,$validate_data);

        if ($this->request->getMethod('POST')) {
            $grade = $this->request->getPost('grade');
            $teacher = $this->request->getPost('teacher');
            $subject = $this->request->getPost('subject');
            $image = $this->request->getFile('file');
            $rules = [
                'grade'=>'required',
                'subject'=>'required',
                'teacher'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                if($image == "" ){
                    $data['reg_error'] = 'curriculum image  required !';
                    return view('Admin/adminCurriculumTeacher', $data); 
                }
                if ($image->isValid()){
                    $file_name =  $image->getName();
                    $file_path =  'public/Admin/uploads/curriculum_teacher/'.$file_name;
                    $inputs = ['grade'=>$grade,'teacher'=>$teacher,'subject'=>$subject,'file'=>$file_path,'status'=>'1'];
                    $validate_data = ['grade'=>$grade,'teacher'=>$teacher,'subject'=>$subject,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('teachers_curriculums',$inputs,$validate_data);
                    if($res == '1'){
                        if($image->move('public/Admin/uploads/curriculum_teacher', $file_name)){
                            $data['message'] = 'Curriculum sent successfully !';
                            return view('Admin/adminCurriculumTeacher', $data);
                        }else{
                            $data['reg_error'] = 'Curriculum created but Error uplaoding file retry with different file name and check file extenstion if valid';
                            return view('Admin/adminCurriculumTeacher', $data);
                        };
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding Curriculum retry !';
                        return view('Admin/adminCurriculumTeacher', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Curriculum Already sent !';
                        return view('Admin/adminCurriculumTeacher', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading Curriculum contact your developer !';
                        return view('Admin/adminCurriculumTeacher', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/adminCurriculumTeacher', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                // $data['form_inputs'] = $inputs = [$title];
                return view('Admin/adminCurriculumTeacher', $data);
            }
        }
    }

    public function adminCurriculumStudent()
    {
            $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
        // users_students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //all curriculums 
        $table_name = 'curriculum';
        $validate_data = ['status'=>1];
        $data['curriculum'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/AdminCurriculumStudent',$data);
    }
    
    public function addCurriculum()
    {
        $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
        // users_students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //all curriculums 
        $table_name = 'curriculum';
        $validate_data = ['status'=>1];
        $data['curriculum'] = $get_model->get_table_data($table_name,$validate_data);

        if ($this->request->getMethod('POST')) {
            $grade = $this->request->getPost('grade');
            $student = $this->request->getPost('student');
            $image = $this->request->getFile('file');
            $rules = [
                'grade'=>'required',
                'student'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                if($image == "" ){
                    $data['reg_error'] = 'curriculum image  required !';
                    return view('Admin/AdminCurriculumStudent', $data); 
                }
                if ($image->isValid()){
                    $file_name =  $image->getName();
                    $file_path =  'public/Admin/uploads/curriculum/'.$file_name;
                    $inputs = ['grade'=>$grade,'student'=>$student,'file'=>$file_path,'status'=>'1'];
                    $validate_data = ['grade'=>$grade,'student'=>$student,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('curriculum',$inputs,$validate_data);
                    if($res == '1'){
                        if($image->move('public/Admin/uploads/curriculum', $file_name)){
                            $data['message'] = 'Curriculum sent successfully !';
                            return view('Admin/AdminCurriculumStudent', $data);
                        }else{
                            $data['reg_error'] = 'Curriculum created but Error uplaoding file retry with different file name and check file extenstion if valid';
                            return view('Admin/AdminCurriculumStudent', $data);
                        };
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding Curriculum retry !';
                        return view('Admin/AdminCurriculumStudent', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Curriculum Already sent !';
                        return view('Admin/AdminCurriculumStudent', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading Curriculum contact your developer !';
                        return view('Admin/AdminCurriculumStudent', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/AdminCurriculumStudent', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                // $data['form_inputs'] = $inputs = [$title];
                return view('Admin/AdminCurriculumStudent', $data);
            }
        }
    }
    public function remove_curriculum()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "curriculum";
        $where_clause = ['curriculum_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;
        
        $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
        // users_students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //all curriculums 
        $table_name = 'curriculum';
        $validate_data = ['status'=>1];
        $data['curriculum'] = $get_model->get_table_data($table_name,$validate_data);


        return view('Admin/AdminCurriculumStudent',$data);
    }
        public function remove_teacher_curriculum()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "teachers_curriculums";
        $where_clause = ['t_curriculum_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;
        
         $get_model = new Functions_Model();
        //get all teachers
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        
        // users_students
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //all curriculums 
        $table_name = 'teachers_curriculums';
        $validate_data = ['status'=>1];
        $data['teachers_curriculums'] = $get_model->get_table_data($table_name,$validate_data);


        return view('Admin/adminCurriculumTeacher',$data);
    }
    

}

?>