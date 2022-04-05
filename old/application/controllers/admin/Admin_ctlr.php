<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ctlr extends admin_index {

/**
	 * Index Page for this controller CI_Controller.
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
	public function __construct(){
		parent::__construct();
		$data = array();
		$this->load->helper(array('form', 'url')); 
		$this->load->model('admin_model');
	}
	
	

	
	public function index()
	{ 

		$this->load->view('admin/login'); 
		
    }
	public function sign_in()
	{
	    $username=$this->input->post('username');
	 	$password=$this->input->post('password');
		$check = $this->admin_model->signin($username,$password);



		if($check!=false && $check['designation']!=''){ 
            $desig = $this->admin_model->get_desig($username,$password);            
                foreach($desig as $des)
                {
                    $designation= $des['designation']; 
                }
               
                if($designation == 2){
                $farmer_id = $this->admin_model->get_farmer_id($username,$password);
            
                foreach($farmer_id as $b_id)
                {
                    $id= $b_id['farmer_id'];
                    
                }
               $this->session->set_userdata('farmer_id',$id);
            }
            
            $this->session->set_userdata('designation',$designation);
            if($check!=false){ 
               redirect('dashboard');
              
            }
            }
            else {
               
                redirect('admin/Admin_ctlr/index');
       }

	}
     
	public function profile($farmer_id)
	{
		$data['active_cls']  ='profile';
		$data['farmer'] = $this->admin_model->get_farmer_detail_row($farmer_id);
		// print_r($data['farmer']);
		// exit;
		$data['product'] =$this->admin_model->get_farmer_product_details($farmer_id);
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/view_farmer',$data); 
		$this->load->view('admin/footer');
	}


	public function dashboard()
	{ 
		$data['active_cls']  ='dashboard';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/index'); 
		$this->load->view('admin/footer');
    }	
	
	public function register()
	{ 
		$data['id_proofs'] = $this->admin_model->select_item('id_proof_types');
		$data['area'] = $this->admin_model->select_item('area');
		$data['product'] = $this->admin_model->select_item('product');
		$data['store'] = $this->admin_model->select_item('store');
		$this->load->view('admin/register',$data); 
    }

	
	
	
	public function farmers_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='farmer';
		// $data['farmers'] = $this->admin_model->select_item('farmers_list');
		$data['farmers'] = $this->admin_model->get_farmer_details();
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/farmers_list',$data); 
		$this->load->view('admin/footer');
	}
	public function farmer_insert()
	{

		 $data['farmer_name']=$this->input->post('name');
		 $data['farmer_area_id']=$this->input->post('area');
		 $data['farmer_address']=$this->input->post('address');
		 $data['farmer_phn_no']=$this->input->post('phone');
		 $data['farmer_email_id']=$this->input->post('email');
		 $data['farmer_id_proof_type']=$this->input->post('id_type');
		 $data['farmer_id_proof_details	']=$this->input->post('id_details');
		 $data['farmer_id_proof_img']=$this->input->post('id_proof_img');
		 $data['nearest_store_id']=$this->input->post('store');
		 $data['achivements']=$this->input->post('achievements');

		  $farmer_id = $this->admin_model->insert_item('farmers_list',$data);
		 $data['farmer_product']['farmer_id'] = $farmer_id ;
		 $product = $this->input->post('product');
			foreach($product as $pro)
		 {
			$data['farmer_product']['product_id'] = $pro;
			$farmer_product_id = $this->admin_model->insert_item('farmer_product_list',$data['farmer_product']);	
		 }
		 $data['login']['farmer_id'] = $farmer_id ;
		 $data['login']['username'] = $this->input->post('email');
		 $data['login']['password'] = md5($data['farmer_phn_no']);
		 $data['login']['designation'] = 2 ;
		 $login_id = $this->admin_model->insert_item('login',$data['login']);
		 redirect('register');
	}
	public function farmer_view($farmer_id)
		{
			$data['sdata']            = array();
			$data['active_cls']  ='farmer';
			$data['farmer'] = $this->admin_model->get_farmer_detail_row($farmer_id);
			$data['product'] =$this->admin_model->get_farmer_product_details($farmer_id);
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/view_farmer',$data); 
			$this->load->view('admin/footer');
		}
	
	public function slider_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='slider';
		$data['slider'] = $this->admin_model->select_item('slider');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/slider_list',$data); 
		$this->load->view('admin/footer');
	}
	public function slider_add()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='slider';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_slider',$data); 
		$this->load->view('admin/footer');	
	}
	public function slider_insert($slider_id= false){
		$this->form_validation->set_rules('slider_title', 'Slider name', 'trim|required');	
		$this->form_validation->set_rules('slider_image', 'Image', 'trim|required');		
			
		if ($this->form_validation->run() === FALSE) {
			$e_msg = '';
            $e_msg .= form_error('slider_title');
            $e_msg .= form_error('slider_image');
			$this->session->set_flashdata('tos_error', $e_msg);
			redirect('slider');
		}	
		$data['slider_image'] 	= $this->input->post('slider_image');
		$data['slider_title'] 	= $this->input->post('slider_title');
		$data['slider_subtitle'] = $this->input->post('slider_subtitle');
		
		if($slider_id==false){
		$slider_add = $this->admin_model->insert_item('slider',$data);		
		if($slider_add!=false){
			$this->session->set_flashdata('tos_success', 'Slider successfully added.');
			redirect('slider');
		}else {
			$this->session->set_flashdata('tos_error', 'Try again !...');
			redirect('slider');
		}
		}else{
			
			$edit_slider = $this->admin_model->update_data('slider','slider_id',$slider_id,$data);
			if($edit_slider=='1'){
				$this->session->set_flashdata('tos_success', 'Slider updated');
				redirect('slider');
			}else {
				$this->session->set_flashdata('tos_warning', 'There is no changes!...');
				redirect('slider');
			}
		}			
	}
	
	
	
	/*-------------------------------------------------------------------*/
	public function slider_edit($slider_id)
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='slider';
		$data['slider'] = $this->admin_model->select_row('slider','slider_id',$slider_id);
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/edit_slider',$data); 
		$this->load->view('admin/footer');	
	}
	public function slider_update($slider_id)
	{
	 	$data['slider_title'] = $this->input->post('slider_title');
		$data['slider_subtitle'] = $this->input->post('slider_subtitle');
		$data['slider_image'] = $this->input->post('slider_image');
		
		$data['slider']=$this->admin_model->update_data('slider','slider_id',$slider_id,$data);
		redirect('slider');
	}
	public function slider_delete($slider_id)
	{
		$delete = $this->admin_model->delete_item('slider','slider_id',$slider_id);
		redirect('slider');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function area_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='area';
		$data['area'] = $this->admin_model->select_item('area');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/area_list',$data); 
		$this->load->view('admin/footer');
	}
	public function area_add()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='area';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_area',$data); 
		$this->load->view('admin/footer');	
	}
	public function area_insert()
	{
		$data['area_name'] = $this->input->post('area_name');
		$data['district'] = $this->input->post('district');
		$data['state'] = $this->input->post('state');
		$farmer_id = $this->admin_model->insert_item('area',$data);
		redirect('area');
	}
	public function area_edit($area_id)
		{
			$data['sdata']            = array();
			$data['active_cls']  ='area';
			$data['area'] = $this->admin_model->select_row('area','area_id',$area_id);
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/edit_area',$data); 
			$this->load->view('admin/footer');	
		}
	public function area_update($area_id)
		{
			$data['area_name']   = $this->input->post('area_name');
			$data['district']   = $this->input->post('district');
			$area = $this->admin_model->update_data('area','area_id',$area_id,$data);
			redirect('area');
		}
	public function area_delete($area_id)
		{
			$delete = $this->admin_model->delete_item('area','area_id',$area_id);
			redirect('area');
		}
	
	
	
	
	
	
	
	
	
	
	
	
	public function category_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='category';
		$data['category'] = $this->admin_model->select_item('category');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/category_list',$data); 
		$this->load->view('admin/footer');
	}
	public function category_add()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='category';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_category',$data); 
		$this->load->view('admin/footer');	
	}
	public function category_insert()
	{
		$data['category_name'] = $this->input->post('cat_name');
		$data['category_description'] = $this->input->post('cat_desc');
		$data['category_image'] = $this->input->post('category_image');
		$farmer_id = $this->admin_model->insert_item('category',$data);
		redirect('category');
	}
	public function category_edit($category_id)
		{
			$data['sdata']            = array();
			$data['active_cls']  ='category';
			$data['category'] = $this->admin_model->select_row('category','category_id',$category_id);
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/edit_category',$data); 
			$this->load->view('admin/footer');	
		}
	public function category_update($category_id)
		{
			$data['category_name'] = $this->input->post('cat_name');
			$data['category_description'] = $this->input->post('cat_desc');
			$data['category_image'] = $this->input->post('category_image');
			$category = $this->admin_model->update_data('category','category_id',$category_id,$data);
			redirect('category');
		}
	public function category_delete($category_id)
		{
		$delete = $this->admin_model->delete_item('category','category_id',$category_id);
		redirect('category');
		}
	
	
	
	
	
	
	
	
	
	public function product_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='product';
		$data['product'] = $this->admin_model->get_product_details();
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/product_list',$data); 
		$this->load->view('admin/footer');
	}
	public function product_add()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='product';
		$data['category'] = $this->admin_model->select_item('category');
		$data['unit'] = $this->admin_model->select_item('unit_list');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_product',$data); 
		$this->load->view('admin/footer');	
	}
	public function product_insert()
	{
	
		$this->form_validation->set_rules('product_name', 'Product name', 'trim|required');
		
		if ($this->form_validation->run() === FALSE) {
			$e_msg = '';
         
			$e_msg .= form_error('product_name');
		
			$this->session->set_flashdata('tos_error', $e_msg);
			redirect('product');
		}	
		$data['product_name'] = $this->input->post('product_name');
		$data['category_id'] = $this->input->post('cat_id');
		$data['product_image'] = $this->input->post('product_img');
		$data['product_qty'] = $this->input->post('qty');
		$data['unit_id'] = $this->input->post('unit_id');
		$data['product_description'] = $this->input->post('product_desc');
		
		
		
			$prod_add = $this->admin_model->insert_item('product',$data);
			
			if($prod_add!=false){
				$this->session->set_flashdata('tos_success', 'Successfully added.');
				redirect('product');
			}else {
				$this->session->set_flashdata('tos_error', 'Try again !...');
				redirect('product');
			
		}	
	}
	public function product_edit($product_id)
		{
			$data['sdata'] 				= array();
			$data['active_cls']  ='product';
			$data['product'] = $this->admin_model->get_product_row_details($product_id);
			$data['category'] = $this->admin_model->select_item('category');
			$data['unit'] = $this->admin_model->select_item('unit_list');
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/edit_product',$data); 
			$this->load->view('admin/footer');	
		}
	public function product_update($product_id)
		{
			$data['product_name'] = $this->input->post('product_name');
			$data['category_id'] = $this->input->post('cat_id');
			$data['product_qty'] = $this->input->post('qty');
			$data['unit_id'] = $this->input->post('unit_id');
			$data['product_image'] = $this->input->post('product_img');
			$data['product_description'] = $this->input->post('product_desc');
			$product = $this->admin_model->update_data('product','product_id',$product_id,$data);
			redirect('product');
		}
	public function product_delete($product_id)
		{
		$delete = $this->admin_model->delete_item('product','product_id',$product_id);
		redirect('product');
		}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function price_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='price';
		$data['price'] = $this->admin_model->get_price_details();
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/price_list',$data); 
		$this->load->view('admin/footer');
	}
	public function price_add()
	{
		$data['sdata'] 	= array();
		$data['active_cls']  ='price';
		$data['product'] = $this->admin_model->get_product_with_price();
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_price',$data); 
		$this->load->view('admin/footer');	
	}
	public function price_insert()
	{
		$data['product_id']    = $this->input->post('product_id');
		$data['product_price']    = $this->input->post('product_price');
		$data['offer_price']    = $this->input->post('offer_price');
		$price = $this->admin_model->insert_item('price_list',$data);
		$price_status = $this->admin_model->set_price_status($data['product_id']);
		redirect('price');
	}
	public function price_edit($price_id)
		{
			$data['sdata'] 				= array();
			$data['active_cls']  ='price';
			// $data['price'] = $this->admin_model->select_row('price_list','price_id',$price_id);
			$data['price'] = $this->admin_model->get_price_detailed_list($price_id);
			$data['product'] = $this->admin_model->get_product_with_price();
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/edit_price',$data); 
			$this->load->view('admin/footer');	
		}
	public function price_update($price_id)
		{
			$data['product_id'] = $this->input->post('product_id');
			$data['product_price'] = $this->input->post('product_price');
			$data['offer_price'] = $this->input->post('offer_price');
			$price = $this->admin_model->update_data('price_list','price_id',$price_id,$data);
			$price_status = $this->admin_model->set_price_status($data['product_id']);
			redirect('price');
		}
	public function price_delete($price_id)
		{
		$delete = $this->admin_model->delete_item('price_list','price_id',$price_id);
		redirect('product');
		}
		
	
	
	








	
	
	
	public function store_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='store';
		$data['store'] = $this->admin_model->select_item('store');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/store_list',$data); 
		$this->load->view('admin/footer');
	}
	public function store_add()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='store';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_store',$data); 
		$this->load->view('admin/footer');	
	}
	public function store_insert()
	{
		$data['store_name'] = $this->input->post('store_name');
		$store = $this->admin_model->insert_item('store',$data);
		redirect('store');
	}
	public function store_edit($store_id)
		{
			$data['sdata'] 				= array();
			$data['active_cls']  ='store';
			$data['store'] = $this->admin_model->select_row('store','store_id',$store_id);
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/edit_store',$data); 
			$this->load->view('admin/footer');	
		}
	public function store_update($store_id)
		{
			$data['store_name'] = $this->input->post('store_name');
			$store = $this->admin_model->update_data('store','store_id',$store_id,$data);
			redirect('store');
		}
	public function store_delete($store_id)
		{
		$delete = $this->admin_model->delete_item('store','store_id',$store_id);
		redirect('store');
		}
	
	
	
	
	
	
	
	
	
	
	
	
	public function customer_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='customer';
		$data['customer'] = $this->admin_model->select_item('customer');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/customer_list',$data); 
		$this->load->view('admin/footer');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	public function order_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='order';
		$data['order'] = $this->admin_model->get_order_details();
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/order_list',$data); 
		$this->load->view('admin/footer');
	}
	public function order_view($order_id)
		{
			$data['sdata']            = array();
			$data['active_cls']  ='order';
			$data['order'] = $this->admin_model->get_order_detail_row($order_id);
			$data['product_det'] = $this->admin_model->get_prod_detail_row($order_id);
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/view_order',$data); 
			$this->load->view('admin/footer');
		}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function offer_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='offer';
		$data['offer'] = $this->admin_model->select_item('offer');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/offer_list',$data); 
		$this->load->view('admin/footer');
	}
	public function offer_add()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='offer';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_offer',$data); 
		$this->load->view('admin/footer');		
	}
	public function offer_insert()
	{
		$data['offer_title'] = $this->input->post('offer_title');
		$data['offer_description'] = $this->input->post('offer_desc');
		$data['offer_image'] = $this->input->post('offer_image');
		$offer = $this->admin_model->insert_item('offer',$data);
		redirect('offer');
	}
	public function offer_edit($offer_id)
		{
			$data['sdata'] 				= array();
			$data['active_cls']  ='offer';
			$data['offer'] = $this->admin_model->select_row('offer','offer_id',$offer_id);
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/edit_offer',$data); 
			$this->load->view('admin/footer');
		}
	public function offer_update($offer_id)
		{
			$data['offer_title'] = $this->input->post('offer_title');
			$data['offer_description'] = $this->input->post('offer_desc');
			$data['offer_image'] = $this->input->post('offer_image');
			$offer = $this->admin_model->update_data('offer','offer_id',$offer_id,$data);
			redirect('offer');
		}
	public function offer_delete($offer_id)
		{
		$delete = $this->admin_model->delete_item('offer','offer_id',$offer_id);
		redirect('offer');
		}
	   
		
		
		
		
		
		
		
		
		
		
		public function deals_of_the_week()
	    {
	    $data['sdata'] 				= array();
		$data['active_cls']  ='deals';
		$data['deals'] = $this->admin_model->select_item('deals');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/deals',$data); 
		$this->load->view('admin/footer');
	    }
	    public function deal_add()
	    {
	      $data['sdata'] 				= array();
		$data['active_cls']  ='deal';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_deal',$data); 
		$this->load->view('admin/footer');  
	    }
	    public function deal_insert()
	    {
	    $data['deal_title'] = $this->input->post('deal_title');
		$data['deal_description'] = $this->input->post('deal_desc');
		$data['deal_image'] = $this->input->post('deal_image');
		$offer = $this->admin_model->insert_item('deals',$data);
		redirect('deals');  
	    }
	    public function deal_edit($deal_id)
		{
			$data['sdata'] 				= array();
			$data['active_cls']  ='deal';
			$data['deal'] = $this->admin_model->select_row('deals','deal_id',$deal_id);
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/edit_deal',$data); 
			$this->load->view('admin/footer');
		}
		public function deal_update($deal_id)
		{
			$data['deal_title'] = $this->input->post('deal_title');
			$data['deal_description'] = $this->input->post('deal_desc');
			$data['deal_image'] = $this->input->post('deal_image');
			$deal = $this->admin_model->update_data('deals','deal_id',$deal_id,$data);
			redirect('deals');
		}
		public function deal_delete($deal_id)
		{
		$delete = $this->admin_model->delete_item('deals','deal_id',$deal_id);
		redirect('deals');
		}








		public function unit()
	    {
	    $data['sdata'] 				= array();
		$data['active_cls']  ='unit';
		$data['unit'] = $this->admin_model->select_item('unit_list');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/unit_list',$data); 
		$this->load->view('admin/footer');
	    }
	    public function unit_add()
	    {
	      $data['sdata'] 				= array();
		$data['active_cls']  ='unit';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_unit',$data); 
		$this->load->view('admin/footer');  
	    }
	    public function unit_insert()
	    {
	    $data['unit_name'] = $this->input->post('unit_name');
		$unit = $this->admin_model->insert_item('unit_list',$data);
		redirect('unit');  
	    }
	    public function unit_edit($unit_id)
		{
			$data['sdata'] 				= array();
			$data['active_cls']  ='unit';
			$data['unit'] = $this->admin_model->select_row('unit_list','unit_id',$unit_id);
			$this->load->view('admin/admin_sidepanel',$data);
			$this->load->view('admin/edit_unit',$data); 
			$this->load->view('admin/footer');
		}
		public function unit_update($unit_id)
		{
			$data['unit_name'] = $this->input->post('unit_name');
			$unit = $this->admin_model->update_data('unit_list','unit_id',$unit_id,$data);
			redirect('unit');
		}
		public function unit_delete($unit_id)
		{
		$delete = $this->admin_model->delete_item('unit_list','unit_id',$unit_id);
		redirect('unit');
		}




	public function sale($farmer_id)
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='sale';
		$data['product'] = $this->admin_model->get_products_farmer($farmer_id);
		$data['farmer_id'] = $farmer_id;

		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/sales_list',$data); 
		$this->load->view('admin/footer');
	}
	public function product_sell($product_id)
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='sale';
		$data['productname'] = $this->admin_model->get_product_name($product_id);
		// $data['product'] = $this->admin_model->get_products_farmer($farmer_id);
		// $data['farmer_id'] = $farmer_id;

		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_sale',$data); 
		$this->load->view('admin/footer');
	}
    
	public function sell_insert()
	{
		
	}


	public function farmer_order($farmer_id)
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='order';


		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/farmer_order',$data); 
		$this->load->view('admin/footer');
	}


	public function history($farmer_id)
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='history';


		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/history',$data); 
		$this->load->view('admin/footer');
	}
	
	public function advertisement_list()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='advertisement';
		$data['advertisement'] = $this->admin_model->select_item('advertisement');
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/advertisement_list',$data); 
		$this->load->view('admin/footer');
	}
	public function advertisement_add()
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='advertisement';
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/add_advertisement',$data); 
		$this->load->view('admin/footer');	
	}
	public function advertisement_insert($adv_id = false){
		$this->form_validation->set_rules('adv_title', 'Advertisement name', 'trim|required');	
		$this->form_validation->set_rules('adv_photo', 'Image', 'trim|required');		
			
		if ($this->form_validation->run() === FALSE) {
			$e_msg = '';
            $e_msg .= form_error('adv_title');
            $e_msg .= form_error('adv_photo');
			$this->session->set_flashdata('tos_error', $e_msg);
			redirect('advertisement_list');
		}	
		$data['adv_photo'] 	= $this->input->post('adv_photo');
		$data['adv_title'] 	= $this->input->post('adv_title');
		
		
		if($adv_id ==false){
		$advertisement_add = $this->admin_model->insert_item('advertisement',$data);		
		if($advertisement_add!=false){
			$this->session->set_flashdata('tos_success', 'Advertisement successfully added.');
			redirect('advertisement_list');
		}else {
			$this->session->set_flashdata('tos_error', 'Try again !...');
			redirect('advertisement_list');
		}
		}else{
			
			$edit_advertisement = $this->admin_model->update_data('advertisement','adv_id ',$adv_id ,$data);
			if($edit_advertisement=='1'){
				$this->session->set_flashdata('tos_success', 'Advertisement updated');
				redirect('advertisement_list');
			}else {
				$this->session->set_flashdata('tos_warning', 'There is no changes!...');
				redirect('advertisement_list');
			}
		}			
	}
	
		/*-------------------------------------------------------------------*/
	public function advertisement_edit($adv_id )
	{
		$data['sdata'] 				= array();
		$data['active_cls']  ='advertisement';
		$data['advertisement'] = $this->admin_model->select_row('advertisement','adv_id ',$adv_id );
		$this->load->view('admin/admin_sidepanel',$data);
		$this->load->view('admin/edit_advertisement',$data); 
		$this->load->view('admin/footer');	
	}
	public function advertisement_update($adv_id )
	{
	 	$data['adv_title'] = $this->input->post('adv_title');
		
		$data['adv_photo'] = $this->input->post('adv_photo');
		
		$data['advertisement']=$this->admin_model->update_data('advertisement','adv_id ',$adv_id ,$data);
		redirect('advertisement_list');
	}
	public function advertisement_delete($adv_id )
	{
		$delete = $this->admin_model->delete_item('advertisement','adv_id ',$adv_id );
		redirect('advertisement_list');
	}
	
	
	
}

