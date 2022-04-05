<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Area</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active">Area</li>
</ol>
<div class="row justify-content-between">
<div class="col-lg-12">
<a href="<?php echo base_url();?>admin/Admin_ctlr/area_add" class="add-btn hover-btn">Add New</a>
</div>
<!-- <div class="col-lg-3 col-md-4">
<div class="bulk-section mt-30">
<div class="input-group">
<select id="action" name="action" class="form-control">
<option selected>Bulk Actions</option>
<option value="1">Active</option>
<option value="2">Inactive</option>
<option value="3">Delete</option>
</select>
<div class="input-group-append">
<button class="status-btn hover-btn" type="submit">Apply</button>
</div>
</div>
</div>
</div> -->
<!-- <div class="col-lg-5 col-md-6">
<div class="bulk-section mt-30">
<div class="search-by-name-input">
<input type="text" class="form-control" placeholder="Search">
</div>
<div class="input-group">
<select id="categeory" name="categeory" class="form-control">
<option selected>Active</option>
<option value="1">Inactive</option>
</select>
<div class="input-group-append">
<button class="status-btn hover-btn" type="submit">Search Category</button>
</div>
</div>
</div>
</div> -->
<div class="col-lg-12 col-md-12">
<div class="card card-static-2 mt-30 mb-30">
<div class="card-title-2">
<h4>All Areas</h4>
</div>
<div class="card-body-table">
<div class="table-responsive">
<table class="table ucp-table table-hover">
<thead>
<tr>
<!-- <th style="width:60px"><input type="checkbox" class="check-all"></th> -->
<th style="width:60px">ID</th>

<th>Area</th>
<th>District</th>
<th>State</th>
<!-- <th>Status</th> -->
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
 $i=1;
foreach($area as $item)
{
   
    ?>
<tr>
<!-- <td><input type="checkbox" class="check-item" name="ids[]" value="11"></td> -->
<td><?php echo $i;?></td>
<td><?php echo $item['area_name'];?></td>
<td><?php echo $item['district'];?></td>
<td><?php echo $item['state'];?></td>
<!-- <td><span class="badge-item badge-status">Active</span></td> -->
<td class="action-btns">
<a href="<?php echo base_url();?>admin/Admin_ctlr/area_edit/<?php echo $item['area_id'];?>" class="edit-btn"><i class="fas fa-edit"></i></a>
<a href="<?php echo base_url();?>admin/Admin_ctlr/area_delete/<?php echo $item['area_id']; ?>" class="edit-btn"><i class="fas fa-trash"></i> </a>
</td>
</tr>

<?php 
$i++;
}
?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</main>