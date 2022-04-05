<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Offer</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active">Offer</li>
</ol>
<div class="row justify-content-between">
<div class="col-lg-12">
<a href="<?php echo base_url();?>admin/Admin_ctlr/offer_add" class="add-btn hover-btn">Add New</a>
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
<h4>All Offer</h4>
</div>
<div class="card-body-table">
<div class="table-responsive">
<table class="table ucp-table table-hover">
<thead>
<tr>
<!-- <th style="width:60px"><input type="checkbox" class="check-all"></th> -->
<th style="width:60px">ID</th>

<th>Offer Image</th>
<th>Offer Title</th>
<th>Description</th>
<!-- <th>Status</th> -->
<!-- <th>Status</th> -->
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
 $i=1;
foreach($offer as $item)
{
   
    ?>
<tr>
<!-- <td><input type="checkbox" class="check-item" name="ids[]" value="11"></td> -->
<td><?php echo $i;?></td>
<td>  <div class="offer-img">             
            <img src="<?php echo base_url();?>public_html/upload/offer/thumb/<?php echo $item['offer_image'];?>" alt="">
                                     </div>                 </td>
<td><?php echo $item['offer_title'];?></td>
<td><?php echo $item['offer_description'];?></td>
<!-- <td><?php echo $item['offer_status'];?></td> -->



<!-- <td><span class="badge-item badge-status">Active</span></td> -->
<td class="action-btns">
<a href="<?php echo base_url();?>admin/Admin_ctlr/offer_edit/<?php echo $item['offer_id']; ?>" class="edit-btn"><i class="fas fa-edit"></i></a>
<a href="<?php echo base_url();?>admin/Admin_ctlr/offer_delete/<?php echo $item['offer_id']; ?>" class="edit-btn"><i class="fas fa-trash"></i> </a>

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