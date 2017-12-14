<?php

class Upload extends CI_Controller {

    private  $upload_path = "./images";

    public function __construct()
    {
        parent::__construct();
        $config['upload_path'] = $this->upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5120';
        $this->load->library('upload', $config);
    }

    public function index()
    {
       // $this->load->view('admin/_upload_form', array('error' => ' ' ));
    }




    public function upload_gallery($id)
    {

        $data['table_name'] = 'post_image';
        $data['id'] = $id;

        $this->load->view('admin/_header_upload');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_upload_gallery', $data);
        $this->load->view('admin/_footer_upload');
    }



    public function upload_form($table_name, $id)
    {

        $data['table_name'] = $table_name;
        $data['id'] = $id;
        $this->load->view('admin/_header_upload');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_upload_form', $data);
        $this->load->view('admin/_footer_upload');
    }



    public function upload_image_to_gallery($table_name, $id){

        if( !empty($_FILES)){

            $data = array(
                'post_id' => $id,
                'picture' => $_FILES['file']['name']
            );

            if($this->users_model->insertTo_table($table_name,$data) == true) {

                $file_info = get_file_info("./images/".$_FILES['file']['name']);

                if($file_info != false) {

                    //echo ' There is file with the same name on the server...';

                    if($_FILES['file']['size'] == $file_info['size']){

                        //echo "and their sizes are the same dont upload";
                        // but in this case upload anyway.
                        // unnecessary if else and naturally duplicate code but leave it for any chance of change in the future
                        //$this->upload->do_upload('file');
                        //$uploaded_file_info = $this->upload->data();
                        //$data = array(
                        //    'picture' => $uploaded_file_info['file_name']
                        //);
                        //$this->users_model->updateTo_table($table_name, $id, $data);
                        echo $_FILES['file']['name'];

                    }else{

                        // echo "sizes are different uploading file...";
                        $this->upload->do_upload('file');
                        $uploaded_file_info = $this->upload->data();
                        $data = array(
                            'post_id' => $id,
                            'picture' => $uploaded_file_info['file_name']
                        );
                        $this->users_model->updateTo_table_gallery($table_name, $id, $_FILES['file']['name'], $data);
                        echo $uploaded_file_info['file_name'];


                    }

                }else{

                    $this->upload->do_upload('file');
                    echo $_FILES['file']['name'];

                }

            }


        }
    }

    public function list_picture_users($table_name, $id){

        $files = $this->users_model->get_row($table_name, $id);
        $files_array = array();
        foreach ($files as $file){

            if ($file->picture != ""){
                $file = array(
                    'name' => $file->picture,
                    'size' => filesize($this->upload_path . "/" . $file->picture)
                );
                array_push($files_array, $file);
            }


        }

        if(empty($files_array) != true ){

            header("Content-type: text/json");
            header("Content-type: application/json");
            echo json_encode($files_array);

        }
    }

    public function list_picture_gallery($id){

        $files = $this->Database_Model->get_row_elastic('post_image', $id, 'post_id');
        $files_array = array();

        foreach ($files as $file){

            if ($file->picture != ""){
                $file = array(
                    'name' => $file->picture,
                    'size' => filesize($this->upload_path . "/" . $file->picture)
                );
                array_push($files_array, $file);
            }


        }
        if(empty($files_array) != true ){

            header("Content-type: text/json");
            header("Content-type: application/json");
            echo json_encode($files_array);

        }




    }



    public function upload_image($table_name, $id){

        if( !empty($_FILES)){


            $data = array(
                'picture' => $_FILES['file']['name']
            );

            if($this->users_model->update_picture_to_table($table_name, $id, $data) == true) {

                $file_info = get_file_info("./images/".$_FILES['file']['name']);

                if($file_info != false) {

                    //echo ' There is file with the same name on the server...';

                    if($_FILES['file']['size'] == $file_info['size']){

                        //echo "and their sizes are the same dont upload";
                        // but in this case upload anyway.
                        // unnecessary if else and naturally duplicate code but leave it for any chance of change in the future
                        //$this->upload->do_upload('file');
                        //$uploaded_file_info = $this->upload->data();
                        //$data = array(
                        //    'picture' => $uploaded_file_info['file_name']
                        //);
                        //$this->users_model->updateTo_table($table_name, $id, $data);
                        echo $_FILES['file']['name'];

                    }else{

                       // echo "sizes are different uploading file...";
                        $this->upload->do_upload('file');
                        $uploaded_file_info = $this->upload->data();
                        $data = array(
                            'picture' => $uploaded_file_info['file_name']
                        );
                        $this->users_model->updateTo_table($table_name, $id, $data);
                        echo $uploaded_file_info['file_name'];


                    }

                }else{

                    $this->upload->do_upload('file');
                    echo $_FILES['file']['name'];

                }

            }else{

                $file_info = get_file_info("./images/".$_FILES['file']['name']);
                if($file_info != false) {

                    if($_FILES['file']['size'] != $file_info['size']){

                        //echo "their names are same but they`re different images, so upload...";
                        $this->upload->do_upload('file');
                        $uploaded_file_info = $this->upload->data();
                        $data = array(
                            'picture' => $uploaded_file_info['file_name']
                        );
                        $this->users_model->updateTo_table($table_name, $id, $data);
                        echo $uploaded_file_info['file_name'];

                    }else{

                        echo $_FILES['file']['name'];
                    }

                }else{

                    echo $_FILES['file']['name'];

                }


            }



        }
    }

    public function remove(){

        $file = $this->input->post('file');
        $table_name = $this->input->post('param0');
        $id = $this->input->post('param1');
        $data = array(
            'picture' => ''
        );


        $this->users_model->updateTo_table($table_name, $id, $data);


        if($file && file_exists($this->upload_path . "/" . $file)){

            $result = $this->Database_Model->is_picture_usedBy_another($file);

            if($result == true){

                echo 'Succcesfully Unlinked: '. $file;


            }else {



                if(unlink($this->upload_path . "/" . $file) == true ){
                    echo 'Succcesfully Deleted: '. $file;
                }else{


                }

            }
        }

    }

    /*
    public function remove_from_gallery(){

        $file = $this->input->post('file');
        $post_id = $this->input->post('param0');

        $this->users_model->delete_row_from_gallery('post_image', $post_id, $file);
        if($file && file_exists($this->upload_path . "/" . $file)){
            if($this->users_model->is_picture_usedBy_another($file) == true){
                echo "this picture is use by another row dont delete it.";
            }else {

                if(unlink($this->upload_path . "/" . $file) == true ){
                    echo 'Succcesfully Deleted: '. $file;
                }else{

                }

            }
        }




    }
    */

}
?>