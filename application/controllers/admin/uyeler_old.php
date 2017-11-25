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


        $data['users'] = $this->Database_Model->select_all('users');
        $data['admins'] = $this->Database_Model->select_all('admin');


        $this->load->view('admin/_header_tablo');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_show_tables_test2', $data);
        $this->load->view('admin/_footer_tablo');

    }

    public function insert() {

        $this->load->view('admin/_header_form');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_top_nav');
        $this->load->view('admin/_insert_user');
        $this->load->view('admin/_footer_form');

    }

    public function insertTo_table() {

        $data = array(
            'name'    => $this->input->post('name'),
            'email'   => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'nickname' => $this->input->post('nickname'),
            'authorization' => $this->input->post('authorization'),
            'state' => $this->input->post('state')
        );



        if ($data['authorization'] == 'admin'){
            $this->Database_Model->insertTo_table('admin', $data);
        }else {
            $this->Database_Model->insertTo_table('users', $data);
        }
        $this->session->set_flashdata('succes_message', 'Succesfully submitted.');
        redirect(base_url('admin/uyeler'));

    }


    public function set_update($table_name, $id){

        $data['row'] = $this->Database_Model->get_row($table_name, $id);
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

        if($this->Database_Model->updateTo_table($table_name, $id, $data) == true){
            $this->session->set_flashdata('succes_message', 'Succesfully updated.');
            redirect(base_url('admin/uyeler'));
        }else{
            redirect(base_url('admin/uyeler/page_500'));
        }



    }



    public function delete($table_name ,$id){
        if($this->Database_Model->delete_row($table_name, $id) == true){

            $this->session->set_flashdata('succes_message', 'Succesfully deleted.');
            redirect(base_url('admin/uyeler'));

        }else{
            redirect(base_url('admin/uyeler/page_500'));
        }

    }


    public  function page_500(){
        $this->load->view('errors/page_500');
    }

    /*
    public function  ajax_search(){

        $data = array(

            'table_name' => $this->input->post('tablename'),
            'keyword'    => $this->input->post('search_string')
        );

        $this->load->model('Database_Model');
        $Result = $this->Database_Model->search();
        echo json_encode($Result);

    }
 */


}
