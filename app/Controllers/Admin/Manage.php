<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
Use App\Models\Admin\functions_Model;
class Manage extends BaseController
{
    public function assignSubjectsStudents()
    {
        $data = [];
        $get_model = new functions_Model();
        //get all grades
        
        $table_name = 'subjects_students';
        $validate_data = [];
        $data['subjects_students'] = $get_model->get_table_data($table_name,$validate_data);
        //get all grades
        
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);
        
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/AssignSubjectsStudents', $data);
    }

    public function assignSubjectsToStudents()
    {
        if ($this->request->getMethod('POST')) {
            $grade = $this->request->getPost('grade');
            $subject = $this->request->getPost('subject');
            $student = $this->request->getPost('student');
            $rules = [
                'grade'=>'required',
                'subject'=>'required',
                'student'=>'required'
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
                    $upload_fun = new functions_Model();
                    $table = 'subjects_students';
                    $validate = ['subject_id'=>$subject,'student_id'=>$student,'status'=>'1'];
                    $data = ['subject_id'=>$subject,'student_id'=>$student,'status'=>'1'];
                    $res = $upload_fun->add_new_data_withoutDuplicate($table,$data,$validate);
                    if($res == '1'){
                        $data['message'] = 'Subject assigned successfully !';
                        return view('Admin/AssignSubjectsStudents', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Already assigned subject to the selected student !';
                        return view('Admin/AssignSubjectsStudents', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading subject contact your developer !';
                        return view('Admin/AssignSubjectsStudents', $data);
                    }    
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/AssignSubjectsStudents', $data);
            }
        }
    }
    public function assignSubjectsToTeachers()
    {
        if ($this->request->getMethod('POST')) {
            $grade = $this->request->getPost('grade');
            $subject = $this->request->getPost('subject');
            $teacher = $this->request->getPost('teacher');
            $rules = [
                'grade'=>'required',
                'subject'=>'required',
                'teacher'=>'required'
            ]; 
            $get_model = new Functions_Model();
            //get all teachers
            $table_name = 'users_teachers';
            $validate_data = ['status'=>1];
            $data['teachers'] = $get_model->get_table_data($table_name,$validate_data);
            
            $table_name = 'grades';
            $validate_data = ['status'=>1];
            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
            
            $table_name = 'subjects';
            $validate_data = ['status'=>1];
            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
            
            $table_name = 'subjects_teachers';
            $validate_data = ['status'=>1];
            $data['subjects_teachers'] = $get_model->get_table_data($table_name,$validate_data);
            
            if ($this->validate($rules)) {
                    // $inputs = ['teacher_id'=>$teacher,'subject_id'=>$subject,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $table = 'subjects_teachers';
                    $validate = ['subject_id'=>$subject,'teacher_id'=>$teacher,'status'=>'1'];
                    $data = ['subject_id'=>$subject,'teacher_id'=>$teacher,'status'=>'1'];
                    $res = $upload_fun->add_new_data_withoutDuplicate($table,$data,$validate);
                    if($res == '1'){
                        $get_model = new Functions_Model();
                        //get all teachers
                        $table_name = 'users_teachers';
                        $validate_data = ['status'=>1];
                        $data['teachers'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $table_name = 'subjects_teachers';
                        $validate_data = ['status'=>1];
                        $data['subjects_teachers'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $data['message'] = 'Subject assigned successfully !';
                        return view('Admin/AssignSubjectsTeacher', $data);
                    }elseif($res =='3'){
                        $get_model = new Functions_Model();
                        //get all teachers
                        $table_name = 'users_teachers';
                        $validate_data = ['status'=>1];
                        $data['teachers'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $table_name = 'grades';
                        $validate_data = ['status'=>1];
                        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $table_name = 'subjects';
                        $validate_data = ['status'=>1];
                        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $table_name = 'subjects_teachers';
                        $validate_data = ['status'=>1];
                        $data['subjects_teachers'] = $get_model->get_table_data($table_name,$validate_data);
                        
                        $data['reg_error'] = 'Already assigned subject to the selected teacher !';
                        return view('Admin/AssignSubjectsTeacher', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading subject contact your developer !';
                        return view('Admin/AssignSubjectsTeacher', $data);
                    }    
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = [];
                return view('Admin/AssignSubjectsTeacher', $data);
            }
        }
    }

    public function getMyStudents()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $get_model = new functions_Model();
            $table_name = 'users_students';
            $validate_data = ['grade'=>$id];
            $my_students = $get_model->get_table_data($table_name,$validate_data);
            $i = 1;
            // $j = 100;
            if (is_array($my_students)) {
                if (count($my_students) > 0) {
                    foreach($my_students as $subj){
                        $data[$i] = [$subj->name,$subj->user_student_id];    
                        $i++; 
                    }
                    echo json_encode($data);
                }
            }else {
                echo '1';
            }
        }else{
            echo '1';
        }
    }
    
    public function getMySubjects()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $get_model = new functions_Model();
            $table_name = 'grades_subjects';
            $validate_data = ['grade_id'=>$id];
            $grades_subjects = $get_model->get_table_data($table_name,$validate_data);
            $i = 1;
            // $j = 100;
            if (is_array($grades_subjects)) {
                if (count($grades_subjects) > 0) {
                    foreach($grades_subjects as $subj){
                        // return '<option value="'.$subj->subject_id.'">'.$subj->subject_id.'</option>';
                        // $data[$i] =  $subj->subject_id;
                        $table_name = 'subjects';
                        $validate_data = ['subject_id'=>$subj->subject_id];
                        $users_subjects = $get_model->get_table_data($table_name,$validate_data);
                        foreach($users_subjects as $subj_name){
                            $data[$i] = [$subj_name->subject_name,$subj->subject_id];
                            // $data[$i][$j] = ;
                        }
                        $i++; 
                        // $j++;
                    }
                    echo json_encode($data);
                }
            }else {
                echo '1';
            }
        }else{
            echo '1';
        }
    }
    
}

?>