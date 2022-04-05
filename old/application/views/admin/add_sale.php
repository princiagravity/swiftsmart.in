

<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Sale</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>sale/<?php echo $this->session->userdata('farmer_id');?>">Sale</a></li>
<li class="breadcrumb-item active">Add Sale</li>
</ol>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-title-2">
<h4>Sale</h4>
</div>
<form method="post" action="#">
<!-- action="<?php echo base_url();?>admin/Admin_ctlr/sell_insert"> -->
<div class="card-body-table">
<div class="news-content-right pd-20">
    <?php 
    foreach($productname as $pro)
    {?>
<div class="form-group">
<label class="form-label">Product Name*</label>
<input type="text" name="product_name" class="form-control" value="<?php echo $pro['product_name'];?>" disabled>
</div>
<?php } ?>


<div class="form-group">
<label class="form-label">Product Quantity*</label>
<input type="text" name="qty" class="form-control" placeholder="Product Quantity">
</div>

<div class="form-group">
<label class="form-label">Product Price*</label>
<input type="text" name="qty" class="form-control" placeholder="Product Price">
</div>

							
<div class="form-group">
<label class="form-label">Description*</label>
<div class="card card-editor">
<div class="content-editor">
<textarea class="text-control" name="product_desc" placeholder="Enter Description"></textarea>
</div>
</div>
</div>

<input class="save-btn hover-btn" type="submit" value="Sell"/>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</main>



