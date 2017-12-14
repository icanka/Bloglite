<?php


class admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function login($table_name, $email, $password)
    {

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('state', 'active');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result();

        } else {

            return false;

        }


    }


}