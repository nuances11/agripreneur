<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    function get_product_info($id)
    {
        $this->db->select('*')
                ->from('tbl_products')
                ->where('product_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return [];
    }

    function fetch_all_products()
    {
        $query = $this->db->query("
            SELECT
                p.product_id,
                p.image,
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
                sc.subcategory_name,
                u.unit_identifier
            FROM tbl_products p
            LEFT JOIN tbl_product_category pc
            ON p.product_id = pc.product_id
            LEFT JOIN tbl_category c
            ON c.category_id = pc.category_id
            LEFT JOIN tbl_sub_category sc
            ON sc.subcategory_id = pc.subcategory_id
            LEFT JOIN tbl_unit u
            ON p.unit = u.unit_id
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

    function get_unit_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $this->db->where('unit_id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
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

    function update_unit($data)
    {
        $this->db->where('unit_id', $this->input->post('unit_id'));
        return $this->db->update('tbl_unit', $data);
    }

    function deactivate_product($id)
    {
        $data = array(
            'status' => 0
        );
        $this->db->where('product_id', $id);
        return $this->db->update('tbl_products', $data);
    }


    

    function get_products_by_category_total($category, $subcategory)
    {
        if (!empty($category) && !empty($subcategory)) {
            $query = $this->db->query("
            SELECT
                    pc.category_id,
                    pc.subcategory_id,
                    p.*,
                    u.unit_identifier
                FROM tbl_product_category pc
                LEFT JOIN tbl_products p
                ON pc.product_id = p.product_id
                LEFT JOIN tbl_unit u
                ON p.unit = u.unit_id
                WHERE pc.category_id = $category
                AND pc.subcategory_id = $subcategory
                AND p.status = 1
            ");
            if($query->num_rows() > 0){
                return $query->num_rows();
            }
            return [];
        }
    }

    function get_products_by_category($category, $subcategory)
    {
        $filter = '';
        $query = '';
        if(isset($_GET['q']) && !empty($_GET['q'])){
            $filter = trim($_GET['q']);
        }

        if (!empty($category) && !empty($subcategory))
        {   
            if(!empty($filter))
            {
                if($filter == 'date_asc')
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE pc.category_id = $category
                        AND pc.subcategory_id = $subcategory
                        AND p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY timestamp_created ASC
                    ");
                }
                elseif ($filter == 'date_desc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE pc.category_id = $category
                        AND pc.subcategory_id = $subcategory
                        AND p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY timestamp_created DESC
                    ");
                }
                elseif ($filter == 'name_asc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE pc.category_id = $category
                        AND pc.subcategory_id = $subcategory
                        AND p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY p.name ASC
                    ");
                }
                elseif ($filter == 'name_desc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc 
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE pc.category_id = $category
                        AND pc.subcategory_id = $subcategory
                        AND p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY p.name DESC
                    ");
                }
                elseif ($filter == 'price_asc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE pc.category_id = $category
                        AND pc.subcategory_id = $subcategory
                        AND p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY p.price ASC
                    ");
                }
                elseif ($filter == 'price_desc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE pc.category_id = $category
                        AND pc.subcategory_id = $subcategory
                        AND p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY p.price DESC
                    ");
                }
                elseif ($filter == 'nearest_5') 
                {
                    $long = $_GET['long'];
                    $lat = $_GET['lat'];

                    $query = $this->db->query("
                        SELECT
                            u.*,
                            p.*,
                            un.unit_identifier,
                                ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) *
                        cos( radians( longitude ) - radians($long) ) + sin( radians($lat) ) *
                        sin( radians( latitude ) ) ) ) AS distance
                        FROM tbl_user u
                        LEFT JOIN tbl_products p
                        ON u.id = p.user_id
                        LEFT JOIN tbl_unit un
                        ON p.unit = un.unit_id
                        WHERE p.status = 1
                        HAVING distance < 10
                        ORDER BY distance
                        LIMIT 0 , 20;
                    ");
                }

            }
            else
            {
                $query = $this->db->query("
                    SELECT
                        pc.category_id,
                        pc.subcategory_id,
                        p.*,
                        u.unit_identifier
                    FROM tbl_product_category pc
                    LEFT JOIN tbl_products p
                    ON pc.product_id = p.product_id
                    LEFT JOIN tbl_unit u
                    ON p.unit = u.unit_id
                    WHERE pc.category_id = $category
                    AND pc.subcategory_id = $subcategory
                    AND p.status = 1
                    AND availability_end >= NOW()
                    AND quantity > 0
                ");
            }

            if($query->num_rows() > 0){
                return $query->result();
            }
            
        }

        return [];
    }

    function get_all_products()
    {
        $filter = '';
        $query = '';
        $search = '';
        if(isset($_GET['q']) && !empty($_GET['q'])){
            $filter = trim($_GET['q']);
        }elseif(isset($_GET['search']) && !empty($_GET['search'])){
            $search = trim($_GET['search']);
        }

          
            if(!empty($filter))
            {
                if($filter == 'date_asc')
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE  p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY timestamp_created ASC
                    ");
                }
                elseif ($filter == 'date_desc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE  p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY timestamp_created DESC
                    ");
                }
                elseif ($filter == 'name_asc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE  p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY p.name ASC
                    ");
                }
                elseif ($filter == 'name_desc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc 
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE  p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY p.name DESC
                    ");
                }
                elseif ($filter == 'price_asc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE  p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY p.price ASC
                    ");
                }
                elseif ($filter == 'price_desc') 
                {
                    $query = $this->db->query("
                        SELECT
                            pc.category_id,
                            pc.subcategory_id,
                            p.*,
                            u.unit_identifier
                        FROM tbl_product_category pc
                        LEFT JOIN tbl_products p
                        ON pc.product_id = p.product_id
                        LEFT JOIN tbl_unit u
                        ON p.unit = u.unit_id
                        WHERE  p.status = 1
                        AND availability_end >= NOW()
                        AND quantity > 0
                        ORDER BY p.price DESC
                    ");
                }
                elseif ($filter == 'nearest_5') 
                {
                    $long = $_GET['long'];
                    $lat = $_GET['lat'];

                    $query = $this->db->query("
                        SELECT
                            u.*,
                            p.*,
                            un.unit_identifier,
                                ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) *
                        cos( radians( longitude ) - radians($long) ) + sin( radians($lat) ) *
                        sin( radians( latitude ) ) ) ) AS distance
                        FROM tbl_user u
                        LEFT JOIN tbl_products p
                        ON u.id = p.user_id
                        LEFT JOIN tbl_unit un
                        ON p.unit = un.unit_id
                        WHERE p.status = 1
                        HAVING distance < 10
                        ORDER BY distance
                        LIMIT 0 , 20;
                    ");
                }

            }elseif(!empty($search)){
                $query = $this->db->query("
                    SELECT
                        pc.category_id,
                        pc.subcategory_id,
                        p.*,
                        u.unit_identifier
                    FROM tbl_product_category pc
                    LEFT JOIN tbl_products p
                    ON pc.product_id = p.product_id
                    LEFT JOIN tbl_unit u
                    ON p.unit = u.unit_id
                    WHERE p.status = 1
                    AND availability_end >= NOW()
                    AND quantity > 0
                    AND p.name LIKE '%$search%'
                ");
            }
            else
            {
                $query = $this->db->query("
                    SELECT
                        pc.category_id,
                        pc.subcategory_id,
                        p.*,
                        u.unit_identifier
                    FROM tbl_product_category pc
                    LEFT JOIN tbl_products p
                    ON pc.product_id = p.product_id
                    LEFT JOIN tbl_unit u
                    ON p.unit = u.unit_id
                    WHERE p.status = 1
                    AND availability_end >= NOW()
                    AND quantity > 0
                ");
            }

            if($query->num_rows() > 0){
                return $query->result();
            }

        return [];
    }

    function get_product_count()
    {
        $this->db->select('*')
                ->from('tbl_products')
                ->where('status', '1');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function update_product_qty($trans_id)
    {
        $this->db->select('*')
                ->from('tbl_product_per_transaction')
                ->where('transaction_id', $trans_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $updated_qty = 0;
            foreach ($query->result() as $ppt) {
                $qty = $ppt->product_total_qty;
                $product_id = $ppt->product_id;

                $this->db->select('*')
                        ->from('tbl_products')
                        ->where('product_id', $product_id);
                $prod = $this->db->get();
                $product = $prod->row();

                if ($product->quantity > $qty) {
                    $update = $this->db->query("
                        UPDATE
                        tbl_products
                        SET quantity = quantity - $qty
                        WHERE product_id = $product_id
                    ");

                    return TRUE;

                }else{
                    return FALSE;
                }
            }
        }

        return [];
    }

    function update_product_qty_cancel($trans_id)
    {
        $this->db->select('*')
                ->from('tbl_transaction')
                ->where('transaction_id', $trans_id);
        $query = $this->db->get();
        $trans = $query->row();
        if ($trans->transaction_status == '1') {

            $this->db->select('*')
                    ->from('tbl_product_per_transaction')
                    ->where('transaction_id', $trans_id);
            $products = $this->db->get();
            foreach ($products->result() as $ppt) {

                $qty = $ppt->product_total_qty;
                $product_id = $ppt->product_id;

                    $update = $this->db->query("
                        UPDATE
                        tbl_products
                        SET quantity = quantity + $qty
                        WHERE product_id = $product_id
                    ");

                    return TRUE;
            }

        }else{

            return TRUE;
        }

        return [];
    }
}
