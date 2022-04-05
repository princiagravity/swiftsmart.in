<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Area</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/area_list">Area</a></li>
<li class="breadcrumb-item active">Add Area</li>
</ol>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-title-2">
<h4>Add New Area</h4>
</div>
<form method="post" action="<?php echo base_url();?>admin/Admin_ctlr/area_insert">
<div class="card-body-table">
<div class="news-content-right pd-20">
<div class="form-group">
<label class="form-label">Name*</label>
<input type="text" name="area_name" class="form-control" placeholder="Area Name">
</div>
<div class="form-group">
<label class="form-label">State*</label>
<input type="text" value="kerala" class="form-control" disabled>
<input type="hidden" name="state" value="kerala">
</div>
<div class="form-group">
<label class="form-label">District*</label>
<select name="district" class="form-control">
<option selected>--Select District--</option>
<option value="Thrissur">Thrissur</option>
<option value="Palakkad">Palakkad</option>
<option value="Kozhikode">Kozhikode</option>
<option value="Ernakulam">Ernakulam</option>
</select>
</div>

<!-- <div class="form-group">
<label class="form-label">Status*</label>
<select id="status" name="status" class="form-control">
<option selected>Active</option>
<option value="1">Inactive</option>
</select>
</div> -->
<input class="save-btn hover-btn" type="submit" value="Add New Area"/>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</main>