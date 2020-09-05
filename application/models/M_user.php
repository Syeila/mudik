<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function get_data_transportasi()
    {
        return $this->db->get('data_transportasi');
    }

    public function login($table, $field1, $field2) 
    {
            //create query to connect user login database
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($field1);
            $this->db->where($field2);
            $this->db->limit(1);

            //get query and processing
            $query = $this->db->get();
            if($query->num_rows() == 1) {
                return $query->result(); //if data is true
            } else {
                return false; //if data is wrong
            }
    }

    public function daftar($data)
    {
        $query = $this->db->insert("tb_login", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function booking($data)
    {
        $query = $this->db->insert("tb_booking", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

     public function get_booking()
    {
       return  $this->db->where('id_login', $this->session->userdata('id'))->get('tb_booking');
    }

}