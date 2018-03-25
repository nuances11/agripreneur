<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('product_model');
        $this->load->model('transaction_model');

        $styles = array(

		);
		$js = array(
            'assets/user/js/login.js',
            'assets/user/js/user.js',
            'assets/user/js/admin.js',
            'assets/user/js/chart/Chart.bundle.js',
            'assets/user/js/chart/Chart.bundle.min.js',
            'assets/user/js/chart/Chart.js',
            'assets/user/js/chart/Chart.min.js'

		);

		$this->template->set_additional_css($styles);
		$this->template->set_additional_js($js);

        //$this->_checkLogin();
        $this->template->set_title('Admin - Dashboard');
        $this->template->set_template('admin');

    }

    function index()
	{

        $this->template->load_sub('sales_count', $this->transaction_model->get_sales_count());
        $this->template->load_sub('user_count', $this->user_model->get_user_count());
        $this->template->load_sub('order_count', $this->transaction_model->get_order_count());
        $this->template->load_sub('product_count', $this->product_model->get_product_count());
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
		$this->template->load('admin/index');
    }

    function users()
    {
        $extra_js = '
            $("#users").DataTable();
		';
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->extra_js($extra_js);
        $this->template->load_sub('users', $this->user_model->get_all_users());
        $this->template->load('admin/users');
    }

    function user_add()
    {
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load('admin/user_add');
    }

    function user_save()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('user_model');
        $this->template->set_title('User - Register');


        $this->form_validation->set_rules('title','Title', 'required');
        $this->form_validation->set_rules('fname','First Name', 'required');
        $this->form_validation->set_rules('lname','Last Name', 'required');
        $this->form_validation->set_rules('email','Email Address','required|valid_email|is_unique[tbl_user.email]',
            array('is_unique' => '%s already used. Please provide a unique one.')
        );
        $this->form_validation->set_rules('password','Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('address','Address', 'required');
        $this->form_validation->set_rules('mobile','Mobile', 'required|regex_match[^(09|\+639)\d{9}$^]',
            array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{

            $data = array(

                "type" => 'User',
                "email" => $this->input->post('email'),
                "password" => sha1($this->input->post('password')),
                "status" => $this->input->post('status'),
                "title" => $this->input->post('title'),
                "fname" => $this->input->post('fname'),
                "lname" => $this->input->post('lname'),
                "gender" => $this->input->post('gender'),
                "birthday" => $this->input->post('day') . '-' .  $this->input->post('month') . '-' . $this->input->post('year'),
                "address" => $this->input->post('address'),
                "longitude" => $this->input->post('longitude'),
                "latitude" => $this->input->post('latitude'),
                "mobile" => $this->input->post('mobile')
            );

            $res = $this->user_model->save_user($data);
            if($res){
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }
    }

    function user_edit($id)
    {
        $this->template->load_sub('user', $this->user_model->get_user_data($id));
		$this->template->load('admin/edit_profile');
    }

    function user_update()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('user_model');

        $this->form_validation->set_rules('status','Status', 'required');
        $this->form_validation->set_rules('title','Title', 'required');
        $this->form_validation->set_rules('fname','First Name', 'required');
        $this->form_validation->set_rules('lname','Last Name', 'required');
        $this->form_validation->set_rules('email','Email Address','required|valid_email');
        $this->form_validation->set_rules('address','Address', 'required');
        $this->form_validation->set_rules('mobile','Mobile', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{

            $data = array(
                "status" => $this->input->post('status'),
                "email" => $this->input->post('email'),
                "title" => $this->input->post('title'),
                "fname" => $this->input->post('fname'),
                "lname" => $this->input->post('lname'),
                "gender" => $this->input->post('gender'),
                "birthday" => $this->input->post('day') . '-' .  $this->input->post('month') . '-' . $this->input->post('year'),
                "address" => $this->input->post('address'),
                "longitude" => $this->input->post('longitude'),
                "latitude" => $this->input->post('latitude'),
                "mobile" => $this->input->post('mobile')
            );

            $res = $this->user_model->admin_update_user($data);
            if($res){
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }

        }
    }

    function user_change_password($id)
    {
        $this->template->load_sub('user', $this->user_model->get_user_data($id));
		$this->template->load('admin/change_password');
    }

    function update_password()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');


        $this->form_validation->set_rules('new_pass','New Password', 'required');
        $this->form_validation->set_rules('confirm_pass','Confirm Password', 'required|matches[new_pass]');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{

            $res = $this->user_model->change_password($this->input->post('user_id'));
            if($res){
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Category Added Successfully!</div>');
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }
    }

    function category()
    {
        $extra_js = '
            $("#category").DataTable();
		';
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->extra_js($extra_js);
        $this->template->load_sub('categories', $this->category_model->get_category_data());
        $this->template->load('admin/category');
    }

    function category_add()
    {
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load('admin/add_category');
    }

    function category_save()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');


        $this->form_validation->set_rules('category_name','Category Name', 'required');
        $this->form_validation->set_rules('category_identifier','Category Identifier', 'required|is_unique[tbl_category.category_identifier]');
        $this->form_validation->set_rules('status','Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{
            $data = array(
                "category_name" => $this->input->post('category_name'),
                "category_identifier" => $this->input->post('category_identifier'),
                "category_status" => $this->input->post('status')
            );

            $res = $this->category_model->save_category($data);
            if($res){
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Category Added Successfully!</div>');
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }

    }

    function category_edit($id)
    {
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('category', $this->category_model->get_category_info($id));
        $this->template->load('admin/edit_category');
    }

    function category_update()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');


        $this->form_validation->set_rules('category_name','Category Name', 'required');
        $this->form_validation->set_rules('category_identifier','Category Identifier', 'required');
        $this->form_validation->set_rules('status','Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{
            $data = array(
                "category_name" => $this->input->post('category_name'),
                "category_identifier" => $this->input->post('category_identifier'),
                "category_status" => $this->input->post('status')
            );

            $res = $this->category_model->update_category($data);
            if($res){
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Category Updated Successfully!</div>');
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }

    }

    function sub_category()
    {
        $extra_js = '
            $("#sub_category").DataTable();
		';
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->extra_js($extra_js);
        $this->template->load_sub('sub_categories', $this->subcategory_model->get_sub_category_data());
        $this->template->load('admin/sub_category');
    }

    function sub_category_add()
    {
        $this->template->load_sub('categories', $this->category_model->get_category_data());
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load('admin/add_sub_category');
    }

    function sub_category_save()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('category','Category', 'required');
        $this->form_validation->set_rules('subcategory_name','Sub Category Name', 'required');
        $this->form_validation->set_rules('subcategory_identifier','Sub Category Identifier', 'required|is_unique[tbl_sub_category.subcategory_identifier]');
        $this->form_validation->set_rules('status','Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{
            $data = array(
                "category_id" => $this->input->post('category'),
                "subcategory_name" => $this->input->post('subcategory_name'),
                "subcategory_identifier" => $this->input->post('subcategory_identifier'),
                "subcategory_status" => $this->input->post('status')
            );

            $res = $this->subcategory_model->save_subcategory($data);
            if($res){
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Sub Category Added Successfully!</div>');
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }

    }

    function sub_category_edit($id)
    {
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('categories', $this->category_model->get_category_data());
        $this->template->load_sub('subcategory', $this->subcategory_model->get_subcategory_info($id));
        $this->template->load('admin/edit_sub_category');
    }

    function sub_category_update()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('category','Category', 'required');
        $this->form_validation->set_rules('subcategory_name','Sub Category Name', 'required');
        $this->form_validation->set_rules('subcategory_identifier','Sub Category Identifier', 'required');
        $this->form_validation->set_rules('status','Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{
            $data = array(
                "category_id" => $this->input->post('category'),
                "subcategory_name" => $this->input->post('subcategory_name'),
                "subcategory_identifier" => $this->input->post('subcategory_identifier'),
                "subcategory_status" => $this->input->post('status')
            );

            $res = $this->subcategory_model->update_subcategory($data);
            if($res){
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Sub Category Updated Successfully!</div>');
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }

    }

    function sample_route()
    {
        print_r($this->user_model->get_user_data($this->session->userdata('id')));
        exit;
    }

    function product()
	{
        $extra_js = '
            $("#products").DataTable();

            var elems = Array.prototype.slice.call(document.querySelectorAll(".js-switch"));

            elems.forEach(function(html) {
                var switchery = new Switchery(html);
            });
		';

        $this->template->extra_js($extra_js);
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('products', $this->product_model->fetch_all_products());
		$this->template->load('admin/product/product');
	}

    function product_add()
	{
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('users', $this->user_model->get_all_users());
        $this->template->load_sub('units', $this->product_model->get_all_units());
		$this->template->load('admin/product/add_product');
    }
    function product_save()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('user_model');

        $this->form_validation->set_rules('user','User', 'required');
        $this->form_validation->set_rules('product_name','Product Name', 'required');
        $this->form_validation->set_rules('quantity','Quantity', 'required');
        $this->form_validation->set_rules('unit','Unit', 'required');
        $this->form_validation->set_rules('price','Price', 'required');
        $this->form_validation->set_rules('harvest_date','Harvest Datae', 'required');
        $this->form_validation->set_rules('product_availability','Product Availability', 'required');
        $this->form_validation->set_rules('description','Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{

            $target_dir = "uploads/products/";
            $file_name = basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                //echo json_encode(array("image" => "File is an image - " . $check["mime"]));
                $uploadOk = 1;
            } else {
                echo json_encode(array("image" => "File is not an image."));
                $uploadOk = 0;
            }

            // Check if file already exists
            // if (file_exists($target_file)) {
            //     echo json_encode(array("duplicate" => "Sorry, file already exists."));
            //     //echo "Sorry, file already exists.";
            //     unlink("$target_file");
            //     $uploadOk = 1;
            // }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                echo json_encode(array("size" => "Sorry, your file is too large."));
                //echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo json_encode(array("format" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."));
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo json_encode(array("upload" => "Sorry, your file was not uploaded."));
                //echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    $data = array (
                        "user_id" => $this->input->post('user'),
                        "image" => $file_name,
                        "name" => $this->input->post('product_name'),
                        "quantity" => $this->input->post('quantity'),
                        "unit" => $this->input->post('unit'),
                        "price" => $this->input->post('price'),
                        "harvest_date" => $this->input->post('harvest_date'),
                        "availability" => $this->input->post('product_availability'),
                        "description" => $this->input->post('description')
                    );

                    $res = $this->user_model->save_product($data);
                    if($res){
                        echo json_encode(array("success" => TRUE));
                    }else{
                        echo json_encode(array("success" => FALSE));
                    }

                } else {
                    echo json_encode(array("upload" => "Sorry, there was an error uploading your file."));
                    //echo "Sorry, there was an error uploading your file.";
                }
            }


        }
    }

    function product_add_category($id)
    {
        $extra_js = '
            var elems = Array.prototype.slice.call(document.querySelectorAll(".js-switch"));

            elems.forEach(function(html) {
                var switchery = new Switchery(html);
            });
		';

        $this->template->extra_js($extra_js);
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('user_list', $this->user_model->get_all_users());
        $this->template->load_sub('product', $this->product_model->get_product_data($id));
        $this->template->load_sub('categories', $this->category_model->get_category_data());
        $this->template->load('admin/product/category_product');
    }

    function category_list($id)
    {
        $res =  $this->subcategory_model->get_sub_categories($id);
        echo json_encode($res);
        // /echo json_encode($res);
    }

    function product_category_save()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('category','Category', 'required');
        $this->form_validation->set_rules('sub_category','Sub Category', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{
            $data = array (
                "category_id" => $this->input->post('category'),
                "subcategory_id" => $this->input->post('sub_category'),
                "product_id" => $this->input->post('product_id')
            );

            $res = $this->category_model->save_product_category($data);
            if($res){
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Product category updated successfully!</div>');
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }
    }

    function unit()
    {
        $extra_js = '
            $("#units").DataTable();
		';
        $this->template->load_sub('units', $this->product_model->get_all_units());
        $this->template->extra_js($extra_js);
        $this->template->load('admin/product/unit');
    }

    function unit_add()
    {
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load('admin/product/add_unit');
    }

    function unit_save()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('unit_name','Unit Name', 'required');
        $this->form_validation->set_rules('unit_identifier','Unit Identifier', 'required');
        $this->form_validation->set_rules('status','Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{
            $data = array (
                "unit_name" => $this->input->post('unit_name'),
                "unit_identifier" => $this->input->post('unit_identifier'),
                "status" => $this->input->post('status')
            );

            $res = $this->product_model->save_unit($data);
            if($res){
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Unit added successfully!</div>');
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }
    }

    function unit_edit($id)
    {
        $this->template->load_sub('unit', $this->product_model->get_unit_info($id));
        $this->template->load('admin/product/edit_unit');
    }

    function unit_update()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('unit_name','Unit Name', 'required');
        $this->form_validation->set_rules('unit_identifier','Unit Identifier', 'required');
        $this->form_validation->set_rules('status','Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{
            $data = array (
                "unit_name" => $this->input->post('unit_name'),
                "unit_identifier" => $this->input->post('unit_identifier'),
                "status" => $this->input->post('status')
            );

            $res = $this->product_model->update_unit($data);
            if($res){
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Unit updated successfully!</div>');
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }
    }

    function product_activate($id)
    {
        $res = $this->product_model->activate_product($id);
        if ($res) {
            $this->session->set_flashdata('activate', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Product is now active!</div>');
            $this->product();
        }
    }

    function registration_forms()
    {
        $extra_js = '
            $("#forms").DataTable();
		';
        $this->template->extra_js($extra_js);
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('forms', $this->admin_model->get_registration_form());
        $this->template->load('admin/registration-forms');
    }

    function pdf($id)
    {
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('form', $this->admin_model->get_form($id));
        $this->template->load('admin/pdf');
    }



    function product_deactivate($id)
    {
        $res = $this->product_model->deactivate_product($id);
        if ($res) {
            $this->session->set_flashdata('activate', '<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Product is now inactive!</div>');
            $this->product();
        }
    }

    function orders_pending()
    {
        $extra_js = '
            $("#orders").DataTable();
		';
        $this->template->extra_js($extra_js);
        $this->template->load_sub('orders', $this->transaction_model->get_orders_pending());
        $this->template->load('admin/orders_pending');
    }

    function orders_accepted()
    {
        $extra_js = '
            $("#orders").DataTable();
		';
        $this->template->extra_js($extra_js);
        $this->template->load_sub('orders', $this->transaction_model->get_orders_accepted());
        $this->template->load('admin/orders_accepted');
    }

    function orders_cancelled()
    {
        $extra_js = '
            $("#orders").DataTable();
		';
        $this->template->extra_js($extra_js);
        $this->template->load_sub('orders', $this->transaction_model->get_orders_cancelled());
        $this->template->load('admin/orders_cancelled');
    }

    function view_order($id)
    {

        $this->template->load_sub('orders', $this->transaction_model->get_order_details($id));
        $this->template->load_sub('transaction', $this->transaction_model->get_transaction_details($id));
        $this->template->load('admin/order_details');
    }

    function accept_order()
    {
        $data = array();
        $trans_id = $this->input->post('id');
        $number = $this->input->post('number');

        $result = $this->transaction_model->accept_order($trans_id);
        if ($result) {
            $data['transaction'] = 'Order Accepted';
            // echo json_encode(array('transaction' => TRUE));
            // $update = $this->product_model->update_product_qty($trans_id);
            // if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Order Accepted!</div>');
                // echo json_encode(array('product' => TRUE));
                $message = 'Your order has been accepted.';

                $sms = $this->itexmo($number, $message, SMS_API_KEY);

                if ($sms == ""){
                    $data['sms_error'] = "iTexMo: No response from server!!!
                    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.
                    Please CONTACT US for help. ";
                }else if ($sms == 0){
                    $data['sms_success'] = "Message Sent!";
                    $data['success'] = TRUE;
                    $data['product'] = 'Product updated';
                }
                else{
                    $data['sms_error'] = "Error Num ". $sms . " was encountered!";
                }

            // }else{
            //     $data['error'] = 'Product quantity is less than the order quantity';
            //     // echo json_encode(array('error' => 'Product quantity is less than the order quantity'));
            // }
        }else {
            $data['success'] = FALSE;
            $data['transaction'] = 'Transaction Failed';
            // echo json_encode(array('transaction' => FALSE));

        }
        echo json_encode($data);
    }

    function cancel_order()
    {
        $data = array();
        $trans_id = $this->input->post('id');
        $number = $this->input->post('number');

        $result = $this->product_model->update_product_qty_cancel($trans_id);
        if ($result) {
            $data['transaction'] = 'Order Cancelled';
            // echo json_encode(array('transaction' => TRUE));
            $update = $this->transaction_model->cancel_order($trans_id);
            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Order Cancelled!</div>');
                // echo json_encode(array('product' => TRUE));
                $message = 'Your order has been cancelled.';

                $sms = $this->itexmo($number, $message, SMS_API_KEY);

                if ($sms == ""){
                    $data['sms_error'] = "iTexMo: No response from server!!!
                    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.
                    Please CONTACT US for help. ";
                }else if ($sms == 0){
                    $data['sms_success'] = "Message Sent!";
                    $data['success'] = TRUE;
                    $data['product'] = 'Product updated';
                }
                else{
                    $data['sms_error'] = "Error Num ". $sms . " was encountered!";
                }

            }else{
                $data['error'] = 'Product quantity is less than the order quantity';
                // echo json_encode(array('error' => 'Product quantity is less than the order quantity'));
            }
        }else {
            $data['success'] = FALSE;
            $data['transaction'] = 'Transaction Failed';
            // echo json_encode(array('transaction' => FALSE));

        }
        echo json_encode($data);
    }

    //##########################################################################
    // ITEXMO SEND SMS API - PHP - CURL METHOD
    // Visit www.itexmo.com/developers.php for more info about this API
    //##########################################################################
    function itexmo($number,$message,$apicode){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }
    //##########################################################################

    // function send_sms()
    // {
    //     $number = '09171576436';
    //     $message = 'Test Message';
    //     $apicode = SMS_API_KEY;
    //     $result = $this->itexmo($number, $message, $apicode);
    //
    //     if ($result == ""){
    //         echo "iTexMo: No response from server!!!
    //         Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.
    //         Please CONTACT US for help. ";
    //     }else if ($result == 0){
    //         echo "Message Sent!";
    //     }
    //     else{
    //         echo "Error Num ". $result . " was encountered!";
    //     }
    // }


}
