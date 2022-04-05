<?php



class Admin_model extends CI_Model{	

	public function __construct(){ 
		$this->load->database();
	}

    public function insert_item($table,$data){	
        $this->db->insert($table,$data); 
		return $this->db->insert_id();
	}
	
	public function get_result_array($table,$field='',$id=''){
		$this->db->select('*')
				->from($table);
		if($id==''){
			$query=$this->db->get();
			return $query->result_array();			
		}
		if($id!=''){
			$this->db->where($field,$id);
			$query=$this->db->get();
			return $query->row_array();			
		}
	}	
	
	
	
    public function signin($user_name,$password){
		$this->db->select('*')
				->from('login') 
				->where('username',$user_name);
		$this->db->where('password',md5($password));
		$query=$this->db->get();
		if($query->num_rows()==1){
			return $query->row_array();
		}
		else return false;
    }
	public function get_desig($username,$password)
	{
		$this->db->select('designation')
				->from('login') 
				->where('username',$username)
		        ->where('password',md5($password));
		$query=$this->db->get();
		return $query->result_array();	
	}


	public function get_farmer_id($username,$password)
	{
		$this->db->select('farmer_id')
				->from('farmers_list')
				->where('farmer_email_id',$username);
				//->where('mobile_no',$password);
				$query=$this->db->get();
				return $query->result_array();	
	}


	public function select_item($table){
		$this->db->select('*')
                ->from($table);	
			$query=$this->db->get();
			return $query->result_array();			
		}

	public function select_row($table,$field,$id)
	{
		$this->db->select('*')
				->from($table)
				->where($field,$id);
		$query=$this->db->get();
		return $query->result_array();		
	}
	public function delete_item($table,$field,$id)
	{
		$this->db->where($field,$id)
				->delete($table);
		return $this->db->affected_rows();			
	}
    public function update_data($table,$field,$id,$data){
	$this->db->where($field,$id)
			->update($table,$data);
	return $this->db->affected_rows();

	}

	public function get_order_details()
	{
		$this->db->select('*')
				->from('orders');
				//->join('customer','customer.customer_id=orders.customer_id');
				$query=$this->db->get();
			return $query->result_array();	
	}
    
    public function get_product_details()
	{
		$this->db->select('*')
		->from('product')
		->join('category','category.category_id=product.category_id')
		->join('unit_list','unit_list.unit_id=product.unit_id');
		$query=$this->db->get();
	return $query->result_array();
	}
	public function get_product_name($product_id)
	{
		$this->db->select('*')
				->from('product')
				->where('product_id',$product_id);
		$query=$this->db->get();
	return $query->result_array();
	}
	public function get_price_details()
	{
		$this->db->select('*')
		->from('price_list')
		->join('product','product.product_id=price_list.product_id');
		$query=$this->db->get();
	return $query->result_array();
	}
	
	public function get_price_detailed_list($price_id)
	{
		$this->db->select('*')
		->from('price_list')
		->join('product','product.product_id=price_list.product_id')
		->where('price_list.price_id',$price_id);
		$query=$this->db->get();
	return $query->result_array();
	}
	public function get_farmer_details()
	{
		$this->db->select('*')
				->from('farmers_list')
				->join('area','farmers_list.farmer_area_id=area.area_id')
				->join('store','farmers_list.nearest_store_id=store.store_id');
				$query = $this->db->get();
				return $query->result_array();
	}
    public function get_farmer_detail_row($farmer_id)
	{
		$this->db->select('*')
		->from('farmers_list')
		->join('area','farmers_list.farmer_area_id=area.area_id')
		->join('store','farmers_list.nearest_store_id=store.store_id')
		->join('id_proof_types','id_proof_types.id_proof_id=farmers_list.farmer_id_proof_type')
		->where('farmers_list.farmer_id',$farmer_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_product_row_details($product_id)
	{
		$this->db->select('*')
				->from('product')
				->join('category','product.category_id=category.category_id')
				->join('unit_list','unit_list.unit_id=product.unit_id')
				->where('product.product_id',$product_id);
		$query = $this->db->get();
		return $query->result_array();		
	}
    public function get_order_detail_row($order_id)
	{
			$this->db->select('*')
					->from('orders')
					->join('order_details','order_details.order_id=orders.order_id')
					->join('product','product.product_id=order_details.product_id')
					->where('orders.order_id',$order_id);
			$query = $this->db->get();
			return $query->result_array();
	}
    
	
	 public function get_prod_detail_row($order_id)
	{
			$this->db->select('*')
					->from('order_details')
					//->join('order_details','order_details.order_id=orders.order_id')
					->join('product','product.product_id =order_details.product_id')
					->join('price_list','price_list.product_id =order_details.product_id')
					->where('order_details.order_id',$order_id);
			$query = $this->db->get();
			return $query->result_array();
	}
	
    public function get_farmer_product_details($farmer_id)
	{
		$this->db->select('*')
		->from('farmer_product_list')
		->join('product','product.product_id=farmer_product_list.product_id')
		->where('farmer_product_list.farmer_id',$farmer_id);
$query = $this->db->get();
return $query->result_array();		
	}
   public function set_price_status($product_id)
   {
		$this->db->set('price_status','1')
				->where('product_id',$product_id)
				->update('product');
			// $query = $this->db->get();
			return $this->db->affected_rows();
   } 
    public function get_product_with_price()
	{
		  $this->db->select('*')
		  			->from('product')
					  ->where('price_status','0');
					  $query = $this->db->get();
					  return $query->result_array();	
	}
    
	public function get_products_farmer($farmer_id)
	{
  
		$this->db->select('*')
				->from('farmer_product_list')
				->join('product','product.product_id=farmer_product_list.product_id')
				->join('category','product.category_id=category.category_id')
				->join('unit_list','unit_list.unit_id=product.unit_id')
				->where('farmer_product_list.farmer_id',$farmer_id);
				$query = $this->db->get();
				return $query->result_array();
	}
    
    
    
}	

?>