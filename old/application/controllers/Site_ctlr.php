<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_ctlr extends CI_Controller {
 
    public function __construct(){
		parent::__construct();
        
        $this->load->library('cart');
        $this->load->library('session');
		$this->load->model('Site_model');
		$this->load->library('form_validation');
    }
    
	public function index()
	{
        $data['sdata'] 				            =   array();
        //$data['subview'] 			            =   'site/product_grid';
        $data['slider'] = $this->Site_model->select_item('slider');  
       $data['products'] = $this->Site_model->get_product_detailed_list(); 
       $data['offers'] = $this->Site_model->select_item('offer');
       $data['deal'] = $this->Site_model->select_item('deals');
       $data['category'] = $this->Site_model->select_item('category');
       $data['adv'] = $this->Site_model->select_item('advertisement');
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer',$data);
		  
    }
    public function about()
    {
        $data['sdata'] 				            =   array();
        $data['category'] = $this->Site_model->select_item('category');
        $this->load->view('header',$data);
        $this->load->view('about',$data);
        	$this->load->view('footer',$data);
    }
    public function shop()
    {
        $data['sdata'] 				            =   array();
        $data['products'] = $this->Site_model->get_product_detailed_list(); 
        $data['category'] = $this->Site_model->select_item('category');
        $this->load->view('header',$data);
        $this->load->view('shop',$data);
    	$this->load->view('footer',$data);
    }
    public function product_details($product_id)
    {
        $data['sdata'] 				            =   array();
        $data['products'] = $this->Site_model->get_product_details($product_id); 
        $data['category'] = $this->Site_model->select_item('category');
        $this->load->view('header',$data);
        $this->load->view('product_details',$data);
    	$this->load->view('footer',$data); 
    }
    public function add_to_cart()
    {
        $count_val=0;
			$price = $this->input->post('product_price');
			$qty = $this->input->post('quantity');
			 $subtotal_price =$price*$qty;
		   $data = array(
			   'id' => $this->input->post('product_id'), 
			   'name' => $this->input->post('product_name'), 
			   'price' => $this->input->post('product_price'), 
			   'qty' => $this->input->post('quantity'),   
			   'productimage' => $this->input->post('product_image'), 
			   'subtotal_price' => $subtotal_price, 
		   );
		  
		   $this->cart->insert($data); 
			$rows = count($this->cart->contents()); 
		  foreach ($this->cart->contents() as $items) {
			$count_val+=$items['qty'];
	   }
	   echo $count_val;
	   $this->session->set_userdata('cart_count',$count_val);
    }

    public function delete_cart()
	   {
		   $count_val=0;
		 
			
		   $data = array(
					   'rowid' => $this->input->post('row_id'),
						   'qty' => 0,
					   );
		   $this->cart->update($data);
   
		   $rows = count($this->cart->contents()); 
		  foreach ($this->cart->contents() as $items) {
			$count_val+=$items['qty'];
	   }
	   echo $count_val;
	   $this->session->set_userdata('cart_count',$count_val);
	   refresh('cart_view');
	   }



    function cart_view()
	   {
		   $data['sdata'] 				= array();
		//    $data['category_list']		= $this->Site_model->get_category_list(); 
        $data['category'] = $this->Site_model->select_item('category');
           $this->load->view('header',$data);
		   $this->load->view('cart_view',$data);
		   $this->load->view('footer',$data);	
	   }

	   public function checkout(){

		$data['sdata']                          =   array();
$data['category'] = $this->Site_model->select_item('category');
$grand_total=0;
		// $id = $this->input->post('product_id');
		// print_r($id);
		// 	exit;
		if ($this->input->post('product_id')) {
             $product_id    = $this->input->post('product_id');
         
            $product_name    = $this->input->post('product_name');
        
		     $product_image    = $this->input->post('product_image');
        
		     $unit_price    = $this->input->post('unit_price');
        
		     $qty    = $this->input->post('qty');
        
            $subtotal    = $this->input->post('subtotal');
// 	print_r($subtotal);		
//  exit;
            foreach ($product_id as $list_key=>$list_row) {
                $grand_total =$grand_total + $subtotal[$list_key];

                $proceed_cart[] = array(
                'product_id' =>$list_row,
                'product_name' =>$product_name[$list_key],
                'product_image' =>$product_image[$list_key],
                'unit_price' =>$unit_price[$list_key],
                'qty' => $qty[$list_key],
                'subtotal' =>$subtotal[$list_key],
                'grand_total' =>$grand_total,
             );
			
                $this->session->set_userdata('proceed_cart', $proceed_cart);
				
            }
			// print_r($proceed_cart);
			// 	exit;
        }
		$this->load->view('header',$data);
		$this->load->view('checkout',$data);
		$this->load->view('footer',$data);	

	}
public function products_by_category($category_id)
	{
		$data['sdata'] 				= array();
		$data['product']            = $this->Site_model->get_product_by_category($category_id);
		$data['category'] = $this->Site_model->select_item('category');
		$this->load->view('header',$data);
        $this->load->view('products_by_category',$data);
    	$this->load->view('footer',$data); 	
	}
	
	
		public function order_insert()
	{
	
		$data['sdata'] 				= array();
		$number = rand();
		$data['customer_details']['order_number'] = $number;
		$data['customer_details']['order_date'] = date('d-m-Y');
		$data['customer_details']['customer_name'] = $this->input->post('name');
		$data['customer_details']['phone_no'] = $this->input->post('phone');
		$data['customer_details']['address'] = $this->input->post('address');
		$data['customer_details']['order_notes'] = $this->input->post('order_notes');
		$data['customer_details']['total_amount'] = $this->input->post('tot_amount');
		//$data['customer_details']['location'] = $this->input->post('work_location');
		$data['customer_item']			= $this->Site_model->order_insert($data['customer_details']);

		$data['order_details']['order_id'] = $data['customer_item'];
		if (isset($this->session->userdata['proceed_cart'])!== FALSE) {  
			foreach ($this->session->userdata['proceed_cart'] as $car_to_proceed_items) { 

	
		$data['order_details']['product_id'] = $car_to_proceed_items['product_id'];
		$data['order_details']['product_price'] = $car_to_proceed_items['subtotal'];
		$data['order_details']['product_quantity'] = $car_to_proceed_items['qty'];

		$data['order_item']         = $this->Site_model->Order_details_insert($data['order_details']);
		
	}
}	
//print_r($data['customer_item']); 

		$data['orders'] = $this->Site_model->get_order_details($data['customer_item']);
		//var_dump($data['orders']); 
		
		$data_array = array();
		$i=1;
		$product='';
		foreach ($data['orders'] as $row) {

		 $product_name=$row['product_name'];
		 $product_quantity=$row['product_quantity'];
		 $product_price=$row['product_price'];
		 $product=$product.''.$i.''.'-'.''.$product_name.''.'x'.''.$product_quantity.''.'='.''.$product_price.','.'';
		  $i++;
		}
	

		$j=$i-1;
		$name = $data['customer_details']['customer_name'];
		$phone_no = $data['customer_details']['phone_no'];
		$address = $data['customer_details']['address'];
		$order_note = $data['customer_details']['order_notes'];
		$tot_amount = $data['customer_details']['total_amount'];
		$order_no = $data['customer_details']['order_number'];
		$g_pay = 'upi://pay?pa=swiftmicro@fbl&pn=swiftmart&am='.$tot_amount;
		
// 		$g_pay = 'teamgravity.in/shopea';
				
		
redirect('https://api.whatsapp.com/send?phone=919746440467&text=%2ANew+Order+%3A+%230'.$order_no.'%2A%0A%2A%28Home+Delivery%29%2A%0A%0A_Total+items%3A_+%2A'.$j.'%2A%0A%2A%2A+-+'.$product.'++%0A%0ATotal+Payable%3A+%2A%E2%82%B9'.$tot_amount.'%2A%0A%0A%2A_Order+Note%3A_%2A%0A'.$order_note.'%0A%0A%2A_Name%3A_%2A%0A'.$name.'%0A%2A_Mobile%3A_%2A%0A'.$phone_no.'%0A%2A_Address%3A_%2A%0A'.$address.'%0A%0A%2A_Location%3A_%2A%0Ahttps%3A%2F%2Fwww.google.com%2Fmaps%3Fq%3D10.8505159%2C76.2710833%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0APlease+confirm+via+reply%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%0A%2AMake+Payment%2A%0A'.$g_pay);
	}
	
	    public function refund_and_cancellation()
    {
        $data['sdata'] 				            =   array();
        // $data['category'] = $this->Site_model->select_item('category');
        $this->load->view('header',$data);
        $this->load->view('refund_and_cancellation',$data);
        	$this->load->view('footer',$data);
    }
    
    public function termsandconditions()
    {
        $data['sdata'] 				            =   array();
        // $data['category'] = $this->Site_model->select_item('category');
        $this->load->view('header',$data);
        $this->load->view('termsandconditions',$data);
        	$this->load->view('footer',$data);
    }
     public function privacy_policy()
    {
        $data['sdata'] 				            =   array();
        // $data['category'] = $this->Site_model->select_item('category');
        $this->load->view('header',$data);
        $this->load->view('privacy_policy',$data);
        	$this->load->view('footer',$data);
    }


	
	
    
}