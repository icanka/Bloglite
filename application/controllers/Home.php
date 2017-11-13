<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('url');

    }


    public function index()
    {
        echo "Controller:  ";
        echo  current_url();
        echo "/home";
        //$this->load->view('admin/_sidebar');
        //$this->load->view('admin/_header');
        //$this->load->view('admin/_content');
        //$this->load->view('admin/_footer');
    }

    public function test($x, $y) {


        echo "<br>Test fonksiyonu deneme<br>";

        $z = $x%$y;
        echo $z, "<br>";
        echo base_url();
    }
}
