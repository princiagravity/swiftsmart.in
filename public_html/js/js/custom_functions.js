
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
          html+=`<p class="sale-price mb-0"><i class="lni lni-rupee"></i>`+value.price+`<span><i class="lni lni-rupee"></i>`+value.mrp+`</span></p>`;
          $('#price').val(value.price);
          $('#mrp').val(value.mrp);
          $('#max_sale').val(value.max_sale);
          $('.prod_qty').val(1);
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

$('.cart-apply').click(function(e){
e.preventDefault();
var promocode=$('.promocode').val();
var phone_no=$('#phone_no').val();
var del_charge=$('#delivery_charge').val();
var del_tax=$('#delivery_tax').val();
if(promocode=='')
{
$('.cart-status').html('Please Enter Promocode First');
}
else if(phone_no=="")
{
  $('.phone').show(100);
  $('.phone').html("Please enter Phone no.");
  $('#phone_no').focus();
}
else
{
  var data={promocode:promocode,phone_no:phone_no};
  ajaxcall1(data,'apply_coupon',function(data){
    var data=JSON.parse(data);
    if(data.status=="null")
    {
      $('#discount').val(data.discount);
      $('.discount').html(`<i class="lni lni-rupee"></i>`+data.discount);
      var total=(parseFloat(data.total)/1.05);
      var tax=parseFloat(data.total)-parseFloat(total);
      var items=$('#items').val();
      $('.tax').html(`<i class="lni lni-rupee"></i>`+Math.round(tax)+`
      <input type="hidden" name="tax_amount" id="tax_amount" value="`+Math.round(tax)+`">
      <input type="hidden" name="tax" id="tax" value="5">`);

      $('#order_total').val(Math.round((parseFloat(items)+parseFloat(tax)+parseFloat(del_charge)+parseFloat(del_tax))-parseFloat(data.discount)));
      $('.ot').html(`<b><i class="lni lni-rupee"></i><span class="counter">`+ $('#order_total').val()+`</span></b>`);
    
    }
    else
    {
      $('.cart-status').html(data.status);
    }
   
  });

}
});

$('.pay_type').click(function(e){

  $('#payment_type').val($(this).val());

});

$('#area').change(function(e){
var data={area:$(this).val()};
var items=$('#items').val();
var tax=$('#tax_amount').val();
var discount=$('#discount').val();

ajaxcall1(data,'get_delivery_charge',function(data){
console.log(data);
    if(data)
    {
    var del=parseFloat(data)/1.05;
    var del_tax=parseFloat(data)-parseFloat(del);  
    var tot=(parseFloat(del)+parseFloat(del_tax)+parseFloat(items)+parseFloat(tax))-parseFloat(discount);
    $('.del_charge').html(`<i class="lni lni-rupee"></i>`+Math.round(del));
    $('#delivery_charge').val(Math.round(del));
    $('.del_tax').html(`<i class="lni lni-rupee"></i>`+Math.round(del_tax));
    $('#delivery_tax').val(Math.round(del_tax));
    $('.ot').html(`<b><i class="lni lni-rupee"></i><span class="counter">`+Math.round(tot)+`</span></b>`);
    $('#order_total').val(Math.round(tot));
  
    }
 
});

});


$('#add_to_cart').submit(function(e){
  e.preventDefault();
   if($('#chk_var').val()==1)
   {
  var i=0,ad_price=0,ad_count=0,tot_price=0,ad_name='';
  var addon=new Array();

  $('input[name="addon"]:checked').each(function(e){
    ad_count=$('#'+$(this).val()).val();
    ad_price=$('.addon_price_'+$(this).val()).val();
    ad_name=$('.addon_name_'+$(this).val()).val();
    addon[i]={'addon_id':$(this).val(),'addon_count':ad_count,'addon_price':ad_price,'addon_name':ad_name};
   
    tot_price=tot_price+(parseInt(ad_count)*parseInt(ad_price));
    i++;
  });
  var data=new FormData(this);
  data.append('addon_tot',tot_price);
  data.append('add_on',JSON.stringify(addon));
  /* console.log(data); */
 ajaxcall(data,'add_to_cart',function(data)
  {
     /*console.log(data) */
     if(data.success==1)
    {
    //alert("Added To Cart");
	Swal.fire(
  'Added To Cart!',
  'You clicked the button!',
  'success')
   // location.reload(true);
	window.location.href = data.redirect_url;
    }
   
  }); 
}
 else{
  alert("Please select a Variant");
} 
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
    console.log(data);
   /*  if(data.status=='success')
    {
      window.location.href = data.redirect_url;
    }
    else
    {
      alert("Order Not Placed");
    } */
   
  }); 
}
else{
  alert("Location Fetching Failed");
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

