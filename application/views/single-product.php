<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url("single-product/".$prod_detail->id);?>">Product details</a></li>
</ol>
</div>
</nav>

<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="recommend-slider mb-3">
<div class="osahan-slider-item">
<img src="<?php echo base_url()?>../uploads/product-images/<?php echo $prod_detail->image_url?>" class="img-fluid mx-auto shadow-sm rounded" alt="" width="100%">
</div>

</div>
<!--<div class="pd-f d-flex align-items-center mb-3">
<a href="cart.html" class="btn btn-warning p-3 rounded btn-block d-flex align-items-center justify-content-center mr-3 btn-lg"><i class="icofont-plus m-0 mr-2"></i> ADD TO CART</a>
<a href="cart.html" class="btn btn-success p-3 rounded btn-block d-flex align-items-center justify-content-center btn-lg m-0"><i class="icofont-cart m-0 mr-2"></i> BUY NOW</a>
</div>-->
</div>
<div class="col-lg-6">
<div class="p-4 bg-white rounded shadow-sm">
<!--<div class="pt-0 p-title-price">
<h2 class="font-weight-bold"><?php echo $prod_detail->name?></h2>
<p class="font-weight-light text-dark m-0 d-flex align-items-center sale-price">
Product MRP : <b class="h6 text-dark m-0"> 
              <?php if($prod_detail->price== $prod_detail->mrp)
              {
                echo 'Rs'.$prod_detail->price; 
              }
              else
              {?>  
              Rs<?php echo $prod_detail->price?> <span style="text-decoration: line-through;font-size: 12px;
    color: #afafaf;">   &nbsp; Rs<?php echo $prod_detail->mrp?></span>
            <?php }?>
            </b>

</p>

</div>-->
<!--<div class="pt-2">
<div class="row">
<div class="col-6">
<p class="font-weight-bold m-0">Delivery</p>
<p class="text-muted m-0">Free</p>
</div>
<div class="col-6 text-right">
<p class="font-weight-bold m-0">Available in:</p>
<p class="text-muted m-0">1 kg, 2 kg, 5 kg</p>
</div>
</div>
</div>-->

<div class="container d-flex justify-content-between" style="padding:0px 10px 0px 10px;">
            <div class="p-title-price">
              <h6 class="mb-1"><?php echo $prod_detail->name?></h6><span class="status_text text-danger"></span>
              <p><?php echo $prod_detail->description;?></p>
              <div class="price_detail">
              <p class="sale-price mb-0"> Product MRP : <b class="h6 text-dark m-0"> 
              <?php if($prod_detail->price== $prod_detail->mrp)
              {
                echo 'Rs '.$prod_detail->price; 
              }
              else
              {?>  
               &nbsp; &nbsp; Rs <?php echo $prod_detail->price?> <span  style="text-decoration:line-through; color:#9d9d9d">  <?php echo $prod_detail->mrp?></span>
            <?php }?>
           </b> </p>
              </div>
            </div>
        
          </div>



<!------------------------------------------------------>

<div class="pt-3 bg-white">
<div class="d-flex align-items-center">
<div class="btn-group osahan-radio btn-group-toggle" data-toggle="buttons">
 <?php 
   $var_count=count($variants);
                 $btn_disabled="";
                  $addon_style="block";
                  foreach($variants as $var)
                  {
                    $checked="";
                    if($var[0]==$prod_detail->variants)
                    {
                      $checked="checked";
                     if($var[2]<=0)
                     {
                       $prod_status="Out Of Stock";
                       $btn_disabled='disabled';
                       $addon_style="none";
                     }
                     else if($var[2]<10 && $var[2]>0)
                     {
                      $prod_status="Only".$var[2]." Left";
                     }
                     else
                     {
                      $prod_status="In Stock"; 
                     }
                    }
                    if($var_count >1)
                    {
                    if($var[2]<=0)
                  { ?>
			
					
<label class="btn btn-secondary active">
<input type="radio" name="variant" disabled <?php echo $checked;?> id="colorRadio1" value="<?php echo $var[0]?>"  class="get_price" checked> <?php echo $var[1]?>
</label>
 <?php }
                else 
                {
                  ?>
				  <label class="btn btn-secondary">
<input type="radio" name="variant" <?php echo $checked;?> id="colorRadio1" value="<?php echo $var[0]?>"  class="get_price" > <?php echo $var[1]?>
</label>
                 

                  <?php
                } } } ?>

</div>


<!--a class="ml-auto" href="#">
<form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
<input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
<input type='text' name='quantity' value='1' class='qty form-control' />
<input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' />
</form>
</a>-->
</div>
</div>
<div style="clear:both"></div>
<div class="details">
<div class="pt-3 bg-white">
<div class="d-flex align-items-center">
<div class="btn-group osahan-radio btn-group-toggle" data-toggle="buttons">
 
<!--<label class="btn btn-secondary active">
<input type="radio" name="options" id="option1" checked> 4 pcs
</label>
<label class="btn btn-secondary">
<input type="radio" name="options" id="option2"> 6 pcs
</label>
<label class="btn btn-secondary">
<input type="radio" name="options" id="option3"> 1 kg
</label>-->
</div>

 <?php if($prod_detail->status=='Out Of Stock')
          {
            $prod_status="Out Of Stock";
            $btn_disabled='disabled';
            $addon_style="none";
          }?>
		  
	 <div class="container addon_container" style="display: <?php echo $addon_style?>;">
          <?php if($addons)
          {
            ?>
          <p class="mb-1 font-weight-bold">Add Ons</p>
              <!-- Single Catagory Card-->
              <?php foreach($addons as $addon)
              {
                if($addon->max_sale >0)
                { ?>
               <div class="card ">
               <div class="card-body">
              <div class="row g-3">
              
               
                 <div class="col-6"><div class="form-check">
  <input class="form-check-input chk_addon " type="checkbox"  name="addon" value="<?php echo $addon->id;?>" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   <?php echo $addon->name.'('?><!--<i class="lni lni-rupee"></i>--> AED <?php echo $addon->price.')';?>
  </label>
</div></div><div class="col-6">
<div class="order-plus-minus d-flex align-items-center p-1">
                <div class="quantity quantity-button-handler qty_minus_addon" id="ad_minus<?php echo $addon->id;?>"  style="width: 35px;
    height: 35px;
    background-color: #fef8ff;
    border: 1px solid #ebebeb;line-height: 33px;
    font-size: 1.25rem;
    text-align: center;
    border-radius: 0.25rem;
    cursor: pointer;
    ">-</div>
   
                <input class="form-control cart-quantity-input addon_qty" style="max-width: 50px;
    height: 35px;
    margin-right: 0.5rem;
    margin-left: 0.5rem;
    text-align: center;
    font-weight: 700;
    padding: 0.375rem 0.5rem;" type="text" step="1" id="<?php echo $addon->id;?>" name="addon_quantity" value="1" readonly>
     
                <div class="quantity-button-handler qty_plus_addon" id="ad_plus<?php echo $addon->id;?>"  style="width: 35px;
    height: 35px;
    background-color: #fef8ff;
    border: 1px solid #ebebeb;line-height: 33px;
    font-size: 1.25rem;
    text-align: center;
    border-radius: 0.25rem;
    cursor: pointer;
   ">+</div>
              </div>
             
              <input type="hidden" name="addon_price" class="addon_price_<?php echo $addon->id;?>" value="<?php echo $addon->price ?>">
              <input type="hidden" name="addon_name" class="addon_name_<?php echo $addon->id;?>" value="<?php echo $addon->name ?>">
              <input type="hidden" name="addon_name" class="addon_max_<?php echo $addon->id;?>" value="<?php echo $addon->max_sale ?>">
                </div>
                <p class="addon_status_<?php echo $addon->id;?>" style="display: none;"></p>
              </div>
                
                
              </div></div>
              <?php } } }?>
            
        <!-- <input type="hidden" id="chk_var" class="chk_var" value="<?php //echo $chk_var;?>"> -->
        </div>
    
        

</div>
<div class="pt-3">

<p class="font-weight-bold mb-2">Product Details</p>
<p class="text-muted small mb-0" style="margin-bottom:4%"><?php echo $prod_detail->description;?></p>
 <div class="">
                <div>
                	<span class="prod_status" style="font-size: 14px;color: #d00000;font-weight: 600;">
                  <?php echo $prod_status;?>
                </span>
                </div>
          <form method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="add_to_cart cart-form">
                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $prod_detail->id; ?>">
                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $prod_detail->name; ?>">
                <input type="hidden" id="prod_category" name="prod_category" value="<?php echo $prod_detail->category; ?>">
                <input type="hidden" id="variants" name="variants" value="<?php echo $prod_detail->variants;?>">
                <input type="hidden" id="price" name="price" value="<?php echo $prod_detail->price;?>">
                <input type="hidden" id="mrp" name="mrp" value="<?php echo $prod_detail->mrp;?>">
                <input type="hidden" id="max_sale" name="max_sale" value="<?php echo $prod_detail->max_sale;?>">
                <input type="hidden" id="addon" name="addon" value="">
              
                <div style="clear:both"></div>
              <div class="order-plus-minus d-flex align-items-center" style="margin-top:2%">
                <div class="qtyminus btn btn-success btn-sm quantity-button-handler qty_minus">-</div>
                <input class="form-control cart-quantity-input prod_qty" type="text" step="1"  name="quantity" value="1" style="width:50px">
                <div class="qtyplus btn btn-success btn-sm quantity-button-handler qty_plus">+</div>
			
              </div>
			  
			 
			  
			  
         <div class="pd-f d-flex align-items-center mb-3" style="margin-top:2%">
              <button class="btn btn-warning p-3 rounded btn-block d-flex align-items-center justify-content-center mr-3 btn-lg btn-addtocart" type="submit" s <?php echo $btn_disabled;?> ><i class="icofont-plus m-0 mr-2"></i> Add To Cart</button>
             
              <a class="btn btn-success p-3 rounded btn-block d-flex align-items-center justify-content-center btn-lg m-0" href="<?php echo site_url('home')?>" ><i class="icofont-cart m-0 mr-2"></i> Continue Shopping</a>
			  </div>
            </form>
          </div>
</div>
</div>
</div>
</div>
</div>

</div>
</section>
 