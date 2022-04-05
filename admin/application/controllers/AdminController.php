<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
        $this->load->model('admin_model');
		if ( ! $this->session->userdata('user_id') && !$this->session->userdata('user_id')==1)
		{ 
			// Allow some methods?
			$allowed = array(
				'index','user_login'
			);
			if ( ! in_array($this->router->fetch_method(), $allowed))
			{
				redirect('AdminController');
			}
		}
    }
	public function index()
	{
		if($this->session->userdata('user_id')==1)
		{
		$table_name='order_details';
		$columns='id,customer_id,order_time,order_total,payment_type,items,area,status,delivery_boy_id';
		$limit=100;
		$list=$this->admin_model->get_lists($table_name,$columns,$limit);
		$count=$this->admin_model->get_dashboard_count();
		foreach($list as $index=>$value)
		{
			$value->area_name=$this->admin_model->get_area_name($value->area);
			$value->status_name=$this->admin_model->get_status_name($value->status);
			
			if($value->delivery_boy_id=="")
			{
				if($value->payment_type=="take away")
				{
				$value->delivery_boy_name="Take Away";	
				}
				else
				{
				$value->delivery_boy_name="Not Assigned";
				}
			}
			else
			{
				$value->delivery_boy_name=$this->admin_model->get_deliveryboy_name($value->delivery_boy_id);
			}
			if($value->items !='')
			{
				$items=json_decode($value->items);
				$array=array();
				$i=0;
				foreach($items as $item)
				{
					$array[$i]=$item->name;
					$i++;
				}
				$items=array_unique($array);
				$value->items=$items;
			}
			
			$value->customer_details=$this->admin_model->get_single_customer($value->customer_id);

		}
		
		$data['order_list']=$list;
		$data['dash_count']=$count;
		$data['min_order_delivery']=$this->admin_model->get_minimum_order();
        $this->load->view('header');
        $this->load->view('dashboard',$data);
		$this->load->view('footer');
	}
	else
	{
		$this->load->view('header-intro');
		$this->load->view('login');
		//$this->load->view('footer');
	}
		
	}

	public function user_login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
	
		$sucess=$this->admin_model->check_user_exist($username,$password);
		if($sucess==1)
		{

			$response=array('success'=>$sucess,'redirect_url'=>base_url().'index.php/AdminController/');
		}
		else
		{
			$response=array('success'=>$sucess,'redirect_url'=>'');
		}
		echo json_encode($response);
		die();
	}

	public function user_logout()
	{
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
                $this->session->unset_userdata($key);
		}
    	$this->session->sess_destroy();
		redirect('AdminController');
	}
    public function view_pages($page_name)
    {
		$id="";
		$page_name=$this->uri->segment(3);
		if($this->uri->segment(4))
		{
			$id=$this->uri->segment(4);
		}
		$id=$this->uri->segment(4);
		$data=array();
		$data['update']="";
        $this->load->view('header');
		if($page_name=='add-product')
		{
			if($id != "")
			{

			$single['table']=array('product_details','product_secondary_details');
			$single['columnlist']=array(array('*'),array('*'));
			$single['where']=array('id='.$id,"product_id=".$id."  and status!='Deleted'");
			$single['type']='products';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$data['categories']=$this->admin_model->get_categories();
			$data['variantslist']=$this->admin_model->get_variants();
			$table_name='product_details';
			$columns='id,name,category,status,p_display,product_display';
			$limit=500;

			$list=$this->admin_model->get_lists($table_name,$columns,$limit);
			foreach($list as $index=>$value)
			{
				$value->category=$this->admin_model->get_category_name($value->category);
			}
			$data['productlist']=$list;
		}
		else if($page_name=='add-addon')
		{
			
			if($id != "")
			{
			$single['table']='addon_details';
			$single['columnlist']='*';
			$single['where']="id=".$id;	
			$single['type']='addon';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$data['categories']=$this->admin_model->get_categories();
			$table_name='addon_details';
			$columns='id,name,category,status';
			$limit=5;
			$list=$this->admin_model->get_lists($table_name,$columns,$limit);
			foreach($list as $index=>$value)
			{
				$value->category=$this->admin_model->get_category_name($value->category);
			}
			$data['addonlist']=$list;
		}
		else if($page_name=='add-promocodes')
		{
			if($id != "")
			{
			$single['table']='promocode_details';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='promocode';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$data['categories']=$this->admin_model->get_categories();
			$table_name='offer_details';
			$columns='id,name';
			$limit=100;
			$data['offerlist']=$this->admin_model->get_lists($table_name,$columns,$limit);

			$table_name='product_details';
			$columns='id,name';
			$limit="";
			$data['productlist']=$this->admin_model->get_lists($table_name,$columns,$limit);
			
			$table_name='promocode_details';
			$columns='id,promo_code,no_of_usage,status';
			$limit=100;
			$orderby='ORDER BY field(status,"Hidden") DESC';

			$data['promocodelist']=$this->admin_model->get_lists($table_name,$columns,$limit,$orderby);
		}
		else if($page_name=="add-offers")
		{
			if($id != "")
			{
			$single['table']='offer_details';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='offers';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='offer_details';
			$columns='id,name,description,image_url';
			$limit=5;
			$data['offerlist']=$this->admin_model->get_lists($table_name,$columns,$limit);

		}
		else if($page_name=='add-delivery-charge')
		{
			if($id != "")
			{
			$single['table']='delivery_charge_master';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='deliverycharge';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$data['arealist']=$this->admin_model->get_arealist();
			$table_name='delivery_charge_master';
			$columns='id,area,charge,status';
			$limit=5;
			$list=$this->admin_model->get_lists($table_name,$columns,$limit);
			foreach($list as $index=>$value)
			{
				$value->area=$this->admin_model->get_area_name($value->area);
			}
			$data['chargelist']=$list;
		}
		else if($page_name=='add-slider')
		{
			if($id != "")
			{
			$single['table']='slider_details';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='slider';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='slider_details';
			$columns='id,name,link,image_url';
			$limit=5;
			$data['sliderlist']=$this->admin_model->get_lists($table_name,$columns,$limit);
		}
		else if($page_name=='add-variants')
		{
			if($id != "")
			{
			$single['table']='variants_master';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='variants';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='variants_master';
			$columns='id,name,status';
			$limit=50;
			$data['variantlist']=$this->admin_model->get_lists($table_name,$columns,$limit);

		}
		else if($page_name=='add-categories')
		{
			if($id != "")
			{
			$single['table']='category_master';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='category';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='category_master';
			$columns='id,name,status,image_url';
			$limit=50;
			$data['categorylist']=$this->admin_model->get_lists($table_name,$columns,$limit);

		}
		else if($page_name=='add-delivery-area')
		{
			if($id != "")
			{
			$single['table']='area_master';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='area';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='area_master';
			$columns='id,name,status';
			$limit=5;
			$data['arealist']=$this->admin_model->get_lists($table_name,$columns,$limit);

		}
		else if($page_name=='add-delivery-boy')
		{
			if($id != "")
			{
			$single['table']='delivery_boy_details';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='deliveryboy';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='delivery_boy_details';
			$columns='id,name,mobile,status';
			$limit=5;
			$data['del_boyslist']=$this->admin_model->get_lists($table_name,$columns,$limit);

		}
		else if($page_name=='customer')
		{
			$table_name='user_add_details';
			$columns='id,user_id,name,mobile,address,profile_pic,email_id,area';
			$limit=50;
			$data['customers_list']=$this->admin_model->get_customer_list($table_name,$columns,$limit);
			foreach($data['customers_list'] as $index=>$value)
			{
				if($value->area == "")
				{
					$value->area_name="Undefined";
				}
				else
				{
					$value->area_name=$this->admin_model->get_area_name($value->area);
				}
				
			}
		}
		
        $this->load->view($page_name,$data);
		$this->load->view('footer');

    }

	
	public function reports()
	{
		$this->load->view('header');
	/* 	$table_name='order_details';
		$columns='id,customer_id,order_time,order_total,items,area';
		$limit=10; */
		$data['boyslist']=$this->admin_model->get_all_deliveryboys();
		$data['orders']=$this->admin_model->get_report();
		$this->load->view('view-report',$data);

		$this->load->view('footer');
	}
	public function product_reports()
	{
		$data['productlist']=$this->admin_model->get_all_product_report();
		$this->load->view('header');
		$this->load->view('product-report',$data);
		$this->load->view('footer');
	}
	public function get_report_result()
	{
		$data['from']=$this->input->post('fromdate');
		$data['to']=$this->input->post('todate');
		$data['delivery_boy']=$this->input->post('delivery_boy');
		$data['payment_type']=$this->input->post('payment_type');
		/* print_r($data); exit; */
		$report_result=$this->admin_model->get_report($data);
		
		echo json_encode(array('result'=>$report_result));
	
	}

	public function order_details($order_id)
	{
		$data=array();
		$data=$this->admin_model->get_single_order($order_id);
		$data['status_list']=$this->admin_model->get_status_list();
		$this->load->view('header');
		$this->load->view('order_details',$data);
		$this->load->view('footer');
	}

	public function update_order_details()
	{
		$data=array(
			'status'=>$this->input->post('status'),
			'delivery_boy_id'=>$this->input->post('boy_id'),
			'id'=>$this->input->post('id')
		);
		$this->admin_model-> update_order_details($data);

	}
	

	public function delete_item()
	{
		$data=array();
		$redirect="";
		$type=$this->input->post('type');
		$data['id']=$this->input->post('id');
		if($type=="addon")
		{
			$data['table']="addon_details";
			$redirect=base_url().'index.php/AdminController/view_pages/add-addon';
		}
		else if($type=="category")
		{
			$data['table']="category_master";
			$redirect=base_url().'index.php/AdminController/view_pages/add-categories';
		}
		else if($type=="deliveryboy")
		{
			$data['table']="delivery_boy_details";
			$redirect=base_url().'index.php/AdminController/view_pages/add-delivery-boy';
		}
		else if($type=="variants")
		{
			$data['table']="variants_master";
			$redirect=base_url().'index.php/AdminController/view_pages/add-variants';
		}
		else if($type=="area")
		{
			$data['table']="area_master";
			$redirect=base_url().'index.php/AdminController/view_pages/add-delivery-area';
		}
		else if($type=="slider")
		{
			$data['table']="slider_details";
			$redirect=base_url().'index.php/AdminController/view_pages/add-slider';
		}
		else if($type=="deliverycharge")
		{
			$data['table']="delivery_charge_master";
			$redirect=base_url().'index.php/AdminController/view_pages/add-delivery-charge';
		}
		else if($type=="promocode")
		{
			$data['table']="promocode_details";
			$redirect=base_url().'index.php/AdminController/view_pages/add-promocodes';
		}
		else if($type=="products")
		{
			$data['table']= "product_details";
			$redirect=base_url().'index.php/AdminController/view_pages/add-product';
		}
		else if($type=="offers")
		{
			$data['table']="offer_details";
			$redirect=base_url().'index.php/AdminController/view_pages/add-offers';
		}
		$result=$this->admin_model->delete_item($data);
		if($result)
		{
			$success=1;
		}
		else
		{
			$success=0;
		}
		echo json_encode(array('success'=>$success,'redirect_url'=>$redirect));

	
	}
	
    public function add_slider()
    {
			$data['image_url']=$this->image_upload($_FILES['image_url'],'slider-images','SLIDER');
			$data['name']=$this->input->post('name');
			$data['link']=$this->input->post('link');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->insert_slider($data);
			echo $this->bindresponse($result,'insert','slider');

    }

	public function update_slider()
    {
		if($_FILES['image_url']['name'])
		{
			$data['image_url']=$this->image_upload($_FILES['image_url'],'slider-images','SLIDER');
	}
	else
	{
			$data['image_url']=$this->input->post('old_image');
	}
			$data['id']=$this->input->post('id');
			$data['name']=$this->input->post('name');
			$data['link']=$this->input->post('link');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->update_slider($data);
			echo $this->bindresponse($result,'update','slider');
    }
	public function add_offers()
    {
			$data['image_url']=$this->image_upload($_FILES['image_url'],'offer-images','OFFER');
			$data['name']=$this->input->post('name');
			$data['description']=$this->input->post('description');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->insert_offer($data);
			echo $this->bindresponse($result,'insert','offers');
    }
	public function update_offers()
    {
		if($_FILES['image_url']['name'])
		{
			$data['image_url']=$this->image_upload($_FILES['image_url'],'offer-images','OFFER');
	}
	else
	{
			$data['image_url']=$this->input->post('old_image');
	}
			$data['id']=$this->input->post('id');
			$data['name']=$this->input->post('name');
			$data['description']=$this->input->post('description');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->update_offer($data);
			echo $this->bindresponse($result,'update','offers');
    }
	public function add_products()
    {
			$data['image_url']=$this->image_upload($_FILES['image_url'],'product-images','PROD');
			$data['name']=$this->input->post('name');
			$data['category']=$this->input->post('category');
			$data['description']=$this->input->post('description');
			$data['status']=$this->input->post('status');
			
			$data1['prod_det']=$this->input->post('prod_det');
			$data['variants']=$data1['prod_det']['variants'][0];
			$data['mrp']=$data1['prod_det']['mrp'][0];
			$data['price']=$data1['prod_det']['price'][0];
			$data['max_sale']=$data1['prod_det']['max_sale'][0];
			$data['variants_count']=count($data1['prod_det']['variants']);
			$product_id= $this->admin_model->insert_product($data);
			for($i=0;$i<count($data1['prod_det']['variants']);$i++)
			{
				foreach($data1['prod_det'] as $index=>$value)
                {       
                        
                        $table_data[$index]=$value[$i];  
                       
                }
				$table_data['product_id']=$product_id;
				$this->admin_model->insert_product_secondary($table_data);
			}
			echo $this->bindresponse($product_id,'insert','product');
    }

	public function update_products()
    {
		if($_FILES['image_url']['name'])
		{
			$data['image_url']=$this->image_upload($_FILES['image_url'],'product-images','PROD');
	}
	else
	{
			$data['image_url']=$this->input->post('old_image');
	}
			$data['id']=$this->input->post('id');
			$data['name']=$this->input->post('name');
			$data['category']=$this->input->post('category');
			$data['description']=$this->input->post('description');
			$data['status']=$this->input->post('status');
			
			$data1['prod_det']=$this->input->post('prod_det');
			$data['variants']=$data1['prod_det']['variants'][0];
			$data['mrp']=$data1['prod_det']['mrp'][0];
			$data['price']=$data1['prod_det']['price'][0];
			$data['max_sale']=$data1['prod_det']['max_sale'][0];
			$data['variants_count']=count($data1['prod_det']['variants']);
			
			$result= $this->admin_model->update_product($data);
			$delids=array();
			/* print_r($data1['prod_det']);exit; */
			for($i=0;$i<count($data1['prod_det']['variants']);$i++)
			{
				$table_data=array();
				foreach($data1['prod_det'] as $index=>$value)
                {       
                        if($index=='sec_id')
						{
							if(isset($value[$i]))
							{
							$index='id';
							array_push($delids,$value[$i]);
							$table_data[$index]=$value[$i];
							}
						}
						else if($index !='sec_id')
						{
						$table_data[$index]=$value[$i]; 	
						}
                       
                }
				$table_data['product_id']=$data['id'];
				if(isset($table_data['id']))
				{
				$this->admin_model->update_product_secondary($table_data);
				}
				else
				{
				$id=$this->admin_model->insert_product_secondary($table_data);	
				array_push($delids,$id);
				}
			}
			
				$del['delids']=$delids;
				$del['product_id']=$data['id'];
				$this->admin_model->delete_product_secondary($del);
				echo $this->bindresponse($result,'update','product');
    }


	public function add_category()
	{
			$data['image_url']=$this->image_upload($_FILES['image_url'],'category-images','CATEGORY');
			$data['name']=$this->input->post('name');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->insert_category($data);
			echo $this->bindresponse($result,'insert','categories');
	}
	public function update_category()
	{
		if($_FILES['image_url']['name'])
		{
			$data['image_url']=$this->image_upload($_FILES['image_url'],'category-images','CATEGORY');
		}
		else
		{
				$data['image_url']=$this->input->post('old_image');
		}
				$data['id']=$this->input->post('id');
				$data['name']=$this->input->post('name');
				$data['status']=$this->input->post('status');
				$result= $this->admin_model->update_category($data);
				echo $this->bindresponse($result,'update','categories');

	}
	public function add_addon()
	{
		
			$data['image_url']=$this->image_upload($_FILES['image_url'],'addon-images','ADDON');
			$data['name']=$this->input->post('name');
			$data['category']=$this->input->post('category');
			$data['description']=$this->input->post('description');
			$data['mrp']=$this->input->post('mrp');
			$data['price']=$this->input->post('price');
			$data['max_sale']=$this->input->post('max_sale');
			$data['status']=$this->input->post('status');

			$result= $this->admin_model->insert_addon($data);

		
			echo $this->bindresponse($result,'insert','addon');
	}

public function update_addon()
	{
		if($_FILES['image_url']['name'])
		{
			$data['image_url']=$this->image_upload($_FILES['image_url'],'addon-images','ADDON');
	}
	else
	{
			$data['image_url']=$this->input->post('old_image');
	}
			$data['id']=$this->input->post('id');
			$data['name']=$this->input->post('name');
			$data['category']=$this->input->post('category');
			$data['description']=$this->input->post('description');
			$data['mrp']=$this->input->post('mrp');
			$data['price']=$this->input->post('price');
			$data['max_sale']=$this->input->post('max_sale');
			$data['status']=$this->input->post('status');

			$result= $this->admin_model->update_addon($data);

		
			echo $this->bindresponse($result,'update','addon');
	}

	public function add_variants()
	{
	
			$data=array();
			$data['name']=$this->input->post('name');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->insert_variants($data);
			echo $this->bindresponse($result,'insert','variants');

	}
	public function update_variants()
	{
	
			$data=array();
			$data['id']=$this->input->post('id');
			$data['name']=$this->input->post('name');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->update_variants($data);
			echo $this->bindresponse($result,'update','variants');

	}
	public function add_promocode()
	{
		$data=array();
		$data['promo_code']=$this->input->post('promo_code');
		
		$check=$this->admin_model->check_promocode($data['promo_code']);
		if($check=='1')
		{
			$msg="Promocode is Already existing";
			echo $this->bindresponse(0,'info','',$msg);
		}
		else if($check=='0')
		{
		$data['promo_category']=$this->input->post('promo_category');
		if($this->input->post('products'))
		{
		$data['products']=json_encode($this->input->post('products'));
		}
		$data['value']=$this->input->post('value');
		$data['no_of_usage']=$this->input->post('no_of_usage');
		$data['min_order']=$this->input->post('min_order');
		$data['max_discount']=$this->input->post('max_discount');
		$data['status']=$this->input->post('status');
		$data['offer_id']=$this->input->post('offer_id');
		$result= $this->admin_model->insert_promocode($data);
		echo $this->bindresponse($result,'insert','promocodes');
		}
		
	}

	public function update_promocode()
	{
		$data=array();
		$data['promo_code']=$this->input->post('promo_code');
		$data['id']=$this->input->post('id');
		$data['promo_category']=$this->input->post('promo_category');
		if($this->input->post('products'))
		{
		$data['products']=json_encode($this->input->post('products'));
		}
	
		$data['value']=$this->input->post('value');
		$data['no_of_usage']=$this->input->post('no_of_usage');
		$data['min_order']=$this->input->post('min_order');
		$data['max_discount']=$this->input->post('max_discount');
		$data['status']=$this->input->post('status');
		$data['offer_id']=$this->input->post('offer_id');
		$result= $this->admin_model->update_promocode($data);
		
		echo $this->bindresponse($result,'update','promocodes');
	}

	public function add_area()
	{
			$data=array();
			$data['name']=$this->input->post('name');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->insert_area($data);
			echo $this->bindresponse($result,'insert','delivery-area');
	}
	public function update_area()
	{
			$data=array();
			$data['id']=$this->input->post('id');
			$data['name']=$this->input->post('name');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->update_area($data);
			echo $this->bindresponse($result,'update','delivery-area');
	}
	
	public function add_delivery_charge()
	{
			$data=array();
			$data['area']=$this->input->post('area');
			$data['charge']=$this->input->post('charge');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->insert_deliverycharge($data);
			echo $this->bindresponse($result,'insert','delivery-charge');

	}
	public function update_delivery_charge()
	{
			$data=array();
			$data['id']=$this->input->post('id');
			$data['area']=$this->input->post('area');
			$data['charge']=$this->input->post('charge');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->update_deliverycharge($data);
			echo $this->bindresponse($result,'update','delivery-charge');

	}

	public function add_delivery_boy()
	{
			$data=array();
			$result=0;
			$data['name']=$this->input->post('name');
			$data['mobile']=$this->input->post('mobile');
			$data['username']=$data['mobile'];
			$data['password']=$data['mobile'];
			$data['role']='deliveryboy';
			$user_id=$this->admin_model->insert_user_details($data);
			if($user_id)
			{
			$data1['user_id']=$user_id;	
			$data1['name']=$data['name'];
			$data1['mobile']=$data['mobile'];
			$data1['status']=$this->input->post('status');
			$result= $this->admin_model->insert_deliveryboys($data1);
			}

			echo $this->bindresponse($result,'insert','delivery-boy');


	}
	public function update_delivery_boy()
	{
			$data=array();
			$result=0;
			
			$data['id']=$this->input->post('user_id');
			$data['name']=$this->input->post('name');
			$data['mobile']=$this->input->post('mobile');
			$data['username']=$data['mobile'];
			$data['password']=$data['mobile'];
			$data['role']='deliveryboy';
			$user_id=$this->admin_model->update_user_details($data);
			if($user_id)
			{
			$data1['id']=$this->input->post('id');	
			$data1['user_id']=$data['id'];	
			$data1['name']=$data['name'];
			$data1['mobile']=$data['mobile'];
			$data1['status']=$this->input->post('status');
			$result= $this->admin_model->update_deliveryboys($data1);
			}

			echo $this->bindresponse($result,'update','delivery-boy');

	}
	public function update_product_visibility()
	{
		$data['p_display']=$this->input->post('p_display');
		$data['id']=$this->input->post('product_id');
		echo $result=$this->admin_model->update_product_visibility($data);
	}
	public function get_product_variants()
	{
		$product_id=$this->input->post('prod_id');
		$variants=$this->admin_model->get_product_variants($product_id);
		echo json_encode(array('variantslist'=>$variants));
	}

	public function update_product_newstock()
	{
		$product_id=$this->input->post('product_id');
		$variants=$this->input->post('variants');
		$newstock=$this->input->post('newstock');
		$count=count($variants);
		for($i=0;$i<$count;$i++)
		{
			$res=$this->admin_model->update_product_newstock($product_id,$variants[$i],$newstock[$i]);
		}
		echo $result=$this->admin_model->update_product_status(array('id'=>$product_id,'status'=>'In Stock'));
	}

	public function update_product_status()
	{
		$data['id']=$this->input->post('prod_id');
		$data['status']=$this->input->post('status');
		$this->admin_model->update_productstock_empty($data['id']);
		echo $result=$this->admin_model->update_product_status($data);
	}
	
	public function update_product_display()
	{
		$data['id']=$this->input->post('prod_id');
		$data['p_display']=$this->input->post('p_display');
		$this->admin_model->update_product_display($data);
	}
	
	
	public function update_product_show_hide()
	{
		$data['id']=$this->input->post('prod_id');
		$data['product_display']=$this->input->post('product_display');
		echo $result=$this->admin_model->update_product_show_hide($data);
	}
	

	public function get_addon_by_category()
	{
		$data=array();
		$cat_id=$this->input->post('category_id');
		$data=$this->admin_model->get_addons($cat_id);
		echo json_encode($data);
	}

	public function download_receipt()
	{
		$data=array();
		$params=array('invoice_no','order_id','order_date','customer_name','customer_ph','customer_address','total_count','tax','tax_amount','order_total','delivery_boy','subtotal','discount','del_charge','del_tax');
	
		foreach($params as $param)
		{
			$data[$param]=$this->input->post($param);
		}
		$items=$this->admin_model->get_carted_product_list($data['order_id']);
	
		$this->fpdf->Image('http://swiftsmart.in/public_html/img/logo.png',10,2,15);
		$this->fpdf->SetFont('Times','B',10);
		$this->fpdf->Cell(65,2,'Swiftsmart',0,1,'C');
		$this->fpdf->Cell(65,1,'',0,1);
		$this->fpdf->SetFont('Times','B',6);
	//	$this->fpdf->Cell(65,2,'Swiftsmart',0,1,'C');
		$this->fpdf->SetFont('Times','',5);
		$this->fpdf->Cell(65,2,'Thrissur,Kerala',0,1,'C');
		//$this->fpdf->Cell(65,2,'Tel:06-7474550, Mob:052 520 3040',0,1,'C');
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
	//	$this->fpdf->Cell(50,2,'Taxes:',0,0);
	//	$this->fpdf->Cell(10,2,$data['tax_amount'],0,1,'R');
		$this->fpdf->Cell(50,2,'Delivery Charge:',0,0);
		$this->fpdf->Cell(10,2,$data['del_charge'],0,1,'R');
	//	$this->fpdf->Cell(50,2,'Tax For Delivery:',0,0);
	//	$this->fpdf->Cell(10,2,$data['del_tax'],0,1,'R');
		
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

	
	public function single_view()
	{
		$type = $this->uri->segment(3);
		$id=$this->uri->segment(4);
		if($type=='category')
		{
			$page_name='add-categories';
			$data['table']='category_master';
			$data['columnlist']=array('id','name','image_url','status');
			$data['where']='id='.$id;
		}
		else if($type=='addon')
		{
			$page_name='add-addon';
			$data['table']='addon_details';
			//'category',
			$data['columnlist']=array('id','name','description','mrp','price','max_sale','image_url','status');
			$data['where']='id='.$id;
		}
		else if($type=='area')
		{
			$page_name='add-delivery-area';
			$data['table']='area_master';
			$data['columnlist']=array('id','name','status');
			$data['where']='id='.$id;
		}
		else if($type=='deliveryboy')
		{
			$page_name='add-delivery-boy';
			$data['table']='delivery_boy_details';
			$data['columnlist']=array('id','name','mobile','area','status');
			$data['where']='id='.$id;
		}
		else if($type=='deliverycharge')
		{
			$page_name='add-delivery-charge';
			$data['table']='delivery_charge_master';
			$data['columnlist']=array('id','area','charge','status');
			$data['where']='id='.$id;
		}
		else if($type=='promocode')
		{
			$page_name='add-promocodes';
			$data['table']='promocode_details';
			$data['columnlist']=array('id','promo_code','promo_category','value','no_of_usage','min_order','max_discount','status');
			$data['where']='id='.$id;
		}
		else if($type=='slider')
		{
			$page_name='add-slider';
			$data['table']='slider_details';
			$data['columnlist']=array('id','name','link','image_url','status');
			$data['where']='id='.$id;
		}
		else if($type=='variants')
		{
			$page_name='add-variants';
			$data['table']='variants_master';
			$data['columnlist']=array('id','name','status');
			$data['where']='id='.$id;
		}
		else if($type=='products')
		{
			$page_name='add-product';
			$data['table']=array('product_details','product_secondary_details');
			$data['columnlist']=array(array('id','name','category','description','image_url','mrp','price','max_sale','status','p_display','product_display'),array('id','variants','mrp','price','max_sale'));
			$data['where']=array('id='.$id,"product_id=".$id." and status !='Deleted'");
		}
		else if($type=='offers')
		{	
			$page_name='add-offers';
			$data['table']='offer_details';
			$data['columnlist']=array('id','name','status','description','image_url');
			$data['where']='id='.$id;

		}
		
		$data['type']=$type;
		$result=$this->admin_model->get_single_view($data);

		$result['page_name']=$page_name;
		/* print_r($result); exit; */
		if(isset($result['data'][0]->category))
		{
			$result['data'][0]->category=$this->admin_model->get_category_name($result['data'][0]->category);
		}
		if(isset($result['data'][0]->area))
		{
			$result['data'][0]->area=$this->admin_model->get_area_name($result['data'][0]->area);
		}
		$result['type']=$data['type'];
		$this->load->view('header');
        $this->load->view('single_view',$result);
		$this->load->view('footer');
	}


	public function set_minimum_order()
	{
		$data['min_order']=$this->input->post('min_order');
		$data['delivery_extra_charge']=$this->input->post('delivery_extra_charge');
		echo $result=$this->admin_model->insert_minimum_order($data);
		
		
	}

	public function search_product()
	{
		$key=$this->input->post('key');
		$result=$this->admin_model->get_search_productlist($key);
		echo json_encode($result);

	}
	public function search_product_name()
	{
		$name=$this->input->post('product_name');
		echo $result=$this->admin_model->search_product_name($name);
	
	}
		
	public function bindresponse($response,$process,$type="",$msg="")
	{
		$flag=0;
		$redirect='add-'.$type;
		if($msg)
		{
			return json_encode(array('msg'=>$msg,'type'=>'info','success'=>0,'redirect'=>""));
		}
		else
		{
		if($process=="insert" && $response){$flag=1; return json_encode(array('msg'=>ucfirst(str_replace('-',' ',$type)).' Added Successfully !!','type'=>'success','success'=>1,'redirect'=>$redirect));}
		if($process=="insert" && !$response){$flag=1; return json_encode(array('msg'=>ucfirst(str_replace('-',' ',$type)).' Adding Failed !!','type'=>'error','success'=>0,'redirect'=>$redirect));}
		if($process=="update" && $response){ $flag=1;return json_encode(array('msg'=>ucfirst(str_replace('-',' ',$type)).'Updated Successfully !!','type'=>'success','success'=>1,'redirect'=>$redirect));}
		if($process=="update" && $response<=0){$flag=1; return json_encode(array('msg'=>ucfirst(str_replace('-',' ',$type)).'Updation Failed !!','type'=>'error','success'=>0,'redirect'=>$redirect));}
		if(!$flag)
		{
		   return json_encode(array('msg'=>'Some Technical Error Occured','type'=>'error','success'=>0,'redirect'=>""));
		}
		}

	}
	public function change_username()
	{
		$this->load->view('header');
        $this->load->view('change-username');
		$this->load->view('footer');
	}
	public function change_password()
	{
		$this->load->view('header');
        $this->load->view('change-password');
		$this->load->view('footer');
	}
	public function update_credentials()
	
	{
		if($this->input->post('new_username'))
		{
		$data['username']=$this->input->post('new_username');
		}
		else
		{
		$data['password']=$this->input->post('new_password');
		}
		$data['id']=$this->session->userdata('user_id');
		$result=$this->admin_model->update_credentials($data);
		echo $result;
	}
	public function is_username_password_exist()
	{
		$type=$this->input->post('type');
		$oldvalue=$this->input->post('oldvalue');
		if($_SESSION['userdata'][$type]==$oldvalue)
			echo 1;
			else
			echo 0;
		}
	public function image_upload($image,$directory,$path_prefix)
	{
			
			$this->load->library('upload');
			
			if (!is_dir('../uploads/'.$directory)) {
				mkdir('../uploads/'.$directory, 0777, TRUE);		   
			}
				$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
				$config['upload_path'] = '../uploads/'.$directory;
				$this->load->library('upload',$config);
	
				$ext = explode(".",$image['name']);
				$imagename=$path_prefix.'_'.strtotime('now').rand(0,9);
				$_FILES['file']['name']=$imagename.".".$ext[1];
				$_FILES['file']['type']=$image['type'];
				$_FILES['file']['tmp_name']=$image['tmp_name'];
				$_FILES['file']['size']=$image['size'];
				$this->upload->initialize($config);
				$this->upload->do_upload('file');
				$uploadData=$this->upload->data();
				$image_url=$uploadData['file_name'];
				return $image_url;
	}



}

