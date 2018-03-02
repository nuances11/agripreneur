<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    function fetch_all_products()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        // $this->db->join('tbl_product_category', 'tbl_product_category.product_id = tbl_products.product_id','left outer');
        // $this->db->join('tbl_category', 'tbl_category.category_id = tbl_product_category.category_id','left outer');
        // $this->db->join('tbl_sub_category', 'tbl_sub_category.subcategory_id = tbl_product_category.subcategory_id','left outer');
        $product = $this->db->get();
        if($product->num_rows() > 0){
            foreach ($product->result() as $item) {
                $this->db->select('*');
                $this->db->from('tbl_product_category');
                $this->db->join('tbl_category','tbl_category.category_id = tbl_product_category.category_id');
                $this->db->join('tbl_sub_category','tbl_sub_category.subcategory_id = tbl_product_category.subcategory_id');
                $this->db->where('tbl_product_category.product_id', $item->product_id);
                $category = $this->db->get();
                $category_info = $category->result();
                // $product->category = $category_info['category_name'];
                // $product->subcategory = $category_info['subcategory_name'];
                // echo '<pre>';
                // print_r($category_info);
                // echo '</pre>';
                // exit;
            }
         }
         return [];


        // $this->db->select('*');
        // $this->db->from('tbl_products');
        // $query = $this->db->get();
        // if($query->num_rows() > 0){
        //     return $query->result();
        // }
        // return [];
    }

    function get_product_data($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_product_category', 'tbl_product_category.product_id = tbl_products.product_id','left outer');
        $this->db->join('tbl_category', 'tbl_category.category_id = tbl_product_category.category_id','left outer');
        $this->db->join('tbl_sub_category', 'tbl_sub_category.subcategory_id = tbl_product_category.subcategory_id','left outer');
        $this->db->where('tbl_products.product_id', $id);
        $this->db->where('tbl_products.status', '1');
        $query = $this->db->get();
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

}
