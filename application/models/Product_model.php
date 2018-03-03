<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    function fetch_all_products()
    {
        $query = $this->db->query("
            SELECT 
                p.product_id,
                p.name,
                p.status,
                pc.category_id,
                pc.subcategory_id,
                c.category_name,
                sc.subcategory_name
            FROM tbl_products p
            LEFT JOIN tbl_product_category pc
            ON p.product_id = pc.product_id
            LEFT JOIN tbl_category c
            ON c.category_id = pc.category_id
            LEFT JOIN tbl_sub_category sc
            ON sc.subcategory_id = pc.subcategory_id
        ");
        if($query->num_rows() > 0){
            return $query->result();
        }
        return [];
    }

    function get_product_data($id) 
    {
        $query = $this->db->query("
            SELECT 
                p.*,
                pc.category_id,
                pc.subcategory_id,
                c.category_name,
                sc.subcategory_name
            FROM tbl_products p
            LEFT JOIN tbl_product_category pc
            ON p.product_id = pc.product_id
            LEFT JOIN tbl_category c
            ON c.category_id = pc.category_id
            LEFT JOIN tbl_sub_category sc
            ON sc.subcategory_id = pc.subcategory_id
            WHERE p.product_id = $id
        ");
        if($query->num_rows() > 0){
            return $query->row();
        }
        return [];
    }

    function save_unit($data)
    {
        return $this->db->insert('tbl_unit', $data);
    }

    function get_all_units()
    {
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }
        return [];
    }

    function get_related_product($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $res = $query->row();
            $this->db->select('*');
            $this->db->from('tbl_products');
            $this->db->where('user_id', $res->user_id);
            $this->db->where('status', '1');
            $this->db->order_by('rand()');
            $this->db->limit(6);
            $related = $this->db->get();
            return $related->result();
        }
        return [];
    }

    function get_producer_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_products.user_id');
        $this->db->where('tbl_products.product_id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }
        return [];
    }

    function activate_product($id)
    {
        $data = array(
            'status' => 1
        );
        $this->db->where('product_id', $id);
        return $this->db->update('tbl_products', $data);
    }

    function deactivate_product($id)
    {
        $data = array(
            'status' => 0
        );
        $this->db->where('product_id', $id);
        return $this->db->update('tbl_products', $data);
    }
}
