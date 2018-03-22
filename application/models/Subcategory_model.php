<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory_model extends CI_Model {
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    function save_subcategory($data)
    {
        return $this->db->insert('tbl_sub_category', $data);
    }

    function get_sub_category_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_category');
        $this->db->join('tbl_category', 'tbl_category.category_id = tbl_sub_category.category_id');
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->result();
		}
		return [];
    }

    function get_subcategory_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_category');
        $this->db->where('subcategory_id', $id);
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->row();
		}
		return [];
    }

    function update_subcategory($data)
    {
        $this->db->where('subcategory_id', $this->input->post('subcategory_id'));
        return $this->db->update('tbl_sub_category', $data);

    }

    function get_sub_categories($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_category');
        $this->db->where('category_id', $id);
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->result();
		}
		return [];
    }


}
