<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Deals Of the Week</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active">Deals</li>
</ol>
<div class="row justify-content-between">
<div class="col-lg-12">
<a href="<?php echo base_url();?>admin/Admin_ctlr/deal_add" class="add-btn hover-btn">Add New</a>
</div>
<div class="col-lg-12 col-md-12">
<div class="card card-static-2 mt-30 mb-30">
<div class="card-title-2">
<h4>Deals Of the Week</h4>
</div>
<div class="card-body-table">
<div class="table-responsive">
<table class="table ucp-table table-hover">
<thead>
<tr>
<!-- <th style="width:60px"><input type="checkbox" class="check-all"></th> -->
<th style="width:60px">ID</th>

<th>Name</th>
<th>Image</th>
<th>Description</th>
<!-- <th>Status</th> -->
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
 $i=1;
foreach($deals as $item)
{
   
    ?>
<tr>
<!-- <td><input type="checkbox" class="check-item" name="ids[]" value="11"></td> -->
<td><?php echo $i;?></td>
<td><?php echo $item['deal_title'];?></td>
<td><img src="<?php echo base_url();?>public_html/upload/deal/thumb/<?php echo $item['deal_image'];?>" width="25%" /></td>
<td><?php echo $item['deal_description'];?></td>

<!-- <td><span class="badge-item badge-status">Active</span></td> -->
<td class="action-btns">
<a href="<?php echo base_url();?>admin/Admin_ctlr/deal_edit/<?php echo $item['deal_id']; ?>" class="edit-btn"><i class="fas fa-edit"></i> </a>
<a href="<?php echo base_url();?>admin/Admin_ctlr/deal_delete/<?php echo $item['deal_id']; ?>" class="edit-btn"><i class="fas fa-trash"></i> </a>
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