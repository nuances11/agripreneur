<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct(); 

        $styles = array(

		);
		$js = array(

		);
		
		$this->template->set_additional_css($styles);
		$this->template->set_additional_js($js);
        
        //$this->_checkLogin();
        $this->template->set_title('User - Dashboard');
        $this->template->set_template('user');
    }

    function index()
	{
		$this->template->load('user/index');
	}
}