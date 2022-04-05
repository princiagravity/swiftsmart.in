<?php
class Frontpagination_model extends CI_Model {

public function __construct()
{
        $this->load->database();
}
public function get_count() 
	{
        return $this->db->count_all("product_details");
    }

    public function get_products($limit, $start) 
	{
        $this->db->limit($limit, $start);
		
       //$query = $this->db->get("product_details");
       $query   = $this->db->query("SELECT * FROM product_details where product_display!='hide'");
       // $query   = $this->db->query("SELECT * FROM product_details");
        $results = $query->result();
     // var_dump($query); exit;
		foreach ($results as $index=>$value)
        {
            $value->stock=$this->get_stock_status($value->id);
        }
        return $results;
    }
    
    
	
	public function get_product_list($limit, $start)
 {
        $where="status !='Deleted'";
        
		$this->db->limit($limit, $start);
        $query   = $this->db->query("SELECT * FROM product_details where $where and product_display!='hide'");
        $results = $query->result();
        foreach ($results as $index=>$value)
        {
            $value->stock=$this->get_stock_status($value->id);
        }
        return $results;
 }
	
	public function get_stock_status($product_id)
 {
     if($product_id != "")
     {
     $query=$this->db->query("SELECT max_sale FROM `product_secondary_details` where product_id=$product_id and max_sale!=0");
     if($query->num_rows()>0)
     {
         return 1;
     }
     else
     {
         return 0;
     }
 }
 else
 {
     return 0;
 }
 }

}

?>