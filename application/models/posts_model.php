<?php


class posts_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function update_to_table($table_name, $id, $data)
    {

        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('name', $data['user']);
        $query = $this->db->get()->result_array();



        if (empty($query)){

            return "not found";

        }else {

           $data['user'] = $query[0]['id'];

            $this->db->where('id', $id);
            $this->db->update($table_name, $data);

            if ($this->db->affected_rows() == 0) {

                //echo "No rows are affected " . $id;
                return false;
            } else {

                //echo "affected rows: " . "  id:" . $id ;
                return true;
            }
        }

    }


    public  function get_row($table_name, $id){

        $query = "SELECT posts.*, categories.category_name as cat_name, users.name as user_name
                  FROM posts
                  LEFT JOIN categories ON posts.category=categories.id
                  LEFT JOIN users ON posts.user=users.id
                  WHERE posts.id =" . $id;

        $result = $this->db->query($query);


        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }

    }


    public function select_all($table_name)
    {

        $this->db->select('*');
        $this->db->from($table_name);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        } else {

            return false;

        }

    }

    public function select_all_array($table_name, $offset = '0', $table_row = '10')
    {


        $query = "SELECT posts.*, categories.category_name as category, users.name as user
                  FROM posts
                  LEFT JOIN categories ON posts.category=categories.id
                  LEFT JOIN users ON posts.user=users.id
                  " . " LIMIT " . $offset . ", " . $table_row;
        //echo $query;
        $result = $this->db->query($query);


        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function get_offset($table_name, $offset, $table_row)
    {
        // use the same $table_row value as used
        // in select_all_array
        $num_rows = $this->db->count_all_results($table_name);
        $offset = (int)$offset;
        if ($offset + $table_row > ($num_rows - 1)) {
            $offset = $num_rows - $table_row;
            if ($offset < 0) {
                $offset = 0;
                return $offset;
            } else {
                return (string)$offset;
            }
        } elseif ($offset < 0) {
            $offset = 0;
            return (string)$offset;
        } else {
            return (string)$offset;
        }

    }



    public function insertTo_table($table_name, $data){



        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('name', $data['user']);
        $query = $this->db->get()->result_array();




        if (empty($query)) {


            return "not found";


        }else{
            $data['user'] = $query[0]['id'];
            $result = $this->db->insert($table_name, $data);

            if ($result == true) {
                return true;
            } else {
                return false;
            }

        }

    }


    public function delete_row($table_name, $id)
    {
        try {

            $this->db->where('id', $id);
            $this->db->delete($table_name);


            $this->db->where('post_id', $id);
            $this->db->delete('post_image');

            return true;

        } catch (Exception $e) {
            return false;
        }
    }


    public function delete_row_from_gallery($table_name, $id, $filename){    // basically same as updateTo_table_gallery
        // but instead of updating the rows
        $this->db->where('post_id', $id);                                    // with given data
        $this->db->where('picture', $filename);                              //it just removes these rows
        $this->db->delete($table_name);

        if ($this->db->affected_rows() == 0) {

            //echo "No rows are affected " . $id;
            return false;
        } else {

            //echo "affected rows: " . "  id:" . $id ;
            return true;
        }
    }


}