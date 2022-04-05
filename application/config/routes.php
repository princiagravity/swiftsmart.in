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
$route['default_controller']                    =   'FrontController';
$route['404_override']                          =   '';
$route['login']                                 =   'FrontController/login';
$route['my-account']                            =   'FrontController/my_profile';
$route['logout']                                =   'FrontController/signout';
$route['home']                                  =   'FrontController/index';
$route['cart']                                  =   'FrontController/cart_page';
$route['checkout']                              =   'FrontController/checkout_page';
$route['about']                                 =   'FrontController/about';
$route['contact']                               =   'FrontController/contact';
$route['products']                              =   'FrontController/products';
$route['categories']                            =   'FrontController/category_list';
$route['category/(:any)/(:any)']                =   'FrontController/category_page/$2';
$route['my-orders']                             =   'FrontController/orderslist';
$route['offers']                                =   'FrontController/offerslist';
$route['make-payment/(:any)']                   =   'FrontController/make_payment/$1';
$route['forget-password']                       =   'FrontController/forget_password_view';
$route['change-password']                       =   'FrontController/change_password_view';
$route['single-product/(:any)']                 =   'FrontController/single_product/$1';
$route['single-order/(:any)']                   =   'FrontController/order_details/$1';
$route['qrgenerator/(:any)']                    =   'FrontController/qrgenerator/$1';
$route['otp']                                   =   'FrontController/otp_view';
$route['refund-and-cancellation']               =   'FrontController/refund_and_cancellation';
$route['terms-and-conditions']                  =   'FrontController/termsandconditions';
$route['privacy-policy']                        =   'FrontController/privacy_policy';


$route['translate_uri_dashes'] = FALSE;
