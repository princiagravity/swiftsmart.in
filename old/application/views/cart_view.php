 <!--Hero Section-->
 <div class="hero-section hero-background" style="margin-top: 0px;">
        <!-- <h1 class="page-title">Organic Fruits</h1> -->
    </div>

    
   



<div id="main-content" class="main-content">
            <div class="container">


<div class="shopping-cart-container">
                    <div class="row" style="    padding-top: 50px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            <br>
                            <br>
                            <form class="shopping-cart-form" action="<?php echo base_url();?>checkout" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-image" style="width:300px;">Product Image</th>
                                        <th class="product-name" style="width:300px;">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                        $no = 0;
                        foreach ($this->cart->contents() as $items) {
                            $no++;
                        ?>
                                    
                                    <tr>
                           
                           <td class="product-thumbnail">
                           <input type="hidden" value="<?php echo $items['productimage'];?>" name="product_image[]" id="productimage<?php echo $items['id'];?>">
                           
                           
                           <a href="#"><img src="<?php echo base_url()?>public_html/upload/product/<?php echo $items['productimage']; ?>"
                                       alt="" width="40%"></a>
                        </td>
                           <td class="product-name" style="font-size: 25px;">
                           <input type="hidden" value="<?php echo $items['id'];?>" name="product_id[]" id="product_id<?php echo $items['id'];?>"> 
                                       <input type="hidden" value="<?php echo $items['name'];?>" name="product_name[]" id="product_name<?php echo $items['id'];?>">
                                        <?php echo $items['name'];?>
                        </td>
                           <td class="product-price"><span class="amount">
                           <input type="hidden" value="<?php echo $items['price'];?>"  name="unit_price[]" />
                                       <span class="final h3" id="price_val<?php echo $items['id']?>">
                                       <?php echo $items['price'];?></span>
                                       </td>
                                    
                            
                           <td class="product-quantity">
                           
                           <div class="quantity">
                              <input type="number" min="1" value="<?php echo $items['qty'];?>"  class="form-control form-quantity" id="qty_<?php echo $items['id']?>" name="qty[]" onchange="change_qty(<?php echo $items['id']?>)"/>
                              </div>
                           </td>
                         
                           <td class="product-subtotal"> 
                           <div class="price">
                           <input type="hidden" value="<?php echo $items['subtotal_price'];?>"  name="subtotal[]"  id="subtotal_hiden<?php echo $items['id']?>" />

                           <span class="final h3" id="subtotal<?php echo $items['id']?>" >
                           <?php echo $items['price'] * $items['qty'];?>
                           </span>
                           </div>
                           
                           </td>
                           <td>
                           <div class="action">
                           <a onclick="delete_cart(this,<?php echo $items['id']?>)" id="<?php echo $items['rowid']; ?>" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           </div></td>
                           <!-- <td class="product-remove"><a href="javascript:void(0)" onclick="delete_cart(this,<?php echo $items['id']?>)" id="<?php echo $items['rowid']; ?>"><i class="fa fa-times"></i></a></td> -->
                       </tr>
           <?php 
        } ?>
<div style="clear:both;"></div>


                        <?php
                                // $subtotal = $this->cart->total();
                            ?>
                            
                            <!-- <tr>
                           
                            <input type="hidden"  id="grand_val" name="grand_val[]" value="<?php echo str_replace( ',', '', $subtotal );?>">
                          
                             <span style="font-size:19px;float: right;padding-left: 10px;"></span>
                                <div class="h2 title" id="grand_div" style="float:right"><?php echo number_format($this->cart->total());?> </div> 
                                </tr> -->

                                <div style="clear:both;"></div>
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a href="<?php echo base_url();?>shop" class="btn back-to-shop">Back to Shop</a>
                                            <!-- <div class="btn-checkout">
                                    <a href="<?php echo base_url();?>checkout" class="btn checkout">Check out</a>
                                </div> -->
                                <button class="btn checkout">Check out</button>
                                        </td>

                                        <!-- <div class="btn-checkout">
                                    <a href="#" class="btn checkout">Check out</a>
                                </div> -->


                                    </tr>
                                    <div style="clear:both;"></div>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!-- <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
</div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>

                       <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line">
                                    <b class="stt-name">Sub Total </b>
                                    <span class="stt-price">₹170.00</span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping</b>
                                    <span class="stt-price">₹10.00</span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Grand Total</b>
                                    <span class="stt-price">₹180.00</span>
                                </div>
                             
                               
                        </div> 
                </div> -->
</div>
</div>
