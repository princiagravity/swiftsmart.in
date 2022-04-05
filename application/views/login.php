<style>
    @media (max-width:600px){
        .vh-100 {
            height: auto !important;
        }
    }
    
</style>

<section class="osahan-main-body osahan-signin-main">
<div class="container">
<div class="row d-flex align-items-center justify-content-center vh-100">
<div class="landing-page shadow-sm bg-success col-lg-6">
<a class="position-absolute btn-sm btn btn-outline-light m-4 zindex" href="<?php echo site_url('home');?>">Skip <i class="icofont-bubble-right"></i></a> 
<div class="osahan-slider m-0">
<div class="osahan-slider-item text-center">
<div class="d-flex align-items-center justify-content-center vh-100 flex-column">
<i class="icofont-sale-discount display-1 text-warning"></i>
<h4 class="my-4 text-white">Best Prices & Offers</h4>
<p class="text-center text-white-50 mb-5 px-4">Cheaper prices than your local<br>supermarket, great cashback offers to top it off.</p>
</div>
</div>
<div class="osahan-slider-item text-center">
<div class="d-flex align-items-center justify-content-center vh-100 flex-column">
<i class="icofont-cart display-1 text-warning"></i>
 <h4 class="my-4 text-white">Wide Assortment</h4>
<p class="text-center text-white-50 mb-5 px-4">Choose from 5000+ products across food<br>, personal care, household & other categories.</p>
</div>
</div>
<div class="osahan-slider-item text-center">
<div class="d-flex align-items-center justify-content-center vh-100 flex-column">
<i class="icofont-support-faq display-1 text-warning"></i>
<h4 class="my-4 text-white">Easy Returns</h4>
<p class="text-center text-white-50 mb-5 px-4">Not satisfied with a product? Return<br> it at the doorstep & get a refund within hours.</p>
</div>
</div>
</div>
</div>
 <?php 
   $requrl="";
   if($request)
   {
       $requrl=$request;
   }?>
<div class="col-lg-6 pl-lg-5 login-cont">
<div class="osahan-signin shadow-sm bg-white p-4 rounded">
<div class="p-3 register-form">
<h2 class="my-0">Welcome Back</h2>
<p class="small mb-4 ">Sign in to Continue.</p>
<form id="user-login" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
<div class="form-group">
<label for="username">Username</label>
<input placeholder="Mobile No" type="text" class="form-control" id="username" name="username">
</div>
<div class="form-group">
<label for="password">Password</label>
<input placeholder="Enter Password" id="password" name="password" type="password" class="form-control" >
</div>
<input type="hidden" name="requrl" value="<?php echo $requrl;?>">
<button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign in</button>
</form>

<p class="text-center mt-3 mb-0"><a class="forgot-password d-block mt-3 mb-1" href="<?php echo site_url('forget-password');?>">Forgot Password?</a></p>
<p class="text-center mt-3 mb-0"><a  href="#" class="text-dark signup">Don't have an account? Sign up</a></p>
<p class="text-center mt-3 mb-0"><a  href="<?php echo site_url('home')?>" class="text-dark">View as Guest</a></p>

</div>
</div>
</div>


<div class="col-lg-6 pl-lg-5 signup-cont" style="display: none;">
<div class="osahan-signup shadow bg-white p-4 rounded">
<div class="p-3 register-form ">
<h2 class="my-0">Let's get started</h2>
<p class="small mb-4">Create account to see our top picks for you!</p>
<form id="user-signup" action="" method="POST"><!--action="otp.html"-->
<div class="form-group">
<label for="name">Display Name</label>
<input placeholder="Enter Name" type="text" class="form-control"  id="name" name="name" >
</div>
<div class="form-group">
<label for="mobile">Phone Number</label>
<input placeholder="Enter Phone Number" type="number" class="form-control" id="mobile" name="mobile" >
</div>
<div class="form-group">
<label for="email_id">Email</label>
<input placeholder="Enter Email" type="email" class="form-control" id="email_id" name="email_id">
</div>
<div class="form-group">
<label for="password">Password</label>
<input placeholder="Enter Password" type="password" class="form-control" id="registerPassword" name="password">
</div>
<input type="hidden" name="role" value="customer">
<!-- <input type="hidden" name="role" value="<?php echo $role;?>"> -->
<button type="submit" class="btn btn-success rounded btn-lg btn-block">Create Account</button>
</form>


<p class="text-center mt-3 mb-0"><a href="#" class="text-dark login">Already have an account! Sign in</a></p>
</div>
</div>
</div>



</div>
</div>
</section>
