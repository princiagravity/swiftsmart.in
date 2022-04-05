<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url("offers");?>">Recommended</a></li>
</ol>
</div>
</nav>
<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="osahan-listing">
<div class="d-flex align-items-center mb-3">
<h4>Recommended</h4>
<!--<div class="m-0 text-center ml-auto">
<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white mr-2"><i class="icofont-filter mr-1"></i> Filter</a>
<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white"><i class="icofont-signal mr-1"></i> Sort</a>
</div>-->
</div>
<div class="row">

 <?php if($offerslist)
       { foreach($offerslist as $offer)
       {?>

<div class="col-12 col-md-4 mb-3">
<a href="#" class="text-dark text-decoration-none">
<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
<div class="recommend-slider rounded m-0">
<div class="osahan-slider-item m-2 rounded">
 <img src="<?php echo base_url()?>../uploads/offer-images/<?php echo $offer->image_url;?>" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
</div>

</div>
<div class="p-3 position-relative">
<h6 class="mb-1 font-weight-bold text-success"><?php echo $offer->name;?>
</h6>
<p class="text-muted"><?php echo $offer->description; ?></p>
 <input type="hidden" name="product_id" value="<?php echo $offer->id; ?>"></a>
</div>
</div>
</a>
</div>
<?php } } else { echo "No Offers";} ?>

</div>
</div>
</div>
</div>
</div>
</section>
