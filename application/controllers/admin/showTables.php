<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class showTables extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code


        if (!$this->session->userdata("admin_session")){

            redirect(base_url('admin/login'));


        }
    }


    public function index()
    {
        $wrapper = array();

        $tables = $this->db->list_tables();
        $data = array();


        foreach ($tables as $table){
            $data[$table] = $this->Database_Model->select_all2($table);

        }

        $wrapper['data'] = $data;


        $this->load->view('admin/show_tables', $wrapper);



    }

    public function tables_test()
    {
        $wrapper = array();
        // pass this array the column names which are not going to be included in tables.
        $columns = array(
             'id',
            'picture'
        );

        $tables = $this->db->list_tables();
        $data = array();


        foreach ($tables as $table){
            $data[$table] = $this->Database_Model->select_all2($table);

        }

        $wrapper['data'] = $data;
        $wrapper['columns'] = $columns;

        $this->load->view('admin/_header_tablo');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/show_tables_test2', $wrapper);
        $this->load->view('admin/_footer_tablo');




    }





}
