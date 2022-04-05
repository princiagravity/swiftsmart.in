
// $(document).ready(function(e){
  
//   $('#dropdownMenuButton').click(function(e){
//     dropmenuWidgetPosition();
//   })
//   function dropmenuWidgetPosition() {
    // $('#dropdownMenuButton').dropdown('toggle');
    // $(window).on('show.', function(e) {
    //   var dropdownMenu = $(e.target).find('.dropdown-menu');
    //   var dropMenuDetach = dropdownMenu.detach();
    //   // detach it and append it to the target
    //   $(e.target).parents('.input-group').eq(0).find('.testing').append(dropMenuDetach);
    //   // grab the new offset position
    //   var eOffset = $(e.target).offset();
    //   // make sure to place it where it would normally go (this
    //   // could be
    //   // improved)
    //   dropdownMenu.css({
    //     'display': 'block',
    //     'top': eOffset.top + $(e.target).outerHeight(),
    //     'left': 0

    //   });
    // });

    // // and when you hide it, reattach the drop down, and hide it
    // // normally
    // $(window).on('hide.bs', function(e) {
    //   var dropdownMenu = $(e.target).parents().find('.dropdown-menu');
    //   var dropMenuDetach = dropdownMenu.detach();
    //   $(e.target).append(dropMenuDetach);
    //   dropdownMenu.hide();
    // });
//   }

// });

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
      /* location.reload(true); */
      /*  alert(data); */
  });
  
  
  });
  
  $('#search_product').on('keyup',function(e){
    e.preventDefault();
    
    if($(this).val() !="")
    {
      var data={'key':$(this).val()};
      ajaxcall1(data,'search_product',function(data)
      {
        var data=JSON.parse(data);
        $("#searchResult").empty();
        $("#searchResult").show();
        if(data.length > 0)
        {
        $.each(data,function(index,value){
        
        $("#searchResult").append("<li value='"+value.id+"'  class='list-group-item'>"+value.name+"</li>");
        });
    
        $("#searchResult li").bind("click",function(){
          setText(this);
          window.location.href= base_url+"single-product/"+$(this).val();
      
      });
    }
    else
    {
      $("#searchResult").append("<li value=''  class='list-group-item' disabled>This product not found</li>");
    }
    
      })
    }
    else
    {
      $("#searchResult").empty();
    }
  })
  
  function setText(elem)
  {
    var value = $(elem).text();
    var prod_id = $(elem).val();
  
    $("#search_product").val(value);
    $("#searchResult").empty();
  
  }
  
  
   /***mobile search***/
  
  
  $('#search_productt').on('keyup',function(e){
    e.preventDefault();
    if($(this).val() !="")
    {
      var data={'key':$(this).val()};
      ajaxcall1(data,'search_product',function(data)
      {
        var data=JSON.parse(data);
        $("#searchResultt").empty();
        if(data.length > 0)
        {
        $.each(data,function(index,value){
        
        $("#searchResultt").append("<li value='"+value.id+"'  class='list-group-item'>"+value.name+"</li>");
        });
    
        $("#searchResultt li").bind("click",function(){
          setText(this);
          window.location.href= base_url+"single-product/"+$(this).val();
      
      });
    }
    else
    {
      $('#searchResultt').css('margin-top',"22%");
      $('#searchResultt').css('width',"70%");
      $("#searchResultt").append("<li value=''  class='list-group-item' disabled>This product not found</li>");
    }
    
      })
    }
    else
    {
      $("#searchResult").empty();
    }
  })
  
  function setText(elem)
  {
    var value = $(elem).text();
    var prod_id = $(elem).val();
  
    $("#search_productt").val(value);
    $("#searchResultt").empty();
  
  }
  
  /**end mobile search**/
  
  
  

  $('#forgot-password').submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    ajaxcall(data,'forgot_password',function(data)
    {
      console.log(data);
      var data=JSON.parse(data);
      //alert(data.otp);
      if(data.message=="")
      {
        window.location.href=base_url+'otp';
      /*   $('.otp-cont').html(`<p>OTP has been sent to your Email Id </p> <form id="otp-check"  method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
        <label for="otp">Enter OTP</label>
                    <input  id="otp" name="otp" type="text" required>
                    <button class="btn btn-warning btn-lg btn_otp_check" type="button">Submit</button>
                    </form>`) */
      }
      else
      {
          
        swal('Message',data.message,'info');
      }
     
    });
    
    
    });

    $('#otp-check').submit(function(e){
      e.preventDefault();
      var data=new FormData(this);
      ajaxcall(data,'otp_check',function(data)
      {
        var data=JSON.parse(data);
        console.log(data);
        if(data.redirect !="" && data.message=='success')
        {
          window.location.href=data.redirect;
        }
        else if(data.message !="")
        {
          swal('Message',data.message,'info');
        }
      });

    });

    $('#change-password').submit(function(e){
      e.preventDefault();
      var data=new FormData(this);
      ajaxcall(data,'change_password',function(data)
      {
        
        console.log(data);
        if(data > 0)
        {
         swal('Success','Changing Password successfull','success');
         window.location.href=base_url+'login';
        }
        else
        {
          swal('Failed!','Changing Password Failed','error');
        }
       
      });

    });

  $("#user-signup").submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    ajaxcall(data,'user_signup',function(data)
    {
      console.log(data);
      var data=JSON.parse(data)
        if(data.success !=1)
        {
            swal("Welcome!", data.msg, "success");
           /*  window.location.href = data.redirect_url; */
           location.reload(true);
        }
        else
        {
            swal("Registration Failed!",data.msg, "error");
        }
        /* location.reload(true); */
        /*  alert(data); */
    });
  });
  $('.signup').click(function(e){
$('.login-cont').fadeOut(50);
$('.signup-cont').fadeIn(1000);
  });
  $('.login').click(function(e){
    $('.signup-cont').fadeOut(50);
    $('.login-cont').fadeIn(1000);
      });
$('.addonval').click(function(e){
  $('#addon').val($(this).val());
});

  $('.get_price').click(function(e){
    $('.chk_var').val(1);
    var data={variant_id:$(this).val(),prod_id:$('#prod_id').val()}
    $('#variants').val($(this).val());
    var target=$(this);
    var html="";
    ajaxcall1(data,'get_product_sec_details',function(data)
    {
        var data=JSON.parse(data);
        $.each(data,function(index,value){
          html+=`<p class="sale-price mb-0"> Product MRP : <b class="h6 text-dark m-0"> Rs `+value.price+`<span style="text-decoration:line-through"> Rs `+value.mrp+`</span></b></p>`;
          $('#price').val(value.price);
          $('#mrp').val(value.mrp);
          $('#max_sale').val(value.max_sale);
          $('.prod_qty').val(1);
          $('.btn-addtocart').prop('disabled',false)
          $('.addon_container').css("display", "block");
          if(value.max_sale <= 10 && value.max_sale > 0)
          {
            $('.prod_status').html(`Only `+value.max_sale+` Left!`);
          }
          else if(value.max_sale >10)
          {
            $('.prod_status').html(`In Stock`);
          }
        });
        $('.price_detail').html(html);
    }); 
    });

$('.qty_plus,.qty_minus').click(function(e){

  var max_sale=$('#max_sale').val();
  var txtval=$('.prod_qty').val();
  if(txtval == max_sale)
  {
    $(".qty_plus").css("pointer-events","none");
  }
  else
  {
    $(".qty_plus").css("pointer-events","auto");
  }

});

$('.prod_qty').blur(function(e){
  if($(this).val() > $('#max_sale').val())
  {
    $(this).val(1);
    $('.add-cart-sub').prop('disabled',true);
  }
  else if($(this).val() <= $('#max_sale').val())
  {
    $('.add-cart-sub').prop('disabled',false);
  }
});


$('.chk_addon').change(function(e){
if(this.checked)
{
  $('#'+$(this).val()).val(1);
  $('.addon_status_'+$(this).val()).show();
  var max_val=$('.addon_max_'+$(this).val()).val()
  if(max_val <= 10 && max_val > 0)
  {
  $('.addon_status_'+$(this).val()).html(`Only `+max_val+` Left!`);
  }
  else if(max_val > 10)
  {
  $('.addon_status_'+$(this).val()).html('In Stock')
  }
  
}
else
{
  $('.addon_status_'+$(this).val()).hide();
}

});

$('.qty_plus_addon,.qty_minus_addon').click(function(e){
 
   var txtval=$(this).siblings('.addon_qty').val();
   var max_val=$('.addon_max_'+$(this).siblings('.addon_qty').attr('id')).val();
   if(txtval == max_val)
   {
    $('#ad_plus'+$(this).siblings('.addon_qty').attr('id')).css("pointer-events","none");
  }
  else
  {
    $('#ad_plus'+$(this).siblings('.addon_qty').attr('id')).css("pointer-events","auto");
  }
});

/* $('.addon_qty').blur(function(e){
  
  var id=$(this).attr('id');
  alert(id);
  var max=$('.addon_max_'+id).val();
  var txt=$(this).val();
  alert(txt);
  alert(max);
  
  if(txt > max)
  {
    $('#'+id).val(1);
  }
});
 */
$('#phone_no').keypress(function(e){
  $('.phone').hide(500);
});

  $('.get_offers').click(function(e){
    $('#popupcontainer').show();
  });
  $('.use_code').click(function(e){
    var promo_id=$(this).attr('id');
    $(".promocode option[value='"+promo_id+"']").prop('selected', true);
    $('#popupcontainer').hide();
  });





  $('.cart-apply').click(function(e){
    e.preventDefault();
    var promocode=$('.promocode').val();
    var phone_no=$('#phone_no').val();
    var del_charge=$('#delivery_charge').val();
    var subtot=$('#items').val();
    
    //var del_tax=$('#delivery_tax').val();
    if(!promocode)
    {
    $('.cart-status').html(`<h6 class="text-danger">Please Choose Promocode First</h6>`);
    }
    else if(phone_no=="")
    {
     swal("Please Login First");
     window.location.href=base_url+"login";
    }
    else
    {
      var data={promocode:promocode,phone_no:phone_no,del_charge:del_charge,subtot:subtot};
      ajaxcall1(data,'apply_coupon',function(data){
       /*  console.log(data); */
        var data=JSON.parse(data);
        if(data.status=="null" || data.discount !=0)
        {
          $('#discount').val(data.discount);
          $('.discount').html(`Rs `+data.discount);
          var order_total=(parseFloat(subtot)+parseFloat(del_charge)-parseFloat(data.discount)).toFixed(2);
          var beforetax=((parseFloat(order_total))/1.05).toFixed(2);
          var tax_amount=(parseFloat(order_total)-parseFloat(beforetax)).toFixed(2);
          $('#beforetax_amount').val(beforetax);
          $('.beforetax').html(`Rs `+beforetax);
          $('#tax_amount').val(tax_amount);
          $('.tax').html(`Rs `+tax_amount);
         
    
          $('#order_total').val(order_total);
          $('.ot').html(`<b>Rs <span class="counter">`+ order_total+`</span></b>`);
         
          if(data.status == "null")
          {
          $('.cart-status').html(`<h6 class="text-success">Successfully Applied</h6>`);
        
          }
          else
          {
              $('.cart-status').html(`<h6 class="text-danger">`+data.status+`</h6>`);
        
          }
          swal("Coupon applied!","You get a discount of Rs. "+data.discount,"info")
        
        }
        else
        {
          $('.cart-status').html(`<h6 class="text-danger">`+data.status+`</h6>`);
        }
       
      });
     
    }
    });

$('.add_to_cart').submit(function(e){
  e.preventDefault();
  var i=0,ad_price=0,ad_count=0,tot_price=0,ad_name='';
  var var_count=$('#variants_count').val();
  var addon=new Array();

  if(var_count !=1)
  {
  $('input[name="addon"]:checked').each(function(e){
    ad_count=$('#'+$(this).val()).val();
    ad_price=$('.addon_price_'+$(this).val()).val();
    ad_name=$('.addon_name_'+$(this).val()).val();
    addon[i]={'addon_id':$(this).val(),'addon_count':ad_count,'addon_price':ad_price,'addon_name':ad_name};
   
    tot_price=tot_price+(parseInt(ad_count)*parseInt(ad_price));
    i++;
  });
  }
  var data=new FormData(this);
  data.append('addon_tot',tot_price);
  data.append('add_on',JSON.stringify(addon));
  /* console.log(data); */
 ajaxcall(data,'add_to_cart',function(data)
  {
     /*console.log(data) */
     if(data==1)
    {
        swal({
		icon: "success",
		title: "Added To Cart",
		html: true
	});
    //swal("Added To Cart");
    location.reload(true);
    }
   
  }); 
});

$('#confirm_payment').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
      localStorage.setItem('latitude',position.coords.latitude);
      localStorage.setItem('longitude',position.coords.longitude);
   /*  lat= position.coords.latitude,
    long=position.coords.longitude */
  }); 
}
  console.log(data);
  if(localStorage.getItem('latitude'))
  {
    data.append('latitude',localStorage.getItem('latitude'));
    data.append('longitude',localStorage.getItem('longitude'));
    ajaxcall(data,'confirm_payment',function(data)
  {
    var data=JSON.parse(data);
    console.log(data.status); 
    if(data.status=='success')
    {
      swal({
		icon: "success",
		title: "Your Order has been placed",
		html: true
	  });
      window.location.href = data.redirect_url;
    }
    else if(data.status=="failed")
    {
      swal({
		icon: "error",
		title:"Sorry...Order Not Placed",
		html: true
	  
	  });
    }
   
  }); 
}
else{
 swal({
	  icon: "warning",
		title: "Please turn on your device location",
		html: true
  });
}
});

$('.remove-product').click(function(e){
  var data={cart_id:$(this).siblings('.cart_id').val(),product_id:$(this).siblings('.prod_id').val(),type:$(this).siblings('.prod_type').val(),total:$(this).siblings('.prod_total').val(),product_count:$(this).siblings('.prod_count').val(),actual_tot:$('#actual_total').val()};
  console.log(data);
  ajaxcall1(data,'deleteproduct_from_cart',function(data)
  {
    /* console.log(data); */
    location.reload(true);
  }); 


});

$('.qty_update').click(function(e){
 
var data={quantity:$(this).siblings('.prod_count').val(),cart_id:$(this).siblings('.prod_count').attr('id')};
ajaxcall1(data,'update_carted_product_count',function(data){
/* console.log(data); */
location.reload(true);
});

});

$('.prod_count').blur(function(e){

  var data={quantity:$(this).val(),cart_id:$(this).attr('id')};
  ajaxcall1(data,'update_carted_product_count',function(data){
    /* console.log(data); */
    location.reload(true);
    });

});


function ajaxcall(formElem,ajaxurl,handle)
{
  $.ajax({
    url: base_url+"FrontController/"+ajaxurl,
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
    url: base_url+"FrontController/"+ajaxurl,
    type: 'POST',
    data:data,
    datatype:'json',
    success: function(data) {
      handle(data);
    }
});
}
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

  $('.checkout_btn').click(function(e){
  
    e.preventDefault();
  var cart_tot=$('#cart_total').val();
    var min_order=$('#min_order').val();
    var extra_delivery=$('#extra_delivery').val();
   
    if(parseFloat(cart_tot) < parseFloat(min_order))
    {
    
      var diff=parseFloat(min_order)-parseFloat(cart_tot);

      
        swal({  
          title: "Message",   
          text: 'Total Cart Value is Less Than '+min_order+' Rs .Add Items worth '+diff+' Rs to get discounts in delivery charge',   
          icon: "info", 
          buttons: {
            cancel: "Continue Shopping",
            confirm: "Proceed to Checkout",
          
          },
        })
      .then(function(input){

        if(input===true)
        {
         
        $('#delivery_extra').val('extra');
        
          $('#checkout').submit();
        }
        else
        {
          window.location.href=base_url+'home';
        
        }  
      });
      
   
    } 
    else
    {
     
      $('#delivery_extra').val('normal');
        
      $('#checkout').submit();
   
      
    }
 
  });

