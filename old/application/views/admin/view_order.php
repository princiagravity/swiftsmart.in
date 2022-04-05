<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Order</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/order_list">Order</a></li>
<li class="breadcrumb-item active">Order Details</li>
</ol>
<?php foreach($order as $o)
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
<h4><?php echo $o['customer_name'];?></h4>
<span><?php echo $o['phone_no'];?>, </span>
<span><?php echo $o['address'];?></span><br/>
<span><?php echo $o['order_notes'];?></span>
</div>


<div class="shopowner-dts">
<div class="shopowner-dt-list">
<span class="left-dt">Order Number</span>
<span class="right-dt"><?php echo $o['order_number'];?></span>
</div>
<div class="shopowner-dt-list">
<span class="left-dt">Order Date</span>
<span class="right-dt"><?php echo $o['order_date'];?></span>
</div>

<?php foreach($product_det as $prod){ ?>

<div class="shopowner-dt-list">
<span class="left-dt"><?php echo $prod['product_name']; ?> <br/>
Price : <?php echo $prod['product_price']; ?> <br/>
Quaantity : <?php echo $prod['product_qty']; ?>  </span>
<span class="right-dt">
<img src="<?php echo base_url()?>public_html/upload/product/<?php echo $prod['product_image']; ?>" width="100%">
</span>
</div>


<?php } ?>


<div class="shopowner-dt-list">
<span class="left-dt">Grand Total</span>
<span class="right-dt"><?php echo $o['total_amount'];?></span>
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