<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    function save_user($data)
    {
        return $this->db->insert('tbl_user', $data);
    }

    function save_product($data)
    {
        return $this->db->insert('tbl_products', $data);
    }

    function get_user_data($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->row();
		}
		return [];
    }

    function get_login_data($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->row();
		}
		return [];
    }

    function fetch_user_products()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('user_id', $this->session->userdata('id'));
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->result();
		}
		return [];
    }

	function get_all_users()
	{
		$this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('type', 'User');
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->result();
		}
		return [];
	}

    function get_products()
	{
		$this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('status', '1');
        $this->db->order_by('rand()');
        $this->db->limit(4);
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->result();
		}
		return [];
	}

    function get_rand_products()
	{
		$this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('status', '1');
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows()){
			return $query->result();
		}
		return [];
    }

    function get_categories_data()
    {
        $cat = array();
        $subcat = array();
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_status', '1');
        $category = $this->db->get();
        if($category->num_rows()){
            $cat = $category->result_array();
            return $cat;
            // for ($i=0; $i < count($cat) ; $i++) { 
                
            //     $this->db->select('*');
            //     $this->db->from('tbl_sub_category');
            //     $this->db->where('subcategory_status', '1');
            //     $this->db->where('category_id', $cat[$i]['category_id']);
            //     $subcategory = $this->db->get();
            //     $subcat = $subcategory->result_array();
            //     return
            // }
            
         }
        return [];       
        
    }
}
