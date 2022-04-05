
<nav aria-label="breadcrumb" class="breadcrumb mb-0">
<div class="container">
<ol class="d-flex align-items-center mb-0 p-0">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>" class="text-success">Home</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('change-password');?>" class="text-success">Change Password</a></li>
</ol>
</div>
</nav>

<section class="py-4 osahan-main-body">
<div class="container">
<div class="row">
<div class="col-lg-4">
<div class="osahan-account bg-white rounded shadow-sm overflow-hidden">
<div class="p-4 profile text-center border-bottom">
<img src="img/user.png" class="img-fluid rounded-pill">
<h6 class="font-weight-bold m-0 mt-2">User</h6>
<p class="small text-muted m-0"><a href="" class="__cf_email__" data-cfemail="fa939b9795899b929b94ba9d979b9396d4999597">[email&#160;protected]</a></p>
</div>
<div class="account-sections">
<ul class="list-group">
<a href="my_account.html" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-user osahan-icofont bg-danger"></i>My Account
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="promos.html" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-sale-discount osahan-icofont bg-success"></i>Promos
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="my_address.html" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-address-book osahan-icofont bg-dark"></i>My Address
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="terms_conditions.html" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-info-circle osahan-icofont bg-primary"></i>Terms, Privacy & Policy
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="help_support.html" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-phone osahan-icofont bg-warning"></i>Help & Support
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="help_ticket.html" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex align-items-center p-3">
<i class="icofont-phone osahan-icofont bg-success"></i>Ticket
<span class="badge badge-success p-1 badge-pill ml-auto"><i class="icofont-simple-right"></i></span>
</li>
</a>
<a href="signin.html" class="text-decoration-none text-dark">
<li class="border-bottom bg-white d-flex  align-items-center p-3">
<i class="icofont-lock osahan-icofont bg-danger"></i> Logout
</li>
</a>
</ul>
</div>
</div>
</div>
<div class="col-lg-8 p-4 bg-white rounded shadow-sm">
<h4 class="mb-4 profile-title">Change Password</h4>
<div id="change_password">
<div class="p-0">
 <form id="change-password"  method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">

<div class="form-group">
<label for="password">New Password</label>
 <input type="password" placeholder="Enter New Password" class="form-control" id="password" name="password" >
</div>
<div class="text-center">
<button type="submit" class="btn btn-success btn-block btn-lg">Save Changes</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
