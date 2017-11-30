<?php


class Database_Model extends CI_Model{

    public function __construct()
    {
            parent::__construct();
    }

    public function login($table_name, $email, $password){

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('state', 'active');
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1){

            return $query->result();

        }else {

            return false;

        }


    }

    public function select_all($table_name){

            $this->db->select('*');
            $this->db->from($table_name);

            $query = $this->db->get();

        if($query->num_rows() > 0){

            return $query->result();

        }else {

            return false;

        }

    }

    public function insertTo_table($table_name, $data){

        $this->db->insert($table_name, $data);

    }


    public function get_row($table_name, $id){

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where('id', $id);

        $query = $this->db->get()->result();
        return $query;

    }

    public function updateTo_table($table_name, $id, $data){
        $query = $this->db->query('show tables');
        if((count($data) == 1) && array_key_exists('picture', $data)){
            foreach ($query->result_array() as $tables){

                foreach ($tables as $table){

                    if($table == $table_name){

                        $this->db->where('id', $id);
                        $this->db->update($table_name, $data);

                        if($this->db->affected_rows() == 0 ){

                            //echo "No rows are affected " . $id;
                            return false;
                        }else {

                            //echo "affected rows: " . "  id:" . $id ;
                            return true;
                        }

                    }

                }
            }
        }else{

            if(strpos($table_name, $data['authorization']) !== false){

                $this->db->where('id', $id);
                $this->db->update($table_name, $data);
                return true;

            }else{

                foreach ($query->result_array() as $table){
                    foreach ($table as $r){

                        if(strpos($r, $data['authorization']) !== false){

                            $this->db->where('id', $id);
                            $this->db->delete($table_name);

                            $this->db->insert($r, $data);
                            return true;

                        }
                    }
                }
            }

        }

    }

    public function delete_row($table_name,$id){
        try{

            $this->db->where('id', $id);
            $this->db->delete($table_name);
            return true;

        }catch (Exception $e){
            return false;
        }
    }



    public function select_all_array($table_name, $offset='0', $table_row='3'){



        $query = "SELECT * FROM " . $table_name . " LIMIT " . $offset . ", ". $table_row;
        //echo $query;
        $result = $this->db->query($query);


        if($result->num_rows() > 0){
            return $result->result_array();
        }else {return false;}
    }

    public function get_offset($table_name,$offset, $table_row){        // use the same $table_row value as used
                                                                        // in select_all_array
        $num_rows = $this->db->count_all_results($table_name);
        $offset = (int)$offset;
        if($offset+$table_row > ($num_rows-1)){
            $offset = $num_rows - $table_row;
            if($offset < 0){
                $offset = 0;
                return $offset;
            }else {
                return (string)$offset;
            }
        }elseif ($offset < 0){
            $offset = 0;
            return (string)$offset;
        }else {
            return (string)$offset;
        }

    }

    public function is_picture_usedBy_another($picture_name){
        $query = $this->db->query('show tables');
        $query_result = array();
        foreach ($query->result_array() as $tables){

            foreach ($tables as $table){
                $this->db->select('picture');
                $this->db->from($table);
                $this->db->where('picture', $picture_name);
                $var = $this->db->get()->result_array();
                if(!empty($var)){
                    array_push($query_result, $var);
                    return true;
                }

            }
        }


    }




}


?>