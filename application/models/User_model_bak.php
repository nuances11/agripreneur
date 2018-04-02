function get_products_by_category($category, $subcategory)
    {
        $filter = '';
        if(isset($_GET['q']) && !empty($_GET['q'])){
            $filter = trim($_GET['q']);
        }

        if (!empty($category) && !empty($subcategory)) {

            if(!empty($filter)){
                if($filter == 'date_asc'){
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
                            ORDER BY timestamp_created ASC
                        ");
                }elseif($filter == 'date_desc'){
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
                            ORDER BY timestamp_created DESC
                        ");
                }elseif($filter == 'name_asc'){
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
                            ORDER BY name ASC
                        ");
                }elseif($filter == 'name_desc'){
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
                            ORDER BY name DESC
                        ");
                }elseif($filter == 'price_asc'){
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
                            ORDER BY price ASC
                        ");
                }elseif($filter == 'price_desc'){
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
                            ORDER BY price DESC
                        ");
                }elseif($filter == 'nearest_5'){
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

                }else{
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
                }
                if($query->num_rows() > 0){
                    return $query->result();
                }
                return [];
            }
            
        }
    }


    function get_all_products()
    {
        $filter = '';
        $query = '';
        if(isset($_GET['q']) && !empty($_GET['q'])){
            $filter = trim($_GET['q']);
        }

        if(!empty($filter)){
            if($filter == 'date_asc'){
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
                    AND p.status = 1
                        ORDER BY timestamp_created ASC
                    ");
            }elseif($filter == 'date_desc'){
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
                    AND p.status = 1
                        ORDER BY timestamp_created DESC
                    ");
            }elseif($filter == 'name_asc'){
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
                    AND p.status = 1
                        ORDER BY name ASC
                    ");
            }elseif($filter == 'name_desc'){
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
                    AND p.status = 1
                        ORDER BY name DESC
                    ");
            }elseif($filter == 'price_asc'){
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
                    AND p.status = 1
                        ORDER BY price ASC
                    ");
            }elseif($filter == 'price_desc'){
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
                        AND p.status = 1
                        ORDER BY price DESC
                    ");
            }else{
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
                    AND p.status = 1
                ");
            }
            if($query->num_rows() > 0){
                return $query->result();
            }
            return [];
        }  
    }