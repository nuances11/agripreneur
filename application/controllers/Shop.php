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
            'assets/user/js/login.js',
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
        $this->template->load_sub("categories", $this->user_model->get_categories_data());
		$this->template->load('shop/register');
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
        $this->form_validation->set_rules('email','Email Address','required|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password','Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
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

                "type" => 'User',
                "email" => $this->input->post('email'),
                "password" => sha1($this->input->post('password')),
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


    function login(){
        $this->template->set_template('login');
        $this->template->set_title('User - Login');
        $this->template->load('user/login');
    }

    function user_login()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');


        $this->form_validation->set_rules('email','Email', 'required');
        $this->form_validation->set_rules('password','Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );
            echo json_encode($errors);
        }else{
            $user = $this->user_model->get_login_data($this->input->post('email'), sha1($this->input->post('password')));
            if(!empty($user)){
                $this->session->set_userdata( array(
                    'id' => $user->id,
                    'name'=> $user->fname . ' ' . $user->lname,
                    'email'=> $user->email,
                    'type'=> $user->type,
                    'isLoggedIn'=>true
                    )
                );
                if ($user->type == 'Admin') {
                    echo json_encode(array("success" => TRUE, "userType" => 'Admin'));
                }elseif ($user->type == 'User') {
                    echo json_encode(array("success" => TRUE, "userType" => 'User'));
                }else {
                    echo json_encode(array("success" => FALSE));
                }
            }else {
                echo json_encode(array("errors" => 'Invalid Username or Password'));
            }


        }
    }

}
