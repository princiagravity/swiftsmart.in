<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
 <?php if($userdetails)
       {
?>
<div class="col-lg-4">
<div class="osahan-account bg-white rounded shadow-sm overflow-hidden">
<div class="p-4 profile text-center border-bottom">
<img src="<?php echo base_url(); ?>public_html/img/profile.png" class="img-fluid rounded-pill">
<h6 class="font-weight-bold m-0 mt-2"><?php echo $userdetails[0]->name;?></h6>
<p class="small text-muted m-0"><?php echo $userdetails[0]->email_id;?></p>
</div>
<div class="account-sections">
<ul class="list-group">
<a href="#!" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-user osahan-icofont bg-danger"></i>My Account
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="<?php echo site_url('offers');?>" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-sale-discount osahan-icofont bg-success"></i>Offers
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="<?php echo site_url('my-orders');?>" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-address-book osahan-icofont bg-dark"></i>My Orders
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="#" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-info-circle osahan-icofont bg-primary"></i>Terms, Privacy & Policy
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>


<a href="<?php echo site_url('logout');?>" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex  align-items-center p-3">
<i class="icofont-lock osahan-icofont bg-danger"></i> Logout
</li>
</a>
</ul>
</div>
</div>
</div>
<div class="col-lg-8 p-4 bg-white rounded shadow-sm">
<div class="osahan-my_address">
<h4 class="mb-4 profile-title">My Details</h4>
<div class="custom-control custom-radio px-0 mb-3 position-relative border-custom-radio">
<input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
<label class="custom-control-label w-100" for="customRadioInline1">
<div>
<div class="p-3 bg-white rounded shadow-sm w-100">

<p class="small text-muted m-0">Full Name : <?php echo $userdetails[0]->name;?></p>
<p class="small text-muted m-0">Phone : <?php echo $userdetails[0]->mobile;?></p>
<p class="small text-muted m-0">Email : <?php echo $userdetails[0]->email_id;?> </p>
<p class="small text-muted m-0">Username : <?php echo $userdetails[0]->mobile;?></p>

</div>
</div>
</label>
</div>

</div>
<div class="osahan-my_address">
<h4 class="mb-4 profile-title">My Addresses</h4>
<div class="custom-control custom-radio px-0 mb-3 position-relative border-custom-radio">
<input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
<label class="custom-control-label w-100" for="customRadioInline1">
<div>
<div class="p-3 bg-white rounded shadow-sm w-100">
<div class="d-flex align-items-center mb-2">
<p class="mb-0 h6"><?php echo $userdetails[0]->addresstype;?></p>
<p class="mb-0 badge badge-success ml-auto">Default</p>
</div>
<p class="small text-muted m-0"><?php echo $userdetails[0]->address;?></p>


</div>
</div>
</label>
</div>

</div>


</div>
  <?php }?>
</div>
</div>
</section>
