  <!--Hero Section-->
    <div class="hero-section hero-background" style="margin-top: 0px;">
        <!-- <h1 class="page-title">Organic Fruits</h1> -->
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="<?php echo base_url();?>index" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Shop</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain about-us">

        <!-- Main content -->
        <div id="main-content" class="main-content">

               <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

          

                    <div class="product-category grid-style">

                      
                        <div class="row">
                            <ul class="products-list">
<?php foreach($products as $item)
{?>
                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="<?php echo base_url();?>product_details/<?php echo $item['product_id'];?>" class="link-to-product">
                                                <img src="<?php echo base_url();?>public_html/upload/product/<?php echo $item['product_image'];?>"  width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                        <b class="categories"><?php echo $item['category_name'];?></b>
                                                    <h4 class="product-title"><a href="#" class="pr-name"><?php echo $item['product_name'];?></a></h4>
                                                    <h4 class="product-title"><?php echo $item['product_qty']; echo $item['unit_name'];?></h4>
                                                    <div class="price ">
                                                        <ins><span class="price-amount"><span class="currencySymbol">₹</span><?php echo $item['offer_price'];?></span></ins>
                                                        <?php if($item['offer_price'] != $item['product_price'])
                                                        {?>
                                                        <del><span class="price-amount"><span class="currencySymbol">₹</span><?php echo $item['product_price'];?></span></del>
                                   <?php } ?>
                                                        </div>
                                            <!--<div class="shipping-info">-->
                                            <!--    <p class="shipping-day">3-Day Shipping</p>-->
                                            <!--    <p class="for-today">Pree Pickup Today</p>-->
                                            <!--</div>-->
                                            <div class="slide-down-box">
                                                <!--<p class="message">All products are carefully selected to ensure food safety.</p>-->
                                                <div class="buttons">
                                                    <!--<a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>-->
                                                    <!-- <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a> -->
                                                    <!--<a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>-->
                                                    <a class="btn add-to-cart-btn" href="javascript:void(0)" 
data-productid<?php echo $item['product_id']; ?>="<?php echo $item['product_id'];?>"  
data-productname<?php echo $item['product_id']; ?>="<?php echo $item['product_name'];?>"
data-productprice<?php echo $item['product_id']; ?>="<?php echo $item['offer_price']; ?>" 
data-productimage<?php echo $item['product_id']; ?>="<?php echo $item['product_image'];?>"   
id="myWish" onclick="add_to_cart(<?php echo $item['product_id']; ?>,this)">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                
                                <?php } ?>
                                

                            </ul>
                        </div>

                       

                    </div>

                </div>

            </div>
        </div>
    </div>
            
            </div>
            </div>