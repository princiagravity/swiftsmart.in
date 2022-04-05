

<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url("my-order");?>">My order</a></li>
</ol>
</div>
</nav>
<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
<div class="col-md-3">
<ul class="nav nav-tabs custom-tabs border-0 flex-column bg-white rounded overflow-hidden shadow-sm p-2 c-t-order" id="myTab" role="tablist">
<li class="nav-item" role="presentation">
<a class="nav-link border-0 text-dark py-3 active" id="confirmed-tab" data-toggle="tab" href="#confirmed" role="tab" aria-controls="confirmed" aria-selected="true">
<i class="icofont-check-alt mr-2 text-success mb-0"></i> Confirmed</a>
</li>
<li class="nav-item" role="presentation">
<a class="nav-link border-0 text-dark py-3" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="true">
<i class="icofont-check-alt mr-2 text-success mb-0"></i> Completed</a>
</li>
<li class="nav-item border-top" role="presentation">
<a class="nav-link border-0 text-dark py-3" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="false">
<i class="icofont-wall-clock mr-2 text-warning mb-0"></i> On Progress</a>
</li>
<li class="nav-item border-top" role="presentation">
<a class="nav-link border-0 text-dark py-3" id="canceled-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">
<i class="icofont-close-line mr-2 text-danger mb-0"></i> Canceled</a>
</li>
</ul>
</div>
<div class="tab-content col-md-9" id="myTabContent">
<div class="tab-pane fade show active" id="completed" role="tabpanel" aria-labelledby="completed-tab">
<div class="order-body">
 <?php if($orderslist)
 { foreach($orderslist as $order)
  {?>
<div class="pb-3">
<a href="<?php echo site_url('single-order/'.$order->id)?>" class="text-decoration-none text-dark">
<div class="p-3 rounded shadow-sm bg-white">
<div class="d-flex align-items-center mb-3">
<p class="bg-success text-white py-1 px-2 mb-0 rounded small"><?php echo $order->status_name;?></p>
<p class="text-muted ml-auto small mb-0"><i class="icofont-clock-time"></i><?php echo $order->order_time;?></p>
</div>
<div class="d-flex">
<p class="text-muted m-0">Order. No<br>
<span class="text-dark font-weight-bold"><?php echo $order->id;?></span>
</p>
<p class="text-muted m-0 ml-auto">Status<br>
<span class="text-dark font-weight-bold"><?php echo $order->status_name;?></span>
</p>
<p class="text-muted m-0 ml-auto">Total Payment<br>
<span class="text-dark font-weight-bold">Rs <?php echo $order->order_total;?></span>
    <input type="hidden" name="product_id" value="<?php echo $order->id; ?>"></a>
</p>
</div>
</div>
</a>
</div>
  <?php }}else{ echo "No Orders";}?>


</div>
</div>
<!--
<div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
<div class="order-body">
<div class="pb-3">
<a href="status_onprocess.html" class="text-decoration-none text-dark">
<div class="p-3 rounded shadow-sm bg-white">
<div class="d-flex align-items-center mb-3">
<p class="bg-warning text-white py-1 px-2 rounded small m-0">On Process</p>
<p class="text-muted ml-auto small m-0"><i class="icofont-clock-time"></i> 06/04/2020</p>
</div>
<div class="d-flex">
<p class="text-muted m-0">Transaction. ID<br>
<span class="text-dark font-weight-bold">#321DERS</span>
</p>
<p class="text-muted m-0 ml-auto">Delivered to<br>
<span class="text-dark font-weight-bold">Home</span>
</p>
<p class="text-muted m-0 ml-auto">Total Payment<br>
<span class="text-dark font-weight-bold">$12.74</span>
</p>
</div>
</div>
</a>
</div>
<div class="pb-3">
<a href="status_onprocess.html" class="text-decoration-none text-dark">
<div class="p-3 rounded shadow-sm bg-white">
<div class="d-flex align-items-center mb-3">
<p class="bg-warning text-white py-1 px-2 rounded small m-0">Dispatching</p>
<p class="text-muted ml-auto small m-0"><i class="icofont-clock-time"></i> 06/04/2020</p>
</div>
<div class="d-flex">
<p class="text-muted m-0">Transaction. ID<br>
<span class="text-dark font-weight-bold">#321DERS</span>
</p>
<p class="text-muted m-0 ml-auto">Delivered to<br>
<span class="text-dark font-weight-bold">Home</span>
</p>
<p class="text-muted m-0 ml-auto">Total Payment<br>
<span class="text-dark font-weight-bold">$12.74</span>
</p>
</div>
</div>
</a>
</div>
<div class="pb-3">
<a href="status_onprocess.html" class="text-decoration-none text-dark">
<div class="p-3 rounded shadow-sm bg-white">
<div class="d-flex align-items-center mb-3">
<p class="bg-warning text-white py-1 px-2 rounded small m-0">On the way</p>
<p class="text-muted ml-auto small m-0"><i class="icofont-clock-time"></i> 06/04/2020</p>
</div>
<div class="d-flex">
<p class="text-muted m-0">Transaction. ID<br>
 <span class="text-dark font-weight-bold">#321DERS</span>
</p>
<p class="text-muted m-0 ml-auto">Delivered to<br>
<span class="text-dark font-weight-bold">Home</span>
</p>
<p class="text-muted m-0 ml-auto">Total Payment<br>
<span class="text-dark font-weight-bold">$12.74</span>
</p>
</div>
</div>
</a>
</div>
</div>
</div>
<div class="tab-pane fade" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">
<div class="order-body">
<div class="pb-3">
<a href="status_canceled.html" class="text-decoration-none text-dark">
<div class="p-3 rounded shadow-sm bg-white">
<div class="d-flex align-items-center mb-3">
<p class="bg-danger text-white py-1 px-2 rounded small m-0">Failed Payment</p>
<p class="text-muted ml-auto small m-0"><i class="icofont-clock-time"></i> 06/04/2020</p>
</div>
<div class="d-flex">
<p class="text-muted m-0">Transaction. ID<br>
<span class="text-dark font-weight-bold">#321DERS</span>
</p>
<p class="text-muted m-0 ml-auto">Delivered to<br>
<span class="text-dark font-weight-bold">Home</span>
</p>
<p class="text-muted m-0 ml-auto">Total Payment<br>
<span class="text-dark font-weight-bold">$12.74</span>
</p>
</div>
</div>
</a>
</div>
<div class="pb-3">
<a href="status_canceled.html" class="text-decoration-none text-dark">
<div class="p-3 rounded shadow-sm bg-white">
<div class="d-flex align-items-center mb-3">
<p class="bg-danger text-white py-1 px-2 rounded small m-0">Canceled</p>
<p class="text-muted ml-auto small m-0"><i class="icofont-clock-time"></i> 06/04/2020</p>
</div>
<div class="d-flex">
<p class="text-muted m-0">Transaction. ID<br>
<span class="text-dark font-weight-bold">#321DERS</span>
</p>
<p class="text-muted m-0 ml-auto">Delivered to<br>
<span class="text-dark font-weight-bold">Home</span>
</p>
<p class="text-muted m-0 ml-auto">Total Payment<br>
<span class="text-dark font-weight-bold">$12.74</span>
</p>
</div>
</div>
</a>
</div>
</div>
</div>
-->
</div>
</div>
</div>
</section>
