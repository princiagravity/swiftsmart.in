<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Categories</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/category_list">Categories</a></li>
<li class="breadcrumb-item active">Edit Category</li>
</ol>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-title-2">
<h4>Edit Category</h4>
</div>
<?php foreach($category as $c)
{?>
<form method="post" action="<?php echo base_url();?>admin/Admin_ctlr/category_update/<?php echo $c['category_id'];?>" >
<div class="card-body-table">
<div class="news-content-right pd-20">
<div class="form-group">
<label class="form-label">Name*</label>
<input type="text" name="cat_name" class="form-control" value="<?php echo $c['category_name'];?>">
</div>
<div class="form-group">
<label class="form-label">Category Image*</label>
<div class="file">
										<div class="option-group">
											
											<input type="file" class="custom-file fileupload1" name="filename" >
											<input type="text" class="form-control filename2" id="uploader" placeholder="no file selected" readonly="" name="category_image" value="<?php echo $c['category_image'];?>">

											<div class="myProgress" style="width: 94%;">
												<div class="myBar" id="prog_bar_div_id1"  style="display:none;" >
													<p id="progress_bar_p_id1" style=" margin-top: -11px; position: absolute; color: #fff; font-size: 12px;  margin-left: 20%; "></p>
												</div>
											</div>
											<div class="img_name1" style="width:100%; "></div>
											<div class="col s12 load_upload_cls1"> </div>

											
										</div>
									</div>
</div>
<div class="form-group">
<label class="form-label">Description*</label>
<div class="card card-editor">
<div class="content-editor">
<textarea class="text-control" name="cat_desc" placeholder="Enter Description"><?php echo $c['category_description'];?></textarea>
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
<input class="save-btn hover-btn" type="submit" value="Update Category"/>
</div>
</div>
</form>
<?php }
?>
</div>
</div>
</div>
</div>
</main>