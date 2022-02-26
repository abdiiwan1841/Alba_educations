<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;

class Teachers extends BaseController
{
    public function teacher_registration()
    {
        $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/TeacherRegistration',$data);
    }
    public function assignSubjectsTeacher()
    {
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
        
        
        return view('Admin/AssignSubjectsTeacher',$data);
    }
    public function allTeacher()
    {
        $get_model = new Functions_Model();
        //get all Students
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/AllTeachers',$data);
    }
    public function students_subjects()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $get_model = new Functions_Model();
            $table_name = 'grades_subjects';
            $validate_data = ['grade_id'=>$id];
            $grades_subjects = $get_model->get_table_data($table_name,$validate_data);
            $i = 1;
            foreach($grades_subjects as $subj){
                // return '<option value="'.$subj->subject_id.'">'.$subj->subject_id.'</option>';
                 $data[$i] =  $subj->subject_id;
                $i++;
            }
            echo json_encode($data);
        }else{
            echo '1';
        }
    }
    public function adminAddTeacher()
    {
        if ($this->request->getMethod('POST')) {
            $name = $this->request->getPost('name');
            $aliasName = $this->request->getPost('aliasName');
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
                    return view('Admin/TeacherRegistration', $data); 
                }
                if ($image->isValid()){
                    $file_name =  $image->getName();
                    $file_path =  'public/Admin/uploads/teacher/'.$file_name;
                    $parent_id =  $idProofParent->getName();
                    $parent_id_path =  'public/Admin/uploads/parentsTeacher/'.$parent_id;

                    $inputs = ['name'=>$name,'aliaName'=>$aliasName,'gender'=>$gender,'email_main'=>$email_main,'address'=>$address,'phone'=>$phone,'dob'=>$dob,'city'=>$city,'state'=>$state,'country'=>$country,'timeZone'=>$timeZone,'addmissiomDate'=>$addmissiomDate,'currentSession'=>$currentSession,'grade'=>$grade,'subject'=>$subject,'feePerSession'=>$feePerSession,'fatherName'=>$fatherName,'fatherPhone'=>$fatherPhone,'motherName'=>$motherName,'motherPhone'=>$motherPhone,'username'=>$username,'teacher_email'=>$email,'password'=>$password,'idProof'=>$file_path,'idProofParent'=>$parent_id_path,'status'=>'1'];
                    $validate_data = ['email_main'=>$email_main,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('users_teachers',$inputs,$validate_data);
                    if($res == '1'){
                        if($image->move('public/Admin/uploads/teacher', $file_name)){
                            $idProofParent->move('public/Admin/uploads/parentsTeacher', $parent_id);
                            $data['message'] = 'Teacher added successfully !';
                            return view('Admin/TeacherRegistration', $data);
                        }else{
                            $data['reg_error'] = 'Teacher added but Error uplaoding file';
                            return view('Admin/TeacherRegistration', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding Teacher retry !';
                        return view('Admin/TeacherRegistration', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Teacher Already Exist !';
                        return view('Admin/TeacherRegistration', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading categories contact your developer !';
                        return view('Admin/TeacherRegistration', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/TeacherRegistration', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [$name,$email_main];
                return view('Admin/TeacherRegistration', $data);
            }
        }
    }
    //resumes
    public function adminViewResume()
    {
        $get_model = new Functions_Model();
        //get all resume teachers
        $table_name = 'teacher_enquiry';
        $validate_data = ['status'=>1];
        $data['queries'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/teacherResume',$data);
    }
    public function submittResumes()
    {
        if ($this->request->getMethod('POST')) {
            $first_name = esc(htmlspecialchars($this->request->getPost('first_name')));
            $last_name = esc(htmlspecialchars($this->request->getPost('last_name')));
            $email = esc(htmlspecialchars($this->request->getPost('email')));
            $phone = esc(htmlspecialchars($this->request->getPost('phone')));
            $address = esc(htmlspecialchars($this->request->getPost('address')));
            $country = esc(htmlspecialchars($this->request->getPost('country')));
            $state = esc(htmlspecialchars($this->request->getPost('state')));
            $city = esc(htmlspecialchars($this->request->getPost('city')));
            $pincode = esc(htmlspecialchars($this->request->getPost('pincode')));
            $skills = esc(htmlspecialchars($this->request->getPost('skills')));
            $reason = esc(htmlspecialchars($this->request->getPost('reason')));
            $resume = $this->request->getFile('resume');
            $rules = [
                'first_name'=>'required',
                'email'=>'required|valid_email',
                'phone'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                if($resume == "" ){
                    $data['reg_error'] = 'Image for the post required !';
                    return view('frontEnd/StudyMaterial_tutorHiringProcess', $data); 
                }
                if ($resume->isValid()){
                    $file_name =  $resume->getName();
                    $file_path =  'public/Admin/uploads/resumesTeachers/'.$file_name;
                    $inputs = ['first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phone'=>$phone,'address'=>$address,'country'=>$country,'state'=>$state,'city'=>$city,'pincode'=>$pincode,'skills'=>$skills,'reason'=>$reason,'resume'=>$file_path,'status'=>'1'];
                    $validate_data = $inputs;
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('teacher_enquiry',$inputs,$validate_data);
                    if($res == '1'){
                        if($resume->move('public/Admin/uploads/resumesTeachers', $file_name)){
                            $data['message'] = 'Requested successfully !';
                            return view('FrontEnd/StudyMaterial_tutorHiringProcess', $data);
                        }else{
                            $data['reg_error'] = 'Requested but Error uplaoding file';
                            return view('FrontEnd/StudyMaterial_tutorHiringProcess', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error retry after sometime !';
                        return view('FrontEnd/StudyMaterial_tutorHiringProcess', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Already Requested !';
                        return view('FrontEnd/StudyMaterial_tutorHiringProcess', $data);
                    }else{
                        $data['reg_error'] = 'Error retry after some time !';
                        return view('FrontEnd/StudyMaterial_tutorHiringProcess', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('FrontEnd/StudyMaterial_tutorHiringProcess', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] =  "";
                return view('FrontEnd/StudyMaterial_tutorHiringProcess', $data);
            }
        }
    }
    
}

?>