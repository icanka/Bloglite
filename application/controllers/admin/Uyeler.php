<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Uyeler extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('url');

        if (!$this->session->userdata("admin_session")){

            redirect(base_url('admin/login'));


        }
    }

    public function index()
    {



       $this->uyeler();

    }


    public function uyeler(){

        $columns = array(



        );

        // Which tables are going to get listed.
        $tables =  array(
            0 => 'users',
            1 => 'admin'
        );

        $segment_name = $this->uri->segment(2);

        $this->showList($tables, $columns, $segment_name);

    }

    public function set_insert() {

        $this->load->view('admin/_header_form');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_insert_user');
        $this->load->view('admin/_footer_form');

    }

    public function insert_user() {

        $data = array(
            'name'    => $this->input->post('name'),
            'email'   => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'nickname' => $this->input->post('nickname'),
            'authorization' => $this->input->post('authorization'),
            'state' => $this->input->post('state')
        );



        if ($data['authorization'] == 'admin'){
            $this->users_model->insertTo_table('admin', $data);
        }else {
            $this->users_model->insertTo_table('users', $data);
        }
        $this->session->set_flashdata('succes_message', 'Succesfully submitted.');
        redirect(base_url('admin/uyeler'));

    }


    public function set_update($table_name, $id){

        $data['row'] = $this->users_model->get_row($table_name, $id);
        $data['table_name'] = $table_name;

            $this->load->view('admin/_header_form');
            $this->load->view('admin/_sidebar');
            $this->load->view('admin/_top_nav');
            $this->load->view('admin/_update_user', $data);
            $this->load->view('admin/_footer_form');



    }




    public function update_table($table_name, $id){

        $data = array(
            'name'    => $this->input->post('name'),
            'email'   => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'nickname' => $this->input->post('nickname'),
            'authorization' => $this->input->post('authorization'),
            'state' => $this->input->post('state'),
            'picture' => $this->input->post('picture'),
            'date' => $this->input->post('date')
        );

        if($this->users_model->updateTo_table($table_name, $id, $data) === true){
            $this->session->set_flashdata('succes_message', 'Succesfullyyy updated.');
            redirect(base_url('admin/uyeler'));
        }else{
            $this->session->set_flashdata('warning_message', 'No rows affected.');
            redirect(base_url('admin/uyeler'));
        }



    }



    public function delete($table_name ,$id){
        if($this->users_model->delete_row($table_name, $id) == true){

            $this->session->set_flashdata('succes_message', 'Succesfully deleted.');
            redirect(base_url('admin/uyeler'));

        }else{
            redirect(base_url('admin/error_con/page_500'));
        }

    }

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
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

                $offset = $this->users_model->get_offset($table_name, (string)$offset, 10);

                $this->session->set_flashdata($table_name, $offset);
                $arrayd[$table_name] = $this->session->flashdata($table_name);
            }

        }elseif ($this->input->post('prev') == 'prev'){

            foreach ($tables as $table => $table_name){
                $offset = (int)$this->session->flashdata($table_name);
                $offset -= 10;
                $offset = $this->users_model->get_offset($table_name, (string)$offset, 10);
                $this->session->set_flashdata($table_name, $offset);
                $arrayd[$table_name] = $this->session->flashdata($table_name);
            }

        }




        foreach ($tables as $table){
            if ($this->users_model->select_all_array($table, $arrayd[$table]) != false) {
                $data[$table] = $this->users_model->select_all_array($table, $arrayd[$table]);

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


}
