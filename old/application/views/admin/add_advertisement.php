<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h2 class="mt-30 page-title">Avertisement</h2>
<ol class="breadcrumb mb-30">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/Admin_ctlr/slider_list">Avertisement</a></li>
<li class="breadcrumb-item active">Add Avertisement</li>
</ol>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card card-static-2 mb-30">
<div class="card-title-2">
<h4>Add New Avertisement</h4>
</div>
<form method="post" action="<?php echo base_url();?>admin/Admin_ctlr/advertisement_insert">
<div class="card-body-table">
<div class="news-content-right pd-20">
<div class="form-group">
<label class="form-label">Title*</label>
<input type="text" name="adv_title" class="form-control" placeholder="Avertisement Title">
</div>
<div class="form-group">
<label class="form-label">Avertisement Image*(Size Width 1200 , Height 550)</label>
<div class="file">
										<div class="option-group">
											
											<input type="file" class="custom-file fileupload1" name="filename">
											<input type="text" class="form-control filename2" id="uploader" placeholder="no file selected" readonly="" name="adv_photo" >

											<div class="myProgress" style="width: 94%;">
												<div class="myBar" id="prog_bar_div_id1"  style="display:none;" >
													<p id="progress_bar_p_id1" style=" margin-top: -11px; position: absolute; color: #fff; font-size: 12px;  margin-left: 20%; "></p>
												</div>
											</div>
											<div class="img_name1" style="width:100%; "></div>
											<div class="col s12 load_upload_cls1"> </div>

											
										</div>
									</div>
</div>



<input class="save-btn hover-btn" type="submit" value="Add New Avertisement"/>
</div>
</div>
</form>
</div>
</div>
</div>
</div>


</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

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
          url: "<?php echo base_url();?>admin/img_upload_ctrl/upload_adv_img",
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