<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url("products");?>">Products</a></li>
</ol>
</div>
</nav>

<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="osahan-listing">
<div class="d-flex align-items-center mb-3">
<h4><?php echo $page_head;?></h4>
<!--<div class="m-0 text-center ml-auto">
<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white mr-2"><i class="icofont-filter mr-1"></i> Filter</a>
<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white"><i class="icofont-signal mr-1"></i> Sort</a>
</div>-->
</div>
<div class="row">
  <?php 
   $btn_disabled='';
   foreach($product_list as $prod)
   {?>
<div class="col-6 col-md-3 mb-3">
<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
<div class="list-card-image">
<a href="<?php echo site_url('single-product/'.$prod->id);?>" class="text-dark">
<div class="member-plan position-absolute">
<?php if($prod->stock == 0 || $prod->status=='Out Of Stock' )
   {
    $btn_disabled='disabled';
   ?>
  <span class="badge m-3 badge-danger">Out Of Stock</span>
<?php
   }
?>

</div>
<div class="p-3">
<img src="<?php if($prod->image_url)
{
echo base_url().'../uploads/product-images/'.$prod->image_url;} else { echo 'public_html/img/dummy.png'; }?>" class="img-fluid item-img w-100 mb-3">
<h6><?php echo $prod->name;?></h6>
<div class="d-flex align-items-center">




<h6 class="price m-0 text-success">
<?php if($prod->price==$prod->mrp)
                  {
                    echo 'Rs '.$prod->price;
                  }
                  else
                  {
                  ?> Rs <?php echo $prod->price; ?> <span style="text-decoration:line-through; color:#9d9d9d">   <?php echo $prod->mrp; ?></span>
                  <?php }?></h6>
				  
	  <?php if($prod->variants_count==1)
                  {
                    ?>
                    <form class="add_to_cart" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="cart-form" style="margin-left:5%;">
                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $prod->id; ?>">
                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $prod->name; ?>">
                <input type="hidden" id="prod_category" name="prod_category" value="<?php echo $prod->category; ?>">
                <input type="hidden" id="variants" name="variants" value="<?php echo $prod->variants;?>">
                <input type="hidden" id="price" name="price" value="<?php echo $prod->price;?>">
                <input type="hidden" id="mrp" name="mrp" value="<?php echo $prod->mrp;?>">
                <input type="hidden" id="max_sale" name="max_sale" value="<?php echo $prod->max_sale;?>">
                <input type="hidden" id="addon" name="addon" value="">
                <input type="hidden" id="variants_count" name="variants_count" value="<?php echo $prod->variants_count;?>">
             <input type="hidden" id="quantity" name="quantity" value="1">
              <button style="margin-left:2%;" type="submit" class="btn btn-success btn-sm"  <?php echo $btn_disabled?>>+</button>
            </form>
                    
                    <?php
                  }
                  else
                  {?>
                  <a class="btn btn-success btn-sm" style="margin-left:2%;" href="<?php echo site_url('single-product/'.$prod->id);?>">+</a>
                  <?php }?>			  

</div>
</div>
</a>
</div>
</div>
</div>
 <?php }?>
</div>
</div>
</div>
</div>
</div>
</section>
