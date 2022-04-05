$(document).ready(function(e){
  $('.dashboard').ready(function(e){
  
    // do autorefresh using ajax

  });
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
  });
  $(".select2").select2();
  $(".ajax").select2({
    ajax: {
        url: "https://api.github.com/search/repositories",
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                q: params.term, // search term
                page: params.page
            };
        },
        processResults: function(data, params) {
            // parse the results into the format expected by select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;
            return {
                results: data.items,
                pagination: {
                    more: (params.page * 30) < data.total_count
                }
            };
        },
        cache: true
    },
    escapeMarkup: function(markup) {
        return markup;
    }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: formatRepo, // omitted for brevity, see the source of this page
    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
});
});
$('#user-login').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  ajaxcall(data,'user_login',function(data)
  {
    console.log(data);
    var data=JSON.parse(data)
      if(data.success==1)
      {
          swal("Welcome!", "Logged In Successfully!", "success");
          window.location.href = data.redirect_url;
      }
      else
      {
          swal("Login Failed!", "Invalid Username Or Password!", "error");
      }
    
  });
  
  
  });
  $('.search_result').on('click','.prod_visibility',function(e){  
    var visibility,vistext="";
      if(this.checked)
    {
      visibility=1;
      vistext='Added to Home Page';
    }
    else
    {
      visibility=0;
      vistext="Removed From Home Page"
    }
    var data={p_display:visibility,product_id:$(this).siblings('.prod_id').val()};
    ajaxcall1(data,'update_product_visibility',function(data){
      if(data==1)
      {
        swal('',vistext,'info');
      }
      else
      {
        swal('Error','Something went wrong try again','error');
      }
      });
    });

    $('.product_search').on('keyup keypress blur change', function(e) {
      var name=$(this).val();
      if($('.submit-btn').val()=='Update')
      {
        if($('.p_name').val() != name)
        {
          search_name(name);
        }
      }
      else
      {
        search_name(name);
      }
    });

    function search_name(name)
    {
      if(name != "")
      {
        var data={product_name:name};
        ajaxcall1(data,'search_product_name',function(data){
            if(data==1)
            {
              $('.prod_error').html(`<h6 class="text-danger">This Name is Already Taken</h6>`);
              $('.submit_stat').val(0);
            }
            else
            {
              $('.prod_error').html("");
              $('.submit_stat').val(1);
            }
        });
      }
  }

    
$('#add_slider').submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    var action=$(this).attr('action');
    ajaxcall(data,action,function(data)
  {
   swaltext(data);
  });
  
});

$('#add_offers').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
   swaltext(data);
  });

});

$('#view_report').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  ajaxcall(data,'get_report_result',function(data)
    {
      console.log(data);
      var data=JSON.parse(data);
      console.log(data.result.orderlists);
      var html="";
      var i=1;
      if(data.result.orderlists==="" || data.result.orderlists.length==0)
      {
        $('.exportoexcel').hide();
        html +=`<span>
        No Orders
        </span>`;
      }
      else
      {
        $('.exportoexcel').show();
          html +=`<div class="iq-card-body">
          <div class="table-responsive">
          <table class="table mb-0 table-borderless tbltoexcel">
                  <thead>
                    <tr>
                      <th scope="col">SL No.</th>
                      <th scope="col">customer</th>
      <th scope="col">items</th>
              <th scope="col">date</th>
              <th scope="col">subtotal</th>
              <th scope="col">Delivery charge</th>
              <th scope="col">discount</th>
              <th scope="col">Order Total</th>
                      
                    </tr>
                  </thead>
                  <tbody>`;
                  $.each(data.result.orderlists,function(index,value){
                  html+=`
                    <tr>
                      <td>`+i+`</td>
                      <td>`+value.customer_name.name+`</td>
                      <td><span class="badge badge-danger text-wrap">
                         `;
                         $.each(value.items,function(index,value){
                           html+=value+`,`;
                         });
                       html +=`</span></td>
                      <td>`+value.order_time+`</td>
                      <td>`+value.cart_total+`</td>
                      <td>`+value.delivery_charge+`</td>
                      <td>`+value.discount+`</td>
                      <td>`+value.order_total+`</td>
                  
      <td>
              <span class="table-remove"><button type="button"
                            class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="`+base_url+`AdminController/order_details/`+value.id+`">View</a></button></span>
                      </td> 
                    </tr>`;
                    i++;
        });
        $.each(data.result.ordertotals,function(index,value){                             
                  html+=`
                  <tr class="pt-2">
                  <td colspan="2"></td>
                  <td colspan="4"><b>Total Orders:</b></td>
                  <td colspan="2"><b>`+value.count+`</b></td>
               </tr>
               <tr class="pt-2">
               <td colspan="2"></td>
                  <td colspan=4><b>Subtotal:</b></td>
                  <td colspan="2"><b>`+value.subtotal+`</b></td>
               </tr>
               <tr>
               <td colspan="2"></td>
                  <td colspan=4><b>Total Delivery Charge:</b></td>
                  <td colspan=2><b>`+value.delivery_charge+`</b></td>
                </tr>
              
                <tr>
                <td colspan="2"></td>
                  <td colspan=4><b>Total Discount:</b></td>
                  <td colspan=2><b>`+value.discount+`</b></td>
                </tr>
                <tr>
                <td colspan="2"></td>
                  <td colspan=4><b>Total:</b></td>
                  <td colspan=2><b>`+value.total+`</b></td>
                </tr>`;
        });
                  html+=`</tbody>
                </table>
              </div>
          </div>`;
      }
   $('.reporttable').html(html);
     /*  location.reload(true); */
     /*  alert(data); */
    });
});

$('.search_result').on('click','.new_stock',function(e){
  var html="";
  var prod_id=$(this).siblings('.up_prodid').val();
    if(this.checked)
    {
      var data={prod_id:prod_id};
      ajaxcall1(data,'get_product_variants',function(data){
        var data=JSON.parse(data);
     
       html+=`<div class="form-row">`;
       if(data.variantslist.length != 0 || data.variantslist !="")
       {
       $.each(data.variantslist,function(index,value){
        html+=`<div class="form-row"><div class="col"><label>`+value.name+`</label>
        <input type="hidden" name="variants[]" value="`+value.variants+`">
        <input type="text" class="form-control" name="newstock[]" required></div></div>`
       });
      }
      else
      {
        html+=`<div class="col">No Data Found</div>`;
      }
       html+=`</div>`;
       $('.modal_container').html(html);
       $('#new_prod_id').val(prod_id);
       $('#newstock_modal').modal('show');
      });
    }
  });
  
  
  
  $('#update_newstock').submit(function(e){
    e.preventDefault();
   
    var data=new FormData(this);
    var prodid=$('#new_prod_id').val();
    ajaxcall(data,'update_product_newstock',function(data)
    {
     if(data==1)
     {
       $('#newstock_modal').modal('hide');
       swal('','Product MArked as In Stock','info');
       $('#stockstatus'+prodid).removeClass('new_stock');
       $('#stockstatus'+prodid).addClass('prod_status_update');
       $('#stockstatus'+prodid).val('Out Of Stock');
       $('#stockstatus'+prodid).prop('checked', false);
       $('#stattxt'+prodid).text('Mark As Out Of Stock');
     }
     else
     {
      swal('Error','Something went wrong..try again','error');
     }
    });
  
  });
  
  
  $('.search_result').on('click','.prod_status_update',function(e){
    if(this.checked)
    {
      var status=$(this).val();
      var prodid=$(this).siblings('.up_prodid').val();
      var data={prod_id:$(this).siblings('.up_prodid').val(),status:status};
      ajaxcall1(data,'update_product_status',function(data){
       if(data==1)
       {
         swal('','Product Marked as '+status,'info');
         $('#stockstatus'+prodid).removeClass('prod_status_update');
         $('#stockstatus'+prodid).addClass('new_stock');
         $('#stockstatus'+prodid).val('In Stock');
         $('#stockstatus'+prodid).prop('checked', false);
         $('#stattxt'+prodid).text('Mark As In Stock');
       }
       else
       {
         swal('Error','Something went wrong..try again','error')
       }
      });
    }
  });
  

/**test**/




$('.search_result').on('click','.product_display_update',function(e){
  if(this.checked)
  {
    var visibstat='Hidden';
    var visibtxt='show';
    var prod_id=$(this).siblings('.displayprod_id').val();
    if($(this).val()=='show')
    {
      visibtxt='hide';
      visibstat='Shown';
    }

    var data={prod_id:$(this).siblings('.displayprod_id').val(),product_display:$(this).val()};
    ajaxcall1(data,'update_product_show_hide',function(data){
    if(data==1)
    {
      swal('','Product '+visibstat,'info');
      $('#prodvisible'+prod_id).val(visibtxt);
      $('#prodvisible'+prod_id).prop('checked', false);
      $('#visibstat'+prod_id).text(visibtxt);

    }
    });
  }
});

/**end**/

$('#add_products').submit(function(e){
  e.preventDefault();
  var variants_count=parseInt($('#variants_count').val());
  if($('.submit_stat').val()==1)
  {
  if(variants_count <= 0)
  {
    swal("Add Atleast One Variant");
    $('#add_more').click();
  }
  else
  {
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
   swaltext(data);
  });
}
  }
  else
  {
    $('#product_name').focus();
  }
  
});

$('#add_category').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
   swaltext(data);
  });
});
$('#add_variants').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
   swaltext(data);
  });
});
$('#add_addon').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
   swaltext(data);
  });
});

$('#add_promocode').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
   swaltext(data);
  });
});

$('.del_status').click(function(e){
  e.preventDefault();
  var data={'boy_id':$('.delivery_boy').val(),'status':$('.order_status').val(),'id':$('#order_id').val()}
  ajaxcall1(data,'update_order_details',function(data){
    location.reload(true);
  });
});


$('#add_area').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    swaltext(data);
  });
});

$('#add_delivery_charge').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    swaltext(data);
  });
});


$('.exportoexcel').click(function(e){
  e.preventDefault();
  var filename=$('#exlfilename').val();
  $('.tbltoexcel').table2excel({
    exclude: ".noExl",
    name: filename,
    filename:filename
});
})

$('.search_product').on('keyup',function(e){
  e.preventDefault();
  var html="";
  var i=1;
  if($(this).val() !="")
  {
    var data={'key':$(this).val()};
    ajaxcall1(data,'search_product',function(data)
    {
      var data=JSON.parse(data);
      console.log(data);
      $.each(data,function(index,value){


      html+=`
        <tr>

          <td>`+i+`<input type="hidden" id="id" name="id" value="`+value.id+`"></td>

          <td>`+value.name+`</td>

          <td>`+value.category+`</td>

          <td><span>

                <input type="hidden" name="prod_id" class="prod_id" value="`+value.id+`">`;

              if(value.p_display==1)

                {
                html+=`<input class="prod_visibility" type="checkbox" value="`+value.p_display+`" id="flexCheckDefault" checked>`;
                }

                else

                {
                  
                   html+=`<input class="prod_visibility" type="checkbox" value="`+value.p_display+`" id="flexCheckDefault">`;

                 
                }

              

              html+=`</span></td>



  <td>

  <span class="table-remove"><button type="button"

                class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="`+base_url+'AdminController/single_view/products/'+value.id+`">View</a></button></span>

                <span class="table-remove"><button type="button"

                class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="`+base_url+'AdminController/view_pages/add-product/'+value.id+`">Update</a></button></span>

                <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="products">

                <input type="hidden" name="delid" class="delid" value="`+value.id+`"><button type="button"

                class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>

                
<br/>
                <span class="table-remove">
  <input type="hidden" name="prodid" class="up_prodid" value="`+value.id+`">`; 
  
  if(value.status=="Out Of Stock")

                
                {

         html+=`<input class="new_stock" type="checkbox" value="In Stock" id="stockstatus`+value.id+`" data-toggle="modal">
         <span id="stattxt`+value.id+`">Mark As In Stock</span>`;
                       

                 } else

                {

                   html+=`<input class="prod_status_update" type="checkbox" value="Out Of Stock" id="stockstatus`+value.id+`">
                   <span id="stattxt`+value.id+`">Mark As Out Of Stock</span>`;

                 }html+=`</span>
  
  
  
  <!--test-->
   <span class="table-remove">
  <input type="hidden" name="prod_id" class="displayprod_id" value="`+value.id+`">`;	 
  if(value.product_display=="hide")
                        
                        {
                        html+=`<input class="product_display_update" type="checkbox" value="show" id="prodvisible`+value.id+`">
                        <span id="visibstat`+value.id+`">
                          Show
                          </span>`;
                        } else
                        {
                           html+=`<input class="product_display_update" type="checkbox" value="hide" id="prodvisible`+value.id+`">
                           <span id="visibstat`+value.id+`">
                           Hide
                           </span>`;
                         }
     
 html+=`</span>
<!--end test-->
      

          </td> 

        </tr> 
`;

        i++;       });
        $(".search_result").html(html);  
    })
  }
  else
  {
  /*   $(".search_result").empty(); */
  }
})

/* function setText(elem)
{
  var value = $(elem).text();
  var prod_id = $(elem).val();

  $("#search_productt").val(value);
  $("#searchResultt").empty();

} */


function swaltext(data)
  {
    console.log(data);
    var data=JSON.parse(data);
    swal(data.type,data.msg,data.type);
    if(data.redirect){window.location.href=base_url+'AdminController/view_pages/'+data.redirect}
  }


$('#add_delivery_boy').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    swaltext(data);
  });
});

$('#update_credentials').submit(function(e){
e.preventDefault();
var data=new FormData(this);
var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data==1)
    {
      swal('Updation Successfull');
      window.location.href=base_url+"AdminController/user_logout";
    }
    else
    {
      swal('Updation Failed');
    }
  });
});

$('#old_username').blur(function(e){
var data={oldvalue:$(this).val(),type:'username'};
ajaxcall1(data,'is_username_password_exist',function(data){
if(data==0)
{
  $('.errorsp').html(`<p class="text-danger">Incorrect Username</p>`)
  $('.changesbt').prop('disabled', true);
    }
    else
    {
      $('.errorsp').html("");
      $('.changesbt').prop('disabled', false);
    }
});

});
$('#old_password').blur(function(e){
  var data={oldvalue:$(this).val(),type:'password'};
  ajaxcall1(data,'is_username_password_exist',function(data){
    if(data==0)
    {
      $('.errorsp').html(`<p class="text-danger">Incorrect Password</p>`)
      $('.changesbt').prop('disabled', true);
    }
    else
    {
      $('.errorsp').html("");
      $('.changesbt').prop('disabled', false);
    }
  })
  
});

$("#add_more").click(function (e) {

  e.preventDefault;
  var html="";
  var variants=$('.select_variant').html();
  html += `<div class="form-row" style="padding-top:50px;">
                                 
  <div class="col">
    
  <select class="form-control" id="exampleFormControlSelect1" name="prod_det[variants][]">
     `+variants+`
  </select>
  </div>

<div class="col">
     <input type="text" class="form-control" placeholder="MRP" name="prod_det[mrp][]">
  </div>
<div class="col">
     <input type="text" class="form-control" placeholder="Price" name="prod_det[price][]">
  </div>
<div class="col">
     <input type="text" class="form-control" placeholder="Maximum Sale" name="prod_det[max_sale][]">
  </div>

<div class="col">
<input
type="button"
id="remove"
name="add"
value="-"
class="btn btn-danger"
/>

  </div>


</div>`;
$('#variants_count').val(parseInt($('#variants_count').val())+1);
$(".repeat_field").append(html);

});

$(".repeat_field").on('click', '#remove', function (e) {
  e.preventDefault;
  $('#variants_count').val(parseInt($('#variants_count').val())-1);
    $(this).closest('.form-row').remove();
  }); 


$('#download_recipt').submit(function(e){
e.preventDefault();
var data=new FormData(this);
  ajaxcall(data,'download_receipt',function(data)
  {
    /* console.log(data); */
    var data=JSON.parse(data);
    if( data.url ){
      window.location = data.url;
  }
  });

});
$('#order_minimum').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
    ajaxcall(data,'set_minimum_order',function(data)
    {
      console.log(data);
      if(data==1)
      {
        swal('Success','Minimum order value and extra delivery charge updated successfully!!','success');
        location.reload(true);
      }
      else
      {
        swal('Failed','Minimum order value and extra delivery charge updation failed!!','error');
      }
    /*   var data=JSON.parse(data);
      if( data.url ){
        window.location = data.url; 
    }*/
  });
});

/* $(".down_receipt").click(function(e){
  alert("fdgfdg");

  var data={test:'test'};
  ajaxcall1(data,'download_receipt',function(data){
    console.log(data);
    var data=JSON.parse(data);
    if( data.url ){
      window.location = data.url;
  }

  });
}); */
/////////////////////////
$('.delete_item').click(function(e){
  e.preventDefault();
  var id=$(this).siblings('.delid').val();
  var type=$(this).siblings('.delitem').val();
  var deltype=$(this).siblings('.deltype').val();
 
  var sweet_data = {
      title : "Delete "+type,
      text :"Are you sure want to delete?",
      icon :"warning",
  };
  sweetalertConfirm(sweet_data,function(data){
      if(data==true)
      {
        $.ajax({
          url: base_url+"AdminController/delete_item",
          type: 'POST',
          data: {
              id:id,
              type:deltype
          },
          dataType: 'json',
          beforeSend: function() {
         
            // setting a timeout
            $('.loadingbar').css("display", "block");
        },
          success: function(data) {
            
           /*  var data=JSON.parse(data); */
            if(data.success==1)
            {
              swal("Deletion Successfull");
              window.location.href = data.redirect_url;
            }
            else
            {
              swal("Deletion Failed");
            }
          },
          complete: function() {
            $('.loadingbar').css("display", "none");
          }
      });
      }
   
  });  
});
function sweetalertConfirm(sweet_data,handle)
{
  swal({
      title: sweet_data.title,
      text: sweet_data.text,
      icon: sweet_data.icon,
      buttons:true,
      dangerMode:true,
    
    }).then((willDelete)=>{
        if(willDelete)
        {
          handle(true);
        }
        else
        {
          handle(false)
        }
      });
  

}
////////////////////////



function ajaxcall(formElem,ajaxurl,handle)
{
  $.ajax({
    url: base_url+"AdminController/"+ajaxurl,
    type: 'POST',
    data:formElem,
    processData:false,
    contentType:false,
    cache:false,
    async:false,
    success: function(data) {
      handle(data);
    }
});
}
function ajaxcall1(data,ajaxurl,handle)
{
  $.ajax({
    url: base_url+"AdminController/"+ajaxurl,
    type: 'POST',
    data:data,
    datatype:'json',
    success: function(data) {
      handle(data);
    }
});
}

$('.promo_category').change(function(e){

  if ($(this).val()=='items')
  {
    $('#products').prop('disabled', false);
  }
  else
  {
    $('#products').prop('disabled', true);
  }
});

