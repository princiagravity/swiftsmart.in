<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url("checkout");?>">Checkout</a></li>
</ol>
</div>
</nav>
<section class="py-4 osahan-main-body">
<div class="container">

     <?php
        $phone_no=$name=$email_id=$area=$address=$customer_id=$street=$landmark=$addresstype="";
        $name=$_SESSION['userdata']['name'];
        $phone_no=$_SESSION['userdata']['mobile'];
        if($customer)
        {
          $customer_id=$customer->id;
          $email_id=$customer->email_id;
          $address=$customer->address;
          $addresstype=$customer->addresstype;
          $street=$customer->street;
          $landmark=$customer->landmark;
          $area=$customer->area;
        }
        ?>
		
		<style>
		.data-content
		{
			display:block;
			width:100% !important;
			max-width:100% !important;
		}
    #popupcontainer {
    width: 100%;
    height: 100%;
    top: 0;
    right:0;
    bottom:0;
    left:0;
    position: fixed;
    z-index:1000;
    /* visibility: hidden; */
    display: none;
    background-color: rgba(22,22,22,0.5); /* complimenting your modal colors */
}
#popupcontainer:target {
    visibility: visible;
    display: block;
}

		</style>
 <form id="confirm_payment" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" >
 <div class="row">
<div class="col-lg-8">
<div>
<div class="bg-white rounded shadow-sm overflow-hidden" style="padding:10px 20px">
 <h6 class="text-center mb-0 text-white">Billing Information</h6>
<div class="form-group">
<label for="exampleInputName1">Full Name</label>
<input placeholder="Enter Name" type="text" class="form-control" name="name" value="<?php echo $name;?>" required readonly>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input placeholder="Enter Email" type="email" class="form-control" name="email_id" value="<?php echo $email_id;?>" required>
</div>
<div class="form-group">
<label for="exampleInputNumber1">Phone Number</label>
<input placeholder="Enter Phone Number" type="number" class="form-control" name="mobile" value="<?php echo $phone_no;?>" id="phone_no" required readonly>
</div>
<div class="form-group">
<label for="exampleInputNumber1">Shipping Area</label>

<select  class="form-control" name="area" id="area" class="form-group"  required style="width: 100%;background:#e8f0fe;color:#000" required>
                      <?php
                      if($area=="")
                      {
                      ?>
                          <option value="" class="form-group" selected disabled>Select Area</option>
                          <?php
                          } ?>
                    <?php
                    foreach($arealist as $index=>$value)
                    {
                      if($index==$area)
                      {
                        ?>
                        <option value="<?php echo $index;?>" selected><?php echo $value?></option>
                        <?php
                      }
                      else
                      {
                        ?>
                        <option value="<?php echo $index;?>"><?php echo $value?></option>
                        <?php
                    }}?>
                      </select>

</div>

<div class="form-group">
<label for="exampleInputNumber1">Address Type</label>
                    <select  class="form-control" name="addresstype" id="addresstype" class="form-group"  required style="width: 100%;background:#e8f0fe;color:#000" required>
                    <?php
                      if($addresstype=="")
                      {
                      ?>
                          <option value="" class="form-group" selected disabled>Select Address Type</option>
                          <?php
                          }
                          else{?>
                          <option value="<?php echo $addresstype;?>" class="form-group" selected><?php echo $addresstype;?></option>
                         <?php } ?>
                          
                          <option class="form-group" value="House">House</option>
                          <option class="form-group" value="Office">Office</option>
                          <option class="form-group" value="Appartments">Appartments</option>
                          <option class="form-group" value="Other">Other</option>
                    </select>
</div>


<div class="form-group">
<label for="exampleInputNumber1">Address/Floor</label>
 <textarea  class="form-control" style="background:#e8f0fe;color:#000" name="address" value="<?php echo $address;?>" id="address" required><?php echo $address;?></textarea>
</div>

<div class="form-group">
<label for="exampleInputNumber1">Street Name</label>
   <input  class="form-control" style="background:#e8f0fe;color:#000" type="text" name="street" value="<?php echo $street;?>" id="street" required>
</div>

<div class="form-group">
<label for="exampleInputNumber1">Landmark</label>
 <input  class="form-control" style="background:#e8f0fe;color:#000" type="text" name="landmark" value="<?php echo $landmark;?>" id="landmark" required>
</div>



<div class="form-group">
<h6>Have A Coupon?</h6>
<label for="exampleInputNumber1"><p class="cart-status"><?php  if($this->session->userdata('promoid')){?> Successfully Applied <?php } else{?>Select coupon code here &amp; get awesome discounts!<?php }?> &nbsp;&nbsp;</p><a href="#" class="get_offers">View Offers</a></label>
 
<div class="input-group coupon-form">

 <input type="hidden" id="actual_total" value="<?php $items_total;?>">
 <input type="hidden" id="total_amount" name="total_amount" value="<?php echo $this->session->userdata('cart_total');?>">
<!-- <input type="text" placeholder="Coupon Code" class="form-control promocode" placeholder="SWIFT30"> -->
<select class="form-control promocode" class="promocode" name="promo_code">
                    <option value="" selected disabled >Choose</option>
                      <?php if($promolist){foreach($promolist as $promo)
                      {
                      if(($this->session->userdata('promoid')) && $this->session->userdata('promoid') == $promo->promo_id)
                      {?>
                      <option selected value="<?php echo $promo->promo_id;?>">#<?php echo $promo->promo_code;?></option>
                        <?php
                      }else{ ?>
                      <option value="<?php echo $promo->promo_id;?>">#<?php echo $promo->promo_code;?></option>
                      <?php } }
                      }?>
                     
                    </select>
               
<span class="input-group-append">
<button type="submit" class="btn btn-success  cart-apply"> Apply</button>
</span>

</div>

</div>
<!-- my modal-->
<div id="popupcontainer" class="">

<!-- Modal content -->

  <div class="container" id="offercode_modal">
 
    <div class="row">
      <?php if($promolist){foreach($promolist as $promo){
      ?>
   <div class="card" style="margin:10% auto;">
   <h6 class="card-header"><span class="close" onclick="$('#popupcontainer').hide()">&times;</span></h6>
     <div class="card-body">

     <h6 class="card-header"><?php echo $promo->name;?></h6>
<h7 class="card-title">Code: #<?php echo $promo->promo_code;?></h7>
<p class="card-text"><?php echo $promo->description;?></p>
<div class="card text-right"><a href="#" class="btn btn-primary use_code" style="background-color: #049444;
    border-color: #026930;" id="<?php echo $promo->promo_id;?>">Use</a></div>
   </div>
  
   </div>
   <?php   }}
   else
   {
     ?>
    <div class="card"  style="margin:10% auto;">
    <h6 class="card-header"><span class="close" onclick="$('#popupcontainer').hide()">&times;</span></h6>
    <div class="card-body">
      <h7 class="card-text">Offers Not Available</h7>
    </div>
    </div>
    <?php
   }?>
    </div>
  </div>
  


</div>
<div class="form-group">
<h6>Payment & Delivery Type Choose</h6>
<div>
<input id="fastShipping" class="pay_type" type="radio" name="selector" value="cash on delivery" checked>
                      <label for="fastShipping">Cash </label>
                      <div class="check"></div>
					  </div>
					  <div>
					   <input id="normalShipping" class="pay_type" type="radio" name="selector" value="card on delivery">
                      <label for="normalShipping">UPI Payment </label>
                      <div class="check"></div>
					  </div>
					  <input type="hidden" id="payment_type" name="payment_type" value="cash on delivery">
                  <input type="hidden" id="status" name="status" value="1">
					  
</div>


</div>
</div>
</div>


<div class="col-lg-4">
<div class="sticky_sidebar">
<div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
<div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
<img alt="Swiftsmart" src="<?php echo base_url(); ?>public_html/img/logo.png" class="mr-3 rounded-circle img-fluid">
<div class="d-flex flex-column">
<h6 class="mb-1 font-weight-bold">Swiftsmart</h6>
<p class="mb-0 small text-muted"><i class="feather-map-pin"></i> Welcome To Santhwanam Organic Store!</p>
</div>
</div>
<div>
<div class="bg-white p-3 clearfix">
<p class="font-weight-bold small mb-2">Bill Details</p>
<p class="mb-1">Sub Total  <span class="float-right text-dark">Rs <?php echo $items_total; ?></span></p>
<input type="hidden" name="cart_total" value="<?php echo $items_total;?>" id="items">

<p class="mb-1">Discount<span class="float-right text-dark discount">Rs <?php echo $discount;?></span></p>
<input type="hidden" name="discount" id="discount" value="<?php echo $discount;?>">

<!--<p class="mb-3">Tax(5%)<span data-toggle="tooltip" data-placement="top" title="Delivery partner fee - $3" class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark tax">Rs <?php echo $tax_amount;?></span></p>-->
<input type="hidden" name="tax_amount" id="tax_amount" value="<?php echo $tax_amount;?>">
<input type="hidden" name="tax" id="tax" value="5">



<p class="mb-0">Delivery<span class="float-right text-success del_charge">Rs <?php echo $delivery;?></span></p>
<input type="hidden" name="delivery_charge" id="delivery_charge" value="<?php echo $delivery;?>">

<!--<p class="mb-0">Tax Collected For Delivery Charge(5%)<span class="float-right text-success del_tax">Rs <?php echo $delivery_tax;?></span></p>-->

 <input type="hidden" name="delivery_tax" id="delivery_tax" value="<?php echo $delivery_tax;?>">
              <input type="hidden" name="extra_delivery" id="extra_delivery" value="<?php echo $extra_delivery?>">
             
              
</div>
<div class="p-3 border-top">
<h5 class="mb-0">TO PAY <span class="float-right text-danger ot">Rs <?php echo ($items_total+$tax_amount+$delivery+$delivery_tax)-$discount;?></span></h5>
<input type="hidden" name="order_total" id="order_total" value="<?php echo ($items_total+$tax_amount+$delivery+$delivery_tax)-$discount;?>">
</div>
</div>
</div>
<input type="hidden" name="id" id="id" value="<?php echo $customer_id;?>">
<!--<a href="#" class="btn btn-success btn-lg btn-block mt-3 mb-3">Place Order</a>-->
<button type="submit" class="btn btn-success btn-lg btn-block mt-3 mb-3" href="#">Confirm Order</button>
</div>
</div>
</div>
</form>
</div>

</section>
