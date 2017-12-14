<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    private  $file_path = 'images/';
    private  $upload_path = "./images";

    public function __construct()
    {
        parent::__construct();

    }




    public function show_gallery($table_name ,$id){


        $data['rows'] = $this->Database_Model->get_row_elastic('post_image', $id, 'post_id');
        $data['file_path'] = base_url($this->file_path);
        $data['post_id'] = $id;





        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_media_gallery', $data);
        $this->load->view('admin/_footer');

    }

    public function remove_from_gallery(){

        $file = $this->input->post('file');
        $post_id = $this->input->post('param0');


        $this->posts_model->delete_row_from_gallery('post_image', $post_id, $file);
        if($file && file_exists($this->upload_path . "/" . $file)){
            if($this->Database_Model->is_picture_usedBy_another($file) == true){
                echo "Succesfully Unlinked File: ". $file;
            }else {

                if(unlink($this->upload_path . "/" . $file) == true ){
                    echo 'Succcesfully Deleted: ' . $file;
                }else{

                }

            }
        }
    }

    public function remove_from_gallery_with_params($post_id, $file){

        $this->posts_model->delete_row_from_gallery('post_image', $post_id, $file);
        if($file && file_exists($this->upload_path . "/" . $file)){
            if($this->Database_Model->is_picture_usedBy_another($file) == true){
                $this->session->set_flashdata('succes_message', 'Succesfully Unlinked File: '.$file);
            }else {

                if(unlink($this->upload_path . "/" . $file) == true ){
                    $this->session->set_flashdata('succes_message', 'Succesfully Deleted: '.$file);
                }else{

                }

            }
        }

        $redirect_string = base_url('admin/gallery/show_gallery/posts/').$post_id;
        redirect($redirect_string);



    }



}
