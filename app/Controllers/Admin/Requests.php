<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
use App\Models\Admin\functions_Model;
use App\Models\Student\stdFunctions_Model;


class Requests extends BaseController
{
    public function ViewRequests_page()
    {
        $get_model = new Functions_Model();
        //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/ViewRequests',$data);
    }
    
    public function homeworkRequests_page()
    {
        // submitted_homeworks
        $functions_Model = new functions_Model();
        $table_name = 'homework';
        $validate_data = ['status'=>4,'teacher'=>'0'];
        $data['submitted_homeworks'] = $functions_Model->get_table_data($table_name,$validate_data);


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

        return view('Admin/HomeworkRequests',$data);
    }
    
    public function adminRequestTestresults()
    {
        return view('Admin/adminRequestTestresults');
        
    }

    public function adminRequestTest()
    {
        $get_model = new Functions_Model();
        //get all students
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

        // all tests_results 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'tests_results';
       
        $validate_data = ['status'=>2];
        $data['tests_results'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);

        $validate_data = ['status'=>4];
        $data['submitted_homeworks'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
        $get_model = new Functions_Model();
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

        // all tests_results 
        $stdFunctions_Model = new stdFunctions_Model();
        $table_name = 'tests_results';
        $validate_data = ['status'=>1];
        $data['tests_results'] = $stdFunctions_Model->get_my_data($table_name,$validate_data);
        return view('Admin/adminRequestTest',$data);
    }
    
    public function adminRequestReportCard()
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

     //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        
         // all report_card 
        $functions_Model = new functions_Model();
        $table_name = 'report_card';
        $validate_data = ['status'=>1];
        $data['report_cards'] = $functions_Model->get_table_data($table_name,$validate_data);
        return view('Admin/adminRequestReportCard',$data);
        
    }

    public function adminRequestStudyMaterial()
    {
       $get_model = new Functions_Model();
         //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // study_materials
        $table_name = 'study_materials';
        $select_col = '*';
        $validate_data = ['status'=>2];
        $data['study_materials'] = $get_model->get_selected_data($table_name,$select_col,$validate_data); 

         //get all subjects
        $table_name = 'subjects';
        $validate_data = ['status'=>1];
        $data['subjects'] = $get_model->get_table_data($table_name,$validate_data);
            
            
         //get all study_materials
        $table_name = 'study_materials';
        $validate_data = ['status'=>1];
        $data['study_materials'] = $get_model->get_table_data($table_name,$validate_data);

    

         //get all grades
        $table_name = 'grades';
        $validate_data = ['status'=>1];
        $data['grades'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/adminRequestStudyMaterial',$data);
    }
    
    public function adminRequestPerformance()
    {

        return view('Admin/adminRequestPerformance');
    }
    public function adminRequestTeacherFeedback()
    {
        $get_model = new Functions_Model();
         //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // teacher_feedback
        $table_name = 'teacher_feedback';
        $select_col = '*';
        $validate_data = ['status'=>1];
        $data['teacher_feedback'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        return view('Admin/adminRequestTeacherFeedback',$data);
    }
    public function adminRequestRescheduleClass()
    {
        
        $get_model = new Functions_Model();
         //get_students        
        $table_name = 'users_students';
        $select_col = ['name','user_student_id'];
        $validate_data = ['status'=>1];
        $data['users_students'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);

        // reschedule_class
        $table_name = 'reschedule_class';
        $select_col = '*';
        $validate_data = ['status'=>1];
        $data['reschedule_class'] = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        return view('Admin/adminRequestRescheduleClass',$data);
    }
    

}

?>