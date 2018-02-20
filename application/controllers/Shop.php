<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('user_model'); 
        $styles = array(

		);
		$js = array(
			'assets/user/js/register.js'
		);

		$this->template->set_additional_css($styles);
		$this->template->set_additional_js($js);

        //$this->_checkLogin();
        $this->template->set_title('AGRIPRENEUR');
        $this->template->set_template('shop');
    }

	function index()
	{
        $this->template->load_sub("products", $this->user_model->get_products());
        $this->template->load_sub("random_product", $this->user_model->get_rand_products());
		$this->template->load('shop/index');
	}

	function product_details()
	{
		$this->template->load('shop/product_details');
	}

	function register()
	{
		$this->template->load('shop/register');
	}
}
