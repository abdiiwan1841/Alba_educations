<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class Students extends BaseController
{
    public function student_registration()
    {
        $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/AdminStudentRegisration',$data);
    }
    public function students_subjects()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
             $get_model = new Functions_Model();
            $table_name = 'users_students';
            $validate_data = ['user_student_id'=>$id];
            $users_students = $get_model->get_table_data_des($table_name,$validate_data,$id);
            $i = 1;
            if (is_array($users_students)) {
                if (count($users_students) > 0) {
                    foreach($users_students as $std){
                        // return '<option value="'.$subj->subject_id.'">'.$subj->subject_id.'</option>';
                        // $data[$i] =  $subj->subject_id;
                        $table_name = 'subjects';
                        $validate_data = ['subject_id'=>$std->subject];
                        $users_subjects = $get_model->get_table_data($table_name,$validate_data);
                        foreach($users_subjects as $subj_name){
                            $data[$i] = [$subj_name->subject_name,$std->subject];

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
        public function getSubjectsGrade()
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
    public function students_students()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $get_model = new Functions_Model();
            $table_name = 'users_students';
            $validate_data = ['grade'=>$id];
            $grades_students = $get_model->get_table_data($table_name,$validate_data);
            $i = 1;
            if ($grades_students == 0) {
                $data = 0;
            }else{
                foreach($grades_students as $std){
                    // return '<option value="'.$subj->subject_id.'">'.$subj->subject_id.'</option>';
                    //  $data[$i] =  $std->user_student_id ;
                    $data[$std->user_student_id] =  $std->name;
                    $i++;
                }
            }
            echo json_encode($data);
        }else{
            echo '1';
        }
    }
    public function subjects_teachers()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $get_model = new Functions_Model();
            $table_name = 'users_teachers';
            $validate_data = ['subject'=>$id];
            $users_students = $get_model->get_table_data_aas($table_name,$validate_data,$id);
            $i = 0;
            if (is_array($users_students)) {
                if (count($users_students) > 0) {
                    
                    for ($i=0; $i < count($users_students); $i++) { 
                        $table_name = 'users_teachers';
                        $validate_data = ['user_teacher_id'=>$users_students[$i]];
                        $teacher = $get_model->get_table_data($table_name,$validate_data);
                        foreach($teacher as $subj_name){
                            $data[$subj_name->user_teacher_id] =$subj_name->name;
                         }
                        
                    }
                    echo (json_encode($data));
                }else {
                    echo '1';
                }
            }else {
                echo '1';
            }

        }
    }
    public function subjects_teachersOLD()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $get_model = new Functions_Model();
            $table_name = 'users_teachers';
            $validate_data = ['subject'=>$id];
            $grades_students = $get_model->get_table_data_aas($table_name,$validate_data,$id);
            $i = 1;
            if ($grades_students == 0) {
                $data = 0;
            }else{
                foreach($grades_students as $std){
                    // return '<option value="'.$subj->subject_id.'">'.$subj->subject_id.'</option>';
                    //  $data[$i] =  $std->user_student_id ;
                    $data[$std->user_teacher_id] =  $std->name;
                    $i++;
                }
            }
            echo json_encode($data);
        }else{
            echo '1';
        }
    }

    public function adminAddStudent()
    {
        if ($this->request->getMethod('POST')) {
            $name = $this->request->getPost('name');
            $gender = $this->request->getPost('gender');
            $email_main = $this->request->getPost('email_main');
            $address = $this->request->getPost('address');
            $phone = $this->request->getPost('phone');
            $dob = $this->request->getPost('dob');
            $city= $this->request->getPost('city');
            $state= $this->request->getPost('state');
            $country= $this->request->getPost('country');
            $timeZone= $this->request->getPost('timeZone');
            $addmissiomDate= $this->request->getPost('addmissiomDate');
            $currentSession= $this->request->getPost('currentSession');
            $grade= $this->request->getPost('grade');
            $subject= $this->request->getPost('subject');
            $feePerSession= $this->request->getPost('feePerSession');
            $fatherName= $this->request->getPost('fatherName');
            $fatherPhone= $this->request->getPost('fatherPhone');
            $motherName= $this->request->getPost('motherName');
            $motherPhone= $this->request->getPost('motherPhone');
            $username= $this->request->getPost('username');
            $email= $this->request->getPost('email');
            $password= md5($this->request->getPost('password'));
            $image= $this->request->getFile('idProof');
            $idProofParent= $this->request->getFile('idProofParent');     
            $rules = [
                'name'=>'required',
                'email_main'=>'required',
                'gender'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                if($image == "" ){
                    $data['reg_error'] = 'Image for the post required !';
                    return view('Admin/AdminStudentRegisration', $data); 
                }
                if ($image->isValid()){
                    $file_name =  $image->getName();
                    $file_path =  'public/Admin/uploads/students/'.$file_name;
                    $parent_id =  $idProofParent->getName();
                    $parent_id_path =  'public/Admin/uploads/parents/'.$parent_id;

                    $inputs = ['name'=>$name,'gender'=>$gender,'email_main'=>$email_main,'address'=>$address,'phone'=>$phone,'dob'=>$dob,'city'=>$city,'state'=>$state,'country'=>$country,'timeZone'=>$timeZone,'addmissiomDate'=>$addmissiomDate,'currentSession'=>$currentSession,'grade'=>$grade,'subject'=>$subject,'feePerSession'=>$feePerSession,'fatherName'=>$fatherName,'fatherPhone'=>$fatherPhone,'motherName'=>$motherName,'motherPhone'=>$motherPhone,'username'=>$username,'student_email'=>$email,'password'=>$password,'idProof'=>$file_path,'idProofParent'=>$parent_id_path,'status'=>'1'];
                    $validate_data = ['email_main'=>$email_main,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('users_students',$inputs,$validate_data);
                    if($res == '1'){
                        if($image->move('public/Admin/uploads/students', $file_name)){
                            $idProofParent->move('public/Admin/uploads/parents', $parent_id);
                            $data['message'] = 'Student added successfully !';
                            return view('Admin/AdminStudentRegisration', $data);
                        }else{
                            $data['reg_error'] = 'student added but Error uplaoding file';
                            return view('Admin/AdminStudentRegisration', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding student retry !';
                        return view('Admin/AdminStudentRegisration', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Student Already Exist !';
                        return view('Admin/AdminStudentRegisration', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading categories contact your developer !';
                        return view('Admin/AdminStudentRegisration', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/AdminStudentRegisration', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [$name,$email_main];
                return view('Admin/AdminStudentRegisration', $data);
            }
        }
    }
    public function allStudents()
    {
        $get_model = new Functions_Model();
        //get all Students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/AllStudents',$data);
    }
    
    public function remove_student()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "users_students";
        $where_clause = ['user_student_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

       $get_model = new Functions_Model();
        //get all Students
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/AllStudents',$data);
    }
    public function remove_teacher()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "users_teachers";
        $where_clause = ['user_teacher_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

      $get_model = new Functions_Model();
        //get all Students
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/AllTeachers',$data);
    }
    public function remove_certificate()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "certifications";
        $where_clause = ['certificate_id'=>$row_id,'status'=>'1'];
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

             // subjects
            $table_name = 'subjects';
            $validate_data = ['status'=>1];
            $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

            //get all grades
            $table_name = 'grades';
            $validate_data = ['status'=>1];
            $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

            //all certifications 
            $table_name = 'certifications';
            $validate_data = ['status'=>1];
            $data['certifications'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/adminStudentCertification',$data);
    }
    
    
    
    
}

?>