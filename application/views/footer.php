
<nav id="main-nav">
<ul class="second-nav">
<li><img src="<?php echo base_url();?>public_html/img/logo.png"></li>
<li><a href="<?php echo site_url('home')?>"> Home</a></li>
<li>
<a href="<?php echo site_url('about')?>"> About</a>

</li>
<li><a class="dropdown-item" href="<?php echo site_url('products') ?>">Products</a></li>
<li><a class="dropdown-item" href="<?php echo site_url('categories') ?>">Category</a></li>
<li><a class="dropdown-item" href="<?php echo site_url('my-orders');?>">My Orders</a></li>
<li><a class="dropdown-item" href="<?php echo site_url('offers');?>">Offers</a></li>
<!-- <li><a class="dropdown-item" href="<?php echo site_url('offers');?>">Contact</a></li> -->
</ul>

</nav>

<footer class="section-footer border-top bg-white">
<!--<section class="footer-top py-4">
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

</section>-->

<section class="footer-main border-top pt-5 pb-4">
<div class="container">
<div class="row">
<aside class="col-md-3">
<h6 class="title">About Us</h6>
<p>Santhwanam is established as the Social Apostolate Centre of Trichur, Archdiocese, under Canon Law vide the Decree No. 435/02-02-2010 by His Grace Mar Andrews Thazhath, with the main objects of coordination, control, consolidate, execute and guide social service activities s of different Charity institutions, congregations and different ministries under the control of Archdiocese. </p>
</aside>
<aside class="col-md-3">
<h6 class="title">Useful Links</h6>
<ul class="list-unstyled list-padding">
<li> <a href="<?php echo site_url('home')?>" class="text-dark">Home</a></li>
<li> <a href="<?php echo site_url('about')?>" class="text-dark">About</a></li>
<li> <a href="<?php echo site_url('products')?>" class="text-dark">Products</a></li>
<li> <a href="<?php echo site_url('categories') ?>" class="text-dark">Categories</a></li>

<li> <a href="#!" class="text-dark">Contact</a></li>
</ul>
</aside>
<aside class="col-md-3">
<h6 class="title">Customer Service</h6>
<ul class="list-unstyled list-padding">
<li> <a href="<?php echo site_url('refund-and-cancellation') ?>" class="text-dark">Cancellation Policy</a></li>
<li> <a href="<?php echo site_url('terms-and-conditions') ?>" class="text-dark">Terms and Conditions</a></li>
<li> <a href="<?php echo site_url('privacy-policy') ?>" class="text-dark">Privacy Policy</a></li>
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
<span class="pr-2">© 2021 Swiftsmart</span>

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
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
<script src="<?php echo base_url();?>public_html/vendor/jquery/jquery.min.js" ></script>
<script src="<?php echo base_url();?>public_html/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public_html/vendor/slick/slick.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public_html/vendor/sidebar/hc-offcanvas-nav.js"></script>
<script src="<?php echo base_url();?>public_html/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url();?>public_html/js/jquery.countdown.min.js"></script>

<script src="<?php echo base_url();?>public_html/js/osahan.js"></script>
<script src="<?php echo base_url();?>public_html/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"></script>

<!----------------------------->

 
   <script src="<?php echo base_url()?>public_html/js/js/jquery.min.js"></script>
 
   <script src="<?php echo base_url()?>public_html/js/js/default/active.js"></script>
   
  
<!----------------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="<?php echo base_url();?>public_html/js/custom_functions.js"></script>
 <script type = 'text/javascript'> 
 var base_url= $('#base_url').val();</script>
</body>
</html>