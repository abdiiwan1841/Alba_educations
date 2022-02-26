<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use CodeIgniter\CodeIgniter;

class Homework extends BaseController
{
    public function delete_homework()
    {    
        $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        //get_teachers        
        $table_name = 'users_teachers';
        $select_col = ['name','user_teacher_id'];
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // all homeworks 
        $functions_Model = new functions_Model();
        $table_name = 'homework';
        $validate_data = ['status'=>1];
        $data['homeworks'] = $functions_Model->get_table_data($table_name,$validate_data);
        
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "homework";
        $where_clause = ['homework_id'=>$row_id,'status'=>'1'];
        $res= $get_model->remove_row($table_name,$where_clause);
        $data['delete_res'] = $res;
        return view('Admin/HomeworkRequests',$data);
    }
 
    public function approve_homework()
    { 
        $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        //get_teachers        
        $table_name = 'users_teachers';
        $select_col = ['name','user_teacher_id'];
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // all homeworks 
        $functions_Model = new functions_Model();
        $table_name = 'homework';
        $validate_data = ['status'=>1];
        $data['homeworks'] = $functions_Model->get_table_data($table_name,$validate_data);
        
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "homework";
        $where_clause = ['homework_id'=>$row_id,'status'=>'1'];
        $update_data =['status'=>'2'];
        $res= $get_model->update_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;
        return view('Admin/HomeworkRequests',$data);
    }

    public function decline_homework()
    {   
        $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        //get_teachers        
        $table_name = 'users_teachers';
        $select_col = ['name','user_teacher_id'];
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // all homeworks 
        $functions_Model = new functions_Model();
        $table_name = 'homework';
        $validate_data = ['status'=>1];
        $data['homeworks'] = $functions_Model->get_table_data($table_name,$validate_data);

        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "homework";
        $where_clause = ['homework_id'=>$row_id,'status'=>'1'];
        $update_data =['status'=>'3'];
        $res= $get_model->update_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;
        return view('Admin/HomeworkRequests',$data);
    }

    public function homework_submit()
    {
        $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        //get all grades
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);

        //get_teachers        
        $table_name = 'users_teachers';
        $select_col = ['name','user_teacher_id'];
        $validate_data = ['status'=>1];
        $data['users_teachers'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // all homeworks 
        $functions_Model = new functions_Model();
        $table_name = 'homework';
        $validate_data = ['status'=>1];
        $data['homeworks'] = $functions_Model->get_table_data($table_name,$validate_data);
        
        if ($this->request->getMethod('POST')) {
            $file = $this->request->getFile('h_file');
            $title = $this->request->getPost('title');
            $grade = $this->request->getPost('grade');
            $student = $this->request->getPost('student');
            $subject = $this->request->getPost('subject');
            $last_date_submission = $this->request->getPost('lastDateOfSubimition');
            $rules = [
                'title'=>'required',
                'grade'=>'required',
                'subject'=>'required',
                'student'=>'required',
                'lastDateOfSubimition'=>'required'
            ]; 
            if ($this->validate($rules)) {
                if($file == "" ){
                    $data['reg_error'] = 'File for homework required !';
                    return view('Admin/HomeworkRequests', $data); 
                }
                if ($file->isValid()){
                    $file_name =  $file->getName();
                    $teacher = '0';
                    $file_path =  'public/Teachers/uploads/homeworks/'.$file_name;
                    $inputs = ['h_title'=>$title,'grade'=>$grade,'student'=>$student,'teacher'=>$teacher,'last_date_submission'=>$last_date_submission,'subject'=>$subject,'h_file'=>$file_path,'status'=>'2'];
                    $validate_data = ['h_title'=>$title,'grade'=>$grade,'student'=>$student,'teacher'=>$teacher,'h_file'=>$file_path,'status'=>'2'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('homework',$inputs,$validate_data);
                    if($res == '1'){
                        if($file->move('public/Teachers/uploads/homeworks', $file_name)){
                            $data['message'] = 'Homework added successfully !';
                            return view('Admin/HomeworkRequests', $data);
                        }else{
                            $data['reg_error'] = 'Homework created but Error uplaoding file';
                            return view('Admin/HomeworkRequests', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding Homework retry !';
                        return view('Admin/HomeworkRequests', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Homework Already Exist !';
                        return view('Admin/HomeworkRequests', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading categories contact your developer !';
                        return view('Admin/HomeworkRequests', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/HomeworkRequests', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [];
                return view('Admin/HomeworkRequests', $data);
            }
        }
    }
}

?>