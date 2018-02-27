<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('user_model'); 
		$this->load->model('product_model'); 
        $styles = array(

		);
		$js = array(
			'assets/user/js/register.js',
			'assets/user/js/shop.js'
		);

		$this->template->set_additional_css($styles);
		$this->template->set_additional_js($js);

        //$this->_checkLogin();
        $this->template->set_title('AGRIPRENEUR');
        $this->template->set_template('shop');
    }

	function index()
	{
		$this->template->load_sub("categories", $this->user_model->get_categories_data());
        $this->template->load_sub("products", $this->user_model->get_products());
        $this->template->load_sub("random_product", $this->user_model->get_rand_products());
		$this->template->load('shop/index');
	}

	function product_details($id)
	{
		$this->template->load_sub("related_products", $this->product_model->get_related_product($id));
		$this->template->load_sub("producer", $this->product_model->get_producer_info($id));
		$this->template->load_sub("categories", $this->user_model->get_categories_data());
		$this->template->load_sub("product", $this->product_model->get_product_data($id));
		$this->template->load('shop/product_details');
	}

	function register()
	{
		$this->template->load('shop/register');
	}

	//Cart functions

	function add()
	{
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('quantity')
		);

		if($this->cart->insert($insert_data)){
			echo json_encode(array("success" => TRUE));
		}else{
			echo json_encode(array("success" => FALSE));
		}
	}

	function clear()
	{
		$this->cart->destroy();
		echo json_encode(array("success" => TRUE));
	}

	function view()
	{
		$this->template->load_sub("categories", $this->user_model->get_categories_data());
		$this->template->load('shop/shopping_cart');
	}
}

