<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url()?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url("categories");?>" class="text-success">Categories</a></li>
</ol>
</div>
</nav>

<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="osahan-listing">
<div class="d-flex align-items-center mb-3">
<h4>Our Categories</h4>
<!--<div class="m-0 text-center ml-auto">
<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white mr-2"><i class="icofont-filter mr-1"></i> Filter</a>
<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white"><i class="icofont-signal mr-1"></i> Sort</a>
</div>-->
</div>
<div class="row">
 <?php  
   foreach($category_list as $cat)
{?>
<div class="col-sm-6 col-6 col-xs-6 col-md-2 mb-3">
<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
<div class="list-card-image">
 
<a href="<?php echo site_url('category/'.preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ','',$cat->name)).'/'.$cat->id) ?>" class="text-dark">

<div class="p-3">
<img src="<?php echo base_url()?>../uploads/category-images/<?php echo $cat->image_url;?>" class="img-fluid item-img w-100 mb-3">
<h6><?php echo $cat->name;?></h6>
</div>
</a>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</section>
