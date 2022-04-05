<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Img_upload_ctrl extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$data = array();
		$this->load->model('admin_model');
	}
	
	
	public function upload_about_first_img(){
		$return = array('status'=>false);
		$return['i'] =$this->input->post('i');
		$file_name = 'product_img'.base_convert(time(),10,36);
		$filename = $this->input->post('filename');	
		$config['upload_path'] = 'public_html/upload/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
		$config['max_size']	= '1000000';
		$config['max_width']  = '102400';
		$config['max_height']  = '76800';
		$config['file_name'] = $file_name.'.jpg';
		$config['overwrite'] = false;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('filename')) {
			$return['error']= $this->upload->display_errors();
			echo json_encode($return);
		}else{
			$data = $this->upload->data();
			$return['file']= $data['file_name'].'?t='.base_convert(time(),10,36);
			$config = array();
			//$config['image_library'] = 'gd2';
			$config['source_image']	= "public_html/upload/product/".$data['file_name'];
			$config['new_image']	= "public_html/upload/product/thumb/".$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;	
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();	
			$return['status']= true;	
			echo json_encode($return);
		}
	}	

public function upload_slider_img(){
		$return = array('status'=>false);
		$return['i'] =$this->input->post('i');
		$file_name = 'slider_img'.base_convert(time(),10,36);
		$filename = $this->input->post('filename');	
		$config['upload_path'] = 'public_html/upload/slider/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
		$config['max_size']	= '1000000';
		$config['max_width']  = '102400';
		$config['max_height']  = '76800';
		$config['file_name'] = $file_name.'.jpg';
		$config['overwrite'] = false;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('filename')) {
			$return['error']= $this->upload->display_errors();
			echo json_encode($return);
		}else{
			$data = $this->upload->data();
			$return['file']= $data['file_name'].'?t='.base_convert(time(),10,36);
			$config = array();
			//$config['image_library'] = 'gd2';
			$config['source_image']	= "public_html/upload/slider/".$data['file_name'];
			$config['new_image']	= "public_html/upload/slider/thumb/".$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;	
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();	
			$return['status']= true;	
			echo json_encode($return);
		}
	}	
public function upload_category_img(){
		$return = array('status'=>false);
		$return['i'] =$this->input->post('i');
		$file_name = 'category_img'.base_convert(time(),10,36);
		$filename = $this->input->post('filename');	
		$config['upload_path'] = 'public_html/upload/category/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
		$config['max_size']	= '1000000';
		$config['max_width']  = '102400';
		$config['max_height']  = '76800';
		$config['file_name'] = $file_name.'.jpg';
		$config['overwrite'] = false;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('filename')) {
			$return['error']= $this->upload->display_errors();
			echo json_encode($return);
		}else{
			$data = $this->upload->data();
			$return['file']= $data['file_name'].'?t='.base_convert(time(),10,36);
			$config = array();
			//$config['image_library'] = 'gd2';
			$config['source_image']	= "public_html/upload/category/".$data['file_name'];
			$config['new_image']	= "public_html/upload/category/thumb/".$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;	
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();	
			$return['status']= true;	
			echo json_encode($return);
		}
	}	

public function upload_offer_img(){
		$return = array('status'=>false);
		$return['i'] =$this->input->post('i');
		$file_name = 'offer_img'.base_convert(time(),10,36);
		$filename = $this->input->post('filename');	
		$config['upload_path'] = 'public_html/upload/offer/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
		$config['max_size']	= '1000000';
		$config['max_width']  = '102400';
		$config['max_height']  = '76800';
		$config['file_name'] = $file_name.'.jpg';
		$config['overwrite'] = false;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('filename')) {
			$return['error']= $this->upload->display_errors();
			echo json_encode($return);
		}else{
			$data = $this->upload->data();
			$return['file']= $data['file_name'].'?t='.base_convert(time(),10,36);
			$config = array();
			//$config['image_library'] = 'gd2';
			$config['source_image']	= "public_html/upload/offer/".$data['file_name'];
			$config['new_image']	= "public_html/upload/offer/thumb/".$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;	
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();	
			$return['status']= true;	
			echo json_encode($return);
		}
	}	
	
	public function upload_deal_img(){
		$return = array('status'=>false);
		$return['i'] =$this->input->post('i');
		$file_name = 'deal_img'.base_convert(time(),10,36);
		$filename = $this->input->post('filename');	
		$config['upload_path'] = 'public_html/upload/deal/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
		$config['max_size']	= '1000000';
		$config['max_width']  = '102400';
		$config['max_height']  = '76800';
		$config['file_name'] = $file_name.'.jpg';
		$config['overwrite'] = false;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('filename')) {
			$return['error']= $this->upload->display_errors();
			echo json_encode($return);
		}else{
			$data = $this->upload->data();
			$return['file']= $data['file_name'].'?t='.base_convert(time(),10,36);
			$config = array();
			//$config['image_library'] = 'gd2';
			$config['source_image']	= "public_html/upload/deal/".$data['file_name'];
			$config['new_image']	= "public_html/upload/deal/thumb/".$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;	
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();	
			$return['status']= true;	
			echo json_encode($return);
		}
	}	
	
public function upload_id_proof_img(){		
	$image_info = getimagesize($_FILES["filename"]["tmp_name"]);
	$image_width = $image_info[0];
	$image_height = $image_info[1];


	$return = array('status'=>false,'e_type'=>'0');
	$return['i'] =$this->input->post('i');
	$file_name = 'idproof_img'.base_convert(time(),10,36);
	$filename = $this->input->post('filename');	
	$config['upload_path'] = 'public_html/upload/id_proof/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
	$config['max_size']	= '1000000';
	$config['max_width']  = '102400';
	$config['max_height']  = '76800';
	$config['file_name'] = $file_name.'.jpg';
	$config['overwrite'] = false;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('filename')) {
			$return['error']= $this->upload->display_errors();
			echo json_encode($return);
		}else{
			$data = $this->upload->data();
			$return['file']= $data['file_name'].'?t='.base_convert(time(),10,36);
			$config = array();
			
			$config['source_image']	= "public_html/upload/id_proof/".$data['file_name'];
			$config['new_image']	= "public_html/upload/id_proof/thumb".$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;	
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();	
			$return['status']= true;				
			$return['e_type']= '2';	
			echo json_encode($return);
		}

}	
	
public function upload_adv_img(){
		$return = array('status'=>false);
		$return['i'] =$this->input->post('i');
		$file_name = 'slider_img'.base_convert(time(),10,36);
		$filename = $this->input->post('filename');	
		$config['upload_path'] = 'public_html/upload/adv/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
		$config['max_size']	= '1000000';
		$config['max_width']  = '102400';
		$config['max_height']  = '76800';
		$config['file_name'] = $file_name.'.jpg';
		$config['overwrite'] = false;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('filename')) {
			$return['error']= $this->upload->display_errors();
			echo json_encode($return);
		}else{
			$data = $this->upload->data();
			$return['file']= $data['file_name'].'?t='.base_convert(time(),10,36);
			$config = array();
			//$config['image_library'] = 'gd2';
			$config['source_image']	= "public_html/upload/adv/".$data['file_name'];
			$config['new_image']	= "public_html/upload/adv/thumb/".$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;	
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();	
			$return['status']= true;	
			echo json_encode($return);
		}
	}		
	

}



?>