<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/**
 * Shop Routes
 */
$route['shop/product'] = 'shop/product_details';
$route['shop/register'] = 'shop/register';

/**
 * User Routes
 */
$route['user'] = 'user';
$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['user/user_login'] = 'user/user_login';
$route['user/save'] = 'user/user_save';
$route['user/edit'] = 'user/user_edit';
$route['product/add'] = 'user/product_add';
$route['product/save'] = 'user/product_save';
$route['product/list'] = 'user/product_list';

/**
 * Product routes
 */

 /**
  * Admin routes
  */
$route['admin'] = 'admin';

$route['admin/sample'] = 'admin/sample_route';
//Add Product
$route['admin/product'] = 'admin/product';
$route['admin/product/add'] = 'admin/product_add';
$route['admin/product/save'] = 'admin/product_save';
$route['admin/product/category/add/(:num)'] = 'admin/product_add_category/$1';
$route['admin/subcategory/list/(:num)'] = 'admin/category_list/$1';
$route['admin/product/category/save'] = 'admin/product_category_save';

// Category
$route['admin/category'] = 'admin/category';
$route['admin/category/add'] = 'admin/category_add';
$route['admin/category/save'] = 'admin/category_save';
$route['admin/category/edit/(:num)'] = 'admin/category_edit/$1';
$route['admin/category/update'] = 'admin/category_update';
// Sub Category
$route['admin/subcategory'] = 'admin/sub_category';
$route['admin/subcategory/add'] = 'admin/sub_category_add';
$route['admin/subcategory/save'] = 'admin/sub_category_save';
$route['admin/subcategory/edit/(:num)'] = 'admin/sub_category_edit/$1';
$route['admin/subcategory/update'] = 'admin/sub_category_update';

$route['default_controller'] = 'shop';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
