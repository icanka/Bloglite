<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code


        if (!$this->session->userdata("admin_session")){

            redirect(base_url('admin/login'));


        }
    }


    public function index(){

        $this->categories();


    }

    public function categories(){

        //which columns not to list in table
        $columns = array(

            'id'

        );

        // Which tables are going to get listed.
        $tables =  array(
            0 => 'categories'
        );
        $segment_name = $this->uri->segment(2);
        $this->showList($tables, $columns, $segment_name);


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

                $offset = $this->categories_model->get_offset($table_name, (string)$offset, 10);

                $this->session->set_flashdata($table_name, $offset);
                $arrayd[$table_name] = $this->session->flashdata($table_name);
            }

        }elseif ($this->input->post('prev') == 'prev'){

            foreach ($tables as $table => $table_name){
                $offset = (int)$this->session->flashdata($table_name);
                $offset -= 10;
                $offset = $this->categories_model->get_offset($table_name, (string)$offset, 10);
                $this->session->set_flashdata($table_name, $offset);
                $arrayd[$table_name] = $this->session->flashdata($table_name);
            }

        }




        foreach ($tables as $table){
            if ($this->categories_model->select_all_array($table, $arrayd[$table]) != false) {
                $data[$table] = $this->categories_model->select_all_array($table, $arrayd[$table]);

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





    public function set_update($table_name, $id){

        $data['row'] = $this->categories_model->get_row($table_name, $id);
        $data['categories'] = $this->categories_model->select_all('categories');
        $data['table_name'] = $table_name;


        $this->load->view('admin/_header_form');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_update_categories', $data);
        $this->load->view('admin/_footer_form');



    }

    public function update_table($table_name, $id){

        $data = array(
            'category_name'    => $this->input->post('category_name')

        );

        if($this->categories_model->update_to_table($table_name, $id, $data) === true){
            $this->session->set_flashdata('succes_message', 'Succesfully updated.');
            redirect(base_url('admin/categories'));
        }else{
            $this->session->set_flashdata('warning_message', 'No rows affected.');
            redirect(base_url('admin/categories'));
        }



    }



    public function delete($table_name ,$id){
        if($this->categories_model->delete_row($table_name, $id) == true){

            $this->session->set_flashdata('succes_message', 'Succesfully deleted.');
            redirect(base_url('admin/categories'));

        }else{
            redirect(base_url('admin/error_con/page_500'));
        }

    }

    public function set_insert() {

        $this->load->view('admin/_header_form');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_insert_category');
        $this->load->view('admin/_footer_form');

    }


    public function insert_categories(){

        $keywords = $this->input->post('categories');
        $keywords = explode(",", $keywords);
        $data['keywords'] = $keywords;
        $count = 0;
        $count_success = 0;

        foreach ($keywords as $category){
            $count++;
            $data = array(
                'category_name'    => $category
            );

            $result = $this->categories_model->insertTo_table('categories', $data);
            if($result === true){
                $count_success++;
            }

        }


        $this->session->set_flashdata('info_message', $count_success . " of " . $count . " categories added.");
        redirect(base_url('admin/categories'));





    }



}