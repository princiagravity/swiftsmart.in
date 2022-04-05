

<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="#">Make Payment</a></li>
</ol>
</div>
</nav>
<section class="py-4 osahan-main-body">
<div class="container mobile_display">
<div class="row">
<div class="tab-content col-md-6" id="myTabContent" style="margin:0px auto; ">
<div class="tab-pane fade show active" id="completed" role="tabpanel" aria-labelledby="completed-tab">
<div class="order-body">
 <?php if($orderslist)
 { foreach($orderslist as $order)
  {?>
 
<div class="pb-3">

<a href="<?php echo site_url('single-order/'.$order->id)?>" class="text-decoration-none text-dark">
<div class="p-3 rounded shadow-sm bg-white">
 <h2>Make Payment  <a href="upi://pay?pa=swiftmicro@fbl&pn=swiftmart&am=<?php echo $order->order_total; ?>" 
 style="background: #ed1c24;
    float: right;
    font-size: 16px;
    padding: 5px 10px;
    color: #fff;">Pay Now</a></h2>
<!--<div class="d-flex align-items-center mb-3">
<p class="bg-success text-white py-1 px-2 mb-0 rounded small"><?php echo $order->status_name;?></p>
<p class="text-muted ml-auto small mb-0"><i class="icofont-clock-time"></i><?php echo $order->order_time;?></p>
</div>-->
<div class="d-flex">
<h6 class="text-muted m-0">Order. No<br>
<span class="text-dark font-weight-bold"><?php echo $order->id;?></span>
</h6>

<h6 class="text-muted m-0 ml-auto">Total Payment<br>
<span class="text-dark font-weight-bold">Rs <?php echo $order->order_total;?></span>
    <input type="hidden" name="product_id" value="<?php echo $order->id; ?>"></a>
</h6>
</div>
</div>
</a>
</div>
  <?php }}else{ echo "No Orders";}?>


</div>
</div>

</div>
</div>
</div>

<style>

code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	
	@media (max-width:768px)
	{
		.mobile_display
		{
			display:block;
		}
		.desktop_display
		{
			display:none;
		}
	}
	
	@media (min-width:768px)
	{
		.mobile_display
		{
			display:none;
		}
		.desktop_display
		{
			display:display;
		}
	}
	
	
	

</style>



<!--test-->


<div class="container desktop_display">
<div class="row">
<div class="tab-content col-md-4" id="myTabContent" style="margin:0px auto; ">
<div class="tab-pane fade show active" id="completed" role="tabpanel" aria-labelledby="completed-tab">
<div class="order-body">
<?php if($orderslist)
 { foreach($orderslist as $order)
  {?>
 
		<form action="<?php echo site_url('qrgenerator/'.$order->id)?>" method="post">
			
						
							<input type="hidden" name="qr_code" class="form-control" placeholder="Product ID" >
						
							<!--<input type="text" name="qr_level" class="form-control" placeholder="Product Name" >-->
						 <h5>Make Payment <button type="submit" class="btn btn-success"> Scan QR Code </button><span style="float:right">Rs <?php echo $order->order_total; ?> </span></h5>
							
						
		</form>
 <?php }  } ?>
		<?php 
			if (isset($image_name)) {
		?>
		<p>
			<img src="<?php echo base_url('assets/QR/'.$image_name)?>"/>
		</p>
		<?php
			}
		?>


</div>
</div>

</div>
</div>
</div>



<!--end-->



<!--<div id="container">
	<h1>Welcome to CodeIgniter QR-Code Generator!</h1>

	<div id="body">
		<p>If you generate a QR-Code please enter  any code and level.</p>
<?php if($orderslist)
 { foreach($orderslist as $order)
  {?>
		<form action="<?php echo site_url('qrgenerator/'.$order->id)?>" method="post">
			<table class="table table-responsive">
				<thead>
					<tr>
						<td>
							<lebel>Enter QR Code : </lebel>
						</td>
						<td>
							<lebel>Enter QR Level : </lebel>
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
						
							<input type="text" name="qr_code" class="form-control" placeholder="Product ID" >
						</td>
						<td>
							<input type="text" name="qr_level" class="form-control" placeholder="Product Name" >
						</td>
					</tr>
					<tr>
						<td>
							<button type="submit" class="btn btn-success"> Submit </button>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
 <?php }  } ?>
		<?php 
			if (isset($image_name)) {
		?>
		<p>
			<img src="<?php echo base_url('assets/QR/'.$image_name)?>" />
		</p>
		<?php
			}
		?>
	</div>
	<p></p>
	<p></p>
</div>-->





</section>
