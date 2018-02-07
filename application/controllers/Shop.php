<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    function __construct(){
        parent::__construct();

        $styles = array(

		);
		$js = array(

		);
		
		$this->template->set_additional_css($styles);
		$this->template->set_additional_js($js);
        
        //$this->_checkLogin();
        $this->template->set_title('AGRIPRENEUR');
        $this->template->set_template('shop');
    }

	function index()
	{
		$this->template->load('shop/index');
	}

	function product_details()
	{
		$this->template->load('shop/product_details');
	}

	function register()
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

		$this->template->load('shop/register');
	}
}
