<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
</ol>
</div>
</nav>
<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">

<div class="col-lg-12">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
  <?php
$i=1;
foreach($slider_list as $slider)

{?>
    <div class="carousel-item <?php if($i==1) echo "active";?>">
      <img class="d-block w-100" src="<?php echo base_url()?>../uploads/slider-images/<?php echo $slider->image_url;?>" alt="">
    </div>
   <?php $i++;}?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>



<div class="col-lg-12">

<div class="osahan-home-page">

<div class="osahan-body">

<div class="pt-3 pb-2  osahan-categories">
<div class="d-flex align-items-center mb-2">
<h5 class="m-0">What do you looking for?</h5>

<a href="<?php echo site_url('categories') ?>" class="ml-auto btn btn-outline-success btn-sm">See more</a>
</div>
<div class="categories-slider">
 <?php foreach($category_list as $category)
{ ?>
<div class="col-c">
<div class="bg-white shadow-sm rounded text-center my-2 px-2 py-3 c-it">
<a href="<?php echo site_url('category/'.preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ','',$category->name)).'/'.$category->id) ?>">
<img src="<?php echo base_url()?>../uploads/category-images/<?php echo $category->image_url;?>" class="img-fluid px-2 mx-auto">
<p class="m-0 pt-2 text-muted text-center" style="text-align:center"><?php echo $category->name;?></p>
</a>
</div>
</div>
<?php } ?>
</div>
</div>

<div class="py-3 osahan-promos">
<div class="d-flex align-items-center mb-3">
<h5 class="m-0">Combo Offer</h5>
<a href="<?php echo site_url('offers')?>" class="ml-auto btn btn-outline-success btn-sm">See more</a>
</div>
<div class="promo-slider pb-0 mb-0">
<?php foreach($offer_list as $offer)
{ ?>
<div class="osahan-slider-item mx-2">
<a href="<?php echo site_url('offers');?>">
<img src="<?php echo base_url()?>../uploads/offer-images/<?php echo $offer->image_url;?>" class="img-fluid mx-auto rounded" alt=""></a>
</div>
<?php } ?>


</div>
</div>

<div class="title d-flex align-items-center py-3">
<h5 class="m-0">Pick's Today</h5>
<a class="ml-auto btn btn-outline-success btn-sm" href="<?php echo site_url('products') ?>">See more</a>
</div>

<div class="pick_today" id="pickstoday">
<div class="row">
 <?php 
          
            foreach($product_list as $product)
            {
              $btn_disabled='';
           ?>
<div class="col-6 col-md-3 mb-3">
<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
<div class="list-card-image">
<a href="<?php echo site_url('single-product/'.$product->id);?>" class="text-dark">

<?php 
                  if($product->stock == 0 || $product->status=='Out Of Stock' )
                  {
                    $btn_disabled='disabled';
                   ?>
				   <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">Out Of Stock</span></div>
                  
                  
                   <?php
                  }
                  
                  ?>
<!--<div class="member-plan position-absolute"><span class="badge m-3 badge-danger">10%</span></div>-->
<div class="p-3">

<img src="<?php if($product->image_url)
{
echo base_url().'../uploads/product-images/'.$product->image_url;} else { echo 'public_html/img/dummy.png'; }?>" class="img-fluid item-img w-100 mb-3">
<h6><?php echo $product->name;?></h6>
 <p class="sale-price"><?php if($product->price==$product->mrp)
                  {
                    echo 'Rs '.$product->price;
                  }
                  else
                  {
                  ?> Rs <?php echo $product->price; ?><span> <span style="text-decoration:line-through; color:#9d9d9d">   <?php echo $product->mrp; ?></span></span>
                  <?php }?></p>
                  <?php if($product->variants_count==1 )
                  {
                    ?>
					 
                    <form class="add_to_cart" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="cart-form">
                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $product->id; ?>">
                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $product->name; ?>">
                <input type="hidden" id="prod_category" name="prod_category" value="<?php echo $product->category; ?>">
                <input type="hidden" id="variants" name="variants" value="<?php echo $product->variants;?>">
                <input type="hidden" id="price" name="price" value="<?php echo $product->price;?>">
                <input type="hidden" id="mrp" name="mrp" value="<?php echo $product->mrp;?>">
                <input type="hidden" id="max_sale" name="max_sale" value="<?php echo $product->max_sale;?>">
                <input type="hidden" id="addon" name="addon" value="">
                <input type="hidden" id="variants_count" name="variants_count" value="<?php echo $product->variants_count;?>">
             <input type="hidden" id="quantity" name="quantity" value="1">
              <button type="submit" class="btn btn-success btn-sm" <?php echo $btn_disabled;?>>+ Add To Cart</button>
            </form>
                    
                    <?php
                  }
                  else
                  {?>
			     <a class="btn btn-success" href="<?php echo site_url('single-product/'.$product->id);?>">+</a>
				  <?php } ?>
<!--<div class="d-flex align-items-center">
<h6 class="price m-0 text-success">$0.8/kg</h6>
<a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" class="btn btn-success btn-sm ml-auto">+</a>
<div class="collapse qty_show" id="collapseExample1">
<div>
<span class="ml-auto" href="#">
<form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
<input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
<input type='text' name='quantity' value='1' class='qty form-control' />
<input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' />
</form>
</span>
</div>
</div>
</div>-->
</div>
</a>
</div>
</div>
</div>
 <?php  } ?>
  <!--<style>
.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
 /* background:#fff;*/
  margin:2px;
  margin: 0px auto;
}
.pagination strong {
	 background:#fff;
  margin:2px;
   padding: 8px 16px; 
}

.pagination a.active {
  background-color: dodgerblue;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
  <div class="pagination" style="margin:0px auto">
  <a href="#pickstoday"><?php echo $links; ?></a>
  </div>-->
  <div style="display:block; width:100%; text-align: center;">
  <a href="<?php echo site_url('products') ?>" class="btn btn-success" style="margin: 0px auto;">View More</a>
 </div>
</div>
</div>

<div class="title d-flex align-items-center py-3">
<h5 class="m-0">Advertisement for You</h5>
<!--<a class="ml-auto btn btn-outline-success btn-sm" href="recommend.html">26 more</a>-->
</div>

<div class="osahan-recommend">
<div class="row">
    
    <!------------>
    <div class="col-12 col-md-12 mb-3">
<a href="#!" class="text-dark text-decoration-none">
<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
<div class="">
<div class="osahan-slider-item m-2 rounded">
<img src="<?php echo base_url();?>public_html/study.jpeg" class="img-fluid mx-auto rounded shadow-sm" alt="" style="width:100%">
</div>
</div>
<!--<div class="p-3 position-relative">
<h6 class="mb-1 font-weight-bold text-success"><?php echo $adv->name;?></h6>
<p class="text-muted"><?php echo $adv->description; ?></p>
</div>-->
</div>
</a>
</div>
    <!------------>
    
<?php foreach($advertisement_list as $adv)
{ ?>
<!--<div class="col-12 col-md-12 mb-3">
<a href="#!" class="text-dark text-decoration-none">
<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
<div class="">
<div class="osahan-slider-item m-2 rounded">
<img src="<?php echo $adv->image_url;?>" class="img-fluid mx-auto rounded shadow-sm" alt="" style="width:100%">
</div>
</div>

</div>
</a>
</div>-->
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
