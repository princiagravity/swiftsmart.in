<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description-swanthanam" content="">
    <meta name="author-swanthanam" content="">
    <title>Swanthanam Admin</title>
<link href="<?php echo base_url();?>admin_html/css/styles.css" rel="stylesheet">
<link href="<?php echo base_url();?>admin_html/css/admin-style.css" rel="stylesheet">

<link href="<?php echo base_url();?>admin_html/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>admin_html/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">



<script src="<?php echo base_url();?>public_html/plugins/jquery-1.11.1.min.js"></script>


<script src="<?php echo base_url();?>public_html/js/jquery.bootstrap.min.js"></script>


    <script src="<?php echo base_url();?>public_html/plugins/vendor/jquery.ui.widget.js"></script>
    <script src="<?php echo base_url();?>public_html/plugins/jquery.fileupload.js"></script>
    <script src="<?php echo base_url();?>public_html/plugins/jquery.iframe-transport.js"></script>
    <link rel="stylesheet" href="<?php echo  base_url();?>public_html/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo  base_url();?>public_html/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  <style>
  
  .select2-container--default.select2-container--focus .select2-selection--multiple {
    border:1px solid #efefef!important !important;
    outline: 0;
}
  
  </style>
</head>
<body class="bg-sign">
<div id="layoutAuthentication" >
<div id="layoutAuthentication_content" style="background:url('<?php echo base_url();?>public_html/farmer2.jpg'); background-size:contain">
<main>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card shadow-lg border-0 rounded-lg mt-5" style="margin-top:2% !important; background:#ffffffb0 !important">
<div class="card-header card-sign-header">
<h3 class="text-center font-weight-light my-2">Register</h3>
</div>
<div class="card-body">
<form method="post" action="<?php echo base_url();?>admin/Admin_ctlr/farmer_insert">
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label class="form-label" for="inputEmailAddress">Name*</label>
<input class="form-control py-3" id="inputEmailAddress" type="text" name="name" placeholder="Enter your name">
</div>
<div class="form-group">
<label class="form-label" for="inputEmailAddress">Phone No*</label>
<input class="form-control py-3" id="inputEmailAddress" type="text" name="phone" placeholder="Enter phone number">
</div>

<div class="form-group">
<label class="form-label" for="inputPassword">Id Proof Type*</label>
<select id="status" name="id_type" class="form-control">
<option selected>Select</option>
<?php foreach($id_proofs as $id)
{?>
    <option value="<?php echo $id['id_proof_id'];?>"><?php echo $id['id_proof_name'];?></option>
<?php
}
?>
</select>
</div>


</div>

<div class="col-md-4">
<div class="form-group">
<label class="form-label" for="inputEmailAddress">Address*</label>
<input class="form-control py-3" id="inputEmailAddress" type="text" name="address" placeholder="Enter your address">
</div>
<div class="form-group">
<label class="form-label" for="inputEmailAddress">Area*</label>
<select id="status" name="area" class="form-control">
<option selected>Select</option>
<?php foreach($area as $id)
{?>
    <option value="<?php echo $id['area_id'];?>"><?php echo $id['area_name'];?></option>
<?php
}
?>
</select>
</div>
<div class="form-group">
<label class="form-label" for="inputPassword">Id Proof Number*</label>
<input class="form-control py-3" id="inputPassword" type="text" name="id_details" placeholder="Id Proof Details">
</div>



</div>


<div class="col-md-4">
<div class="form-group">
<label class="form-label" for="inputEmailAddress">Email*</label>
<input class="form-control py-3" id="inputEmailAddress" type="email" name="email" placeholder="Enter email address">
</div>
<div class="form-group">
                  <label class="form-label">Product*</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" name="product[]" data-placeholder="Select product" data-dropdown-css-class="select2-purple" style="width: 100%;">
                     <?php 
                     foreach($product as $id){
                         ?>
                      <option value="<?php echo $id['product_id'];?>"><?php echo $id['product_name'];?></option>
                      
                      <?php
                     }?>
                    </select>
                  </div>
                  
                </div>


<div class="form-group">
<label class="form-label" for="inputPassword">Nearest Store*</label>
<select id="status" name="store" class="form-control">
<option selected>Select</option>
<?php foreach($store as $id)
{?>
    <option value="<?php echo $id['store_id'];?>"><?php echo $id['store_name'];?></option>
<?php
}
?>
</select>
</div>

</div>
<div class="col-md-12">

<br>
<div class="form-group">
<label class="form-label" for="inputPassword">ID Proof Upload</label>
<div class="file">
										<div class="option-group">
											<!--<span class="file-button btn-primary">Choose File</span>-->
											<input type="file" class="custom-file fileupload" name="filename">
											<input type="text" class="form-control filename1" id="uploader" placeholder="no file selected" readonly="" name="id_proof_img">

											<div class="myProgress" style="width: 94%;">
												<div class="myBar" id="prog_bar_div_id"  style="display:none;" >
													<p id="progress_bar_p_id" style=" margin-top: -11px; position: absolute; color: #fff; font-size: 12px;  margin-left: 20%; "></p>
												</div>
											</div>
											<div class="img_name" style="width:100%; "></div>
											<div class="col s12 load_upload_cls"> </div>

											
										</div>
									</div>
</div>
</div>
<br>
<div class="col-md-12">

<br>
<div class="form-group">
<label class="form-label" for="inputPassword">Achievements</label>
<input class="form-control py-3" id="inputPassword" type="text" name="achievements" placeholder="Achievements">

</div>
</div>
</div>


<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
<input type="submit" name="register" value="Register" class="btn btn-sign hover-btn" style="background-color:#058603 !important"/>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</main>
</div>
</div>

<!--<script src="<?php echo base_url();?>public_html/assets/js/jquery-3.4.1.min.js"></script>-->


<!-- <script src="<?php echo base_url();?>admin_html/js/jquery-3.4.1.min.js"></script> -->
<script src="<?php echo base_url();?>admin_html/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>admin_html/js/scripts.js"></script>


<script type="text/javascript">
	tos_success 	= '<?php echo $this->session->flashdata('tos_success');?>';
	tos_error 		= '<?php echo $this->session->flashdata('tos_error');?>';
	tos_warning 	= '<?php echo $this->session->flashdata('tos_warning');?>';
	if(tos_success!=''){
		toastr.success(''+tos_success+'', '')
	}
	
	if(tos_error!=''){
		toastr.error(''+tos_error+'', '')
	}
	
	if(tos_warning!=''){
		toastr.warning(''+tos_warning+'', '')
	}
</script>

<script type="text/javascript">
	toastr_msg = '<?php echo $this->session->flashdata('tostaer_msg');?>';
	if(toastr_msg!=''){
		toastr.success(''+toastr_msg+'', '')
	}
   $(document).ready(function(){
		$('.fileupload').fileupload({
			url: "<?php echo base_url();?>admin/img_upload_ctrl/upload_id_proof_img",
			dataType: 'json', 
			send: function(e, data) {
				$('.load_upload_cls').html('<img src="<?php echo base_url();?>public_html/loading_bar.gif">');
				$('.load_upload_cls').css('display','none');
			},
			done: function (e, data) {
				up_status = '';	
				$('.load_upload_cls').html('');	
				if(data.result.status==true){
					up_status='true';
					$('.filename1').html('');
					$('.filename1').val(data.result.file);
					$('.img_name').html('');
					$('.img_name').append(data.result.file+' UploadingCompleted...');
					move('prog_bar_div_id','load_upload_cls');
				}else if(data.result.status==false){
					if(data.result.e_type=='0'){
						$('.img_name').html('');
						$('.img_name').append('Try again!..'); 
					}
					if(data.result.e_type=='1'){
						$('.img_name').html('');
						$('.img_name').append(data.result.error); 
					}
				}else{
					$('.img_name').html('');
					$('.img_name').append('Try again!..');   
				}
			}
		});
	});

 

	function move(id,p_id) {
		//if(up_status=='true'){
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
		//}		
	}


          
</script>
<script src="<?php echo  base_url();?>public_html/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>

</body>
</html>
