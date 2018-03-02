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

        $styles = array(

		);
		$js = array(
            'assets/user/js/login.js',
            'assets/user/js/user.js',
            'assets/user/js/admin.js',
		);

		$this->template->set_additional_css($styles);
		$this->template->set_additional_js($js);

        //$this->_checkLogin();
        $this->template->set_title('Admin - Dashboard');
        $this->template->set_template('admin');
    }

    function index()
	{
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
		$this->template->load('admin/index');
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
            $data = array (
                "user_id" => $this->input->post('user'),
                "image" => '',
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
        }
    }

    function product_add_category($id)
    {
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




}
