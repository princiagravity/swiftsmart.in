<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="img/logo.svg">
<title>Swiftsmart</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public_html/vendor/slick/slick.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public_html/vendor/slick/slick-theme.min.css" />

<link href="<?php echo base_url(); ?>public_html/vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">

<link href="<?php echo base_url(); ?>public_html/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>public_html/css/style.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>public_html/vendor/sidebar/demo.css" rel="stylesheet">
</head>
<body class="fixed-bottom-padding bg-success">
<div class="border-bottom p-3 d-none mobile-nav">
<div class="title d-flex align-items-center">
<a href="home.html" class="text-decoration-none text-dark d-flex align-items-center">
<img class="osahan-logo mr-2" src="<?php echo base_url(); ?>public_html/img/logo.png">
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
<!--<a href="search.html" class="text-decoration-none">
<div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
<div class="input-group-prepend">
<button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
</div>
<input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Search for Products.." aria-label="" aria-describedby="basic-addon1">
</div>
</a>-->
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

<div class="input-group mr-sm-2 col-lg-12">
<input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Search for Products..">
<div class="input-group-prepend">
<div class="btn btn-success rounded-right"><i class="icofont-search"></i></div>
</div>
</div>
</div>
<div class="ml-auto d-flex align-items-center">
<div class="dropdown mr-3">
<a href="#" class="dropdown-toggle text-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img src="<?php echo base_url(); ?>public_html/img/user.png" class="img-fluid rounded-circle header-user mr-2"> 
 <div class="user-info"> Hi!! <span class="user-name">User</span></div>
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
<a class="nav-link text-white pl-0" href="#!">About </a>
</li>
<li class="nav-item">
<a class="nav-link text-white pl-0" href="#">
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

<li class="nav-item">
<a class="nav-link text-white pl-0" href="#!">Contact </a>
</li>
</ul>
<div class="list-unstyled form-inline mb-0 ml-auto">

<a href="<?php echo site_url('offers');?>" class="text-white bg-offer px-3 py-2"><i class="icofont-sale-discount h6"></i>Offers</a>
</div>
</div>
</div>
</div>


</div>

<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Successful</li>
</ol>
</div>
</nav>

<div class="row d-flex justify-content-center">
<div class="col-md-6">
<div class="p-5 text-center">
<i class="icofont-check-circled display-1 text-warning"></i>
<h1 class="text-white font-weight-bold">Hi, Your order has been successful 🎉</h1>
<p class="text-white">Check your order status in <a href="<?php echo site_url('my-orders');?>" class="font-weight-bold text-decoration-none text-white">My Order</a> about next steps information.</p>
</div>

<br/>
<br/>
</div>
</div>

<nav id="main-nav">
<ul class="second-nav">
<li><a href="<?php echo site_url('home')?>"> Home</a></li>
<li>
<a href="#!"> About</a>

</li>
<li><a class="dropdown-item" href="#!">Products</a></li>
<li><a class="dropdown-item" href="<?php echo site_url('categories') ?>">Category</a></li>
<li><a class="dropdown-item" href="<?php echo site_url('my-orders');?>">My Orders</a></li>
<li><a class="dropdown-item" href="<?php echo site_url('offers');?>">Offers</a></li>
<li><a class="dropdown-item" href="#!">Contact</a></li>
</ul>

</nav>

<footer class="section-footer border-top bg-white">
<section class="footer-top py-4">
<div class="container">
<div class="row">

<div class="col-md-6">
<form>
<div class="input-group">
<input type="text" placeholder="Email" class="form-control" name="">
<span class="input-group-append">
<button type="submit" class="btn btn-success"> Subscribe</button>
</span>
</div>

</form>
</div>
<div class="col-md-6 text-md-right">
<a href="#" class="btn btn-icon btn-light"><i class="icofont-facebook"></i></a>
<a href="#" class="btn btn-icon btn-light"><i class="icofont-twitter"></i></a>
<a href="#" class="btn btn-icon btn-light"><i class="icofont-instagram"></i></a>
<a href="#" class="btn btn-icon btn-light"><i class="icofont-youtube"></i></a>
</div>
</div>

</div>

</section>

<section class="footer-main border-top pt-5 pb-4">
<div class="container">
<div class="row">
<aside class="col-md-3">
<h6 class="title">About Us</h6>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
</aside>
<aside class="col-md-3">
<h6 class="title">Useful Links</h6>
<ul class="list-unstyled list-padding">
<li> <a href="<?php echo site_url('home')?>" class="text-dark">Home</a></li>
<li> <a href="#!" class="text-dark">About</a></li>
<li> <a href="#!" class="text-dark">Products</a></li>
<li> <a href="<?php echo site_url('categories') ?>" class="text-dark">Categories</a></li>

<li> <a href="#!" class="text-dark">Contact</a></li>
</ul>
</aside>
<aside class="col-md-3">
<h6 class="title">Customer Service</h6>
<ul class="list-unstyled list-padding">
<li> <a href="#!" class="text-dark">Cancellation Policy</a></li>
<li> <a href="#!" class="text-dark">Terms and Conditions</a></li>
<li> <a href="#!" class="text-dark">Return Policy</a></li>
<li> <a href="#!" class="text-dark">Shipping Policy</a></li>

</ul>
</aside>
<aside class="col-md-3">
<h6 class="title">My Account</h6>
<ul class="list-unstyled list-padding">
<li> <a class="text-dark" href="<?php echo site_url('my-account');?>"> My account</a></li>
<li> <a href="<?php echo site_url('offers');?>" class="text-dark">My Offers</a></li>
<li> <a class="text-dark" href="<?php echo site_url('my-account');?>"> My address</a></li>
<li> <a class="text-dark" href="#!"> Terms &amp; conditions</a></li>
<li> <a class="text-dark" href="<?php echo site_url('logout');?>"> Logout</a></li>
</ul>
</aside>

</div>

</div>

</section>

<section class="footer-bottom border-top py-4">
<div class="container">
<div class="row">
<div class="col-md-6">
<span class="pr-2">� 2021 Swiftsmart</span>

</div>
<div class="col-md-6 text-md-right">
<a href="#"><img src="<?php echo base_url();?>public_html/img/appstore.png" height="30"></a>
<a href="#"><img src="<?php echo base_url();?>public_html/img/playmarket.png" height="30"></a>
</div>
</div>

</div>

</section>
<div class="modal fade right-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header p-0">
<nav class="schedule w-100">
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-link active col-5 py-4" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
<p class="mb-0 font-weight-bold">Sign in</p>
</a>
<a class="nav-link col-5 py-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
<p class="mb-0 font-weight-bold">Sign up</p>
</a>
<a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
<h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>
</a>
</div>
</nav>
</div>
<div class="modal-body p-0">
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<div class="osahan-signin p-4 rounded">
<div class="p-2">
 <h2 class="my-0">Welcome Back</h2>
<p class="small mb-4">Sign in to Continue.</p>
<form action="">
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input placeholder="Enter Email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input placeholder="Enter Password" type="password" class="form-control" id="exampleInputPassword1">
</div>
<button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign in</button>
</form>
<p class="text-muted text-center small m-0 py-3">or</p>
<a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
<i class="icofont-brand-apple mr-2"></i> Sign up with Apple
</a>
<a href="verification.html" class="btn btn-light border btn-block rounded btn-lg btn-google">
<i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
</a>
<p class="text-center mt-3 mb-0"><a href="signup.html" class="text-dark">Don't have an account? Sign up</a></p>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class="osahan-signup bg-white p-4">
<div class="p-2">
<h2 class="my-0">Let's get started</h2>
<p class="small mb-4">Create account to see our top picks for you!</p>
<form action="">
<div class="form-group">
<label for="exampleInputName1">Name</label>
<input placeholder="Enter Name" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
</div>
<div class="form-group">
<label for="exampleInputNumber1">Phone Number</label>
<input placeholder="Enter Phone Number" type="number" class="form-control" id="exampleInputNumber1" aria-describedby="emailHelp">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input placeholder="Enter Email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input placeholder="Enter Password" type="password" class="form-control" id="exampleInputPassword1">
</div>
<div class="form-group">
<label for="exampleInputPassword2">Confirmation Password</label>
<input placeholder="Enter Confirmation Password" type="password" class="form-control" id="exampleInputPassword2">
</div>
<button type="submit" class="btn btn-success rounded btn-lg btn-block">Create Account</button>
</form>
<p class="text-muted text-center small py-2 m-0">or</p>
<a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
<i class="icofont-brand-apple mr-2"></i> Sign up with Apple
</a>
<a href="verification.html" class="btn btn-light border btn-block rounded btn-lg btn-google">
<i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
</a>
<p class="text-center mt-3 mb-0"><a href="signin.html" class="text-dark">Already have an account! Sign in</a></p>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer p-0 border-0">
<div class="col-6 m-0 p-0">
<a href="#" class="btn border-top border-right btn-lg btn-block" data-dismiss="modal">Close</a>
</div>
<div class="col-6 m-0 p-0">
<a href="help_support.html" class="btn border-top btn-lg btn-block">Help</a>
</div>
</div>
</div>
</div>
</div>
</footer>

<div class="modal fade right-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header p-0">
<nav class="schedule w-100">
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-link active col-5 py-4" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
<p class="mb-0 font-weight-bold">Sign in</p>
</a>
<a class="nav-link col-5 py-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
<p class="mb-0 font-weight-bold">Sign up</p>
</a>
<a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
<h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>
</a>
</div>
</nav>
</div>
<div class="modal-body p-0">
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<div class="osahan-signin p-4 rounded">
<div class="p-2">
<h2 class="my-0">Welcome Back</h2>
<p class="small mb-4">Sign in to Continue.</p>
<form action="">
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input placeholder="Enter Email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input placeholder="Enter Password" type="password" class="form-control" id="exampleInputPassword1">
</div>
<button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign in</button>
</form>
<p class="text-muted text-center small m-0 py-3">or</p>
<a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
<i class="icofont-brand-apple mr-2"></i> Sign up with Apple
</a>
<a href="verification.html" class="btn btn-light border btn-block rounded btn-lg btn-google">
<i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
</a>
<p class="text-center mt-3 mb-0"><a href="signup.html" class="text-dark">Don't have an account? Sign up</a></p>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class="osahan-signup bg-white p-4">
<div class="p-2">
<h2 class="my-0">Let's get started</h2>
<p class="small mb-4">Create account to see our top picks for you!</p>
<form action="">
<div class="form-group">
<label for="exampleInputName1">Name</label>
<input placeholder="Enter Name" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
</div>
<div class="form-group">
<label for="exampleInputNumber1">Phone Number</label>
<input placeholder="Enter Phone Number" type="number" class="form-control" id="exampleInputNumber1" aria-describedby="emailHelp">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input placeholder="Enter Email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input placeholder="Enter Password" type="password" class="form-control" id="exampleInputPassword1">
</div>
<div class="form-group">
<label for="exampleInputPassword2">Confirmation Password</label>
<input placeholder="Enter Confirmation Password" type="password" class="form-control" id="exampleInputPassword2">
</div>
<button type="submit" class="btn btn-success rounded btn-lg btn-block">Create Account</button>
</form>
<p class="text-muted text-center small py-2 m-0">or</p>
<a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">
<i class="icofont-brand-apple mr-2"></i> Sign up with Apple
</a>
<a href="verification.html" class="btn btn-light border btn-block rounded btn-lg btn-google">
<i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
</a>
<p class="text-center mt-3 mb-0"><a href="signin.html" class="text-dark">Already have an account! Sign in</a></p>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer p-0 border-0">
<div class="col-6 m-0 p-0">
<a href="#" class="btn border-top border-right btn-lg btn-block" data-dismiss="modal">Close</a>
</div>
<div class="col-6 m-0 p-0">
<a href="help_support.html" class="btn border-top btn-lg btn-block">Help</a>
</div>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url();?>public_html/vendor/jquery/jquery.min.js" type="0f72f7b2c94af85a65762e89-text/javascript"></script>
<script src="<?php echo base_url();?>public_html/vendor/bootstrap/js/bootstrap.bundle.min.js" type="0f72f7b2c94af85a65762e89-text/javascript"></script>

<script type="0f72f7b2c94af85a65762e89-text/javascript" src="<?php echo base_url();?>public_html/vendor/slick/slick.min.js"></script>

<script type="0f72f7b2c94af85a65762e89-text/javascript" src="<?php echo base_url();?>public_html/vendor/sidebar/hc-offcanvas-nav.js"></script>
<script src="<?php echo base_url();?>public_html/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url();?>public_html/js/jquery.countdown.min.js"></script>

<script src="<?php echo base_url();?>public_html/js/osahan.js" type="0f72f7b2c94af85a65762e89-text/javascript"></script>
<script src="<?php echo base_url();?>public_html/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="0f72f7b2c94af85a65762e89-|49" defer=""></script>
<script defer src="<?php echo base_url();?>public_html/static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"687fbe7ebbcd0e78","version":"2021.8.1","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":10}'></script>
<!----------------------------->

 
   <script src="<?php echo base_url()?>public_html/js/js/jquery.min.js"></script>
 
   <script src="<?php echo base_url()?>public_html/js/js/default/active.js"></script>
   
  
<!----------------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="<?php echo base_url();?>public_html/js/custom_functions.js"></script>
    <script type = 'text/javascript'> var base_url= window.location.origin+'/swiftsmart/front_end/index.php/';</script>
</body>
</html>