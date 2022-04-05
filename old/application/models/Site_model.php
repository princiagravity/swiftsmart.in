<?php 
class Site_model extends CI_Model{	

	public function __construct(){ 
		$this->load->database();
	}

    /*----------------------------------------------------------------------*/
	
    public function insert_item($table,$data){	
		$this->db->insert($table,$data);		
		return $this->db->insert_id();
	}

	/*----------------------------------------------------------------------*/
    
    public function select_item($table){
		$this->db->select('*')
                ->from($table);	
			$query=$this->db->get();
			return $query->result_array();			
		}
        
	/*----------------------------------------------------------------------*/
	
    public function get_product_details($product_id)
    {
        $this->db->select('*')
                ->from('product')
                ->where('product_id',$product_id);
                $query=$this->db->get();
                return $query->result_array();
    }
   /*------------------------------------------------------------------------*/
   
   public function get_product_detailed_list()
   {
       $this->db->select('*')
                ->from('product')
                ->join('category','category.category_id=product.category_id')
                ->join('price_list','price_list.product_id=product.product_id')
                ->join('unit_list','unit_list.unit_id=product.unit_id');
                $query=$this->db->get();
                return $query->result_array();
   }
   
   
   
    public function get_product_by_category($category_id)
   {
       $this->db->select('*')
                ->from('product')
                ->join('category','category.category_id=product.category_id')
                ->join('price_list','price_list.product_id=product.product_id')
                ->join('unit_list','unit_list.unit_id=product.unit_id')
                ->where('category.category_id',$category_id);
                $query=$this->db->get();
                return $query->result_array();
   }
   
   
   public function order_insert($data)
    {
        $this->db->insert('orders',$data);
      
        return $this->db->insert_id();
	}

	public function Order_details_insert($data)
	{

		$this->db->insert('order_details',$data);

		return $this->db->insert_id();

	}
	
	public function get_order_details($data)
	{
		
		$this->db->select('*')
		->from('order_details')
		->join('product','product.product_id=order_details.product_id')
		->where('order_details.order_id',$data);
		
		 $query=$this->db->get();
		//  print_r($this->db);exit;
		return $query->result_array();
		
	}
    
}	

?>