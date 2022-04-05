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
$route['default_controller']    = 'Site_ctlr';
$route['admin']                 = 'admin/Admin_ctlr'; 

$route['404_override'] = '';

$route['translate_uri_dashes'] = TRUE;



$route['dashboard']           ='admin/Admin_ctlr/dashboard';
$route['farmers']             = 'admin/Admin_ctlr/farmers_list';
$route['slider']              = 'admin/Admin_ctlr/slider_list';
$route['area']                = 'admin/Admin_ctlr/area_list';
$route['category']            = 'admin/Admin_ctlr/category_list';
$route['product']             = 'admin/Admin_ctlr/product_list';
$route['price']               = 'admin/Admin_ctlr/price_list';
$route['store']               = 'admin/Admin_ctlr/store_list';
$route['customer']            = 'admin/Admin_ctlr/customer_list';
$route['order']               = 'admin/Admin_ctlr/order_list';
$route['offer']               = 'admin/Admin_ctlr/offer_list';
$route['register']            = 'admin/Admin_ctlr/register';
$route['deals']               = 'admin/Admin_ctlr/deals_of_the_week';
$route['unit']                = 'admin/Admin_ctlr/unit';
$route['profile/(:any)']      = 'admin/Admin_ctlr/profile/$1';
$route['sale/(:any)']         = 'admin/Admin_ctlr/sale/$1';
$route['farmer_order/(:any)'] = 'admin/Admin_ctlr/farmer_order/$1';
$route['history/(:any)']      = 'admin/Admin_ctlr/history/$1';



$route['home']                          = 'Site_ctlr/index';
$route['index']                         = 'Site_ctlr/index';
$route['about']                         = 'Site_ctlr/about'; 
$route['shop']                          = 'Site_ctlr/shop'; 
$route['product_details/(:any)']        = 'Site_ctlr/product_details/$1';
$route['cart-view']                     = 'Site_ctlr/cart_view';
$route['checkout']                      = 'Site_ctlr/checkout';
$route['products_by_category/(:any)']   = 'Site_ctlr/products_by_category/$1';


$route['contact_submit']                = 'Site_ctlr/contact_submit';
$route['subscribe_submit']              = 'Site_ctlr/subscribe_submit';
$route['brands']                        = 'Site_ctlr/brands';

$route['bundle-offers']                 = 'Site_ctlr/bundle_offer_list';

$route['clearance-sale']                = 'Site_ctlr/bundle_offer_list';

$route['contact-us']                    = 'Site_ctlr/contact';



$route['terms-and-conditions']          = 'Site_ctlr/privacy_policy';



$route['payment']                       = 'Site_ctlr/payment';

$route['receipt']                       = 'Site_ctlr/receipt';

$route['brand/(:any)']                  = 'Site_ctlr/brand_wise_product_list/$1';

$route['category/(:any)']               = 'Site_ctlr/category_wise_product_list/$1';



$route['search']                        = 'Site_ctlr/search';

$route['login']                         = 'Site_ctlr/login';

$route['profile']                       = 'Site_ctlr/profile';
$route['refund_and_cancellation']                       = 'Site_ctlr/refund_and_cancellation';
$route['termsandconditions']                       = 'Site_ctlr/termsandconditions';
$route['privacy_policy']                       = 'Site_ctlr/privacy_policy';



// $route["store/(:any)/(:num)"]                    = 'Site_ctlr/product_details/$1';

// $route['store/(:num)/(:any)']           = 'Site_ctlr/product_details/$1/$2';



 