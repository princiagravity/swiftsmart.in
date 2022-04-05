<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
		$this->load->helper('url','form');
        $this->load->library("pagination");
        $this->load->model('front_model');
		$this->load->model('frontpagination_model');
		
    }
	public function index()
	{ 		
		if(! $this->session->userdata('cart_value'))
		{
		$res=$this->front_model->get_cart_list('carttotal');
		if($res)
		{	
		$this->session->set_userdata('cart_value',$res[0]->count);
		}
		else
		{
		$this->session->set_userdata('cart_value',0);
		}
		}
		$data=$this->front_model->get_lists();
		
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}
	
	
	/**products**/
	
	public function products()
	{ 	
		if(! $this->session->userdata('cart_value'))
		{
		$res=$this->front_model->get_cart_list('carttotal');
		if($res)
		{	
		$this->session->set_userdata('cart_value',$res[0]['count']);
		}
		else
		{
		$this->session->set_userdata('cart_value',0);
		}
		}
		$data=$this->front_model->get_lists();
	
		$config = array();
        $config["base_url"] = base_url() . "products";
        $config["total_rows"] = $this->frontpagination_model->get_count();
        $config["per_page"] = 16;
        $config["uri_segment"] = 3;
		
		

        $this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();

        $data['product_list'] = $this->frontpagination_model->get_products($config["per_page"],$page);
        
        //print_r($data['product_list']); exit;  

		$this->load->view('header',$data);
		$this->load->view('products',$data);
		$this->load->view('footer');
	}
	/**end products**/
	
	public function user_login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$requrl=$this->input->post('requrl');
		if($requrl=="")
		{
			$requrl="home";
		}
		$sucess=$this->front_model->check_user_exist($username,$password);
		if($sucess==1)
		{

			$response=array('success'=>$sucess,'redirect_url'=>base_url().$requrl);
		}
		else
		{
			$response=array('success'=>$sucess,'redirect_url'=>'');
		}
		echo json_encode($response);
		die();
	}

	public function login($request="")
	{
		$data['request']="";
		if($this->session->userdata('requestpage'))
		$data['request']=$this->session->userdata('requestpage');	
		$this->load->view('header-intro');
		$this->load->view('login',$data);
		$this->load->view('footer-intro');
	}
	
	
	public function about()
	{
		
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	
	
	public function contact()
	{
		
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	
	
	public function user_signup()
	{
		$data['name']=$this->input->post('name');
		$data['username']=$this->input->post('mobile');
		$data['mobile']=$this->input->post('mobile');
		$data['password']=$this->input->post('password');
		$data['email_id']=$this->input->post('email_id');
		$data['role']=$this->input->post('role');
		
		$sucess=$this->front_model->check_username_exist($data['username']);
		if($sucess==1)
		{
			$response=array('success'=>$sucess,'msg'=>'Already Registered..Please Login');
			
		}
		else
		{
			$res=$this->front_model->check_user_email_exist($data['email_id']);
			if($res)
			{
			 $response=array('success'=>1,'msg'=>'Already Registered..Please Login');
			}
			else
			{
			$result=$this->front_model->insert_user($data);
			if($result)
			{
			$response=array('success'=>$sucess,'msg'=>'Registered Successfully!');
			}
			else
			{
				$response=array('success'=>$sucess,'msg'=>'Registration Failed');
			}
		}
		}
		echo json_encode($response);
		die();
	}

	public function category_list()
	{
		$data1['page_head']="Product Categories";
		$data['category_list']=$this->front_model->get_product_categorylist();
		$this->load->view('header1',$data1);
		$this->load->view('category-list',$data);
		$this->load->view('footer');	
	}
	public function category_page($cat_id="")
	{
		$data['product_list']=$this->front_model->get_productfull_list($cat_id);
		$data1['page_head']=$this->front_model->get_category_name($cat_id);
		$this->load->view('header1',$data1);
		$this->load->view('product-list',$data);
		$this->load->view('footer');
		
	}
	public function cart_page($user_id="")
	{
		/* print_r($this->session->userdata('cart_total')); exit; */
		$data=array();
		$data['cart_list']=$this->front_model->get_cart_list('products');
		$data['min_order_delivery']=$this->front_model->get_minimum_order();
		$data1['page_head']='My Cart';
		$this->load->view('header1',$data1);
		$this->load->view('cart',$data);
		$this->load->view('footer');
		
	}
	public function checkout_page($user_id="")
	{
		$login=$this->front_model->is_user_loggedin();
		if($login)
		{
		$data['delivery']=0;	
		$data['extra_delivery']=0;
		$data['delivery_tax']=0;
		$actual_total=$this->input->post('actual_total');
		$min_order=$this->input->post('min_order');
		$extra_delivery=$this->input->post('extra_delivery');
		$del=$this->input->post('delivery_extra');
		if($del=='extra')
		{
			$data['extra_delivery']=$extra_delivery;
		}
		
		$data['items_total']=$actual_total;
		//$data['items_total']=round($actual_total/1.05,2);
		$data['tax_amount']=round($actual_total-$data['items_total'],2);
		/* $data['mobile']=$this->input->post('mobile'); */
		$user_id=$this->session->userdata('user_id');
		$data['customer']=$this->front_model->get_user_additional_data($user_id);
		if($data['customer'])
		{
			$delivery=$this->front_model->get_delivery_charge($data['customer']->area);
			$delivery=$data['extra_delivery']+$delivery;
			
			if($delivery)
			{
				$data['delivery']=round($delivery/1.05,2);
				$data['delivery_tax']=round($delivery-$data['delivery'],2);
			}
			
		}
		$data['discount']=0;
		if($this->session->userdata('discount'))
		{
		$data['discount']=$this->session->userdata('discount');
		$total=round(($data['items_total']-$data['discount'])/1.05,2);
		$data['tax_amount']=round($data['items_total']-$data['discount'],2)-round($total,2);
		}
		$data['arealist']=$this->front_model->get_arealist();
		$data['promolist']=$this->front_model->get_promocodes();
		/* $data['promocode']="";
		if($this->session->userdata('promocode'))
		{
		$data['promocode']=$this->front_model->check_promocode($this->session->userdata('promocode'));
		} */
		$this->load->view('header');
		$this->load->view('checkout',$data);
		$this->load->view('footer');
	}
	else
	{
		$this->session->set_userdata('requestpage','cart');
		redirect('login');
	}


		
	}
	public function search_product()
	{
		$key=$this->input->post('key');
		$result=$this->front_model->get_search_productlist($key);
		echo json_encode($result);

	}
	public function offerslist()
	{
		$data['offerslist']=$this->front_model->get_offers();
		$this->load->view('header');
		$this->load->view('offers',$data);
		$this->load->view('footer');
	}
	
	
	public function orderslist()
	{
		$login=$this->front_model->is_user_loggedin();
		if($login)
		{
		$user_id=$this->session->userdata('user_id');	
		$data['orderslist']=$this->front_model->get_orders($user_id);
		foreach($data['orderslist'] as $index=>$value)
		{
			$value->status_name=$this->front_model->get_status_name($value->status);
		}
		$this->load->view('header');
		$this->load->view('orders',$data);
		$this->load->view('footer');
		}
		else
		{
		$this->session->set_userdata('requestpage','my-orders');
		redirect('login');
		}

	}

	public function order_success()
	{
		$this->load->view('order-success');
	}
	public function single_product($prod_id="")
	{
		$data['prod_detail']=$this->front_model->get_single_product($prod_id);
		if($data['prod_detail'])
		{
		$data['variants']=$this->front_model->get_secondary_product_det($prod_id);
		$data['addons']=$this->front_model->get_addons($data['prod_detail']->category);
		//$data1['page_head']='Product Details';
		$this->load->view('header1');
		$this->load->view('single-product',$data);
		$this->load->view('footer');
		}
		else
		{
			redirect('home');
		}
	}
	public function view_pages($page_name)
	{
		$this->load->view('header');
		$this->load->view($page_name);
		$this->load->view('footer');

	}

	public function add_to_cart()
	{
		$total=0;
		$cart_count=0;
		$variants=$this->input->post('variants');
		$data['product_id']=$this->input->post('prod_id');
		$data['name']=$this->input->post('prod_name');
		$addon_price=$this->input->post('addon_tot');
		$addon=$this->input->post('add_on');	
		$data1['cart_id']=$this->front_model->insert_cart($data);
		if($data1['cart_id'])
		{
		$data1['product_id']=$data['product_id'];
		$data1['product_name']=$data['name'];
		$data1['product_image']=$this->front_model->get_product_image($data['product_id']);
		$data1['product_variant']=$this->input->post('variants');
		$data1['product_price']=$this->input->post('price');
		$data1['product_count']=$this->input->post('quantity');
		$data1['product_total']=$data1['product_price']*$data1['product_count'];
		$total=$total+$data1['product_total'];
		$cart_count=$cart_count+$data1['product_count'];
		$data1['type']='product';
		$result1=$this->front_model->insert_carted_item_details($data1);
		if($addon_price !=0)
		{
			$data=array();
			$data1=array();
			$add_on=json_decode($addon,true);
			foreach($add_on as $index=>$value)
			{
			$data['product_id']=$value['addon_id'];
			$data['name']=$value['addon_name'];	
		
			$data1['cart_id']=$this->front_model->insert_cart($data);
			
			if($data1['cart_id'])
			{
			$data1['product_id']=$value['addon_id'];
			$data1['product_name']=$value['addon_name'];
			$data1['product_price']=$value['addon_price'];
			$data1['product_count']=$value['addon_count'];
			$data1['product_total']=$data1['product_count']*$data1['product_price'];
			$total=$total+$data1['product_total'];
			$cart_count=$cart_count+$data1['product_count'];
			$data1['type']='addon';
			$result2=$this->front_model->insert_carted_item_details($data1);
			}
			}
			
		}
		}
		if($result1){
			$res=$this->front_model->get_cart_list('carttotal');
			if($this->session->userdata('cart_total'))
			{
				$this->session->set_userdata('cart_total',$this->session->userdata('cart_total')+$total);
			}
			else
			{
				$this->session->set_userdata('cart_total',$res[0]->total);
			}
			if($this->session->userdata('cart_value'))
			{
				$this->session->set_userdata('cart_value',$this->session->userdata('cart_value')+$cart_count);
			}
			else
			{
				$this->session->set_userdata('cart_value',$res[0]->count);
			}
			
		}
		echo $result1;
	
	}

	public function get_product_sec_details()
	{
		$data['variant_id']=$this->input->post('variant_id');
		$data['prod_id']=$this->input->post('prod_id');
		$result=$this->front_model->get_product_sec_details($data);
		echo json_encode($result);
	}
	public function order_details($order_id)
	{
		$data=array();
		$data=$this->front_model->get_single_order($order_id);
		$data['item_list']=$this->front_model->get_singlee_order($order_id);
		$this->load->view('header');
		$this->load->view('order_details',$data);
		$this->load->view('footer');
	}

	public function get_delivery_charge($area="")
	{
		$area=$this->input->post('area');
		$charge=$this->front_model->get_delivery_charge($area);
		echo $charge;
	}

	public function apply_coupon()
	{
		$promo=array();
	/* 	$this->session->set_userdata('discount',0);
		$this->session->set_userdata('promoid',''); */
		$amount=$discount=$del_charge=$selpromo=0;
		$data['promocode']=$this->input->post('promocode');
		$data['phone_no']=$this->input->post('phone_no');
		$del_charge=$this->input->post('del_charge');
		$subtot=$this->input->post('subtot');
		$amount=$del_charge+$subtot;

		
		$result=$this->front_model->check_promocode($data['promocode'],$data['phone_no']);
		$status="null";
		$disc=0;
		
		if( count($result) > 0)
    	{
		
       if($amount>=$result[0]['min_order'])
       {
       if($result[0]['user_usage'] != 'null')
       {
		   if($result[0]['user_usage'] <= $result[0]['no_of_usage'] && $result[0]['user_usage'] !=0)
		   {
        if($result[0]['promo_category']=='tcv')
        {		
				$discount=$result[0]['value'];
                $amount=$amount-$result[0]['value'];
		
        }
        else if($result[0]['promo_category']=='perc')
        {
				$discount=$amount*($result[0]['value']/100);
				if($discount >$result[0]['max_discount'] )
				{
					$discount=$result[0]['max_discount'];
				}
                $amount=$amount-($amount*($result[0]['value']/100));
	
        }
		else if($result[0]['promo_category']=='items')
		{
			$name="";
			$carted_products=$this->front_model->get_cart_list('products');
			/* print_r($carted_products); exit; */
			$products=json_decode($result[0]['products']);
		
			$total="";
			$no=true;
			$yes=false;
			foreach($carted_products as $cart)
			{
			
			  if(in_array($cart->product_id,$products))
					{
						$yes=true;
					if($cart->product_total  >= $result[0]['min_order'])	
					{
						$val=$amount*($result[0]['value']/100);
						if($val >$result[0]['max_discount'])
						{
							$val=$result[0]['max_discount'];
						}
						$discount=$discount+$val;
					}
					else
					{
						$name=$name.'-'.$cart->product_name;
						$status="You should purchase $name for Rs ".$result[0]['min_order']." minimum to use this promocode";
					}
					
					}
					else
					{
						
						$no=false;
					}
			
			}
			if($yes==false and $no==false)
			{
				$status="You should purchase ( ".implode(' OR ',$result[0]['product_names'])." )to use this promocode";
			}
			
		
		
		$amount=$amount-$discount;
		/* $this->front_model->update_promocode_usage($result[0]['id'],$data['phone_no']); */
	
	}
	
		
       }
	   else
	   {
			$status="No. Of Usage Exceeded";  
	   }
	}
       else
       {
        $status="You are not allowed to use this promocode";       
       }}
       else
       {
        $status= "You should purchase for Rs ".$result[0]['min_order']." minimum to use this promocode";
       }
    }
    else
    {
		$status= "Invalid Promocode";    
    }
	$this->session->set_userdata('discount',round($discount,2));
	$this->session->set_userdata('promoid',$data['promocode']);
	$disc=$this->session->userdata('discount');
	$this->session->set_userdata('cart_total',$amount-$del_charge);
	echo json_encode(array('status'=>$status,'discount'=>$disc,'total'=>$amount));
	}

	

	public function confirm_payment()
	{
		/* $login=$this->front_model->is_user_loggedin();
		if($login)
		{ */
		$data=array();
		$data1=array();
		$customer_id=$this->input->post('id');
		
		$data['user_id']=$this->session->userdata('user_id');
		$data['email_id']=$this->input->post('email_id');
		$data['area']=$this->input->post('area');
		$data['address']=$this->input->post('address');
		$data['addresstype']=$this->input->post('addresstype');
		$data['loc_latitude']=$this->input->post('latitude');
		$data['loc_longitude']=$this->input->post('longitude');
		$data['role']='customer';
		if($customer_id !="")
		{
			$data['id']=$customer_id;
			$this->front_model->update_user_additional_data($data);
		}
		else
		{
			$data['name']=$_SESSION['userdata']['name'];
			$data['mobile']=$_SESSION['userdata']['mobile'];
			$customer_id=$this->front_model->insert_user_additional_data($data);
		}

		$data1['payment_type']=$this->input->post('payment_type');
	/* 	$data1['delivery_type']=$this->input->post('delivery_type'); */
		$data1['customer_id']= $data['user_id'];
		$data1['area']=$data['area'];
		$data1['loc_latitude']=$this->input->post('latitude');
		$data1['loc_longitude']=$this->input->post('longitude');
		$data1['status']=$this->input->post('status');
		$data1['items']=$this->front_model->get_cart_items();
		$data1['cart_total']=$this->input->post('cart_total');
		$data1['discount']=$this->input->post('discount');
		$data1['order_total']=$this->input->post('order_total');
		$data1['delivery_charge']=$this->input->post('delivery_charge');
		$data1['delivery_tax']=$this->input->post('delivery_tax');
		$data1['invoice_no']="INV-".rand(1,100);
		$data1['tax']=$this->input->post('tax');
		$data1['tax_amount']=$this->input->post('tax_amount');
		$order_id=$this->front_model->insert_order_details($data1);

		
		$cart_id=$this->front_model->get_cart_id();
		if($cart_id !='' && $order_id !="")
		{
		foreach($cart_id as $cart)
		{
			$this->front_model->update_carted_items($cart->id,$order_id);
		}

		$maildata['name']=$_SESSION['userdata']['name'];
		$maildata['email_id']=$data['email_id'];
		$maildata['discount']=$data1['discount'];
		$maildata['cart_total']=$data1['cart_total'];
		$maildata['tax_amount']=$data1['tax_amount'];
		$maildata['delivery_charge']=$data1['delivery_charge'];
		$maildata['delivery_tax']=$data1['delivery_tax'];
		$maildata['order_total']=$data1['order_total'];
		$maildata['items']=$this->front_model->get_ordereditem_details($order_id);
		$maildata['order_id']=$order_id;

		//$success=$this->send_success_mail($maildata);

	
		}
		if($order_id >0 && $customer_id)
		{
			$this->session->set_userdata('cart_value',0);
			$status=$this->front_model->delete_cart();
			$res['status']='success';
		$res['redirect_url']=base_url().'make-payment/'.$order_id;
		//$res['redirect_url']=base_url().'index.php/FrontController/orderslist';
	//	$g_pay= 'upi://pay?pa=swiftmicro@fbl&pn=swiftmart&am='.$maildata['cart_total'];	

//$res['redirect_url']=('https://api.whatsapp.com/send?phone=919746440467&text=%2ANew+Order+%3A+%230'.$maildata['order_id'].'%2A%0A%2A%28Home+Delivery%29%2A%0A%0A_Total+items%3A_+%2A'.$j.'%2A%0A%2A%2A+-+'.$maildata['items'].'++%0A%0ATotal+Payable%3A+%2A%E2%82%B9'.$maildata['cart_total'].'%0A%0A%2A_Name%3A_%2A%0A'.$maildata['name'].'%0A%2A_Mobile%3A_%2A%0A'.$data['mobile'].'%0A%2A_Address%3A_%2A%0A'.$data['address'].'%0A%0A%2A_Location%3A_%2A%0Ahttps%3A%2F%2Fwww.google.com%2Fmaps%3Fq%3D10.8505159%2C76.2710833%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0APlease+confirm+via+reply%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%0A%2AMake+Payment%2A%0A'.$g_pay);
		
//$res['redirect_url']=('https://api.whatsapp.com/send?phone=919746440467&text=%2ANew+Order+%3A+%230'.$maildata['name'].'%2A%0A%2A%28Home+Delivery%29%2A%0A%0A_Total+items%3A_+%2A'.$maildata['name'].'%2A%0A%2A%2A+-+'.$maildata['name'].'++%0A%0ATotal+Payable%3A+%2A%E2%82%B9'.$maildata['name'].'%2A%0A%0A%2A_Order+Note%3A_%2A%0A'.$maildata['name'].'%0A%0A%2A_Name%3A_%2A%0A'.$maildata['name'].'%0A%2A_Mobile%3A_%2A%0A'.$maildata['name'].'%0A%2A_Address%3A_%2A%0A'.$maildata['name'].'%0A%0A%2A_Location%3A_%2A%0Ahttps%3A%2F%2Fwww.google.com%2Fmaps%3Fq%3D10.8505159%2C76.2710833%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0APlease+confirm+via+reply%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%0A%2AMake+Payment%2A%0A'.$g_pay);
		
//$res['redirect_url']=('https://upi://pay?pa=swiftmicro@fbl&pn=swiftmart&am='.$maildata['order_total']);		    
		}
		else
		{
			$res['status']='failed';
		}
		$this->session->set_userdata('cart_total',0);
		$this->session->set_userdata('discount',0);
		$this->session->set_userdata('promocode','');
		echo json_encode($res);

	}
	
	public function make_payment($order_id)
	{
		$login=$this->front_model->is_user_loggedin();
		if($login)
		{
		$user_id=$this->session->userdata('user_id');	
		$data['orderslist']=$this->front_model->recentorders($order_id);
		foreach($data['orderslist'] as $index=>$value)
		{
			$value->status_name=$this->front_model->get_status_name($value->status);
		}
		$this->load->view('header');
		$this->load->view('make_payment',$data);
		$this->load->view('footer');
		}
	}

	public function send_success_mail($data)
	{
		$config=array(
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'priority' => '1'
		);

		$this->email->initialize($config);
		$this->email->from('jyothsnamj7@gmail.com', 'Order Success Mail');
		$this->email->to($data['email_id']);
		$this->email->subject('Order Success Mail');
		$emaildescription=$this->load->view('email/order_confirm_mail',$data,TRUE);
		$this->email->message($emaildescription);
		$result=$this->email->send();   
		$this->email->from('orderreceived@gravity.com', 'New Order Received Mail');
		$this->email->to('princiaks@gmail.com');
		$this->email->subject('Order Success Mail');
		$emaildescription=$this->load->view('email/order_received_mail',$data,TRUE);
		$this->email->message($emaildescription);
		$result=$this->email->send();   
		return $result;
	}

	public function deleteproduct_from_cart()
	{
		$data['cart_id']=$this->input->post('cart_id');
		$data['product_id']=$this->input->post('product_id');
		$data['type']=$this->input->post('type');
		$data['product_total']=$this->input->post('total');
		$data['actual_tot']=$this->input->post('actual_tot');
		$data['product_count']=$this->input->post('product_count');
		$result=$this->front_model->deleteproduct_from_cart($data);
	}

	public function update_carted_product_count()
	{
		$data['quantity']=$this->input->post('quantity');
		$data['cart_id']=$this->input->post('cart_id');
		$result=$this->front_model->update_carted_product_count($data);

	}
	public function signout()
	{
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
                $this->session->unset_userdata($key);
		}
    $this->session->sess_destroy();
    redirect('home');
		
	}

	public function download_receipt()
	{
		$data=array();
		$params=array('invoice_no','order_id','order_date','customer_name','customer_ph','customer_address','total_count','tax','tax_amount','order_total','delivery_boy','subtotal','discount','del_charge','del_tax');
	
		foreach($params as $param)
		{
			$data[$param]=$this->input->post($param);
		}
		$items=$this->front_model->get_ordered_product_list($data['order_id']);
	
		$this->fpdf->Image(base_url().'/public_html/img/logo.png',10,2,15);
		$this->fpdf->SetFont('Times','B',10);
		$this->fpdf->Cell(65,2,'Swiftsmart',0,1,'C');
		$this->fpdf->Cell(65,1,'',0,1);
		$this->fpdf->SetFont('Times','B',6);
		$this->fpdf->Cell(65,2,'Swiftsmart',0,1,'C');
		$this->fpdf->SetFont('Times','',5);
		$this->fpdf->Cell(65,2,'Thrissur,Kerala',0,1,'C');
	//	$this->fpdf->Cell(65,2,'Tel:06-7474550, Mob:052 520 3040',0,1,'C');
		$this->fpdf->Cell(65,2,'swiftsmart@gmail.com',0,1,'C');
		$this->fpdf->Cell(65,2,'TRN : 100492247000003',0,1,'C');
		$this->fpdf->Cell(65,2,'TAX INVOICE',0,1,'C');
		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1);
		$this->fpdf->Cell(20,1,'',0,1);
		$this->fpdf->Cell(15,2,'Invoice No:',0,0);
		$this->fpdf->Cell(20,2,$data['invoice_no'],0,0);
		$this->fpdf->Cell(5,2,'Date:',0,0);
		$this->fpdf->Cell(20,2,$data['order_date'],0,1);
		$this->fpdf->Cell(15,2,'Customer Name:',0,0);
		$this->fpdf->Cell(25,2,$data['customer_name'],0,1);
		$this->fpdf->Cell(15,2,'Address:',0,0);
		$this->fpdf->Cell(45,2,$data['customer_address'],0,1);
		$this->fpdf->Cell(15,2,'Customer Mob:',0,0);
		$this->fpdf->Cell(25,2,$data['customer_ph'],0,1);

		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1);

		$this->fpdf->Cell(35,2,'Item',0,0);
		$this->fpdf->Cell(20,2,'Price',0,0);
		$this->fpdf->Cell(10,2,'Value',0,1);
		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1);
		if($items)
		{
			foreach($items as $index=>$value)
			{
				$this->fpdf->Cell(35,2,$value->product_name,0,0);
				$this->fpdf->Cell(10,2,$value->product_price,0,0);
				$this->fpdf->Cell(5,2,'X '.$value->product_count,0,0);
				$this->fpdf->Cell(10,2,$value->product_total,0,1,'R');

			}
		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1);
		$this->fpdf->Cell(10,1,'',0,1);
		$this->fpdf->Cell(50,2,'Subtotal:',0,0);
		$this->fpdf->Cell(10,2,$data['subtotal'],0,1,'R');
		$this->fpdf->Cell(50,2,'Promo Disc:',0,0);
		$this->fpdf->Cell(10,2,$data['discount'],0,1,'R');
		$this->fpdf->Cell(50,2,'Taxes:',0,0);
		$this->fpdf->Cell(10,2,$data['tax_amount'],0,1,'R');
		$this->fpdf->Cell(50,2,'Delivery Charge:',0,0);
		$this->fpdf->Cell(10,2,$data['del_charge'],0,1,'R');
		$this->fpdf->Cell(50,2,'Tax For Delivery:',0,0);
		$this->fpdf->Cell(10,2,$data['del_tax'],0,1,'R');
		
		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1); 
		$this->fpdf->SetFont('Times','B',6);
		$this->fpdf->Cell(15,2,'',0,0);
		$this->fpdf->Cell(40,2,'Total',0,0);
		$this->fpdf->Cell(5,2,$data['order_total'],0,1,'R');
		$this->fpdf->Cell(60,1,'--------------------------------------------------------------------------------------',0,1);
		$this->fpdf->SetFont('Times','I',4);
		$this->fpdf->Cell(10,2,'Delivery Boy:',0,0);
		$this->fpdf->Cell(30,2,$data['delivery_boy'],0,0);
		}




		


$filename = $data['invoice_no'].'.pdf';

if (!is_dir( 'pdfs/tax_invoice')) {
mkdir('pdfs/tax_invoice', 0777, TRUE);		   
}
$this->fpdf->Output( 'pdfs/tax_invoice/'. $filename, 'F'); 
echo json_encode(array(
'path' => 'pdfs/tax_invoice/'. $filename,
'url'  => base_url( 'pdfs/tax_invoice/' . $filename )
));

	}

	public function forget_password_view()
	{
		$this->load->view('header-intro');
		$this->load->view('forgot-password');
		$this->load->view('footer-intro');

	}

	public function forgot_password()
	{
		$message="";
		$this->load->library('email');
		$email=$this->input->post('email');
		$result=$this->front_model->check_user_email_exist($email);
		if($result)
		{
			$data['otp']=rand(1000,9999);
			$data['name']=$result->name;
		
			$data['email']=$email;


			
		$config=array(
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'priority' => '1'
		);

		$this->email->initialize($config);
		$this->email->from('info@swiftmart.in', 'Forgot Password');
		$this->email->to($email);
		$this->email->subject('Forgot Password Mail');
		$emaildescription=$this->load->view('email/forgot_password',$data,TRUE);
		$this->email->message($emaildescription);
		$result1=$this->email->send(); 
	/* 	$result1=1; */   
		if($result1)
		{
			$message="";
			$this->session->set_userdata('fp_otp',$data['otp']);
			$this->session->set_userdata('fp_email',$email);
		
		}
		}
		else
		{
			$message="Email Id Not Fround";
		}

		echo json_encode(array('message'=>$message,'otp'=>$this->session->userdata('fp_otp')));

	}

	public function otp_check()
	{
		$redirect="";
		$message="";
		$otp=$this->input->post('otp');
		if($this->session->userdata('fp_otp'))
		{
			if($this->session->userdata('fp_otp')==$otp)
			{
				$redirect=base_url().'change-password';
				$message="success";
			}
			else
			{
				$message="OTP entered is incorrect";
			}
		}


		echo json_encode(array('redirect'=>$redirect,'message'=>$message));

	}

	public function change_password_view()
	{
	$this->load->view('header-intro');	
	$this->load->view('change-password');	
	$this->load->view('footer-intro');	

	}
	public function change_password()
	{
		if($this->session->userdata('fp_otp'))
		{
		$data['email']=$this->session->userdata('fp_email');
		$data['password']=$this->input->post('password');
		$result=$this->front_model->update_password($data);
		echo $result;
		}

	}
	public function otp_view()
	{
	$this->load->view('header-intro');	
	$this->load->view('otp-check');	
	$this->load->view('footer-intro');
	}

	public function my_profile()
	{
		$user=$this->front_model->is_user_loggedin();
		if($user)
		{
			$userid=$this->session->userdata('user_id');
			$data['userdetails']=$this->front_model->get_user_details($userid);
			$this->load->view('header');
			$this->load->view('user-profile',$data);	
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
			
	}
	
	
	public function privacy_policy()
	{
	$this->load->view('header');	
	$this->load->view('privacy_policy');	
	$this->load->view('footer');	

	}
	
		
	public function refund_and_cancellation()
	{
	$this->load->view('header');	
	$this->load->view('refund_and_cancellation');	
	$this->load->view('footer');	

	}
	
		
	public function termsandconditions()
	{
	$this->load->view('header');	
	$this->load->view('termsandconditions');	
	$this->load->view('footer');	

	}
	
	
	public function qrgenerator($order_id){
		$this->load->library('ciqrcode');
		//$this->load->library('qrcode/qrlib');
		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']     = ''; //string, the default is application/cache/
		$config['errorlog']     = ''; //string, the default is application/logs/
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224,255,255); // array, default is array(255,255,255)
		$config['white']        = array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);
		//Create QR code image create
        $data['orderslist']=$this->front_model->recentorders($order_id);
		foreach($data['orderslist'] as $order){
		$order_total=$order->order_total;
		$params['data']  = 'upi://pay?pa=swiftmicro@fbl&pn=swiftmart&am='.$order_total;
		}
		//$params['level'] = $this->input->post('qr_level');
		$params['size'] = 10;
		$data['image_name'] = sha1($params['data'].time()).'.png';
		$params['savename'] = FCPATH.'assets/QR/'.$data['image_name'];
		$this->ciqrcode->generate($params);
		$this->load->view('header');
		$this->load->view('make_payment',$data);
		$this->load->view('footer');

	}
	

}
