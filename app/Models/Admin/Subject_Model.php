<?php
namespace App\Models\Admin;
use CodeIgniter\Model;

class Subject_Model extends Model
{
    public function add_subject($subject){
        $db = \config\Database::connect();
        $table_data = $db->table('subjects')->select('*')->where(['subject_name'=>$subject,'status'=>'1']);
        $countRes = $table_data->countAllResults();
        if ($countRes == 0) {
            $data = ['subject_name'=>$subject,'status'=>'1'];
            if ($table_data->insert($data)) {
                return  $db->insertID();
            }else {
                return '0';                
            };
        }else{
            $respo =  $table_data->where(['subject_name'=>$subject,'status'=>'1'])->get()->getRowArray(); 
            return $respo['subject_id']; 
        } 
    }
    public function add_subject_grade($subject_id,$grade_id)
    {
         $db = \config\Database::connect();
        $table_data = $db->table('grades_subjects')->select('*')->where(['subject_id'=>$subject_id,'grade_id'=>$grade_id]);
        $countRes = $table_data->countAllResults();
        if ($countRes == 0) {
            $data = ['subject_id'=>$subject_id,'grade_id'=>$grade_id];
            if ($table_data->insert($data)) {
                // return  $db->insertID();
                return '1';
            }else {
                return '0';                
            };
        }else{
            return '2'; 
        }   
    }

    

    
}