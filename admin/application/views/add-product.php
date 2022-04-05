



      <!-- Page Content  -->

      

      <div id="content-page" class="content-page">
      <style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<div class="container-fluid">

<?php

$id=$name=$category=$description=$mrp=$price=$max_sale=$image_url=$label=$lbl_category=$lbl_description=$lbl_id=$lbl_image_url=$lbl_max_sale=$lbl_mrp=$lbl_name=$lbl_price=$image=$variants=$lbl_variants=$lbl_addon="";
$variants_count=1;
$required="required";
$addons=array();
if($update)

{
$required="";
 $id=$update['data'][0]->id;

 $lbl_id="ID";

 $name=$update['data'][0]->name;

 $lbl_name="Name";

 $category=$update['data'][0]->category;

 $lbl_category="Category";

 $description=$update['data'][0]->description;

 $lbl_description="Description";

 $variants=$update['data'][0]->variants;
 $variants_count=$update['data'][0]->variants_count;
 $lbl_addon="Addon";

/*  $addons=json_decode($update['data'][0]->addons); */

 $lbl_variants="Variants";

 $mrp=$update['data'][0]->mrp;

 $lbl_mrp="MRP";

 $price=$update['data'][0]->price;

 $lbl_price="Price";

 $max_sale=$update['data'][0]->max_sale;

 $lbl_max_sale="Maximum Sale";

 $image_url=$update['data'][0]->image_url;

 $lbl_image_url="Change Image";

 $title='Update Products';

 $action='update_products';

 $button='Update';

 $image="<img src='".base_url().'../uploads/product-images/'.$image_url."' width='150px' height='150px'>";

}

else

{

 $title='Add Products';

 $action='add_products';

 $button='Submit';

 $lbl_image_url="Choose Image";

}

?>

    <div class="row">

       

       <div class="col-lg-12">

           <div class="iq-card">

                <div class="iq-card-header d-flex justify-content-between">

                   <div class="iq-header-title">

                      <h4 class="card-title"><?php echo $title;?></h4>

                   </div>

                </div>

                <div class="iq-card-body">

                   

                   <form id="add_products" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">

                      <div class="form-row">

                         <div class="col">

                         <label><?php echo $lbl_name;?></label>

                            <input type="text" class="form-control product_search" placeholder="Name" name="name" value="<?php echo $name;?>" id="product_name" required>
                            <span class="prod_error"></span>
                            <input type="hidden" class="p_name" value="<?php echo $name?>">
                            <input type="hidden" name="submit_stat" id="submit_stat" class="submit_stat" value="1">

                         </div>

                         <div class="col">

                         <label><?php echo $lbl_category;?></label>

                         <select class="form-control" id="exampleFormControlSelect1" name="category" required>

                         <?php if($category =="")

                            {?>

                            <option selected="" value="" disabled="">Select Category</option>

                            <?php

                            }



                            ?>

                             <?php foreach($categories as $index=>$value)

                            {

                               if($category == $index)

                               {

                                  ?>

                                   <option value="<?php echo $index ?>" selected><?php echo $value;?></option>

                                  <?php

                               }

                               else

                               {

                               ?>

                               <option value="<?php echo $index ?>"><?php echo $value;?></option>

                               <?php

                               }

                            }?>

                          

                         </select>

                         </div>

                 <div class="col">

                 <label><?php echo $lbl_description;?></label>

                            <input type="text" class="form-control" placeholder="Description" name="description" value="<?php echo $description;?>" >

                         </div>

                         <div class="col">

                              <label>Width:390px,height:330px</label>

                        

                             <input type="file" class="custom-file-input" id="customFile" name="image_url" <?php echo $required?>>

                            <label class="custom-file-label" for="customFile" style="margin-top: 15%;"><?php echo $lbl_image_url; ?></label>

                             <?php echo $image;?>

                         </div>

                         <div class="col">

                         <label><?php echo $lbl_addon;?></label>

                         <select name="addons[]" id="products" class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Addon"  >

                            

                         <?php 

                         

                         foreach($addonlist as $addon){ 

                            

                            if(in_array($addon->id,$addons))

                            {

                               ?>

                               <option value="<?php echo $addon->id; ?>" selected><?php  echo $addon->name; ?></option>

                               <?php

                            }?> 

                         <option value="<?php echo $addon->id; ?>"><?php  echo $addon->name; ?></option> 

                         <?php } ?> 

                         </select>

                         </div>

                

                

                

                 

                      </div>

                      <div class="repeat_field">
                         <div class="input-group">

                      <div class="form-row" >

                         

                         <div class="col">

                         <label><?php echo $lbl_variants;?></label>

                         <select class="form-control select_variant" id="exampleFormControlSelect1" name="prod_det[variants][]">

                         <?php if($variants =="")

                                    {?>

                                    <option selected="" value="" disabled="">Choose One</option>

                                    <?php

                                    }



                                    ?>


                            <?php foreach($variantslist as $index=>$value)

                            {

                               if($variants == $index)

                               {

                                  ?>

                                   <option value="<?php echo $index ?>" selected><?php echo $value;?></option>

                                  <?php

                               }

                               else

                               {

                               ?>

                               <option value="<?php echo $index ?>"><?php echo $value;?></option>

                               <?php

                            }}?>

                         </select>

                         </div>

                 

                 <div class="col">

                 <label><?php echo $lbl_mrp;?></label>

                            <input type="number" class="form-control" placeholder="MRP" name="prod_det[mrp][]" value="<?php echo $mrp;?>" step="0.001">

                         </div>

                 <div class="col">

                 <label><?php echo $lbl_price;?></label>

                            <input type="number" class="form-control" placeholder="Price" name="prod_det[price][]" value="<?php echo $price;?>" step="0.001">

                         </div>

                  <div class="col">

                  <label><?php echo $lbl_max_sale;?></label>

                            <input type="number" class="form-control" placeholder="Maximum Sale" name="prod_det[max_sale][]" value="<?php echo $max_sale;?>" step="1">

                         </div>

                        
                         <div class="col">
<input
type="button"
id="remove"
name="add"
value="-"
class="btn btn-danger"
style="margin-top:17%"
/>

</div>
                

                           

                    

                

                 

                      </div>
                      <button type="button" class="btn btn-primary" id="add_more" style="height: 35px;margin-top: 2.5%;">Add more</button>
                      </div>
                    
                      <?php if($update)

                      {

                         foreach($update['data2'] as $secondary)

                         {

                         

                            if($secondary->variants != $variants)

                            {?>

                            <div class="form-row" style="padding-top:25px;">

                         

                         <div class="col">

                         <label><?php echo $lbl_variants;?></label> 

                         <select class="form-control" id="exampleFormControlSelect1" name="prod_det[variants][]">

                         <?php foreach($variantslist as $index=>$value)

                            {

                               if($secondary->variants == $index)

                               {

                                  ?>

                                   <option value="<?php echo $index ?>" selected><?php echo $value;?></option>

                                  <?php

                               }

                               else

                               {

                               ?>

                               <option value="<?php echo $index ?>"><?php echo $value;?></option>

                               <?php

                            }}?>

                         </select>

                         </div>

                       

                       <div class="col">

                       <label><?php echo $lbl_mrp;?></label>

                            <input type="text" class="form-control" placeholder="MRP" name="prod_det[mrp][]" value="<?php echo $secondary->mrp;?>">

                         </div>

                       <div class="col">

                       <label><?php echo $lbl_price;?></label>

                            <input type="text" class="form-control" placeholder="Price" name="prod_det[price][]" value="<?php echo $secondary->price;?>">

                         </div>

                       <div class="col">

                       <label><?php echo $lbl_max_sale;?></label>

                            <input type="text" class="form-control" placeholder="Maximum Sale" name="prod_det[max_sale][]" value="<?php echo $secondary->max_sale;?>">

                         </div>

                       <input type="hidden" name="prod_det[sec_id][]" value="<?php echo $secondary->id;?>" >

                       <div class="col">

                       <input

                       type="button"

                       id="remove"

                       name="add"

                       value="-"

                       class="btn btn-danger"

                       />

                       

                         </div>

                       

                       

                       </div>

                      

                      <?php

                       }

                      else{

                         ?>

                          <input type="hidden" name="prod_det[sec_id][]" value="<?php echo $secondary->id;?>" >

                         <?php

                      } }}

                      ?>

                      </div>

                    <div class="form-row" style="padding-top:50px;">

                         

                     

             

                  <div class="col">

                  <input type="hidden" name="status" value="In Stock">
                  <input type="hidden" name="variants_count" id="variants_count" value="<?php echo $variants_count;?>">

                  <input type="hidden" name="id" value="<?php echo $id; ?>">

                  <input type="hidden" name="old_image" value="<?php echo $image_url;?>">

                              <input type="submit" class="btn btn-primary submit-btn" value="<?php echo $button; ?>">

                      <!-- <button type="submit" class="btn iq-bg-danger">cancel</button> -->

                         </div>

                

                 

                      </div>

               

               

               

                

                  

                      

                   </form>

                </div>

             </div></div>

    </div>

    
    <?php if(! $update){?>
    <div class="row">

       <div class="col-md-12">

          <div class="iq-card iq-card-block iq-card-stretch iq-card-height">

             <div class="iq-card-header d-flex justify-content-between">

                <div class="iq-header-title pt-2">

                   <h4 class="card-title">Products</h4>
                   <div class="input-group">
  <div class="form-outline">
    <input id="search-input" type="search" placeholder="Search..." class="form-control search_product" />
  </div>
</div>
                

                </div>

              

             </div>

             <div class="iq-card-body">

                <div class="table-responsive">

                   <table class="table mb-0 table-borderless">

                     <thead>

                       <tr>

                         <th scope="col">#</th>

                         <th scope="col">Name</th>

                 <th scope="col">Category</th>

                 <th scope="col">Add to Menu</th>

                         

                        <!--  <th scope="col">Status</th>

                

                   <th scope="col">View</th> -->

                       </tr>

                     </thead>

                     

                     <tbody class="search_result">

                     <?php 

                         $i=1;

                         foreach($productlist as $prod)

                         {

                        ?>

                       <tr>

                         <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $prod->id;?>"></td>

                         <td><?php echo $prod->name;?></td>

                         <td><?php echo $prod->category;?></td>

                         <td><span>

                               <input type="hidden" name="prod_id" class="prod_id" value="<?php echo $prod->id;?>">

                               <?php if($prod->p_display=='1')

                               {

                                  ?>

                               <input class="prod_visibility" type="checkbox" value="<?php echo $prod->p_display;?>" id="flexCheckDefault" checked>

                               <?php

                               }

                               else

                               {

                                  ?>

                                  <input class="prod_visibility" type="checkbox" value="<?php echo $prod->p_display;?>" id="flexCheckDefault">

                                  <?php

                               }

                               ?>

                             </span></td>



                 <td>

                 <span class="table-remove"><button type="button"

                               class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('AdminController/single_view/products/'.$prod->id))?>">View</a></button></span>

                               <span class="table-remove"><button type="button"

                               class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('AdminController/view_pages/add-product/'.$prod->id))?>">Update</a></button></span>

                                <span class="table-remove"><input type="hidden" name="delitem" class="delitem" value="<?php echo $prod->name;?>"><input type="hidden" name="deltype" class="deltype" value="products">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $prod->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>

                               
<br/>
                               <span class="table-remove">
							   <input type="hidden" name="prodid" class="up_prodid" value="<?php echo $prod->id;?>"> 
							   
							   <?php if($prod->status=="Out Of Stock")

                               
                               {?>

                        <input class="new_stock" type="checkbox" value="In Stock" id="stockstatus<?php echo $prod->id;?>" data-toggle="modal">
                        <span id="stattxt<?php echo $prod->id;?>"> Mark As In Stock</span>
                                      
                               <?php } else

                               {?>

                                  <input class="prod_status_update" type="checkbox" value="Out Of Stock" id="stockstatus<?php echo $prod->id;?>">
                                  <span id="stattxt<?php echo $prod->id;?>">Mark As Out Of Stock</span>


                               <?php }?></span>
							   
							   
							   
							   <!--test-->
							    <span class="table-remove">
								 <input type="hidden" name="prod_id" class="displayprod_id" value="<?php echo $prod->id;?>">	 
								<?php if($prod->product_display=="hide")
                                       
                                       {?>
                                       <input class="product_display_update" type="checkbox" value="show" id="prodvisible<?php echo $prod->id?>">
                                          <span id="visibstat<?php echo $prod->id;?>">
                                         Show
                                       </span>
                                       <?php } else
                                       {?>
                                          <input class="product_display_update" type="checkbox" value="hide" id="prodvisible<?php echo $prod->id?>">
                                          <span id="visibstat<?php echo $prod->id;?>">
                                          Hide
                                       </span>
                                       <?php }?>
									  
								</span>
							<!--end test-->
									   

                         </td> 

                       </tr>

                       <?php $i++; }?>

                

              

                     </tbody>

                   </table>

                 </div>

             </div>
             <div class="modal fade" id="newstock_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <form id="update_newstock" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-centered" role="document">
     
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Stock Details(Enter Qty)</h5>
        <button type="button" class="close closevideo" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container modal_container">
    
        </div>
      </div>
      <div class="modal-footer">
     <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </div>
    <input type="hidden" name="product_id" id="new_prod_id" value="">
  </div>
                     </form>
</div>

          </div>

       </div>

       

    </div>

    <?php }?>

 </div>

</div>

