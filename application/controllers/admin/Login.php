<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();


        $this->load->database();

    }

    public function index()
    {

        $this->load->view('admin/_login');
    }

    public function login_ol(){

        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $this->security->xss_clean($email);
        $this->security->xss_clean($password);

        $this->load->model('Database_Model');

        $result = $this->Database_Model->login('admin', $email, $password);

        if ($result){

            $sess_array = array(

                'id' => $result[0]->id,
                'name' => $result[0]->name,
                'email' => $result[0]->email,
                'authorization' => $result[0]->authorization,
                'picture' => $result[0]->picture,

            );
            $this->session->set_userdata('admin_session', $sess_array);
            redirect(base_url('admin/home'));


        }else{

            $this->session->set_flashdata('mesaj', 'Username or Password do not match.');
            redirect(base_url('admin/login'));

        }
    }

    public function  logout(){

        $this->session->unset_userdata('admin_session');
        redirect(base_url('admin'));

    }

}
