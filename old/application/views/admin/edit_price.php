<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Price</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/price_list">Price</a></li>
<li class="breadcrumb-item active">Edit Price</li>
</ol>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-title-2">
<h4>Edit Price</h4>
</div>
<?php foreach($price as $p)
{
    ?>

<form method="post" action="<?php echo base_url();?>admin/Admin_ctlr/price_update/<?php echo $p['price_id']; ?>">
<div class="card-body-table">
<div class="news-content-right pd-20">
<div class="form-group">
<label class="form-label">Product*</label>
<select name="product_id" class="form-control">
<option value="<?php echo $p['product_id'];?>" selected><?php echo $p['product_name'];?></option>
<?php foreach($product as $pro)
{?>

<option value="<?php echo $pro['product_id'];?>"><?php echo $pro['product_name'];?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label class="form-label">Product Price*</label>
<input type="text" name="product_price" class="form-control" value="<?php echo $p['product_price'];?>">
</div>
<div class="form-group">
<label class="form-label">Offer Price*</label>
<input type="text" name="offer_price" class="form-control" value="<?php echo $p['offer_price'];?>">
</div>
<!-- <div class="form-group">
<label class="form-label">Status*</label>
<select id="status" name="status" class="form-control">
<option selected>Active</option>
<option value="1">Inactive</option>
</select>
</div> -->
<input class="save-btn hover-btn" type="submit" value="Update Price"/>
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