<?php
class Delivery_model extends CI_Model {

public function __construct()
{
        $this->load->database();
       
}
public function check_user_exist($username,$password)
{
$sucess=1;        
$query=$this->db->query("select id,username,mobile,name,role from user_details where mobile='$username' and password='$password'");
$result=$query->row();
if($result)
{
        $userdata=array(
                'user_id'=>$result->id,
                'username'=>$result->username,
                'name'=>$result->name,
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

public function get_order_list()
{
        $result=array();
        $user_id=$this->session->userdata('user_id');
        $query=$this->db->query("select id,customer_id,order_time,order_total,loc_latitude,loc_longitude,payment_type,status from order_details where delivery_boy_id=$user_id");
        $result=$query->result();
        if($result)
        {
                foreach ($result as $index=>$value)
        {
                $que=$this->db->query("select name,address,mobile from user_add_details where user_id=$value->customer_id");
                $value->customer=$que->row();
        }
        }
        return $result;
}

public function update_order_details($data=array())
{
        if($data)
        {
                $this->db->where(array('id'=> $data['id'],'delivery_boy_id'=>$data['delivery_boy_id']));
                $this->db->update('order_details', array('status'=>$data['status']));
        }
}

}


?>