<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_model');
        $this->load->model('transaction_model');

        $styles = array(
            'assets/user/css/daterangepicker.css',
		);
		$js = array(
            'assets/user/js/login.js',
            'assets/user/js/user.js',
            'assets/user/js/moment/moment.min.js',
            'assets/user/js/daterangepicker.js',
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

    function orders_pending()
    {
        $extra_js = '
            $("#orders").DataTable();
		';
        $this->template->extra_js($extra_js);
        $this->template->load_sub('orders', $this->transaction_model->get_user_orders_pending());
        $this->template->load('user/orders_pending');
    }

    function orders_accepted()
    {
        $extra_js = '
            $("#orders").DataTable();
		';
        $this->template->extra_js($extra_js);
        $this->template->load_sub('orders', $this->transaction_model->get_user_orders_accepted());
        $this->template->load('user/orders_accepted');
    }

    function orders_cancelled()
    {
        $extra_js = '
            $("#orders").DataTable();
		';
        $this->template->extra_js($extra_js);
        $this->template->load_sub('orders', $this->transaction_model->get_user_orders_cancelled());
        $this->template->load('user/orders_cancelled');
    }

    function view_order($id)
    {

        $this->template->load_sub('orders', $this->transaction_model->get_user_order_details($id));
        $this->template->load_sub('transaction', $this->transaction_model->get_user_transaction_details($id));
        $this->template->load('user/order_details');
    }

    function product_edit($id)
    {
        $extra_js = '
            var dateToday = new Date();
            $("#product_availability").daterangepicker({
                minDate: dateToday,
                timePicker: true,
                timePickerIncrement: 1,
                locale: {
                    format: "MM/DD/YYYY h:mm A"
                }
            });
		';

        $this->template->extra_js($extra_js);

        $this->template->load_sub('user', $this->user_model->get_user_data($this->session->userdata('id')));
        $this->template->load_sub('units', $this->product_model->get_all_units());
        $this->template->load_sub('product', $this->product_model->get_product_info($id));
		$this->template->load('user/product/edit_product');
    }

    function product_update()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('user_model');

        $this->form_validation->set_rules('product_name','Product Name', 'required');
        $this->form_validation->set_rules('quantity','Quantity', 'required|numeric');
        $this->form_validation->set_rules('unit','Unit', 'required');
        $this->form_validation->set_rules('price','Price', 'required|numeric');
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

            $file_name = '';

            // if(!file_exists($_FILES['fileToUpload']['name']) || !is_uploaded_file($_FILES['fileToUpload']['name']))
            if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 4)
            {
                $file_name = $this->input->post('img_file');
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
                        //echo json_encode(array("image" => "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded."));

                        //echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
                    } else {
                        echo json_encode(array("upload" => "Sorry, there was an error uploading your file."));
                        //echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            //print_r($file_name);


            $res = $this->user_model->update_product($this->input->post('product_id'), $file_name);
            if($res){
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }
        }
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
                    'fname' => $user->fname,
                    'fname' => $user->lname,
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

    function user_update()
    {
        //Load Libraries
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('user_model');
        $this->template->set_title('User - Register');

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

            $file_name ='';

            if(file_exists($_FILES['fileToUpload']['tmp_name']) || is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {

                $target_dir = "uploads/user/";
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

                if ($uploadOk == 0) {
                    echo json_encode(array("upload" => "Sorry, your file was not uploaded."));
                    //echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        //echo json_encode(array("image" => "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded."));
                        //echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
                    } else {
                        echo json_encode(array("upload" => "Sorry, there was an error uploading your file."));
                        //echo "Sorry, there was an error uploading your file.";
                    }
                }
            }

            $data = array(
                "image" => $file_name,
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

            $res = $this->user_model->update_user($data);
            if($res){
                echo json_encode(array("success" => TRUE));
            }else{
                echo json_encode(array("success" => FALSE));
            }

    }
}

    function product_add()
	{
        $extra_js = '
            var dateToday = new Date();
            $("#product_availability").daterangepicker({
                minDate: dateToday,
                timePicker: true,
                timePickerIncrement: 1,
                locale: {
                    format: "MM/DD/YYYY h:mm A"
                }
            });
		';

        $this->template->extra_js($extra_js);

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

        if (empty($_FILES['fileToUpload']['name']))
        {
            $this->form_validation->set_rules('fileToUpload', 'Product Image', 'required');
        }
        $this->form_validation->set_rules('product_name','Product Name', 'required');
        $this->form_validation->set_rules('quantity','Quantity', 'required|numeric');
        $this->form_validation->set_rules('threshold','Threshold', 'required|numeric');
        $this->form_validation->set_rules('unit','Unit', 'required');
        $this->form_validation->set_rules('price','Price', 'required|numeric');
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
            $msg = array();
            if($_FILES["fileToUpload"]["error"] == 4) {
            //means there is no file uploaded
                $msg['errors'] = 'Please Upload a Product Image';

            }elseif ($_FILES["fileToUpload"]["error"] != 0) {

                $msg['errors'] = 'Error Uploading Image';

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
                        //echo json_encode(array("image" => "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded."));
                        $date_range = $this->input->post('product_availability');
                        $dates = explode("-", $date_range);

                        $start_date = date('Y-m-d h:i:s', strtotime($dates[0]));
                        $end_date = date('Y-m-d h:i:s', strtotime($dates[1]));

                        $data = array (
                            'threshold' => $this->input->post('threshold'),
                            "user_id" => $this->session->userdata('id'),
                            "image" => $file_name,
                            "name" => $this->input->post('product_name'),
                            "quantity" => $this->input->post('quantity'),
                            "unit" => $this->input->post('unit'),
                            "price" => $this->input->post('price'),
                            "harvest_date" => $this->input->post('harvest_date'),
                            "availability_start" => $start_date,
                            "availability_end" => $end_date,
                            "description" => $this->input->post('description')
                        );

                        $res = $this->user_model->save_product($data);
                        if($res){
                            echo json_encode(array("success" => TRUE));
                        }else{
                            echo json_encode(array("success" => FALSE));
                        }
                        //echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
                    } else {
                        echo json_encode(array("upload" => "Sorry, there was an error uploading your file."));
                        //echo "Sorry, there was an error uploading your file.";
                    }
                }
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
