

<div class="hero-section hero-background" style="margin-top: 0px;">
        <!-- <h1 class="page-title">Organic Fruits</h1> -->
    </div>

 
<div id="main-content" class="main-content">
            <div class="container">


<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px" >

                        <div class="order-summary sm-margin-bottom-80px">
						 <div class="title-block">
                                <h3 class="title" style="font-size:30px;">Billing Details</h3>
                                <!-- <a href="#" class="link-forward">Edit cart</a> -->
                            </div>
						
					
					<form method="POST" action="<?php echo base_url()?>Site_ctlr/order_insert">
						<input type="text" class="form-control" placeholder="Name" name="name" required style="margin-bottom:2%">
						
						<input type="number" class="form-control" placeholder="Phone" name="phone" required style="margin-bottom:2%">
						
						<input type="text" class="form-control"  placeholder="address"  name="address" required style="margin-bottom:2%">
						<input type="hidden" name="work_location"  id="work_location" value="" />
						<textarea cols="30" class="form-control" rows="10" placeholder="Order Notes" name="order_notes" style="margin-bottom:2%"></textarea>


<div class="order">
						
						
						
                            <div class="title-block">
                                <h3 class="title" style="font-size:30px;">Order Summary</h3>
                                <!-- <a href="#" class="link-forward">Edit cart</a> -->
                            </div>
                            <div class="cart-list-box short-type">
                                <!-- <span class="number">2 items</span> -->
                                <ul class="cart-list">

                                <?php 
                        $sum=0;
                    if (isset($this->session->userdata['proceed_cart'])!== FALSE) {  
                        foreach ($this->session->userdata['proceed_cart'] as $car_to_proceed_items) {
                            ?> 
							
							
                                    <li class="cart-elem">
                                        <div class="cart-item">
                                            <div class="product-thumb">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img src="<?php echo base_url();?>public_html/upload/product/<?php echo $car_to_proceed_items['product_image']; ?>" width="113" height="113" alt="shop-cart" ></figure>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <span class="txt-quantity"><?php echo $car_to_proceed_items['qty'];?>X</span>
                                                <a href="#" class="pr-name"><?php echo $car_to_proceed_items['product_name'];?></a>
                                            </div>
                                            
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">₹</span><?php echo $car_to_proceed_items['subtotal'];?></span></ins>
                                                <!-- <del><span class="price-amount"><span class="currencySymbol">₹</span>95.00</span></del> -->
                                            </div>
                                        </div>
                                    </li>
                                  <?php
                        }
                    }
                        ?>  


                                </ul>
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Subtotal</b>
                                            <span class="stt-price">₹<?php echo $car_to_proceed_items['grand_total'];?></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Shipping</b>
                                            <span class="stt-price">₹20</span>
                                        </div>
                                    </li>
                                  <?php  $final_total =  $car_to_proceed_items['grand_total'] + 20 ;?>
								  
								  <input type="hidden" name="tot_amount" value="<?php echo  $final_total; ?>">
                                    <li>
                                        <!-- <div class="subtotal-line">
                                            <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                        </div> -->
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">total:</b>
                                            <span class="stt-price">₹<?php echo $final_total;?></span>
                                        </div>
                                    </li>
                                </ul>
                               
                            </div>
                           
                        </div>

<input type="submit" value="Confirm Order" name="submit" class="btn" target="blank" style="color:#fff;background-color: #3d750e; margin-left: 1000px;">
                       
                         <!--<div class="btn" style="background-color: #3d750e; margin-left: 1000px;">
                                    <a href="#" style="color:#000; font-family: cursive;
    font-size: 20px;" class="btn checkout">Process To Delivery</a>
                         
                                </div>-->
                 
</form>				 
</div>
</div>
</div>

<script>
    $(document).ready(function(){
      getLocation();
    
  });
   function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }
  function showPosition(position) {
    let x= "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;

    $("#work_location").val(position.coords.latitude+","+position.coords.longitude);
  }
</script>