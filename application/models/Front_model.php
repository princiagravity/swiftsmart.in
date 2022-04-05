<?php
class Front_model extends CI_Model {

public function __construct()
{
        $this->load->database();
}
public function check_user_exist($username,$password)
{
$sucess=1;        
$query=$this->db->query("select id,username,mobile,name,email_id,role from user_details where mobile='$username' and password='$password'");
$result=$query->row();
if($result)
{
        $userdata=array(
                'user_id'=>$result->id,
                'username'=>$result->username,
                'name'=>$result->name,
                'email_id'=>$result->email_id,
                'mobile'=>$result->mobile,
                'role'=>$result->role
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
public function check_username_exist($username)
{
$sucess=1;        
$query=$this->db->query("select username from user_details where username='$username'");
$result=$query->row();
if($result)
{
      
        $sucess=1;
}
else
{
        $sucess=0;
}

return $sucess;

}
public function is_user_loggedin()
 {
         if($this->session->userdata('user_id') && $this->session->userdata('user_id')!=1)
         {

                return 1;
         }
         else
         {
                 return 0;
         }
 }
 public function insert_user($data)
 {
        $result= $this->db->insert('user_details',$data);
        return $result;
 }

 public function get_lists()
 {
         $data=array();
         $data['slider_list']=$this->get_sliders();
         $data['category_list']=$this->get_product_categorylist();
         $data['product_list']=$this->get_product_list();
		 $data['advertisement_list']=$this->get_advert_list();
		 $data['offer_list']=$this->get_offer_list();
        return $data;
 }
 public function get_offer_list()
 {
     $query   = $this->db->query("SELECT id,name,description,image_url FROM offer_details where status !='Deleted'");
     $results = $query->result();
     return $results;
 }

 public function get_advert_list()
 {
     $query   = $this->db->query("SELECT id,name,description,image_url FROM advertisement_details where status !='Deleted'");
     $results = $query->result();
     return $results;
 }
 
 public function get_sliders()
 {
     $query   = $this->db->query("SELECT id,name,link,image_url FROM slider_details where status !='Deleted'");
     $results = $query->result();
     return $results;
 }
public function delete_cart($id="")
{
        $where="";
        if($id != "")
        {
                $where="where id=$id";
        }
        $result=$this->db->query("delete from cart_details $where");
        return $result;

}
 public function get_product_categorylist()
 {
        $query   = $this->db->query("SELECT id,name,image_url FROM category_master where status !='Deleted'");
        $results = $query->result();
        return $results;
 }
 public function get_product_list($cat_id="")
 {
        $where="status !='Deleted' and p_display=1";
        if($cat_id!="")
        {
                $where="status !='Deleted' and p_display=1 and category='$cat_id'";
        }
        $query   = $this->db->query("SELECT * FROM product_details where $where LIMIT 16");
        $results = $query->result();
        foreach ($results as $index=>$value)
        {
            $value->stock=$this->get_stock_status($value->id);
        }
        return $results;
 }
 
 public function get_productfull_list($cat_id="")
 {
        $where="status !='Deleted'";
		
        if($cat_id!="")
        {
                $where="status !='Deleted' and category='$cat_id'";
        }
        $query   = $this->db->query("SELECT * FROM product_details where $where and product_display!='hide'");
         //$query   = $this->db->query("SELECT * FROM product_details where $where");
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
public function get_category_name($id)
{
        $query   = $this->db->query("SELECT name from category_master where id=$id");
        $results = $query->row();
        return $results->name;
}

public function get_variant_name($id="")
{
        $query   = $this->db->query("SELECT name from variants_master where id=$id");
        $results = $query->row();
        return $results->name;
}

public function get_cart_list($param="")
{
        $result=array();
        $query   = $this->db->query("SELECT id FROM `cart_details`");
        $results = $query->result();
        foreach($results as $index=>$value)
        {
               $results[$index]=$value->id; 
        }
        $cart_ids=implode(',',$results);
       if($param=='carttotal')
       {
        if($cart_ids)
        {
        $query1=$this->db->query("select sum(product_total) as total, sum(product_count) as count from carted_item_details where cart_id in ($cart_ids)");
        $result=$query1->result();
        }
       

       }
       else
       {
        if($cart_ids)
        {
        $query1   = $this->db->query("SELECT id,cart_id,product_image,product_id,product_name,product_count,product_price,product_total,type,product_variant from carted_item_details where cart_id in ($cart_ids)");
         $result=$query1->result();
       
        }
     
       }
       
    
       
        return $result;

}


public function get_carted_products($param="")
{
        $query   = $this->db->query("SELECT id FROM `cart_details`");
        $results = $query->result();
        foreach($results as $index=>$value)
        {
               $results[$index]=$value->id; 
        }
       
        $cart_ids=implode(',',$results);
        $query1   = $this->db->query("SELECT sum(product_count) as product_count,sum(product_total) as product_total,sum(product_price) as product_price,product_variant,product_id,product_name,product_image,type FROM `carted_item_details` where cart_id in  ($cart_ids) GROUP BY product_id,product_variant");
        return $query1->result();

}

public function get_cart_sum($cart_id)
{
        $query   = $this->db->query("select sum(product_total) as total, sum(product_count) as count from carted_item_details where cart_id=$cart_id");

        //select sum(product_total) as total, sum(product_count) as count from carted_item_details where cart_id in('291','292','293')

        $res = $query->row();
        $data['total']=$res->total;
        $data['count']=$res->count;
        return $data;   
}

public function  get_carted_product_list($cart_id)
{
$query   = $this->db->query("SELECT id,cart_id,product_image,product_id,product_name,product_count,product_price,product_total,type from carted_item_details where cart_id=$cart_id");

$data = $query->result();
return $data;
}
public function  get_ordered_product_list($order_id)
{
        $query   = $this->db->query("SELECT id,cart_id,product_image,product_id,product_name,product_count,product_price,product_total,type from carted_item_details where order_id=$order_id");

        $data = $query->result();
        return $data;
}




/* public function get_cart_list($user_id)
{
        $where="";
        if($user_id !="")
        {
                $where= "where user_id=$user_id";
        }
        $query   = $this->db->query("SELECT id,product_id,name,variants,addon,addon_price,price,sum(quantity) as qty,sum(price) as tot_price,sum(total_amount) as total FROM `cart_details` $where GROUP BY variants,category,quantity,price ");

    
        $results = $query->result();
        foreach($results as $index=>$value)
        {
                $value->variants=$this->get_variant_name($value->variants);
                $value->addon=json_decode($value->addon);
                /* print_r($addonarray);  */
                /*foreach($value->addon as $index1=>$value1)
                {
                       $value1->addon_name=$this->get_addon_name($value1->addon_id);
                }
                $value->image_url=$this->get_product_image($value->product_id);
        }
        return $results;
}
 */

public function get_product_image($prod_id)
{
        $query   = $this->db->query("SELECT image_url from product_details where id=$prod_id");
        $results = $query->row();
        return $results->image_url;

}

public function get_addon_name($adid)
{
        $query   = $this->db->query("SELECT name from addon_details where id=$adid");
        $results = $query->row();
        return $results->name;
}
public function get_single_product($prod_id)
{
      
        $query   = $this->db->query("SELECT * from product_details where id=$prod_id and status !='Deleted' ");
        $result = $query->row();
        return $result;   
}
public function get_secondary_product_det($prod_id)
{       
        $query   = $this->db->query("SELECT variants,max_sale from product_secondary_details where product_id=$prod_id and status !='Deleted'");
        $result = $query->result();
        foreach($result as $index=>$value)
        {
                $result[$index]=array($value->variants,$this->get_variant_name($value->variants),$value->max_sale);
        }
      
        return $result;  
}

public function get_product_sec_details($data=array())
{
        $query   = $this->db->query("SELECT mrp,price,max_sale from product_secondary_details where product_id=$data[prod_id] and variants=$data[variant_id] and status !='Deleted'");
        $result = $query->result();
        return $result;  

}

public function get_user_details($user_id="")
{
        $query   = $this->db->query("SELECT * from user_add_details where user_id=$user_id");
        $result = $query->result();
        return $result;  

}

public function get_addons($category='')
{
   
    $data=array();
    if($category=='')
    {
    $query   = $this->db->query("SELECT id,name,price,mrp,image_url,max_sale FROM addon_details where status !='Deleted'" );
    }
    else
    {
    $query   = $this->db->query("SELECT id,name,price,mrp,image_url,max_sale FROM addon_details where category='$category' and status !='Deleted'");
    }
    $results = $query->result();
   
   return $results; 
}
public function insert_cart($data=array())
{
        $result= $this->db->insert('cart_details',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
}

public function insert_carted_item_details($data=array())
{
        $result= $this->db->insert('carted_item_details',$data);
        return $result; 
}

public function check_promocode($id,$phoneno,$amount=100)
{
        $result   = $this->db->where(array('id'=>$id,'status !='=>'Deleted','status !='=>'Hidden'))->get('promocode_details')->result_array();
        if($result)
        {
                if(!empty($prod_ids=json_decode($result[0]['products'])))
                {
                        $name=array();
                        $i=0;
                        foreach($prod_ids as $ids)
                        {
                                $name[$i]=$this->get_product_name($ids);
                        }
                        $result[0]['product_names']=$name;
                }
            
               $qry=$this->db->query("select no_of_usage from promocode_user_details where promo_id=".$result[0]['id']." and allowed_users=".$phoneno);
               $row=$qry->row();
               if($row)
               {
                       /* print_r($qry->row()); exit; */
                       $result[0]['user_usage']=$row->no_of_usage;
               }
               else
               {

                        $tbldata=array(
                                'promo_id'=>$result[0]['id'],
                                'allowed_users'=>$phoneno,
                                'no_of_usage'=>$result[0]['no_of_usage']

                        );
                        $this->db->insert('promocode_user_details',$tbldata);
                   
                       if($this->db->affected_rows())
                       {
                       $result[0]['user_usage']=$result[0]['no_of_usage'];  
                       }
                       else
                       {
                        $result[0]['user_usage'] ="";   
                       }
               }
        }
        return $result;
    
}

public function get_promocodes()
{
        $query   = $this->db->query("SELECT promocode_details.id as promo_id,promocode_details.promo_code,offer_details.* from promocode_details join offer_details on promocode_details.offer_id=offer_details.id WHERE promocode_details.status !='Deleted' and promocode_details.status !='Hidden' and offer_details.status !='Deleted'");
        return $query->result();    
}
public function get_product_name($product_id)
{
        $qry=$this->db->query("select name from product_details where id=".$product_id);
        $res=$qry->row()->name;     
        return $res;
}

public function insert_user_additional_data($data=array())
{
        $result= $this->db->insert('user_add_details',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
}
public function update_user_additional_data($data=array())
{
        $this->db->where('id', $data['id']);
        $result= $this->db->update('user_add_details',$data);
}
public function insert_order_details($data=array())
{
        $result= $this->db->insert('order_details',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
}

public function update_carted_items($cart_id,$order_id)
{
        $this->db->where('cart_id', $cart_id);
        $this->db->update('carted_item_details', array('order_id' => $order_id));
        $this->update_product_stock($cart_id);
}

public function update_product_stock($cart_id)
{
        $qry=$this->db->query("select product_variant,product_count,product_id,type from carted_item_details where cart_id=".$cart_id);
        $res=$qry->row();
        if($res)
        {
                if($res->type=='product')
                {
                $qry1=$this->db->query("update product_secondary_details set max_sale=max_sale -".$res->product_count." where product_id=".$res->product_id." and variants=".$res->product_variant);
                }
                else if($res->type=='addon')
                {
                $qry1=$this->db->query("update addon_details set max_sale = max_sale - ".$res->product_count." where id = ".$res->product_id);   
                }
        }
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

 public function get_delivery_charge($area)
 {
        $query   = $this->db->query("SELECT charge from delivery_charge_master where area=$area");
        $results = $query->row();
        if($results)
        {
        return $results->charge;
        }
        else
        {
        return 0;
        }
 }
 public function get_cart_items()
 {
        $query   = $this->db->query("SELECT name from cart_details");
        $result = $query->result();
        return json_encode($result);  
 }
 

 public function get_cart_id()
 {
        $query   = $this->db->query("SELECT id from cart_details");
        $result = $query->result();
        return $result;
 }

 public function update_promocode_usage($promo_id,$phoneno)
 {
        $this->db->query("update promocode_user_details set no_of_usage=no_of_usage-1 where promo_id='$promo_id' and allowed_users='$phoneno' ");
 }

 public function deleteproduct_from_cart($data)
 {
         $actual_tot=$data['actual_tot'];
         $promo=array();
      
                $this->db->delete('cart_details',array('id'=>$data['cart_id']));
                $this->db->delete('carted_item_details',array('cart_id'=>$data['cart_id'],'product_id'=>$data['product_id']));
         
         if($this->session->userdata('promocode'))
         {
                $act_tot=$actual_tot-$data['product_total'];
                $promo=$this->session->userdata('promocode');
               
                foreach($promo as $index=>$value)
                {
                        if($value['promo_category']=='tcv')
                        {
                                $act_tot=$act_tot-$value['value'];
                        }
                        else if($value['promo_category']=='perc')
                        {
                                $act_tot=$act_tot-($act_tot*($value['value']/100));
                        }
                               
                } 
                if($this->session->userdata('cart_total'))
                {
                        $this->session->set_userdata('cart_total',$act_tot);
                }
               

         }
         else
         {
         if($this->session->userdata('cart_total'))
         {
                 $this->session->set_userdata('cart_total',$this->session->userdata('cart_total')-$data['product_total']);
         }
         
        }
        if($this->session->userdata('cart_value'))
         {
         $this->session->set_userdata('cart_value',$this->session->userdata('cart_value')-$data['product_count']);
         }  
         else
         {
          $this->session->set_userdata('cart_value',0); 
         }
        
 }
 public function get_search_productlist($key)
 {
        $query   = $this->db->query("SELECT id,name from product_details where name like '%$key%' and status = 'In Stock' and p_display=1 order by name");
        $results = $query->result();
        return $results;
 }

 public function update_carted_product_count($data=array())
 {
         if($data)
         {
                 $tot=$this->db->query("select product_total,product_count from carted_item_details where cart_id=".$data['cart_id']);
                 $res=$tot->row();
                $this->db->query("UPDATE carted_item_details set product_total=(product_price *". $data['quantity']."), product_count=".$data['quantity']." WHERE cart_id=".$data['cart_id']);
                if($this->db->affected_rows())
                {
                        $qry=$this->db->query("select product_total,product_count from carted_item_details where cart_id=".$data['cart_id']);
                        $res1=$qry->row();
                        if($this->session->userdata('cart_total'))
                        {
                               
                        $this->session->set_userdata('cart_total',($this->session->userdata('cart_total')-$res->product_total)+$res1->product_total);
                        }
                        if($this->session->userdata('cart_value'))
                        {
                               
                        $this->session->set_userdata('cart_value',($this->session->userdata('cart_value')-$res->product_count)+$res1->product_count);
                        }

                }
               /*  $this->db->where('cart_id', $data['cart_id']);
                $this->db->update('carted_item_details', array('product_count' => $data['quantity']));  */
         }

 }

 public function get_ordereditem_details($order_id)
 {
        $query   = $this->db->query("SELECT product_name,product_count,product_total from carted_item_details where order_id=$order_id");
        $data = $query->result();
        return $data;
 }

 public function get_user_additional_data($user_id)
 {
        $query   = $this->db->query("SELECT id,email_id,address,addresstype,street,landmark,area from user_add_details where user_id='$user_id' and role='customer'");
        if($query->row())
        {
        $data = $query->row();
        }
        else
        {
        $data="";
        }
        return $data;

 }

 public function get_offers()
 {
        $query   = $this->db->query("SELECT id,name,description,image_url from offer_details where status !='Deleted'");
        $data = $query->result();
        return $data;

 }
 public function get_orders($user_id)
 {
        $query   = $this->db->query("SELECT id,order_total,items,order_time,status from order_details where customer_id=".$user_id);
        //.$user_id
        $data = $query->result();
        return $data; 
 }
 
  public function recentorders($order_id)
 {
        $query   = $this->db->query("SELECT id,order_total,items,order_time,status from order_details where id=".$order_id);
        //.$user_id
        $data = $query->result();
        return $data; 
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

 public function get_single_order($order_id)
 {
     $query   = $this->db->query("SELECT id,customer_id,delivery_boy_id,area,cart_total,discount,invoice_no,order_time,tax,delivery_charge,delivery_tax,tax_amount,order_total,payment_type,status from order_details where id=$order_id");
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
public function get_singlee_order($order_id)
{
		$this->db->select('order_details.*')
				->from('order_details')
				->where('id',$order_id);
		$query=$this->db->get();
		//print_r($query); exit;
		return $query->result_array();
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

 public function check_user_email_exist($email="")
 {
        $query=$this->db->query("select id,email_id,name from user_details where email_id='".$email."'");
        $results=$query->row();
        if($results)
        {
                return $results;
        }
        else
        {
                return 0;
        }
 }

 public function update_password($data="")
 {
         $result="";
        if($data)
        {
                $this->db->where(array('email_id'=> $data['email']));
                $result= $this->db->update('user_details',array('password'=>$data['password']));

        }
        echo $this->db->affected_rows();
 }

 public function get_minimum_order()
 {
     $query   = $this->db->query("SELECT min_order,delivery_extra_charge FROM minimum_order_extra_delivery where status !='Deleted'");
     $results = $query->result();
     return $results;
 }

}

?>