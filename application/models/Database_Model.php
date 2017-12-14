<?php


class Database_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function is_picture_usedBy_another($picture_name)
    {

        $query = $this->db->query('show tables');
        $query_result = array();
        foreach ($query->result_array() as $tables) {

            foreach ($tables as $table) {

                $fields = $this->db->list_fields($table);

                if(in_array('picture', $fields)) {
                    $this->db->select('picture');
                    $this->db->from($table);
                    $this->db->where('picture', $picture_name);
                    $var = $this->db->get()->result_array();
                    if (!empty($var)) {
                        array_push($query_result, $var);
                        return true;

                    }

                }
            }
        }
        return false;
    }


    public function get_row_elastic($table_name, $id, $search_column)
    {

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($search_column, $id);

        $query = $this->db->get()->result();
        return $query;

    }










}