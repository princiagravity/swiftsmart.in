 <!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Santhwanam</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>public_html/assets/images/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/assets/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public_html/assets/css/css-addition.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public_html/assets/css/home-11.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/assets/css/main-color11.css">

</head>
<body class="biolife-body biolife-body__home-11">

    <!-- Preloader -->
    <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header id="header" class="header-area biolife-header biolife-header__eleven">

        <div class="header-top hidden-xs hidden-sm">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                       
                        <li><span class="text">Welcome To Santhwanam Swift Mart!</span></li>
                    </ul>
                </div>
				
			
                <div class="top-bar right">
                    <ul class="horizontal-menu">
                        <li><a href="#" class="link"><i class="fa fa-user-o" aria-hidden="true"></i>Account</a></li>
                        <!--<li><a href="#" class="link"><i class="fa fa-sign-in" aria-hidden="true"></i>Checkout</a></li>-->
                        <li><a href="#" class="link login-link"><i class="fa fa-lock" aria-hidden="true"></i>Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                        <a href="#" class="biolife-logo"><img src="<?php echo base_url();?>public_html/assets/images/home-11/logo.png" alt="Santhwanam logo" width="137" height="34"></a>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-6">
                        <div class="biolife-cart-info">

                            <!--<div class="questions hidden-xs hidden-sm"><a href="#" class="link"><i class="fa fa-headphones" aria-hidden="true"></i>Need Help?</a></div>-->

                            <!--<div class="search-bar">-->
                            <!--    <a href="javascript:void(0)" class="open-searchbox dsktp-open-searchbox"><i class="biolife-icon icon-search"></i></a>-->
                            <!--    <div class="search-content">-->
                            <!--        <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>-->
                            <!--        <form action="#" class="form-search" name="mobile-seacrh" method="get">-->
                            <!--            <input type="text" name="s" class="input-text" value="" placeholder="Search For Product....">-->
                            <!--            <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="minicart-block">
                                <div class="minicart-contain">
                                    <a href="javascript:void(0)" class="link-cb">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="title">My Cart</span><span class="qty"><?php echo $this->session->userdata('cart_count'); ?></span>
                                    </a>
                                    <div class="cart-content">
                                        <div class="cart-inner">
                                            <ul class="products">
                                            <?php
                                            // print_r($this->cart->contents());
                                            // exit;
                        $no = 0;
                        foreach ($this->cart->contents() as $items) {
                            $no++;
                        ?>
                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                        <input type="hidden" value="<?php echo $items['productimage'];?>" name="product_image[]" id="productimage<?php echo $items['id'];?>">
                                                            <a href="#"><img src="<?php echo base_url();?>public_html/upload/product/thumb/<?php echo $items['productimage'];?>" width="90" height="90" alt="National Fresh"></a>
                                                        </div>
                                                        <div class="left-info">
                                <input type="hidden" value="<?php echo $items['id'];?>" name="product_id[]" id="product_id<?php echo $items['id'];?>"> 
                                <input type="hidden" value="<?php echo $items['name'];?>" name="product_name[]" id="product_name<?php echo $items['id'];?>">
                                                            <div class="product-title"><a href="#" class="product-name"><?php echo $items['name'];?></a></div>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">₹</span><?php echo $items['price'];?></span></ins>
                                                                <!-- <del><span class="price-amount"><span class="currencySymbol">₹</span>95.00</span></del> -->
                                                            </div>
                                                            <div class="qty">
                                                                <label for="cart[id123][qty]">Qty:</label>
                                                                <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="<?php echo $items['qty'];?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <a href="javascript:void(0)" onclick="delete_cart(this,<?php echo $items['id']?>)" id="<?php echo $items['rowid']; ?>" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                               <?php } ?>
                                            </ul>
                                            <?php if($this->cart->contents()==true){?>
                                            <p class="btn-control">
                                                <a href="<?php echo base_url();?>cart-view" class="btn view-cart">view cart</a>
                                                <!-- <a href="<?php echo base_url();?>checkout" class="btn">checkout</a> -->
                                            </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mobile-menu-toggle">
                                <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom biolife-sticky-object hidden-sm hidden-xs">
            <div class="container">
                 <div class="primary-menu">
                    <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                        <li class="menu-item"><a href="<?php echo base_url();?>index">Home</a></li>
                        <li class="menu-item"><a href="<?php echo base_url();?>about">About </a></li>
                        <!--<li class="menu-item"><a href="#">Offer Zone</a></li>-->
                        <li class="menu-item"><a href="<?php echo base_url();?>shop">Shop</a></li>
                        <li class="menu-item menu-item-has-children has-megamenu">
                           <a href="javascript:void(0)" class="menu-name" data-title="Shop">Category</a>
                           <div class="wrap-megamenu lg-width-300 md-width-750" style="margin-left:246px;">
                               <div class="mega-content">
                                   <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                       <div class="wrap-custom-menu vertical-menu">
                                       <?php foreach($category as $cat){?>
                                           <h4 class="menu-title"><a href="<?php echo base_url();?>products_by_category/<?php echo $cat['category_id'];?>" style="color: #3d750e;"><?php echo $cat['category_name'];?></a></h4>
                                          <?php } ?>
                                      </div>
                                    </div>
                                      </div>
                           </div>
                        </li>
                        <!--<li class="menu-item menu-item-has-children has-megamenu">-->
                        <!--    <a href="category-grid#" class="menu-name" data-title="Shop">Shop</a>-->
                        <!--    <div class="wrap-megamenu lg-width-900 md-width-750">-->
                        <!--        <div class="mega-content">-->
                        <!--            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">-->
                        <!--                <div class="wrap-custom-menu vertical-menu">-->
                        <!--                    <h4 class="menu-title">Fresh Fruits</h4>-->
                        <!--                    <ul class="menu">-->
                        <!--                        <li><a href="#">Bananas</a></li>-->
                        <!--                        <li><a href="#">Orangs</a></li>-->
                        <!--                        <li><a href="#">Water Melon</a></li>-->
                        <!--                        <li><a href="#">Pappaya</a></li>-->
                        <!--                        <li><a href="#">Jackfruit</a></li>-->
                        <!--                    </ul>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">-->
                        <!--                <div class="wrap-custom-menu vertical-menu">-->
                        <!--                    <h4 class="menu-title">Fresh Vegetables</h4>-->
                        <!--                    <ul class="menu">-->
                        <!--                        <li><a href="#">Cucumber</a></li>-->
                        <!--                        <li><a href="#">Tomato </a></li>-->
                        <!--                        <li><a href="#">Onion </a></li>-->
                        <!--                        <li><a href="#">Turmeric </a></li>-->
                        <!--                        <li><a href="#">Pumpkin </a></li>-->
                        <!--                    </ul>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">-->
                        <!--                <div class="wrap-custom-menu vertical-menu ">-->
                        <!--                    <h4 class="menu-title">Fresh Vegetables</h4>-->
                        <!--                    <ul class="menu">-->
                        <!--                        <li><a href="#">Ginger </a></li>-->
                        <!--                        <li><a href="#">Green Chilli</a></li>-->
                        <!--                        <li><a href="#">Green Beans</a></li>-->
                        <!--                        <li><a href="#">Lady Finger</a></li>-->
                        <!--                        <li><a href="#">Mushroom </a></li>-->
                        <!--                    </ul>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">-->
                        <!--                <div class="wrap-custom-menu vertical-menu">-->
                        <!--                    <h4 class="menu-title">Featured Products</h4>-->
                        <!--                    <ul class="menu">-->
                        <!--                        <li><a href="#">Coffee Powder</a></li>-->
                        <!--                        <li><a href="#">Chilli Powder</a></li>-->
                        <!--                        <li><a href="#">Turmeric Powder</a></li>-->
                        <!--                        <li><a href="#">Fruit Jam</a></li>-->
                        <!--                        <li><a href="#">Honey</a></li>-->
                        <!--                    </ul>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</li>-->

                        

                        
                        <li class="menu-item"><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
