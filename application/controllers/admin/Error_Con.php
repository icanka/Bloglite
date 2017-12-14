<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_Con extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code


        if (!$this->session->userdata("admin_session")){

            redirect(base_url('admin/login'));


        }
    }


    public  function page_500(){
        $this->load->view('errors/page_500');
    }




}
