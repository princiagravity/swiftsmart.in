<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Unit</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/unit">Unit</a></li>
<li class="breadcrumb-item active">Edit Unit</li>
</ol>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-title-2">
<h4>Edit Unit</h4>
</div>
<?php foreach($unit as $s)
{
    ?>
<form method="post" action="<?php echo base_url();?>admin/Admin_ctlr/unit_update/<?php echo $s['unit_id'];?>">
<div class="card-body-table">
<div class="news-content-right pd-20">
<div class="form-group">
<label class="form-label">Unit Name*</label>
<input type="text" name="unit_name" class="form-control" value="<?php echo $s['unit_name'];?>">
</div>
<!-- <div class="form-group">
<label class="form-label">Status*</label>
<select id="status" name="status" class="form-control">
<option selected>Active</option>
<option value="1">Inactive</option>
</select>
</div> -->
<input class="save-btn hover-btn" type="submit" value="Update unit"/>
</div>
</div>
</form>
<?php } ?>
</div>
</div>
</div>
</div>
</main>