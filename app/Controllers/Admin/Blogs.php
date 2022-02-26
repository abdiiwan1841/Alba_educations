<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
Use App\Models\Admin\functions_Model;
class Blogs extends BaseController
{
    
     public function remove_post()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "blogs";
        $where_clause = ['blog_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

       $get_model = new Functions_Model();

        //all blogs 
        $table_name = 'blogs';
        $validate_data = ['status'=>1];
        $data['blogs'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/AdminUploadPost',$data);
    }
    public function Dashboard_page()
    {
        $get_model = new Functions_Model();
        //
        $table_name = 'users_students';
        $validate_data = ['status'=>1];
        $select_col = 'name';
        $total_stds = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        if ($total_stds != 0) {
             $data['total_std'] = count($total_stds);
        }else {
             $data['total_std'] = '0';
        }
        //
        $table_name = 'users_teachers';
        $validate_data = ['status'=>1];
        $select_col = 'name';
        $total_stds = $get_model->get_selected_data($table_name,$select_col,$validate_data);
        if ($total_stds != 0) {
             $data['total_tchrs'] = count($total_stds);
        }else {
             $data['total_tchrs'] = '0';
        }
        return view('Admin/Dashboard',$data);
    }
    public function adminUploadPost()
    {
        $get_model = new Functions_Model();

        //all blogs 
        $table_name = 'blogs';
        $validate_data = ['status'=>1];
        $data['blogs'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/AdminUploadPost',$data);
    }
    public function add_new_blog()
    {
         $get_model = new Functions_Model();

        //all blogs 
        $table_name = 'blogs';
        $validate_data = ['status'=>1];
        $data['blogs'] = $get_model->get_table_data($table_name,$validate_data);
        if ($this->request->getMethod('POST')) {
            $title = $this->request->getPost('postTitle');
            $image = $this->request->getFile('postImg');
            $desc = $this->request->getPost('postDesc');
            $comments = $this->request->getPost('allowComments');
            $rules = [
                'postTitle'=>'required',
                'postDesc'=>'required'
            ]; 
            
            if ($this->validate($rules)) {
                if($image == "" ){
                    $data['reg_error'] = 'Image for the post required !';
                    return view('Admin/AdminUploadPost', $data); 
                }
                if ($image->isValid()){
                    $file_name =  $image->getName();
                    $file_path =  'public/Admin/uploads/blog/'.$file_name;
                    ($comments == 1)? $allow_comments='1': $allow_comments = '2';
                    $inputs = ['blog_title'=>$title,'blog_description'=>$desc,'allow_comments'=>$allow_comments,'blog_image'=>$file_path,'status'=>'1'];
                    $validate_data = ['blog_title'=>$title,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('blogs',$inputs,$validate_data);
                    if($res == '1'){
                        if($image->move('public/Admin/uploads/blog', $file_name)){
                             $get_model = new Functions_Model();

                            //all blogs 
                            $table_name = 'blogs';
                            $validate_data = ['status'=>1];
                            $data['blogs'] = $get_model->get_table_data($table_name,$validate_data);
                            $data['message'] = 'Blog added successfully !';
                            return view('Admin/AdminUploadPost', $data);
                        }else{
                            $data['reg_error'] = 'Blog created but Error uplaoding file';
                            return view('Admin/AdminUploadPost', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding blog retry !';
                        return view('Admin/AdminUploadPost', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Blog Already Exist !';
                        return view('Admin/AdminUploadPost', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading categories contact your developer !';
                        return view('Admin/AdminUploadPost', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/AdminUploadPost', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [$title,$desc];
                return view('Admin/AdminUploadPost', $data);
            }
        }
    
    }
    public function adminEvents()
    {
        $get_model = new Functions_Model();

        //all blogs 
        $table_name = 'events';
        $validate_data = ['status'=>1];
        $data['events'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/AdminUploadEvent',$data);
    }
        public function add_new_event()
    {
         $get_model = new Functions_Model();

        //all blogs 
        $table_name = 'events';
        $validate_data = ['status'=>1];
        $data['events'] = $get_model->get_table_data($table_name,$validate_data);
        if ($this->request->getMethod('POST')) {
            $title = $this->request->getPost('title');
            $image = $this->request->getFile('postImg');
            $date = $this->request->getPost('date');
            $from = $this->request->getPost('from');
            $to = $this->request->getPost('to');
            $heading = $this->request->getPost('heading');
            $desc = $this->request->getPost('postDesc');
            $place = $this->request->getPost('place');
            
            $rules = [
                'title'=>'required',
                'postDesc'=>'required',
                'date'=>'required',
                'from'=>'required',                
                'to'=>'required',
                'place'=>'required',
                'heading'=>'required'               
                ]; 
            
            if ($this->validate($rules)) {
                if($image == "" ){
                    $data['reg_error'] = 'Image for the post required !';
                    return view('Admin/AdminUploadEvent', $data); 
                }
                if ($image->isValid()){
                    $file_name =  $image->getName();
                    $file_path =  'public/Admin/uploads/events/'.$file_name;
                    ($comments == 1)? $allow_comments='1': $allow_comments = '2';
                    $inputs = ['title'=>$title,'desc'=>$desc,'place'=>$place,'date'=>$date,'image'=>$file_path,'from'=>$from,'to'=>$to,'heading'=>$heading,'status'=>'1'];
                    $validate_data = ['title'=>$title,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('events',$inputs,$validate_data);
                    if($res == '1'){
                        if($image->move('public/Admin/uploads/events', $file_name)){
                             $get_model = new Functions_Model();

                            //all blogs 
                            $table_name = 'events';
                            $validate_data = ['status'=>1];
                            $data['events'] = $get_model->get_table_data($table_name,$validate_data);
                            $data['message'] = 'Event added successfully !';
                            return view('Admin/AdminUploadEvent', $data);
                        }else{
                            $data['reg_error'] = 'Event created but Error uplaoding file';
                            return view('Admin/AdminUploadEvent', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding blog retry !';
                        return view('Admin/AdminUploadEvent', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Event Already Exist !';
                        return view('Admin/AdminUploadEvent', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading categories contact your developer !';
                        return view('Admin/AdminUploadEvent', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/AdminUploadEvent', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [$title,$desc];
                return view('Admin/AdminUploadEvent', $data);
            }
        }
    
    }

     public function remove_event()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "events";
        $where_clause = ['event_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

       $get_model = new Functions_Model();

        //all events 
        $table_name = 'events';
        $validate_data = ['status'=>1];
        $data['events'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/AdminUploadEvent',$data);
    }
    
    
}

?>