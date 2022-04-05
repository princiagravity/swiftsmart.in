<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="img/logo.svg">
<title>Swiftsmart</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/vendor/slick/slick.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public_html/vendor/slick/slick-theme.min.css" />

<link href="<?php echo base_url();?>public_html/vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">

<link href="<?php echo base_url();?>public_html/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url();?>public_html/css/style.css" rel="stylesheet">

<link href="<?php echo base_url();?>public_html/vendor/sidebar/demo.css" rel="stylesheet">
<style>
.nav-link {
    display: block;
    padding: .5rem 2rem;
}
.list-group{
    max-height: 300px;
    margin-bottom: 10px;
    overflow-y:scroll;
    -webkit-overflow-scrolling: touch;
}
</style>
</head>
<body class="fixed-bottom-padding">
<div class="border-bottom p-3 d-none mobile-nav">
<div class="title d-flex align-items-center">
<a href="<?php echo site_url('home')?>" class="text-decoration-none text-dark d-flex align-items-center">
<img class="osahan-logo mr-2" src="<?php echo base_url();?>public_html/img/logo.png">
<h4 class="font-weight-bold text-success m-0"></h4>
</a>
<p class="ml-auto m-0">
<a href="<?php echo site_url('cart')?>" class="ml-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
<i class="icofont-shopping-cart"></i>
<span class="cart-count" id="cart_val" ><?php echo $this->session->userdata('cart_value');  ?></span>

</a>
</p>
<a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
</div>
<!--search-->
<div class="list-unstyled form-inline mb-0 ml-auto">
<input class="form-control" type="search" placeholder="Enter your keyword" name="search_product" id="search_productt" style="width:75%; float:left">
<!-- <ul id="searchResultt" class="list-group overflow-auto" style="position:absolute;margin-top:88%;
    z-index: 999;
   float:left;height:200px;"></ul> -->
   <ul id="searchResultt" class="list-group" style="z-index: 10;position: absolute;width: 100%;max-height: 300px;overflow-y: scroll;" >
             
             </ul>

<button class="text-white btn btn-danger">Search</button>
</div>


<!--end search-->

</div>




<div class="bg-white shadow-sm osahan-main-nav">

<nav class="navbar navbar-expand-lg navbar-light bg-white osahan-header py-0 container">
<a class="navbar-brand mr-0" href="<?php echo site_url('home')?>"><img class="img-fluid logo-img rounded-pill border shadow-sm" src="<?php echo base_url();?>public_html/img/logo.png"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="ml-3 d-flex align-items-center">
<div class="dropdown mr-3">

<div class="dropdown-menu osahan-select-loaction p-3" aria-labelledby="navbarDropdown">
<span>Select your city to start shopping</span>
<form class="form-inline my-2">

<div class="input-group p-0 col-lg-12">
<input type="text" class="form-control form-control-sm" id="inlineFormInputGroupUsername2" placeholder="Search Location">
<div class="input-group-prepend">
<div class="btn btn-success rounded-right btn-sm"><i class="icofont-location-arrow"></i> Detect</div>
</div>
</div>
</form>
<div class="city pt-2">
<h6>Top Citys</h6>
<p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Banglore</a></p>
<p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Noida</a></p>
<p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Delhi</a></p>
<p class="m-0 py-1"><a href="#" class="text-dark">Mumbai</a></p>
</div>
</div>
</div>

<!--<div class="input-group mr-sm-2 col-lg-12">
<input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Search for Products..">
<div class="input-group-prepend">
<div class="btn btn-success rounded-right"><i class="icofont-search"></i></div>
</div>
</div>-->
</div>

<a>
<marquee width="500px" style="padding-top:10%; margin-left:7%; font-size:16px; font-weight:500" direction="left" height="100px">
Study Abroad with Kanan International.. Start your IELTS Journey with us. Get your Destination Easily.
</marquee>
</a>


<div class="ml-auto d-flex align-items-center">
    <img src="<?php echo base_url();?>public_html/img/kannan.png" style="width: 50%; margin-right: 10%; margin-left: 3%;"/>
<div class="dropdown mr-3">
<a href="#" class="dropdown-toggle text-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img src="<?php echo base_url(); ?>public_html/img/user.png" class="img-fluid rounded-circle header-user mr-2"> 
<!-- <div class="user-info"> Hi!! <span class="user-name">User</span></div>-->
 <h6 class="user-name mb-0"><?php if($this->session->userdata('user_id'))
          { 
            echo $_SESSION['userdata']['name'];
            }else { echo 'User';
            }?></h6>
</a>

<div class="dropdown-menu dropdown-menu-right top-profile-drop" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="<?php echo site_url('my-account');?>">My account</a>
<a class="dropdown-item" href="<?php echo site_url('logout');?>">Logout</a>
</div>
</div>
<div class="dropdown">

<a href="<?php echo site_url('cart')?>" class="ml-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
<i class="icofont-shopping-cart"></i>
<span class="cart-count" id="cart_val" ><?php echo $this->session->userdata('cart_value');  ?></span>

</a>
</div>
</nav>

<div class="bg-color-head">
<div class="container menu-bar d-flex align-items-center">
<ul class="list-unstyled form-inline mb-0">
<li class="nav-item active">
<a class="nav-link text-white pl-0" href="<?php echo site_url('home')?>">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link text-white pl-0" href="<?php echo site_url('about')?>">About </a>
</li>
<li class="nav-item">
<a class="nav-link text-white pl-0" href="<?php echo site_url('products') ?>">
Products
</a>
</li>
<li class="nav-item">
<a class="nav-link text-white pl-0" href="<?php echo site_url('categories') ?>">
Category
</a>
</li>
<li class="nav-item">
<a class="nav-link text-white pl-0" href="<?php echo site_url('my-orders');?>">My Orders</a>
</li>

<!-- <li class="nav-item">
<a class="nav-link text-white pl-0" href="#!">Contact </a>
</li> -->
</ul>


<div class="list-unstyled form-inline mb-0 ml-auto">

<input class="form-control" type="search" placeholder="Enter your keyword" name="search_product" id="search_product">



<ul id="searchResult" class="list-group" style="z-index: 999;max-height: 300px;overflow-y: scroll;" >
             
</ul>

<button class="text-white btn btn-danger">Search</button>
</div>



<div class="list-unstyled form-inline mb-0 ml-auto">

<a href="<?php echo site_url('offers');?>" class="text-white bg-offer px-3 py-2"><i class="icofont-sale-discount h6"></i>Offers</a>
</div>
</div>
</div>
</div>

<nav aria-label="breadcrumb" class="breadcrumb mb-0 d-none">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo site_url('home')?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"></li>
</ol>
</div>
</nav>