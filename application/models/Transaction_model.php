<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    function add_transaction($data)
    {
      $this->db->insert('tbl_transaction', $data);
      return $this->db->insert_id();
    }

    function add_product_per_trans($trans_id)
    {
        $status = FALSE;
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'transaction_id' => $trans_id,
                'product_id' => $item['id'],
                'product_price' => $item['price'],
                'product_name' => $item['name'],
                'product_total_price' => $item['subtotal'],
                'product_total_qty' => $item['qty']
            );

            $res = $this->db->insert('tbl_product_per_transaction', $data);
            if ($res) {
                $status = TRUE;
            }
        }

      return $status;
    }

    function get_sales_count()
    {
        $this->db->select('*')
                ->from('tbl_transaction')
                ->where('transaction_status', '1');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_order_count()
    {
        $this->db->select('*')
                ->from('tbl_transaction')
                ->where('transaction_status', '0');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_orders_pending()
    {
        $this->db->select('*')
                ->from('tbl_transaction')
                ->where('transaction_status', '0');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return [];
    }

    function get_orders_cancelled()
    {
        $this->db->select('*')
                ->from('tbl_transaction')
                ->where('transaction_status', '2');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return [];
    }

    function get_orders_accepted()
    {
        $this->db->select('*')
                ->from('tbl_transaction')
                ->where('transaction_status', '1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return [];
    }

    function get_order_details($id)
    {
        $query = $this->db->query("
            SELECT
                *
            FROM tbl_product_per_transaction
            WHERE transaction_id = $id
        ");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return [];
    }

    function get_transaction_details($id)
    {
        $query = $this->db->query("
            SELECT
                *
            FROM tbl_transaction
            WHERE transaction_id = $id
        ");
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return [];
    }

    function accept_order($trans_id)
    {
        $data = array(
            'transaction_status' => '1'
        );

        $this->db->where('transaction_id', $trans_id);
        return $this->db->update('tbl_transaction', $data);
    }

    function cancel_order($trans_id)
    {
        $data = array(
            'transaction_status' => '2'
        );

        $this->db->where('transaction_id', $trans_id);
        return $this->db->update('tbl_transaction', $data);
    }
}
