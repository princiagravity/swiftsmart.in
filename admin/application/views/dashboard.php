
      <!-- Page Content  -->
      <div id="content-page" class="content-page dashboard">
         <div class="container-fluid">
            <div class="row">
               
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-sm-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body tasks-box">
                              <div class="d-flex align-items-center">                                 
                              <span class="iq-icon-box rounded-circle iq-bg-primary mr-3">
                                    <i class="ri-file-shield-line"></i>
                              </span>
                                 <div>
                                    <h6>Total Orders:</h6>
                                    <h3><?php echo $dash_count->total_order;?></h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body tasks-box">
                              <div class="d-flex align-items-center">                                 
                                 <span class="iq-icon-box rounded-circle iq-bg-success mr-3">
                                    <i class="ri-check-line"></i>
                                 </span>
                                 <div>
                                    <h6>Pending Orders:</h6>
                                    <h3><?php echo $dash_count->pending;?></h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body tasks-box">
                              <div class="d-flex align-items-center">                                 
                              <span class="iq-icon-box rounded-circle iq-bg-info mr-3">
                                    <i class="ri-ball-pen-line"></i>
                              </span>
                                 <div>
                                    <h6>In Progress:</h6>
                                    <h3><?php echo $dash_count->inprogress;?></h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body tasks-box">
                              <div class="d-flex align-items-center">                                 
                              <span class="iq-icon-box rounded-circle iq-bg-danger mr-3">
                                    <i class="ri-close-line"></i>
                              </span>
                                 <div>
                                    <h6>Delivery Boys:</h6>
                                    <h3><?php echo $dash_count->boys;?></h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    
                  </div>
               </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Set Minimum order & Delivery charge</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <?php 
                        $min_order='';
                        $extra_delivery="";
                        if($min_order_delivery)
                        {
                           $min_order=$min_order_delivery[0]->min_order;
                           $extra_delivery=$min_order_delivery[0]->delivery_extra_charge;
                        }?>
                     <form id="order_minimum" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
                       
                        <input type="text" placeholder="minimum order value" name="min_order" value="<?php echo $min_order;?>" required>
                        <input type="text" placeholder="Delivery Extra charge" name="delivery_extra_charge" value="<?php echo $extra_delivery;?>" required>
                        <input type="submit" value="submit">
                     </form>
                     </div>
            </div>
            </div>  
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Orders</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Customer Name</th>
								 <th scope="col">Contact Number</th>
                                 <th scope="col">Order Time</th>
                                 <th scope="col">Items</th>
								 <th scope="col">Area</th>
								  <th scope="col">Total Amount</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Assign</th>
								   <th scope="col">View</th>
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 if($order_list)
                                 {
                                 foreach($order_list as $order)
                                 {?>
                               <tr>
                                 <td><?php echo $i;?></td>
                                 <td><?php echo $order->customer_details->name;?> </td>
                                 <td><?php echo $order->customer_details->mobile;?></td>
                                 <td><?php echo $order->order_time;?></td>
                                 <td><span class="badge badge-danger text-wrap">
                                    <?php foreach($order->items as $item)
                                    {
                                       echo $item.",";
                                    }?></span></td>
                                 <td><?php echo $order->area_name;?></td>
								 <td><?php echo $order->order_total;?></td>
								 <td><?php echo $order->status_name;?></td>
								 <td><?php echo $order->delivery_boy_name;?></td>
								 <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url('AdminController/order_details/'.$order->id)?>">View</a></button></span>
                                 </td>
                               </tr>
                               <?php $i++;
                                 }}
                                 else
                                 {
                                    ?>
                                    <tr>
                                       <td colspan="2">
                                       <h4>Nothing To Display</h4></td>
                                    </tr>
                                    <?php
                                 }?>
							        
                             </tbody>
                           </table>
                         </div>
                     </div>
                  </div>
               </div>
               
            </div>
            
         </div>
      </div>
   