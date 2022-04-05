 <style>
     
   @media screen and (max-width: 768px) {
.product_details{

    width: 100% !important; 
}
}  
     
 </style>
  <!--Hero Section-->
    <div class="hero-section hero-background" style="margin-top: 0px;">
        <!-- <h1 class="page-title">Organic Fruits</h1> -->
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="<?php echo base_url();?>index" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="<?php echo base_url();?>shop" class="permal-link">Shop</a></li>
                <li class="nav-item"><span class="current-page">Product Details</span></li>
            </ul>
        </nav>
    </div>

 
 
 
 <div class="page-contain single-product">
        <div class="container">

            <!-- Main content -->
            <div id="main-content" class="main-content">
                
                <!-- summary info -->
                <div class="sumary-product single-layout">
                    <?php foreach($products as $item)
                    {?>
                    <div class="col-md-6 media product_details" style="width: 50% ;">
                            <img src="<?php echo base_url();?>public_html/upload/product/<?php echo $item['product_image'];?>" alt="" width="500" height="500">
                    </div>
                    <div class="col-md-6 product-attribute product_details" style="width: 50% ;">
                        <h3 class="title" style="font-size: 27px;"><?php echo $item['product_name'];?></h3>
                       
                        <br>
                        <p><?php echo $item['product_description'];?></p>
                        <div class="price">
                            <ins><span class="price-amount"><span class="currencySymbol">₹</span>85.00</span></ins>
                        </div>
                        <!--<div class="shipping-info">-->
                        <!--    <p class="shipping-day">3-Day Shipping</p>-->
                        <!--    <p class="for-today">Pree Pickup Today</p>-->
                        <!--</div>-->
                   
                    <div class="action-form" style="margin-bottom: 20px;">
                        <div class="quantity-box">
                            <span class="title">Quantity:</span>
                            <div class="qty-input">
                                <input type="text" name="qty12554" value="1" data-max_value="20" data-min_value="1" data-step="1">
                                <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="#" class="btn add-to-cart-btn" >add to cart</a>
                            
                        </div>
                        
                        <!--<div class="social-media">-->
                        <!--    <ul class="social-list">-->
                        <!--        <li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
                        <!--        <li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
                        <!--        <li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>-->
                        <!--        <li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>-->
                        <!--        <li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                        <!--<div class="acepted-payment-methods">-->
                        <!--    <ul class="payment-methods">-->
                        <!--        <li><img src="<?php echo base_url();?>public_html/assets/images/card1.jpg" alt="" width="51" height="36"></li>-->
                        <!--        <li><img src="<?php echo base_url();?>public_html/assets/images/card2.jpg" alt="" width="51" height="36"></li>-->
                        <!--        <li><img src="<?php echo base_url();?>public_html/assets/images/card3.jpg" alt="" width="51" height="36"></li>-->
                        <!--        <li><img src="<?php echo base_url();?>public_html/assets/images/card4.jpg" alt="" width="51" height="36"></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
