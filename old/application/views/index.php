

    <!-- Page Contain -->

    <div class="page-contain">



        <!-- Main content -->

        <div id="main-content" class="main-content">



            <!--Block 01: Quick Access-->

            <!--<div class="home-11__elm-01 hidden-xs hidden-sm">-->

            <!--    <div class="container">-->

            <!--        <div class="quick-access">-->

            <!--            <span class="f-title">Quickly Access<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>-->

            <!--            <ul class="cats">-->

            <!--                <li><a href="#" class="link-cat">Fruits</a></li>-->

            <!--                <li><a href="#" class="link-cat">Vegetables</a></li>-->

            <!--                <li><a href="#" class="link-cat">Organics</a></li>-->

            <!--                <li><a href="#" class="link-cat">Groceries</a></li>-->

            <!--                <li><a href="#" class="link-cat">Naturals</a></li>-->

            <!--            </ul>-->

                        <!--<a href="category-grid#" class="link-more">See All Deals<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>-->

            <!--        </div>-->

            <!--    </div>-->

            <!--</div>-->



            <!--Block 02: Main slide-->

            	<?php foreach($adv as $adv_row){ ?>

<marquee style="font-size: 17px;

    color: #ec3235;

    font-weight: 600;padding-top:7px"><?php echo $adv_row['adv_title']; ?></marquee>

	<?php } ?>

		

            <div class="home-11__elm-02 main-slide">

			

                <div class="container">

					

	

                    <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >

                        <?php foreach($slider as $item){

                           ?>

                       

                    <li>

                            <div class="slide-contain biolife-slide__eleven biolife-slide__eleven--elm-01" style="background-image:url('<?php echo base_url();?>public_html/upload/slider/<?php echo $item['slider_image']; ?>');">

                                <div class="text-content">

                                    <i class="first-line"><?php echo $item['slider_title']; ?></i>

                                    <h3 class="second-line" style="color: #fed700;"><?php echo $item['slider_title']; ?></h3>

                                    <p class="third-line"><?php echo $item['slider_subtitle']; ?></p>

                                    <p class="buttons">

                                        <a href="#" class="btn btn-bold" style="background-color: #fed700;">Shop now</a>

                                        <!-- <a href="#" class="btn btn-thin">View lookbook</a> -->

                                    </p>

                                </div>

                            </div>

                        </li>

                        <?php } ?>

                    </ul>

                </div>

            </div>



            <!--Block 03: Banners-->





            <!--Block 04: Product Tab-->

            <div class="home-11__elm-04">

                 <div class="product-tab">

                    <div class="container">

                        <div class="biolife-title-box biolife-title-box__bold-center">

                            <!--<span class="subtitle">All the best item for You</span>-->

                            <h3 class="main-title">Trending Products</h3>

                        </div>

                        <div class="biolife-tab biolife-tab-contain">

                            <!--<div class="tab-head tab-head__sample-layout tab-head__sample-layout--icon-contain">-->

                            <!--    <ul class="tabs" style="display:none;">-->

                            <!--        <li class="tab-element active">-->

                            <!--            <a href="#tab01_1st" class="tab-link">-->

                            <!--                <i class="biolife-icon icon-fast-food"></i>-->

                            <!--                <span class="text">Fruits</span>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--        <li class="tab-element" >-->

                            <!--            <a href="#tab01_2nd" class="tab-link">-->

                            <!--                <i class="biolife-icon icon-grape"></i>-->

                            <!--                <span class="text">Organic</span>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--        <li class="tab-element" >-->

                            <!--            <a href="#tab01_3rd" class="tab-link">-->

                            <!--                <i class="biolife-icon icon-fruits"></i>-->

                            <!--                <span class="text">Vegetable</span>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--        <li class="tab-element" >-->

                            <!--            <a href="#tab01_4th" class="tab-link">-->

                            <!--                <i class="biolife-icon icon-fish"></i>-->

                            <!--                <span class="text">Spices</span>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--        <li class="tab-element" >-->

                            <!--            <a href="#tab01_5nd" class="tab-link">-->

                            <!--                <i class="biolife-icon icon-beef"></i>-->

                            <!--                <span class="text">Meats</span>-->

                            <!--            </a>-->

                            <!--        </li>-->

                            <!--    </ul>-->

                            <!--</div>-->

                            <div class="tab-content">

                                <div id="tab01_1st" class="tab-contain active">

                                     <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain row-space-27" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 5}},{"breakpoint":992, "settings":{ "slidesToShow": 4, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "rows":2, "slidesMargin":15}}]}'>

                                       <?php foreach($products as $pro){

                                        ?>

                                    <li class="product-item">

                                            <div class="contain-product layout-default power-price">

                                                <div class="product-thumb">

                                                    <a href="<?php echo base_url();?>product_details/<?php echo $pro['product_id'];?>" class="link-to-product">

                                                        <img src="<?php echo base_url();?>public_html/upload/product/<?php echo $pro['product_image'];?>" alt="Vegetables" width="270" height="270" class="product-thumnail">

                                                    </a>

                                                    

                                                </div>

                                                <div class="info">

                                                    <b class="categories"><?php echo $pro['category_name'];?></b>

                                                    <h4 class="product-title"><a href="#" class="pr-name"><?php echo $pro['product_name'];?></a></h4>

                                                    <h4 class="product-title"><?php echo $pro['product_qty']; echo $pro['unit_name'];?></h4>

                                                    <div class="price ">

                                                    

                                                        <ins><span class="price-amount"><span class="currencySymbol">₹</span><?php echo $pro['offer_price'];?></span></ins>

                                                        <?php if($pro['offer_price'] != $pro['product_price'])

                                                        {?>

                                                        <del><span class="price-amount"><span class="currencySymbol">₹</span><?php echo $pro['product_price'];?></span></del>

                                                        <?php } ?>

                                                    </div>

                                                    <div class="slide-down-box">

                                                       

                                                        <div class="buttons">

                                                           

                                                            <a class="btn add-to-cart-btn" href="javascript:void(0)" 

data-productid<?php echo $pro['product_id']; ?>="<?php echo $pro['product_id'];?>"  

data-productname<?php echo $pro['product_id']; ?>="<?php echo $pro['product_name'];?>" 

data-productprice<?php echo $pro['product_id']; ?>="<?php echo $pro['offer_price']; ?>"

data-productimage<?php echo $pro['product_id']; ?>="<?php echo $pro['product_image'];?>"   

id="myWish" onclick="add_to_cart(<?php echo $pro['product_id']; ?>,this)">add to cart</a>

                                                           

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





            <!--Block 06: Coundownt-->

            <div class="home-11__elm-06 biolife-banner__promotion--08" style="margin-top: 70px;">

                <div class="container">

                    <div class="row">

                        <?php foreach($deal as $item){

                            

                        ?>

                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">

                            <div class="media">

                                <a href="#" title="biolife" class="media__child-01"><img src="<?php echo base_url();?>public_html/upload/deal/<?php echo $item['deal_image'];?>"  width="653" height="399" alt=""></a>

                            </div>

                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">

                            <div class="text-containt">

                                <!--<span class="sup-title">Upto 70% Flate on Fruits</span>-->

                                <b class="b-title">Deals Of The Week</b>

                                <h3><?php echo $item['deal_title'];?></h3>

                                <p class="desc"><?php echo $item['deal_description'];?></p>

                                <!--<div class="biolife-countdown" data-datetime="2020/10/18"></div>-->

                                <a href="category-grid#" class="btn btn-add-to-cart">View Details</a>

                            </div>

                        </div>

                        <?php } ?>

                    </div>

                </div>

            </div>

			

			<!---------------------------------------------------------------->

			<?php foreach($adv as $adv_row) { ?>

			<div class="biolife-banner__promotion--07 home-10__elm-08" style="padding-bottom: 53px;">

            <div class="container">

                <div class="inner-content">

                    <div class="media media__child-01"><img src="<?php echo base_url();?>public_html/upload/adv/<?php echo $adv_row['adv_photo'];?>" width="517" height="449" alt="ss" style=""></div>

                    <div class="text-content">

                        <b class="f-title"><?php echo $adv_row['adv_title'];?></b>

                       

                    </div>

                </div>

            </div>

        </div>

			<?php } ?>

            <!---------------------------------------------------------------->

            <!--Block 07: Products-->

            <div class="home-11__elm-07 advance-product-box z-index-20">

                <div class="container">

                    <div class="biolife-title-box biolife-title-box__bold-left biolife-title-box__link-contain">

                        <!--<span class="subtitle">All the best item for You</span>-->

                        <h3 class="main-title">Catch Daily Deals</h3>

                        <!--<a href="category-grid#" class="link-to">See All Deals</a>-->

                    </div>

                   <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":1 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15, "rows":2}}]}'>

                    <?php foreach($products as $pro){

                                        ?>

                        <li class="product-item">

                            <div class="contain-product layout-default power-price">

                                <div class="product-thumb">

                                    <a href="<?php echo base_url();?>product_details/<?php echo $pro['product_id'];?>" class="link-to-product">

                                        <img src="<?php echo base_url();?>public_html/upload/product/<?php echo $pro['product_image'];?>" alt="Vegetables" width="270" height="270" class="product-thumnail">

                                    </a>

                                    <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>

                                </div>

                                <div class="info">

                                <b class="categories"><?php echo $pro['category_name'];?></b>

                                                    <h4 class="product-title"><a href="#" class="pr-name"><?php echo $pro['product_name'];?></a></h4>

                                                    <h4 class="product-title"><?php echo $pro['product_qty']; echo $pro['unit_name'];?></h4>

                                                    <div class="price ">

                                                        <ins><span class="price-amount"><span class="currencySymbol">₹</span><?php echo $pro['offer_price'];?></span></ins>

                                                        <?php if($pro['offer_price'] != $pro['product_price'])

                                                        {?>

                                                        <del><span class="price-amount"><span class="currencySymbol">₹</span><?php echo $pro['product_price'];?></span></del>

                                                  <?php } ?>

                                                    </div>

                                    <div class="slide-down-box">

                                       

                                        <div class="buttons">

                                        <a class="btn add-to-cart-btn" href="javascript:void(0)" 

data-productid<?php echo $pro['product_id']; ?>="<?php echo $pro['product_id'];?>"  

data-productname<?php echo $pro['product_id']; ?>="<?php echo $pro['product_name'];?>" 

data-productprice<?php echo $pro['product_id']; ?>="<?php echo $pro['offer_price']; ?>"

data-productimage<?php echo $pro['product_id']; ?>="<?php echo $pro['product_image'];?>"   

id="myWish" onclick="add_to_cart(<?php echo $pro['product_id']; ?>,this)">add to cart</a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>

                      <?php } ?>  

                    </ul>

                </div>

            </div>





			

            <!--Block 08: Banners-->

            <div class="home-11__elm-08">

                <div class="container">

                    <div class="row">

                        <?php foreach($offers As $item)

                        {?>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                            <div class="biolife-banner biolife-banner__style-22" style="background-image:url('<?php echo base_url();?>public_html/upload/offer/<?php echo $item['offer_image']; ?>');">

                                <a class="media" href="category-grid#" ></a>

                                <div class="text-content">

                                    <p class="f-title"><?php echo $item['offer_title']; ?></p>

                                    <i class="s-title"><?php echo $item['offer_description']; ?></i>

                                    <p class="thr-title">Upto 70% Discount</p>

                                </div>

                            </div>

                        </div>

                       <?php } ?>

                    </div>

                </div>

            </div>



<div class="biolife-banner__promotion--07 home-10__elm-08" style="padding-bottom: 53px;">

            <div class="container">

                <div class="inner-content">

                    <div class="media media__child-01"><img src="<?php echo base_url();?>public_html/assets/images/home-10/bn-promotion-07-child-01.png" width="517" height="449" alt="ss" style=""></div>

                    <div class="text-content">

                        <b class="f-title">Are you a Farmer</b>

                        <p class="desc">Register with Swiftmart Earn Secure Income'.</p>

                        <span class="phone-number">Dont Wait!</span>

                        <a href="<?php echo base_url();?>register" class="btn btn-add-to-cart">Join Now </a>

                    </div>

                </div>

            </div>

        </div>

		

            <!--Block 09: Blogs-->

    <!--        <div class="home-11__elm-09">-->

    <!--            <div class="container">-->

    <!--                <div class="biolife-title-box biolife-title-box__bold-center" style="padding-top:50px;">-->

    <!--                    <span class="subtitle">All the best item for You</span>-->

    <!--                    <h3 class="main-title">From The Blogs</h3>-->

    <!--                </div>-->

    <!--                <ul class="biolife-blogs">-->

    <!--                    <li>-->

    <!--                        <div class="biolife-blog__style-side-media">-->

    <!--                            <div class="media"><a href="#" class="media-post"><figure><img src="<?php echo base_url();?>public_html/assets/images/home-11/blog-thumbnail-01.jpg" width="600" height="350" alt="biolife post thumb"></figure></a></div>-->

    <!--                            <div class="content">-->

    <!--                                <h3 class="post-title"><a href="#" class="link-post">The fact of the matter that you really something</a></h3>-->

    <!--                                <span class="post-date">January 27, 2021</span>-->

    <!--                                <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In many The fact of the matter is that you really know something's organic when you bugs! they obviously environment certification.</p>-->

    <!--                                <div class="wrap-btn">-->

    <!--                                    <a href="#" class="btn btn-read-more">read more</a>-->

    <!--                                </div>-->

    <!--                            </div>-->

    <!--                        </div>-->

    <!--                    </li>-->

    <!--                    <li>-->

    <!--                        <div class="biolife-blog__style-side-media">-->

    <!--                            <div class="media"><a href="#" class="media-post"><figure><img src="<?php echo base_url();?>public_html/assets/images/home-11/blog-thumbnail-02.jpg" width="600" height="350" alt="biolife post thumb"></figure></a></div>-->

    <!--                            <div class="content">-->

    <!--                                <h3 class="post-title"><a href="#" class="link-post">The fact of the matter that you really something</a></h3>-->

    <!--                                <span class="post-date">January 27, 2021</span>-->

    <!--                                <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In many The fact of the matter is that you really know something's organic when you bugs! they obviously environment certification.</p>-->

    <!--                                <div class="wrap-btn">-->

    <!--                                    <a href="#" class="btn btn-read-more">read more</a>-->

    <!--                                </div>-->

    <!--                            </div>-->

    <!--                        </div>-->

    <!--                    </li>-->

    <!--                </ul>-->

    <!--            </div>-->

    <!--        </div>-->

    <!--    </div>-->



    <!--</div>-->



   