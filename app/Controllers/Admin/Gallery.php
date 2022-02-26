<?php
namespace App\Controllers\Admin;
Use App\Controllers\BaseController;
Use App\Models\Admin\functions_Model;

class Gallery extends BaseController
{
    
     public function remove_image()
    { 
        $row_id = $this->request->uri->getSegment(3);
        $get_model = new functions_Model();
        $table_name = "gallery";
        $where_clause = ['gallery_id'=>$row_id,'status'=>'1'];
        $update_data =['status'!= ''];
        $res= $get_model->remove_row($table_name,$where_clause,$update_data);
        $data['delete_res'] = $res;

         $get_model = new Functions_Model();

        //all gallery 
        $table_name = 'gallery';
        $validate_data = ['status'=>1];
        $data['gallery'] = $get_model->get_table_data($table_name,$validate_data);

        return view('Admin/AdminUploadImages',$data);
    }
    public function add_image_page()
    {
        
         $get_model = new Functions_Model();

        //all gallery 
        $table_name = 'gallery';
        $validate_data = ['status'=>1];
        $data['gallery'] = $get_model->get_table_data($table_name,$validate_data);
        return view('Admin/AdminUploadImages',$data);
    }
    
    public function add_new_image()
    {
         $get_model = new Functions_Model();

        //all gallery 
        $table_name = 'gallery';
        $validate_data = ['status'=>1];
        $data['gallery'] = $get_model->get_table_data($table_name,$validate_data);
         if ($this->request->getMethod('POST')) {
            $title = $this->request->getPost('image_name');
            $image = $this->request->getFile('myImage');
            $rules = [
                'image_name'=>'required',
            ]; 
            
            if ($this->validate($rules)) {
                if($image == "" ){
                    $data['reg_error'] = 'Image for the post required !';
                    return view('Admin/AdminUploadImages', $data); 
                }
                if ($image->isValid()){
                    $file_name =  $image->getName();
                    $file_path =  'public/Admin/uploads/gallery/'.$file_name;
                    $inputs = ['img_title'=>$title,'gallery_img'=>$file_path,'status'=>'1'];
                    $validate_data = ['img_title'=>$title,'status'=>'1'];
                    $upload_fun = new functions_Model();
                    $res = $upload_fun->add_new_data_withoutDuplicate('gallery',$inputs,$validate_data);
                    if($res == '1'){
                        if($image->move('public/Admin/uploads/gallery', $file_name)){
                            $data['message'] = 'Image added successfully !';
                             $get_model = new Functions_Model();
                            //all gallery 
                            $table_name = 'gallery';
                            $validate_data = ['status'=>1];
                            $data['gallery'] = $get_model->get_table_data($table_name,$validate_data);
                            return view('Admin/AdminUploadImages', $data);
                        }else{
                            $data['reg_error'] = 'Image created but Error uplaoding file';
                            return view('Admin/AdminUploadImages', $data);
                        }
                    }elseif($res=='2'){
                        $data['reg_error'] = 'Error adding Image retry !';
                        return view('Admin/AdminUploadImages', $data);
                    }elseif($res =='3'){
                        $data['reg_error'] = 'Image Already Exist !';
                        return view('Admin/AdminUploadImages', $data);
                    }else{
                        $data['reg_error'] = 'Error uploading categories contact your developer !';
                        return view('Admin/AdminUploadImages', $data);
                    }    
                }else{
                    $data['reg_error'] = 'Please select valid file for upload';
                    return view('Admin/AdminUploadImages', $data);
                }
            }else{     
                $data['reg_error'] = $this->validator->listErrors();
                $data['form_inputs'] = $inputs = [$title];
                return view('Admin/AdminUploadImages', $data);
            }
        }
    
    }
}

?>