<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Products</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/product_list">Product</a></li>
<li class="breadcrumb-item active">Edit Product</li>
</ol>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-title-2">
<h4>Edit Product</h4>
</div>
<?php foreach($product as $p)
{
    ?>
<form method="post" action="<?php echo base_url();?>admin/Admin_ctlr/product_update/<?php echo $p['product_id'];?>">
<div class="card-body-table">
<div class="news-content-right pd-20">
<div class="form-group">
<label class="form-label">Name*</label>
<input type="text" name="product_name" class="form-control" value="<?php echo $p['product_name'];?>">
</div>
<div class="form-group">
<label class="form-label">Category*</label>
<select name="cat_id" class="form-control">
<option value="<?php echo $p['category_id'];?>" selected><?php echo $p['category_name'];?></option>
<?php foreach($category as $cat)
{?>

<option value="<?php echo $cat['category_id'];?>"><?php echo $cat['category_name'];?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label class="form-label">Product Quantity*</label>
<input type="text" name="qty" class="form-control" value="<?php echo $p['product_qty'];?>">
</div>
<div class="form-group">
<label class="form-label">Unit*</label>
<select name="unit_id" class="form-control">
<option value="<?php echo $p['unit_id'];?>"><?php echo $p['unit_name'];?></option>
<?php foreach($unit as $row)
{?>

<option value="<?php echo $row['unit_id'];?>"><?php echo $row['unit_name'];?></option>
<?php } ?>
</select>
</div>
	<div class="form-group">
									<label class="control-label">Upload image (Size Width 500 , Height 500)</label>
									<div class="file">
										<div class="option-group">
											<span class="file-button btn-primary">Choose File</span>
											<input type="file" class="custom-file fileupload" name="filename">
											<input type="text" class="form-control filename1" id="uploader" placeholder="no file selected" readonly="" name="product_img"  value="<?php echo $p['product_image'];?>">

											<div class="myProgress" style="width: 94%;">
												<div class="myBar" id="prog_bar_div_id"  style="display:none;" >
													<p id="progress_bar_p_id" style=" margin-top: -11px; position: absolute; color: #fff; font-size: 12px;  margin-left: 20%; "></p>
												</div>
											</div>
											<div class="img_name" style="width:100%; "></div>
											<div class="col s12 load_upload_cls"> </div>

											
										</div>
									</div>
								</div>
<div class="form-group">
<label class="form-label">Description*</label>
<div class="card card-editor">
<div class="content-editor">
<textarea class="text-control" name="product_desc" placeholder="Enter Description"><?php echo $p['product_description'];?></textarea>
</div>
</div>
</div>
<!-- <div class="form-group">
<label class="form-label">Status*</label>
<select id="status" name="status" class="form-control">
<option selected>Active</option>
<option value="1">Inactive</option>
</select>
</div> -->
<input class="save-btn hover-btn" type="submit" value="Update Product"/>
</div>
</div>
</form>
<?php } ?>
</div>
</div>
</div>
</div>
</main>



<script type="text/javascript">
	tos_success 	= '<?php echo $this->session->flashdata('tos_success');?>';
	tos_error 		= '<?php echo $this->session->flashdata('tos_error');?>';
	tos_warning 	= '<?php echo $this->session->flashdata('tos_warning');?>';
	if(tos_success!=''){
		toastr.success(''+tos_success+'', '')
	}
	
	if(tos_error!=''){
		toastr.error(''+tos_error+'', '')
	}
	
	if(tos_warning!=''){
		toastr.warning(''+tos_warning+'', '')
	}
	
	
	  $(document).ready(function(){
		$('.fileupload').fileupload({
			url: "<?php echo base_url();?>admin/img_upload_ctrl/upload_about_first_img",
			dataType: 'json',
			
			done: function (e, data) {
				console.log('sry');
				if(data.result.status==true){
					console.log('helo');
					$('.filename1').html('');
					$('.filename1').val(data.result.file);
					$('.img_name').html('');
					$('.img_name').append(data.result.file+' UploadingCompleted...');
				}else{
					$('.img_name').html('');
					$('.img_name').append('Try again!..');   
				}
			}
		});
	});
	         
</script>