<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    function save_category($data)
    {
        return $this->db->insert('tbl_category', $data);
    }

    function get_category_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->result();
		}
		return [];
    }

    function get_category_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $id);
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->row();
		}
		return [];
    }

    function update_category($data)
    {
        $this->db->where('category_id', $this->input->post('category_id'));
        return $this->db->update('tbl_category', $data);

    }

    function save_product_category($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_category');
        $this->db->where('product_id', $data['product_id']);
        $query = $this->db->get();
        if($query->num_rows()){
			$update = array(
                'category_id' => $data['category_id'],
                'subcategory_id' => $data['subcategory_id']
            );
            $this->db->where('product_id', $data['product_id']);
            return $this->db->update('tbl_product_category', $update);
		}else{
            return $this->db->insert('tbl_product_category', $data);
        }
        
    }

}
