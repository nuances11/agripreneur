<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('user_model');
		$this->load->model('product_model');
        $this->load->model('transaction_model');
        $this->load->model('admin_model');
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
        $this->form_validation->set_rules('email','Email Address','required|valid_email|is_unique[tbl_user.email]',
            array('is_unique' => '%s already used. Please provide a unique one.')
        );
        $this->form_validation->set_rules('password','Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('address','Address', 'required');
        $this->form_validation->set_rules('mobile','Mobile #', 'required|regex_match[^(09|\+639)\d{9}$^]',
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
                "title" => $this->input->post('title'),
                "fname" => $this->input->post('fname'),
                "lname" => $this->input->post('lname'),
                "gender" => $this->input->post('gender'),
                "birthday" => $this->input->post('day') . '-' .  $this->input->post('month') . '-' . $this->input->post('year'),
                "address" => $this->input->post('address'),
                "longitude" => $this->input->post('longitude'),
                "latitude" => $this->input->post('latitude'),
                "mobile" => $this->input->post('mobile'),

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

  function update_cart($qty, $id)
  {
    $data = array(
      'rowid' => $id,
      'qty' => $qty
    );

    $res = $this->cart->update($data);
    if ($res) {
      echo json_encode(array("success" => TRUE));
    }else{
      echo json_encode(array("success" => FALSE));
    }
  }

  function remove($id)
  {
    $data = array(
      'rowid' => $id,
      'qty' => 0
    );

    $res = $this->cart->update($data);
    if ($res) {
      echo json_encode(array("success" => TRUE));
    }else{
      echo json_encode(array("success" => FALSE));
    }
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
                    'fname' => $user->fname,
                    'lname' => $user->lname,
                    'name'=> $user->fname . ' ' . $user->lname,
                    'email'=> $user->email,
                    'mobile' => $user->mobile,
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
    function products($category = '', $subcategory = '')
    {
        $this->template->load_sub("products", $this->product_model->get_products_by_category($category,$subcategory));
        $this->template->load_sub("categories", $this->user_model->get_categories_data());
        $this->template->load('shop/products');
    }
    function show_all_products()
    {
        $this->template->load_sub("products", $this->product_model->get_all_products());
        $this->template->load_sub("categories", $this->user_model->get_categories_data());
        $this->template->load('shop/products');
    }

    function place_order()
    {
      //$this->cart->contents()
      $this->load->library('form_validation');
      $this->load->helper('form');

      $this->form_validation->set_rules('customer_fname','First Name', 'required');
      $this->form_validation->set_rules('customer_lname','Last Name', 'required');
      $this->form_validation->set_rules('customer_email','Email', 'required|valid_email');
      $this->form_validation->set_rules('customer_number','Number', 'required|regex_match[^(09|\+639)\d{9}$^]',
          array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>')
      );
      if ($this->form_validation->run() == FALSE) {
          $errors = array(
              "errors" => validation_errors(),
              "success" => FALSE
          );

          echo json_encode($errors);
      }else{
        $grand_total = 0;
        foreach ($this->cart->contents() as $item) {
            $grand_total = $grand_total + $item['subtotal'];
        }

          $data = array(
              'customer_fname' => $this->input->post('customer_fname'),
              'customer_lname' => $this->input->post('customer_lname'),
              'customer_email' => $this->input->post('customer_email'),
              'customer_number' => $this->input->post('customer_number'),
              'total_amount' => $grand_total,
              'transaction_status' => 0
          );

          $trans_id = $this->transaction_model->add_transaction($data);
              if (!empty($trans_id)) {
                    $trans = $this->transaction_model->add_product_per_trans($trans_id);
                    $this->product_model->update_product_qty($trans_id);
                    if ($trans) {
                        $this->cart->destroy();
                        echo json_encode(array("success" => TRUE));
                    }else{
                        echo json_encode(array("success" => FALSE));
                    }
              }else{
                  echo json_encode(array("success" => FALSE));
              }

      }
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

    function send_sms()
    {
        $number = '09171576436';
        $message = 'Test Message';
        $apicode = SMS_API_KEY;
        $result = $this->itexmo($number, $message, $apicode);

        if ($result == ""){
            echo "iTexMo: No response from server!!!
            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.
            Please CONTACT US for help. ";
        }else if ($result == 0){
            echo "Message Sent!";
        }
        else{
            echo "Error Num ". $result . " was encountered!";
        }
    }

    function upload_form()
    {
      $this->template->load_sub("categories", $this->user_model->get_categories_data());
      $this->template->load('shop/upload_form');
    }

    function upload()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        if (empty($_FILES['fileToUpload']['name']))
        {
            $this->form_validation->set_rules('fileToUpload','Registration Form', 'required');
        }
        $this->form_validation->set_rules('fname','First Name', 'required');
        $this->form_validation->set_rules('lname','Last Name', 'required');
        $this->form_validation->set_rules('contact','Contact Number', 'required|regex_match[^(09|\+639)\d{9}$^]',
            array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>')
        );
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                "errors" => validation_errors(),
                "success" => FALSE
            );

            echo json_encode($errors);
        }else{
            $data = array();
            $temp = explode(".", $_FILES["fileToUpload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
             // set path to store uploaded files
             $config['upload_path'] = 'uploads/registration/';
             // set allowed file types
             $config['allowed_types'] = 'pdf';
             // set upload limit, set 0 for no limit
             $config['max_size'] = 0;

             $config['file_name'] = $newfilename;

             // load upload library with custom config settings
             $this->load->library('upload', $config);

             // if upload failed , display errors
             if (!$this->upload->do_upload('fileToUpload'))
             {
                 $data['errors'] = $this->upload->display_errors();

             }
             else
             {
               $data['upload'] = $this->upload->data();

               $reg = array(
                    'file' => $newfilename,
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'contact' => $this->input->post('contact')
                );
               $res = $this->admin_model->upload_registration_form($reg);
                if ($res) {
                    $data['success'] = TRUE;
                }else{
                    $data['errors'] = FALSE;
                }
             // print uploaded file data
             }

            // $data = array();
            //
            // $temp = explode(".", $_FILES["fileToUpload"]["name"]);
            // $newfilename = round(microtime(true)) . '.' . end($temp);
            // $targetfolder = base_url() . "uploads/registration/";
            //
            // $targetfolder = $targetfolder . $newfilename ;
            //
            // $ok=1;
            //
            // $file_type=$_FILES['fileToUpload']['type'];
            //
            // if ($file_type=="application/pdf") {
            //
            //      if(move_uploaded_file($_FILES['fileToUpload']['name'], $targetfolder))
            //
            //      {
            //
            //          $data['upload'] = "The file ". $newfilename . " is uploaded";
            //
            //          $reg = array(
            //              'file' => $newfilename,
            //              'fname' => $this->input->post('fname'),
            //              'lname' => $this->input->post('lname'),
            //              'contact' => $this->input->post('contact')
            //          );
            //
            //          $res = $this->admin_model->upload_registration_form($data);
            //          if ($res) {
            //              $data['success'] = TRUE;
            //          }else{
            //              $data['errors'] = FALSE;
            //          }
            //
            //      }else {
            //
            //      $data['errors'] = "Error uploading file";
            //
            //      }
            //
            //  }else {
            //
            //      $data['error'] = "You may only upload PDF files.";
            //
            // }
             echo json_encode($data);

        }


    }

}
