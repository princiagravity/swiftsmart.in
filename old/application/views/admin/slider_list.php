<div id="layoutSidenav_content">
<main>






<div class="container-fluid">
<h2 class="mt-30 page-title">Slider</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active">Slider</li>
</ol>
<div class="row justify-content-between">
<div class="col-lg-12">
<a href="<?php echo base_url();?>admin/Admin_ctlr/slider_add" class="add-btn hover-btn">Add New</a>
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
<h4>All Sliders</h4>
</div>
<div class="card-body-table">
<div class="table-responsive">
<table class="table ucp-table table-hover">
<thead>
<tr>
<!-- <th style="width:60px"><input type="checkbox" class="check-all"></th> -->
<th style="width:60px">ID</th>

<th>Slider Image</th>
<th>Slider Title</th>
<th>Slider Subtitle</th>
<!-- <th>Status</th> -->
<!-- <th>Status</th> -->
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
 $i=1;
foreach($slider as $item)
{
   
    ?>
<tr>
<!-- <td><input type="checkbox" class="check-item" name="ids[]" value="11"></td> -->
<td><?php echo $i;?></td>
<td>  <div class="offer-img">             
            <img src="<?php echo base_url();?>public_html/upload/slider/thumb/<?php echo $item['slider_image']; ?>" alt="">
                                     </div>                 </td>
<td><?php echo $item['slider_title'];?></td>
<td><?php echo $item['slider_subtitle'];?></td>
<!-- <td><?php echo $item['slider_status'];?></td> -->



<!-- <td><span class="badge-item badge-status">Active</span></td> -->
<td class="action-btns">
<a href="<?php echo base_url();?>admin/Admin_ctlr/slider_edit/<?php echo $item['slider_id']; ?>" class="edit-btn"><i class="fas fa-edit"></i> </a>
<a href="<?php echo base_url();?>admin/Admin_ctlr/slider_delete/<?php echo $item['slider_id']; ?>" class="edit-btn"><i class="fas fa-trash"></i> </a>
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
<script type="text/javascript">
$(".chosen").chosen();
</script>
  <script>
$(function() {
    $("#skill_input").autocomplete({
        source: "<?php echo base_url('admin_ctlr/autocompleteData'); ?>",
    });
});
</script>
 
    <script src="<?php echo base_url();?>public_html/plugins/jquery.fileupload.js"></script>    
  <script type="text/javascript">
			
      toastr_msg = '<?php echo $this->session->flashdata('tostaer_msg');?>';
      if(toastr_msg!=''){
        toastr.success(''+toastr_msg+'', '')
      }
       $(document).ready(function(){
      
      
    
    $('.fileupload1').fileupload({
          url: "<?php echo base_url();?>admin/img_upload_ctrl/upload_slider_img",
          dataType: 'json', 
          send: function(e, data) {
            $('.load_upload_cls1').html('<img src="<?php echo base_url();?>public_html/loading_bar.gif">');
            $('.load_upload_cls1').css('display','none');
          },
          done: function (e, data) {
            up_status = '';	
            $('.load_upload_cls1').html('');	
            if(data.result.status==true){
              up_status='true';
              $('.filename2').html('');
              $('.filename2').val(data.result.file);
              $('.img_name1').html('');
              $('.img_name1').append(data.result.file+' UploadingCompleted...');
              move('prog_bar_div_id1','load_upload_cls1');
            }else if(data.result.status==false){
              if(data.result.e_type=='0'){
                $('.img_name1').html('');
                $('.img_name1').append('Try again!..'); 
              }
              if(data.result.e_type=='1'){
                $('.img_name1').html('');
                $('.img_name1').append(data.result.error); 
              }
            }else{
              $('.img_name1').html('');
              $('.img_name1').append('Try again!..');   
            }
          }
        });
    
    
      });
    
    
      function move(id,p_id) {
       
        $('#'+id+'').css('display','block');
        var elem = document.getElementById(''+id+''); 
        var width = 1;
        var id = setInterval(frame, 10);
        function frame() {
          if (width >= 100) {
            clearInterval(id);
          } else {
            width++; 
            elem.style.width = width + '%'; 
            $('#'+p_id+'').text('');
            $('#'+p_id+'').text(width+'%');
          }
        }
        
      }
    
    
              
    </script>