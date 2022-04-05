<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Unit</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active">Unit</li>
</ol>
<div class="row justify-content-between">
<div class="col-lg-12">
<a href="<?php echo base_url();?>admin/Admin_ctlr/unit_add" class="add-btn hover-btn">Add New</a>
</div>
<div class="col-lg-12 col-md-12">
<div class="card card-static-2 mt-30 mb-30">
<div class="card-title-2">
<h4>All Unit</h4>
</div>
<div class="card-body-table">
<div class="table-responsive">
<table class="table ucp-table table-hover">
<thead>
<tr>
<!--<th style="width:60px"><input type="checkbox" class="check-all"></th> -->
<th style="width:60px">ID</th>
<th>Unit</th>
<!-- <th>Status</th> -->
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
 $i=1;
foreach($unit as $item)
{
   
    ?>
<tr>
<!-- <td><input type="checkbox" class="check-item" name="ids[]" value="11"></td> -->
<td><?php echo $i;?></td>
<td><?php echo $item['unit_name'];?></td>

<!-- <td><span class="badge-item badge-status">Active</span></td> -->
<td class="action-btns">
<a href="<?php echo base_url();?>admin/Admin_ctlr/unit_edit/<?php echo $item['unit_id']; ?>" class="edit-btn"><i class="fas fa-edit"></i></a>
<a href="<?php echo base_url();?>admin/Admin_ctlr/unit_delete/<?php echo $item['unit_id']; ?>" class="edit-btn"><i class="fas fa-trash"></i> </a>

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