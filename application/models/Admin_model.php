<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    function upload_registration_form($data)
    {
        return $this->db->insert('tbl_registration_form', $data);
    }

    function get_registration_form()
    {
        $this->db->select('*')
                ->from('tbl_registration_form');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return [];
    }

    function get_form($id)
    {
        $this->db->select('*')
                ->from('tbl_registration_form')
                ->where('form_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return [];
    }

}
