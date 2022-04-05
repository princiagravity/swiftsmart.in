

<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url()?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url("cart");?>">Cart</a></li>
</ol>
</div>
</nav>
<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="accordion" id="accordionExample">

<div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden">

<div class="card-header bg-white border-0 p-0" id="headingOne">
<h2 class="mb-0">
<button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
 Cart Items
</button>
</h2>
</div>

<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
<div class="card-body p-0 border-top">
<div class="osahan-cart">

 <?php 
                $total=0;
                $min_order=$extra_delivery="";
                if($min_order_delivery)
                {
                  $min_order=$min_order_delivery[0]->min_order;
                  $extra_delivery=$min_order_delivery[0]->delivery_extra_charge;
                }
                if($cart_list)
                {
                 /*  print_r($cart_list); exit; */
                foreach($cart_list as $cart)
                {
                  /* foreach($cart as $index=>$cart)
                  {*/
                    $total=$total+$cart->product_total;
                 
                 
                 ?>
				
				   
<div class="cart-items bg-white position-relative border-bottom">

<div class="d-flex  align-items-center p-3">
 <a class="remove-product btn btn-danger"  href="#">X</a>
  <input type="hidden" name="cart_id" class="cart_id" value="<?php echo $cart->cart_id; ?>" >
                    <input type="hidden" name="prod_id" class="prod_id" value="<?php echo $cart->product_id; ?>" >
                    <input type="hidden" name="prod_type" class="prod_type" value="<?php echo $cart->type; ?>" >
                    <input type="hidden" name="prod_total" class="prod_total" value="<?php echo $cart->product_total; ?>" >
                    <input type="hidden" name="prod_count" class="prod_count" value="<?php echo $cart->product_count; ?>" >
<a href="#"><img src="<?php echo base_url()?>../uploads/product-images/<?php echo $cart->product_image;?>" class="img-fluid"></a>
<a href="#" class="ml-3 text-dark text-decoration-none w-100">
<h5 class="mb-1"><?php echo $cart->product_name?></h5>
<p class="text-muted mb-2"><!--<del class="text-success mr-1">Rs <?php echo $cart->product_price;?></del>--> 
<span style="font-weight: 600;color: #000;"> Rs <?php echo $cart->product_total; ?> </span><?php //echo $cart->product_price;?></p>
<!--<div class="d-flex align-items-center">
<p class="total_price font-weight-bold m-0"><?php echo $cart->product_price;?></p>
</div>-->
<!--<input type="button" id="substraction"  value="-" class=" qty_update qtyminus btn btn-success btn-sm" field="quantity" />
<input type="text" name="prod_quantity" id="<?php echo $cart->cart_id;?>" value="<?php echo $cart->product_count; ?>" class="prod_count qty form-control" />
<input type="button" value="+" id="addition" class="qtyplus btn btn-success btn-sm qty_update" field="quantity" />-->


 <div class="row">
   <div id="quantity_div">
                 
  </div> 
                      
   <span class="quantity quantity-button-handler qty_update qtyminus btn btn-success btn-sm" id="substraction" >-</span> 
   
   
                <input class="prod_count form-control cart-quantity-input" style="max-width: 40px;
    height: 30px;
    text-align: center;
    font-weight: 700;
    padding: 0.375rem 0.5rem;" type="text" step="1" id="<?php echo $cart->cart_id;?>" name="prod_quantity" value="<?php echo $cart->product_count; ?>">
     
                <div class="quantity-button-handler qty_update qtyminus btn btn-success btn-sm" id="addition" >+</div>
   </div>


</a>
 
</div>



</div>

	
  <!--<div class="quantity">
                        <input class="qty-text" type="text" value="<?php echo $cart->product_total; ?>" disabled>
                      </div>-->
 <?php 
                 
                  
                  }
                // }
               
                
               ?>
			   
			   
			    <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
          <form id="checkout" method="POST" action="<?php echo site_url('checkout')?>" data-form="ajaxform" enctype="multipart/form-data" class="cart-form">

          <input type="hidden" id="actual_total" name="actual_total" value="<?php echo $total;?>">
          <input type="hidden" id="cart_total" name="cart_total" value="<?php 
          if($this->session->userdata('cart_total')) { echo $this->session->userdata('cart_total');} else{ echo $total;}?>">
          <input type="hidden" id="min_order" name="min_order" value="<?php echo $min_order;?>">
          <input type="hidden" id="extra_delivery" name="extra_delivery" value="<?php echo $extra_delivery;?>">
          <input type="hidden" id="delivery_extra" name="delivery_extra" value="">
		  
		  <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white checkout_btn">
<div class="more ">
<h6 class="m-0">Subtotal Rs <span class=" total_amount"> <?php if($this->session->userdata('cart_total')){echo $this->session->userdata('cart_total');}else{echo $total;} ?></h6>
<?php if($this->session->userdata('discount')){ ?><span class="h6">(discount:<?php echo $this->session->userdata('discount');?>)</span><?php }?>
<p class="small m-0 ">Proceed to checkout</p>
</div>
<div class="ml-auto"><i class="icofont-simple-right"></i></div>
</div>
		  
		  
		  
        <!-- <div class="card-body d-flex align-items-center justify-content-between">
              <h5 class="total-price mb-0"> Rs <span class=" total_amount"><?php if($this->session->userdata('cart_total')){echo $this->session->userdata('cart_total');}else{echo $total;} ?></span>
              <?php if($this->session->userdata('discount')){ ?><span class="h6">(discount:<?php echo $this->session->userdata('discount');?>)</span><?php }?></h5><button type="submit" class="btn btn-warning checkout_btn" href="#">Checkout Now</button>
            
            </div>-->
          </form>
          </div>
		  
		  <div>
</div>
		  
		  
          <?php
        }
                else
                {
                  $this->session->set_userdata('cart_total',0);
                  $this->session->set_userdata('promocode','');
                  $this->session->set_userdata('cart_value',0);
                  $this->session->set_userdata('discount',0);
                  ?>
                 <span><h6 style="padding:5px"> Nothing Added To Cart </h6></span>
                 <?php
                }
                  ?>
			   
			   
			   




</div>
</div>
</div>
</div>



</div>
 </div>
<div class="col-lg-4">
<div class="sticky_sidebar">
<div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
<div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
<img alt="osahan" src="<?php echo base_url();?>public_html/img/logo.png" class="mr-3 rounded-circle img-fluid">
<div class="d-flex flex-column">
<h6 class="mb-1 font-weight-bold">Swiftsmart</h6>
<p class="mb-0 small text-muted"><i class="feather-map-pin"></i> Welcome To Santhwanam Organic Store!</p>
</div>
</div>
<div>

<?php 
                $total=0;
                $min_order=$extra_delivery="";
                if($min_order_delivery)
                {
                  $min_order=$min_order_delivery[0]->min_order;
                  $extra_delivery=$min_order_delivery[0]->delivery_extra_charge;
                }
               
                 
                 ?>
<div class="bg-white p-3 clearfix">
<p class="font-weight-bold small mb-2">Bill Details</p>
<?php  if($cart_list)
                {
             //print_r($cart_list); exit; 
                foreach($cart_list as $cart)
                {
               /*    foreach($cart as $index=>$cart)
                  { */
                  $total=$total+$cart->product_total;
                 ?>
<p class="mb-1"><?php echo $cart->product_name?> <span class="small text-muted">(<?php echo $cart->product_count; ?> item)</span> <span class="float-right text-dark">Rs <?php echo $cart->product_total; ?></span></p>
				<?php } }//} 
        ?>


<h6 class="mb-0 text-success">Total Discount<span class="float-right text-success">Rs <?php echo $this->session->userdata('discount');?></span></h6>
</div>
<div class="p-3 border-top">
<h5 class="mb-0">TO PAY <span class="float-right text-danger">Rs <?php if($this->session->userdata('cart_total')){echo $this->session->userdata('cart_total');}else{echo $total;} ?></span></h5>
</div>

			

</div>
</div>

</div>
</div>
</div>
</div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Delivery Address</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="">
<div class="form-row">
<div class="col-md-12 form-group">
<label class="form-label">Delivery Area</label>
<div class="input-group">
<input placeholder="Delivery Area" type="text" class="form-control">
<div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-pin"></i></button></div>
</div>
</div>
<div class="col-md-12 form-group"><label class="form-label">Complete Address</label><input placeholder="Complete Address e.g. house number, street name, landmark" type="text" class="form-control"></div>
<div class="col-md-12 form-group"><label class="form-label">Delivery Instructions</label><input placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall" type="text" class="form-control"></div>
<div class="mb-0 col-md-12 form-group">
<label class="form-label">Nickname</label>
<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
 <label class="btn btn-outline-secondary active">
<input type="radio" name="options" id="option1" checked> Home
</label>
<label class="btn btn-outline-secondary">
<input type="radio" name="options" id="option2"> Work
</label>
<label class="btn btn-outline-secondary">
<input type="radio" name="options" id="option3"> Other
</label>
</div>
</div>
</div>
</form>
</div>
<div class="modal-footer p-0 border-0">
<div class="col-6 m-0 p-0">
<button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
</div>
<div class="col-6 m-0 p-0">
<button type="button" class="btn btn-success btn-lg btn-block">Save changes</button>
</div>
</div>
</div>
</div>
</div>
</div>
