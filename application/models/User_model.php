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

    function update_product($id, $file_name)
    {

        $date_range = $this->input->post('product_availability');
        $dates = explode("-", $date_range);

        $start_date = date('Y-m-d h:i:s', strtotime($dates[0]));
        $end_date = date('Y-m-d h:i:s', strtotime($dates[1]));

        $data = array (
            "image" => $file_name,
            "name" => $this->input->post('product_name'),
            "quantity" => $this->input->post('quantity'),
            "unit" => $this->input->post('unit'),
            "price" => $this->input->post('price'),
            "harvest_date" => $this->input->post('harvest_date'),
            "availability_start" => $start_date,
            "availability_end" => $end_date,
            "description" => $this->input->post('description')
        );

        $this->db->where('product_id', $id);
        return $this->db->update('tbl_products', $data);
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

    function change_password($id)
    {
        $data = array(
            "password" => sha1($this->input->post('new_pass'))
        );

        $this->db->where('id', $id);
        return $this->db->update('tbl_user', $data);
    }

    function get_login_data($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $this->db->where('status', 1);
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
        $this->db->join('tbl_unit', 'tbl_products.unit = tbl_unit.unit_id');
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
        $curr_date = date("Y-m-d");
        $query = $this->db->query("
            SELECT
                p.*,
                u.unit_identifier
            FROM tbl_products p
            LEFT JOIN tbl_unit u
            ON p.unit = u.unit_id
            WHERE availability_end >= NOW()
            AND p.status = 1
            ORDER BY rand()
            LIMIT 4
        ");
        if($query->num_rows() > 0){
            return $query->result();
        }
		return [];
	}

    function get_rand_products()
	{
        $curr_date = date("Y-m-d");
		$query = $this->db->query("
            SELECT
                p.*,
                u.unit_identifier
            FROM tbl_products p
            LEFT JOIN tbl_unit u
            ON p.unit = u.unit_id
            WHERE availability_end >= NOW()
            AND p.status = 1
            ORDER BY rand()
            LIMIT 1
        ");
        if($query->num_rows()){
			return $query->result();
		}
		return [];
    }

    function get_categories_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_status', '1');
        $category = $this->db->get();
        if($category->num_rows()){
            $_category = $category->result();
            foreach ($category->result() as $item) {
                $this->db->select('*');
                $this->db->from('tbl_sub_category');
                $this->db->where('category_id', $item->category_id);
                $subcategory = $this->db->get();
                $_subcategory = $subcategory->result();
                $item->subcategory = $_subcategory;
            }
            return $category->result();
         }
        return [];

    }

    function update_user($data)
    {
        $this->db->where('id', $this->session->userdata('id'));
        return $this->db->update('tbl_user', $data);
    }

    function admin_update_user($data)
    {
        $this->db->where('id', $this->input->post('user_id'));
        return $this->db->update('tbl_user', $data);
    }

    function get_user_count()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('type', 'User');
        $query = $this->db->get();

        return $query->num_rows();
    }
}
