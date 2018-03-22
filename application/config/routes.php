<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Shop Routes
 */
$route['shop/product/(:num)'] = 'shop/product_details/$1';
$route['products/cat/(:num)/sub/(:num)'] = 'shop/products/$1/$2';
$route['products/all'] = 'shop/show_all_products';
$route['shop/register'] = 'shop/register';
$route['login'] = 'shop/login';
$route['user/user_login'] = 'shop/user_login';
$route['user/save'] = 'shop/user_save';
$route ['update/cart/(:num)/(:any)'] = 'shop/update_cart/$1/$2';
$route ['remove/(:any)'] = 'shop/remove/$1';
$route ['place_order'] = 'shop/place_order';
$route['send/sms'] = 'shop/send_sms';


/**
 * User Routes
 */
$route['user'] = 'user';
$route['logout'] = 'user/logout';
$route['user/edit'] = 'user/user_edit';
$route['user/update'] = 'user/user_update';
$route['product/add'] = 'user/product_add';
$route['product/save'] = 'user/product_save';
$route['product/list'] = 'user/product_list';

/**
 * Cart routes
 */
$route['cart/add'] = 'shop/add';
$route['cart/clear'] = 'shop/clear';
$route['cart/view'] = 'shop/view';
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
$route['admin/product/activate/(:num)'] = 'admin/product_activate/$1';
$route['admin/product/deactivate/(:num)'] = 'admin/product_deactivate/$1';
$route['admin/orders/pending'] = 'admin/orders_pending';
$route['admin/orders/accepted'] = 'admin/orders_accepted';
$route['admin/orders/cancelled'] = 'admin/orders_cancelled';
$route['admin/view/order/(:num)'] = 'admin/view_order/$1';
$route['admin/accept/order'] = 'admin/accept_order';
$route['admin/cancel/order'] = 'admin/cancel_order';

//Unit
$route['admin/unit'] = 'admin/unit';
$route['admin/unit/add'] = 'admin/unit_add';
$route['admin/unit/save'] = 'admin/unit_save';


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
