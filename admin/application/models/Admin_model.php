<?php
class Admin_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
               
        }
        public function check_user_exist($username,$password)
        {
        $sucess=1;        
      $query=$this->db->query("select id,username,name,email_id,role,password from user_details where username='$username' and password='$password' and role='admin'");
        $result=$query->row();
		//print_r($query); exit;
        if($result)
        {   
        $userdata=array(
              
                'username'=>$result->username,
                'name'=>$result->name,
                'email_id'=>$result->email_id,
                'role'=>$result->role,
                'password'=>$result->password
        );

        $this->session->set_userdata('userdata',$userdata);
        $this->session->set_userdata('user_id',$result->id);
      
        $sucess=1;
        }
        else
        {
                $sucess=0;
        }

        return $sucess;
        }
        public function insert_slider($data=array())
        {
            $result= $this->db->insert('slider_details',$data);
            return $result;
        }
        public function update_slider($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('slider_details',$data);
            if($this->db->affected_rows() >=0)
		    return 1;
		    else
		    return 0;
        }
        public function insert_offer($data=array())
        {
            $result= $this->db->insert('offer_details',$data);
            return $result;
        }
        public function update_offer($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('offer_details',$data);
            if($this->db->affected_rows() >=0)
		    return 1;
		    else
		    return 0;
        }

        public function insert_category($data=array())
        {
            $result= $this->db->insert('category_master',$data);
            return $result;
        }

        public function update_category($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('category_master',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }

        public function insert_variants($data=array())
        {
            $result= $this->db->insert('variants_master',$data);
            return $result;
        }
        public function update_variants($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('variants_master',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function insert_product($data=array())
        {
            $result= $this->db->insert('product_details',$data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        public function update_product($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('product_details',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function insert_product_secondary($data=array())
        {
            $result= $this->db->insert('product_secondary_details',$data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        public function update_product_secondary($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('product_secondary_details',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function delete_product_secondary($data=array())
        {
            if($data)
            {
                $delids=implode(",",$data['delids']);
                $this->db->query("update product_secondary_details set status='Deleted' where id NOT IN (".$delids.") and product_id=".$data['product_id']);
            }
        }
   
        public function insert_addon($data=array())
        {
            $result= $this->db->insert('addon_details',$data);
            return $result;
        }

        public function update_addon($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('addon_details',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }

        public function insert_promocode($data=array())
        {
            $result= $this->db->insert('promocode_details',$data);
            return $result;
        }
        public function update_promocode($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('promocode_details',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function insert_area($data=array())
        {
            $result= $this->db->insert('area_master',$data);
            return $result;
        }
        public function update_area($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('area_master',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function insert_deliverycharge($data=array())
        {
            $result= $this->db->insert('delivery_charge_master',$data);
            return $result;
        }
        public function update_deliverycharge($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('delivery_charge_master',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function insert_deliveryboys($data=array())
        {
            $result= $this->db->insert('delivery_boy_details',$data);
           
            return $result;

        }
        public function update_deliveryboys($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('delivery_boy_details',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function insert_user_details($data=array())
        {
            $result= $this->db->insert('user_details',$data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
           
        }
        public function update_user_details($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('user_details',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
           
        }

        public function delete_item($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update($data['table'],array('status'=>'Deleted'));
            return $result;
    
        }
        public function insert_minimum_order($data)
        {
            $this->db->where('status !=','Deleted');
            $this->db->update('minimum_order_extra_delivery',array('status'=>'Deleted'));
         
            $result=$this->db->insert('minimum_order_extra_delivery',$data);
         
       
            return $result;

        }

        public function get_minimum_order()
        {
            $query   = $this->db->query("SELECT min_order,delivery_extra_charge FROM minimum_order_extra_delivery where status !='Deleted'");
            $results = $query->result();
            return $results;
        }
        public function update_product_visibility($data=array())
        {
            $this->db->where('id', $data['id']);
            $result= $this->db->update('product_details',$data);
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function get_categories()
        {
            $query   = $this->db->query("SELECT id,name,status FROM category_master where status='Active'");
            $results = $query->result();
            if($results)
            foreach ($results as $row)
            {
            $data[$row->id]=$row->name;
            }
           return $data;
        }
        public function get_variants()
        {
            $query   = $this->db->query("SELECT id,name FROM variants_master");
            $results = $query->result();
            foreach ($results as $row)
            {
            $data[$row->id]=$row->name;
            }
           return $data;

        }
        public function get_addons($category='')
        {
           
            $data=array();
            if($category=='')
            {
            $query   = $this->db->query("SELECT id,name FROM addon_details");
            }
            else
            {
            $query   = $this->db->query("SELECT id,name FROM addon_details where category='$category'");
            }
            $results = $query->result();
            foreach ($results as $row)
            {
            $data[$row->id]=$row->name;
            }
           return $data; 
        }
        public function get_arealist()
        {
            $query   = $this->db->query("SELECT id,name FROM area_master");
            $results = $query->result();
            foreach ($results as $row)
            {
            $data[$row->id]=$row->name;
            }
           return $data;

        }


        public function get_single_customer($id)
        {
            $query   = $this->db->query("SELECT name,mobile from user_add_details where user_id=$id and role='customer'");
            $results = $query->row();
            return $results;
        }

        public function get_single_order($order_id)
        {
            $query   = $this->db->query("SELECT id,customer_id,delivery_boy_id,area,cart_total,discount,invoice_no,order_time,tax,delivery_charge,delivery_tax,tax_amount,order_total,payment_type,status,loc_latitude,loc_longitude from order_details where id=$order_id");
            $data['order_details'] = $query->row();

            $query=$this->db->query("SELECT id,name,address,mobile,email_id from user_add_details where user_id=".$data['order_details']->customer_id);
            $data['customer_details']=$query->row();

            $query=$this->db->query("SELECT user_id,name from delivery_boy_details");
            $data['deliveryboy_details']=$query->result();

            $data['status']=$this->get_status_name($data['order_details']->status);
            if($data['order_details']->delivery_boy_id !="")
            {
            $data['delivery_boy']=$this->get_deliveryboy_name($data['order_details']->delivery_boy_id);
            }
            else{
                $data['delivery_boy']="Not Assigned";
            }
            


            $query   = $this->db->query("SELECT id,product_id,product_name,product_count,product_price,product_total,type from carted_item_details where order_id=$order_id");
            $data['item_details'] = $query->result();
            return $data;
        }

        public function get_deliveryboy_name($id)
        {   
            $query   = $this->db->query("SELECT name from delivery_boy_details where user_id=$id");
            $results = $query->row();
            if($results)
            {
                return $results->name;
            }
            else
            {
                return null;
            }
           
        }
        public function get_lists($table,$columns,$limit="")
        {
            if($limit !="")
            {
                $limit='limit '.$limit;
            }
            $query   = $this->db->query("SELECT $columns from $table where status != 'Deleted' order by created_on desc $limit");
            $results = $query->result();
            return $results;
        }
        public function get_customer_list($table,$columns,$limit)
        {
            $query   = $this->db->query("SELECT $columns from $table where status != 'Deleted' and role='customer' order by created_on desc limit $limit");
            $results = $query->result();
            return $results;
        }
        public function get_category_name($id)
        {
            $query   = $this->db->query("SELECT name from category_master where id=$id");
            $results = $query->row();
            if($results)
            {
                return $results->name;
            }
            else
            {
                return null;
            }
          
        }
        public function get_variant_name($id)
        {
        $query   = $this->db->query("SELECT name from variants_master where id=$id");
        $results = $query->row();
        if($results)
            {
                return $results->name;
            }
            else
            {
                return null;
            }
        }
        public function get_area_name($id="")
        {
            $query   = $this->db->query("SELECT name from area_master where id=$id");
            $results = $query->row();
            if($results)
            {
                return $results->name;
            }
            else
            {
                return null;
            }
        }

        public function get_status_name($id)
        {
            $query   = $this->db->query("SELECT name from status_master where id=$id");
            $results = $query->row();
            if($results)
            {
                return $results->name;
            }
            else
            {
                return null;
            }

        }
        public function get_status_list()
        {
            $query   = $this->db->query("SELECT id,name from status_master");
            $results = $query->result();
            return $results;
        }
        public function get_all_deliveryboys()
        {
            $query=$this->db->query("SELECT user_id,name from delivery_boy_details where status !='Deleted'");
            $results=$query->result();
            return $results;
        }
        public function check_promocode($promo_code)
        {
            $result   = $this->db->where(array('promo_code'=>$promo_code))->get('promocode_details')->result_array();
            if( count($result) > 0)
            {
               return 1;
            }
            else
            {
                return 0;
            }
        }
        public function get_report($data=array())
        {
            if(!$data)
            {
            $query1=$this->db->query("select sum(order_total) as total,sum(cart_total) as subtotal,sum(delivery_charge) as delivery_charge,sum(tax_amount) as tax_amount,sum(discount) as discount,COUNT(*) as count from order_details WHERE status='4' limit 5");
            $query2=$this->db->query("select id,customer_id,delivery_boy_id,items,area,discount,tax_amount,cart_total,order_total,order_time,delivery_charge,payment_type from order_details where status='4' limit 5");
            }
            else
            {
               
                $where="status='4'";
                if($data['from']=="")
                {
                    $data['from']=date("Y-m-d");
                }
              
                if($data['to']=="")
                {
                    $data['to']=date("Y-m-d");
                }
              
                $where="status='4' and (order_time BETWEEN '".$data['from']."%' AND '".$data['to']."%')";
                if($data['delivery_boy'] !="")
                {
                $where=$where." and delivery_boy_id=".$data['delivery_boy'];    
                }
                if($data['payment_type'] !="")
                {
                $where=$where." and payment_type='".$data['payment_type']."'";    
                }
                $query1=$this->db->query("select sum(order_total) as total,sum(cart_total) as subtotal,sum(delivery_charge) as delivery_charge,sum(tax_amount) as tax_amount,sum(discount) as discount,COUNT(*) as count from order_details WHERE $where  limit 5");
                $query2=$this->db->query("select id,customer_id,delivery_boy_id,items,area,discount,tax_amount,cart_total,order_total,order_time,delivery_charge,payment_type from order_details where $where limit 5");
            }
            $results['ordertotals'] = $query1->result();
            $results['orderlists']=$query2->result();
            if($results['orderlists'])
            {
                foreach($results['orderlists'] as $index=>$value)
		    {
                $value->customer_name=$this->get_single_customer($value->customer_id);
                /* $value->delivery_boy=$this->get_deliveryboy_name($value->delivery_boy_id); */
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
            }
            }
            return $results;
        }


        public function get_product_variants($product_id)
        {
            $result="";
            if($product_id)
            {
              $result=$this->db->query("select product_secondary_details.variants,product_secondary_details.id,variants_master.name from product_secondary_details join variants_master on variants_master.id=product_secondary_details.variants where product_secondary_details.product_id=$product_id")->result();
              return $result;

            }
        }
        public function update_product_newstock($product_id,$variants,$newstock)
        {
            $this->db->query("update product_secondary_details set max_sale='$newstock' where product_id=$product_id and variants='$variants'");
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function update_product_status($data)
        {
            $this->db->where('id', $data['id']); 
            $this->db->update('product_details', array('status'=>$data['status']));
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
        public function update_productstock_empty($product_id)
        {
            $this->db->query("update product_secondary_details set max_sale=0 where product_id=$product_id");
        }
		
		 public function update_product_display($data)
        {
            $this->db->where('id', $data['id']); 
            $this->db->update('product_details', array('p_display'=>$data['p_display']));
        }
		
		
		 public function update_product_show_hide($data)
        {
            $this->db->where('id', $data['id']); 
            $this->db->update('product_details', array('product_display'=>$data['product_display']));
            if($this->db->affected_rows() >=0)
            return 1;
            else
            return 0;
        }
		
	

        public function update_order_details($data=array())
        {
            $this->db->where('id', $data['id']);
            if($data['delivery_boy_id'] !="" )
            {
            if($data['status'] !="")
            {
            $where=array('delivery_boy_id' => $data['delivery_boy_id'],'status'=>$data['status']);
            }
            else 
            {
                $where=array('delivery_boy_id'=>$data['delivery_boy_id']);
            }
             }
            else if($data['status'] !="")
            {
                $where=array('status'=>$data['status']);
            }
            $this->db->update('order_details', $where);
        }

            public function  get_carted_product_list($order_id)
            {
            $query   = $this->db->query("SELECT id,cart_id,product_image,product_id,product_name,product_count,product_price,product_total,type from carted_item_details where order_id=$order_id");

            $data = $query->result();
            return $data;
            }

            public function get_dashboard_count()
            {
                $qry=$this->db->query("select count(*) as total_order,
                count(if(status='1',1,null)) as pending,
                count(if(status='2',1,null)) as inprogress
                from order_details");
                $result=$qry->row();
                $qry=$this->db->query("select count(*) as boys from delivery_boy_details where status !='Deleted'");
                $result->boys=($qry->row())->boys;
                return $result;
            }

            public function get_single_view($data=array())
            {
                $result=array();
                if($data)
                {
                if($data['type']=='products')
                {
                    $this->db->where($data['where'][0]);
                    $this->db->select($data['columnlist'][0]);
                    $query = $this->db->get($data['table'][0]);
                    $result['data']=$query->result();

                   
		           

                    $this->db->where($data['where'][1]);
                    $this->db->select($data['columnlist'][1]);
                    $query = $this->db->get($data['table'][1]);
                    $result['data2']=$query->result();

                   /*  print_r($result['data2']); exit; */
                   

                }   
                else
                { 
                    $this->db->where($data['where']);
                    $this->db->select($data['columnlist']);
                    $query = $this->db->get($data['table']);
                    $result['data']=$query->result();
                  
                }
                }
              
                return $result;
            }

    

    
	public function sentenceCase($string) { 
		$sentences = preg_split('/([.?!]+)/', $string, -1,PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE); 
		$newString = ''; 
		$sentences =str_replace('_',' ',$sentences);
		foreach ($sentences as $key => $sentence) { 
			$newString .= ($key & 1) == 0? 
				ucfirst(strtolower(trim($sentence))) : 
				$sentence.' '; 
		} 
		return trim($newString); 
	}

    public function get_search_productlist($key)
         {
        $query   = $this->db->query("SELECT product_details.*,category_master.name as category from product_details join category_master on product_details.category=category_master.id where product_details.name like '%$key%' and product_details.status != 'Deleted' order by product_details.name");
        $results = $query->result();
        return $results;
        }
    public function search_product_name($name)
         {
        $query   = $this->db->query("SELECT name from product_details where name like '$name' and status !='Deleted'");
        if($query->num_rows())
        return 1;
        else
        return 0;
        }

        public function get_all_product_report()
        {
            $result=$this->db->query("select product_secondary_details.max_sale,product_details.name as product_name,category_master.name as category,product_secondary_details.mrp,product_secondary_details.price,product_secondary_details.id,product_secondary_details.variants,variants_master.name as variant_name from product_secondary_details join product_details on product_details.id=product_secondary_details.product_id  join variants_master on product_secondary_details.variants=variants_master.id join category_master on category_master.id=product_details.category where product_details.status !='Deleted'")->result();
            return $result;
        }
        public function update_credentials($data=array())
        {
            if($data)
            {
                $this->db->where('id', $data['id']);
                $result= $this->db->update('user_details',$data);
                if($this->db->affected_rows() >=0)
                return 1;
                else
                return 0;
            }
            else
            {
                return 0;
            }

        }

}