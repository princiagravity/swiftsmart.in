

<section class="osahan-main-body">
<div class="container forgot-cont">
<div class="row d-flex align-items-center justify-content-center vh-100">
<div class="col-lg-6">
<div class="osahan-verification shadow bg-white p-4 rounded">
<div class="osahan-form p-3 text-center mt-3">
<h2>Verify Email ID</h2>
 <p class="mb-4 text-white">Enter the OTP code sent to your mail id<strong class="ms-1"><?php echo $this->session->userdata('fp_email');?></strong></p>
<div>
<div class="p-0 otp-verify-form">
<form id="otp-check"  method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">

<div class="form-group">
<input class="form-control" type="text" value="" id="otp" name="otp" >

</div>
<div class="text-center">
<button type="submit" class="btn btn-success btn-block btn-lg">Verify &amp; Proceed</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
