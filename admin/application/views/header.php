<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Swiftsmart-Admin</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>css/responsive.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="<?php echo base_url()?>css/select2.min.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
      <!-- Sidebar  -->
      <div class="iq-sidebar">
         <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="<?php echo site_url('AdminController/index')?>">
            <img src="<?php echo base_url()?>images/logo.gif" class="img-fluid" alt="">
            <span>PWA</span>
            </a>
            <div class="iq-menu-bt align-self-center">
               <div class="wrapper-menu">
                  <div class="line-menu half start"></div>
                  <div class="line-menu"></div>
                  <div class="line-menu half end"></div>
               </div>
            </div>
         </div>
         <div id="sidebar-scrollbar">
                              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>
					 <li><a href="<?php echo site_url('AdminController/index')?>" class="iq-waves-effect"><i class="las la-check-square"></i><span>Dashboard</span></a></li>
					  <li><a href="<?php echo site_url('AdminController/index')?>" class="iq-waves-effect"><i class="las la-check-square"></i><span>Orders</span></a></li>
					  <li><a href="<?php echo site_url('AdminController/view_pages/customer')?>" class="iq-waves-effect"><i class="las la-check-square"></i><span>Customers</span></a></li>
                     <li>
                        <a href="#dashboard" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="true"><i class="las la-home"></i><span>Settings</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>                   
                        <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-product">Add Products</a></li>
						     <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-slider">Add Slider</a></li>
                       <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-categories">Add Categories</a></li>
                        <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-addon">Add Addons</a></li>
							     <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-offers">Add Offers</a></li>
                          <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-promocodes">Add Promocode</a></li>
								   <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-variants">Add Variants</a></li>
								     <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-delivery-charge">Add Delivery Charges</a></li>
									 <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-delivery-area">Add Delivery Area</a></li>
                           <li><a href="<?php echo base_url()?>index.php/AdminController/view_pages/add-delivery-boy">Add Delivery Boy</a></li>
                           <!-- <li class="active"><a href="<?php echo base_url()?>index.php/AdminController/reports">Reports</a></li> -->
                          
                        </ul>
                     </li>
                     <li>
                        <a href="#reports" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-file-chart-fill"></i><span>Reports</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo base_url()?>index.php/AdminController/reports">Order Reports</a></li>
						         <li><a href="<?php echo base_url()?>index.php/AdminController/product_reports">Product Reports</a></li>
						 
                        </ul>
                     </li>
                     <li>
                        <a href="#updcred" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-file-chart-fill"></i><span>Update Credentials</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="updcred" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo base_url()?>index.php/AdminController/change_username">Change Username</a></li>
						         <li><a href="<?php echo base_url()?>index.php/AdminController/change_password">Change Password</a></li>
						 
                        </ul>
                     </li>
                           <li><a href="<?php echo base_url()?>index.php/AdminController/user_logout">LogOut</a></li>
                    
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
      </div>
      <!-- TOP Nav Bar -->
      <div class="iq-top-navbar">
         <div class="iq-navbar-custom">
            <div class="iq-sidebar-logo">
               <div class="top-logo">
                  <a href="<?php echo site_url('AdminController/index')?>" class="logo">
                  <img src="<?php echo base_url()?>images/logo.gif" class="img-fluid" alt="">
                  <span>PWA</span>
                  </a>
               </div>
            </div>
            <div class="navbar-breadcrumb">
               <h5 class="mb-0">Dashboard 2</h5>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo site_url('AdminController/index')?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('AdminController/index')?>">Dashboard </a></li>
                  </ol>
               </nav>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                     </div>
                  </div>
                
                  
               </nav>
         </div>
      </div>
      <!-- TOP Nav Bar END -->