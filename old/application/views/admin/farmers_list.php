<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Farmers</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active">Farmers</li>
</ol>
<div class="row justify-content-between">
<!-- <div class="col-lg-12">
<a href="add_category.html" class="add-btn hover-btn">Add New</a>
</div> -->
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
<h4>All Farmers</h4>
</div>
<div class="card-body-table">
<div class="table-responsive">
<table class="table ucp-table table-hover">
<thead>
<tr>
<!-- <th style="width:60px"><input type="checkbox" class="check-all"></th> -->
<th style="width:60px">ID</th>

<th>Name</th>
<th>Address</th>
<th>Phone No</th>
<th>Email Id</th>
<th>Area</th>
<th>Nearest Store</th>
<!-- <th>Status</th> -->
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
 $i=1;
foreach($farmers as $item)
{
   
    ?>
<tr>
<!-- <td><input type="checkbox" class="check-item" name="ids[]" value="11"></td> -->
<td><?php echo $i;?></td>
<td><?php echo $item['farmer_name'];?></td>
<td><?php echo $item['farmer_address'];?></td>
<td><?php echo $item['farmer_phn_no'];?></td>
<td><?php echo $item['farmer_email_id'];?></td>
<td><?php echo $item['area_name'];?></td>
<td><?php echo $item['store_name'];?></td>
<!-- <td><span class="badge-item badge-status">Active</span></td> -->
<td class="action-btns">
<a href="<?php echo base_url();?>admin/Admin_ctlr/farmer_view/<?php echo $item['farmer_id'];?>" class="edit-btn"><i class="fas fa-eye"></i></a>
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