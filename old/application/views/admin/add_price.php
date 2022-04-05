<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Price</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/price_list">Price</a></li>
<li class="breadcrumb-item active">Add Price</li>
</ol>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-title-2">
<h4>Add New Price</h4>
</div>
<form method="post" action="<?php echo base_url();?>admin/Admin_ctlr/price_insert">
<div class="card-body-table">
<div class="news-content-right pd-20">
<div class="form-group">
<label class="form-label">Product*</label>
<select name="product_id" class="form-control">
<option selected>--Select Product--</option>
<?php foreach($product as $pro)
{?>

<option value="<?php echo $pro['product_id'];?>"><?php echo $pro['product_name'];?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label class="form-label">Product Price*</label>
<input type="text" name="product_price" class="form-control" placeholder="Product Price">
</div>
<div class="form-group">
<label class="form-label">Offer Price*</label>
<input type="text" name="offer_price" class="form-control" placeholder="Offer Price">
</div>
<!-- <div class="form-group">
<label class="form-label">Status*</label>
<select id="status" name="status" class="form-control">
<option selected>Active</option>
<option value="1">Inactive</option>
</select>
</div> -->
<input class="save-btn hover-btn" type="submit" value="Add New Price"/>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</main>