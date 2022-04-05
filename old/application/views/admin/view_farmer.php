<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Farmer</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<?php if($this->session->userdata('designation')==1) { ?>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/farmers_list">Farmer</a></li>
<?php } ?>
<li class="breadcrumb-item active">Profile</li>
</ol>
<?php foreach($farmer as $f)
{?>
<div class="row">
<div class="col-lg-5 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-body-table">
<div class="shopowner-content-left text-center pd-20">
<div class="customer_img">
<img src="<?php echo base_url();?>admin_html/images/avatar/img-1.jpg" alt="">
</div>
<div class="shopowner-dt-left mt-4">
<h4><?php echo $f['farmer_name'];?></h4>
<span>Farmer</span>
</div>
<!-- <ul class="product-dt-purchases">
<li>
<div class="product-status">
Purchased <span class="badge-item-2 badge-status">15</span>
</div>
</li>
<li>
<div class="product-status">
Rewards <span class="badge-item-2 badge-status">5</span>
</div>
</li>
</ul> -->
<div class="shopowner-dts">
<div class="shopowner-dt-list">
<span class="left-dt">Address</span>
<span class="right-dt"><?php echo $f['farmer_address'];?></span>
</div>
<div class="shopowner-dt-list">
<span class="left-dt">Phone No</span>
<span class="right-dt"><?php echo $f['farmer_phn_no'];?></span>
</div>
<div class="shopowner-dt-list">
<span class="left-dt">Email</span>
<span class="right-dt"><?php echo $f['farmer_email_id'];?></span>
</div>
<div class="shopowner-dt-list">
<span class="left-dt">Area</span>
<span class="right-dt"><?php echo $f['area_name'];?></span>
</div>
<div class="shopowner-dt-list">
<span class="left-dt">Id Proof Type</span>
<span class="right-dt"><?php echo $f['id_proof_name'];?></span>
</div>
<div class="shopowner-dt-list">
<span class="left-dt">Id Proof Number</span>
<span class="right-dt"><?php echo $f['farmer_id_proof_details'];?></span>
</div>

<div class="shopowner-dt-list">
<span class="left-dt">Id Proof</span>

</div>
<img src="<?php echo base_url();?>public_html/upload/id_proof/<?php echo $f['farmer_id_proof_img'];?>" width="100%"/>


<div class="shopowner-dt-list">
<span class="left-dt">Achievements</span>
<span class="right-dt"><?php echo $f['achivements'];?></span>
</div>
<div class="shopowner-dt-list">
<span class="left-dt">Nearest Store</span>
<span class="right-dt"><?php echo $f['store_name'];?></span>
</div>
<div class="shopowner-dt-list">
<span class="left-dt">Products</span>
<span class="right-dt">
<?php foreach($product as $pro){
    ?>
<li><?php echo $pro['product_name'];?></li>
<?php } ?>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</main>