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

        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_header');
        $this->load->view('admin/_uyeler_liste');
        $this->load->view('admin/_footer');
    }

    public function test($x, $y) {


        echo "<br>Test fonksiyonu deneme<br>";
        echo "<br> Sonuc : ", $x*$y;
        echo base_url();
    }


}
