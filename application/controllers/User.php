<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_model');

        $styles = array(

		);
		$js = array(
            'assets/user/js/login.js',
            'assets/user/js/user.js',
		);

		$this->template->set_additional_css($styles);
		$this->template->set_additional_js($js);

        //$this->_checkLogin();
        $this->template->set_title('User - Dashboard');
        $this->template->set_template('user');
    }

    function index()
	{
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
		$this->template->load('user/index');
    }

    function login(){
        $this->template->set_template('login');
        $this->template->set_title('User - Login');
        $this->template->load('user/login');
    }

    function logout()
    {
        session_destroy();
        redirect(base_url('login'),'refresh');
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

    function user_edit()
    {
        $extra_js = '
			google.maps.event.addDomListener(window, "load", function () {
				var places = new google.maps.places.Autocomplete(document.getElementById("address"));
				places.setComponentRestrictions({"country": ["ph"]});
				var longInput = document.getElementById("long");
				var latInput = document.getElementById("lat");
				google.maps.event.addListener(places, "place_changed", function () {
					var place = places.getPlace();
					var address = place.formatted_address;
					var latitude = place.geometry.location.lat();
					var longitude = place.geometry.location.lng();

					longInput.value = longitude;
					latInput.value = latitude;


				});
			});
		';

		$this->template->extra_js($extra_js);
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
		$this->template->load('user/edit_profile');
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

    function product_add()
	{
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('units', $this->product_model->get_all_units());
		$this->template->load('user/product/add_product');
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
                "user_id" => $this->session->userdata('id'),
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

    function product_list()
	{
        $extra_js = '
            $("#products").DataTable();
		';

        $this->template->extra_js($extra_js);
        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('products', $this->user_model->fetch_user_products($this->session->userdata('id')));
		$this->template->load('user/product/list_product');
	}
}
