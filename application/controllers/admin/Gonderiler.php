<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Gonderiler extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('url');

        if (!$this->session->userdata("admin_session")) {

            redirect(base_url('admin/login'));


        }
    }


    public function index(){

        $this->gonderiler();


    }

    public function gonderiler(){
        $columns = array(

            'id',
            'contents',

        );

        // Which tables are going to get listed.
        $tables =  array(
            0 => 'posts'
        );
        $segment_name = $this->uri->segment(2);
        $this->showList($tables, $columns, $segment_name);

    }

    public function set_update($table_name, $id){
        $data['row'] = $this->posts_model->get_row($table_name, $id);

        //echo gettype($data['row']);
       // exit();

        $data['categories'] = $this->posts_model->select_all('categories');
        $data['users'] = $this->posts_model->select_all('users');
        $data['table_name'] = $table_name;
        $keywords = $data['row'][0]->keywords;
        $keywords = explode(",", $keywords);
        $data['keywords'] = $keywords;

        $this->load->view('admin/_header_form');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_update_post', $data);
        $this->load->view('admin/_footer_form');

    }

    public function update_table_post($id){

        $data = array(

            'post_title'    => $this->input->post('post_title'),
            'user' => $this->input->post('user'),
            'status'   => $this->input->post('state'),
            'keywords' => $this->input->post('keywords'),
            'category' => $this->input->post('category'),
            'contents' => $this->input->post('contents'),


        );

        $result = $this->posts_model->update_to_table('posts',$id, $data);

        if($result === true){
            $this->session->set_flashdata('succes_message', 'Succesfully updated.');
            redirect(base_url('admin/gonderiler'));
        }elseif ($result === false){
            $this->session->set_flashdata('info_message', 'No rows affected.');
            redirect(base_url('admin/gonderiler'));
        }else{
            $this->session->set_flashdata('error_message', 'No such user found as: ' . $data['user']);
            redirect(base_url('admin/gonderiler'));
        }

    }


    public function showList($tables, $columns, $uri_segment){

        $wrapper = array();
        // pass this array the column names which are not going to be included in tables.
        $columns_ = array(


        );

        // Which tables are going to get listed.
        $tables_ =  array(
            0 => 'users',
            1 => 'admin'
        );

        $data = array();
        $offset = '0';
        $arrayd = array();

        foreach ($tables as $table => $table_name){
            if($this->session->flashdata($table_name)){
                $arrayd[$table_name] = $this->session->flashdata($table_name);
            }else{
                $this->session->set_flashdata($table_name, '0');
                $arrayd[$table_name] = $this->session->flashdata($table_name);
            }
        }

        if($this->input->post('next') == 'next'){

            // use the same $table_row value in get_offset as used
            // in select_all_array ( default = 100 )
            foreach ($tables as $table => $table_name){
                $offset = (int)$this->session->flashdata($table_name);
                $offset += 10;

                $offset = $this->posts_model->get_offset($table_name, (string)$offset, 10);

                $this->session->set_flashdata($table_name, $offset);
                $arrayd[$table_name] = $this->session->flashdata($table_name);
            }

        }elseif ($this->input->post('prev') == 'prev'){

            foreach ($tables as $table => $table_name){
                $offset = (int)$this->session->flashdata($table_name);
                $offset -= 10;
                $offset = $this->posts_model->get_offset($table_name, (string)$offset, 10);
                $this->session->set_flashdata($table_name, $offset);
                $arrayd[$table_name] = $this->session->flashdata($table_name);
            }

        }

        foreach ($tables as $table){
            if ($this->posts_model->select_all_array($table, $arrayd[$table]) != false) {
                $data[$table] = $this->posts_model->select_all_array($table, $arrayd[$table]);

            }

        }

        $wrapper['data'] = $data;
        $wrapper['columns'] = $columns;
        $wrapper['tables'] = $tables;
        $wrapper['segment_name'] = $uri_segment;

        $this->load->view('admin/_header_tablo');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/show_tables', $wrapper);
        $this->load->view('admin/_footer_tablo');


    }



    public function set_insert(){

        $data['categories'] = $this->posts_model->select_all('categories');

        $this->load->view('admin/_header_form');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_insert_post', $data);
        $this->load->view('admin/_footer_form');

    }

    public function insert_post(){

        $data = array(

            'post_title'    => $this->input->post('post_title'),
            'user' => $this->input->post('user'),
            'status'   => $this->input->post('state'),
            'keywords' => $this->input->post('keywords'),
            'category' => $this->input->post('category'),
            'contents' => $this->input->post('contents'),


        );

        $result = $this->posts_model->insertTo_table('posts', $data);


        if($result === "not found"){

            $this->session->set_flashdata('error_message', 'No such user found as: ' . $data['user']);
            redirect(base_url('admin/gonderiler'));

        }elseif ($result === true){

            $this->session->set_flashdata('succes_message', 'Succesfully submitted.');
            redirect(base_url('admin/gonderiler'));
        }else{
            $this->session->set_flashdata('error_message', 'Couldn\'t insert to database.Something went wrong.');
            redirect(base_url('admin/gonderiler'));
        }

    }


    public function delete($table_name ,$id){
        if($this->posts_model->delete_row($table_name, $id) == true){

            $this->session->set_flashdata('succes_message', 'Succesfully deleted.');
            redirect(base_url('admin/gonderiler'));

        }else{
            redirect(base_url('admin/error_con/page_500'));
        }

    }

}

?>