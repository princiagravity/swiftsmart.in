<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="page-content-wrapper">
    <div class="container-fluid" style="width: 350px;">
        <div class="pt-3">
        <div class="row">
            
            <div class="col-sm-6">
            <img src="<?php echo base_url() ?>logo/fathimalogo.jpg" width="150px" height="150px">
              
            </div>
         
        </div>
        <div class="row">
        <div class="col">
               <h4>Hello <?php echo $name;?>,</h4>

               <p>Thanks For Your Order(order ID:). Your item(s) will be deliverd soon.Start preparing your tables and tastebuds!</p>
            
            </div>
        </div>

        <div class="row">
        <h4>Order Summary</h4>
       <table>
           <thead>
           <th>Items</th>
           <th>Quantity</th>
           <th>Total</th>
           </thead>
           <tbody>
               <?php 
               foreach($items as $item)
               {?>
               <tr>
                   <td><?php echo $item->product_name;?></td>
                   <td style="text-align: center;"><?php echo $item->product_count;?></td>
                   <td style="text-align:right;"><?php echo $item->product_total?></td>
               </tr>
               <?php }?>
             
           </tbody>
       </table>
             <h6>Sub Total: <?php echo $cart_total?></h6>
             <h6>Discount: <?php echo $discount?></h6>
             <h6>Tax(5%): <?php echo $tax_amount?></h6>
             <h6>Delivery Charge: <?php echo $delivery_charge?></h6>
             <h6>Tax Collected For Delivery(5%): <?php echo $delivery_tax?></h6>
             <h4>Order Total: <?php echo $order_total?></h4>
        </div>


    </div>
    </div>
</div>
</body>
</html>