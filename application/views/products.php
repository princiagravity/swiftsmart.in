<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url("products");?>">Our Products</a></li>
</ol>
</div>
</nav>
<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="osahan-home-page">
<div class="osahan-body">
<div class="title d-flex align-items-center py-3">
<h5 class="m-0">Our Products</h5>
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
  <style>
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
  <div class="pagination" style="margin: 0px auto;
    display: block;
    width: 100%;">
  <a href="#pickstoday"><?php echo $links; ?></a>
  </div>
 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
