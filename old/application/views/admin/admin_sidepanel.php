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
	<script src="<?php echo base_url();?>public_html/plugins/vendor/jquery.ui.widget.js"></script> 
	<script src="<?php echo base_url();?>public_html/plugins/jquery.iframe-transport.js"></script> 
	<script src="<?php echo base_url();?>public_html/plugins/jquery.fileupload.js"></script>
	
	
	
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-clr">
        <a class="navbar-brand logo-brand" href="<?php echo base_url();?>admin/Admin_ctlr/dashboard">Swanthanam </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a href="<?php echo base_url();?>admin/Admin_ctlr/dashboard" class="frnt-link"><i class="fas fa-external-link-alt"></i>Home</a>
        <ul class="navbar-nav ml-auto mr-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item admin-dropdown-item" href="edit_profile.html">Edit Profile</a>
                    <a class="dropdown-item admin-dropdown-item" href="change_password.html">Change Password</a> -->
                    <a class="dropdown-item admin-dropdown-item" href="<?php echo base_url();?>admin/Admin_ctlr/index">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <?php if($this->session->userdata('designation')==1) { ?>
                        <a class="nav-link <?php if($active_cls == "dashboard"){ echo "active"; } ?>" href="<?php echo base_url();?>dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link  <?php if($active_cls == "farmer"){ echo "active"; } ?>" href="<?php echo base_url();?>farmers">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            Farmers
                        </a>
                        <a class="nav-link  <?php if($active_cls == "slider"){ echo "active"; } ?>" href="<?php echo base_url();?>slider">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-image"></i></div>
                            Sliders
                        </a>
                        <a class="nav-link  <?php if($active_cls == "area"){ echo "active"; } ?>" href="<?php echo base_url();?>area">
                            <div class="sb-nav-link-icon"><i class="fas fa-map-marked-alt"></i></div>
                            Areas
                        </a>
                        <a class="nav-link  <?php if($active_cls == "category"){ echo "active"; } ?>" href="<?php echo base_url();?>category">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Categories
                        </a>
                        <a class="nav-link  <?php if($active_cls == "product"){ echo "active"; } ?>" href="<?php echo base_url();?>product">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Products
                        </a>
                        <a class="nav-link  <?php if($active_cls == "price"){ echo "active"; } ?>" href="<?php echo base_url();?>price">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            Pricelist
                        </a>
                        <a class="nav-link <?php if($active_cls == "store"){ echo "active"; } ?>" href="<?php echo base_url();?>store">
                            <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                            Stores
                        </a>
                        <a class="nav-link <?php if($active_cls == "customer"){ echo "active"; } ?>" href="<?php echo base_url();?>customer">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Customers
                        </a>
                        <a class="nav-link <?php if($active_cls == "order"){ echo "active"; } ?>" href="<?php echo base_url();?>order">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                            Orders
                        </a>
                        
                        <a class="nav-link <?php if($active_cls == "offer"){ echo "active"; } ?>" href="<?php echo base_url();?>offer">
                            <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>
                            Offers
                        </a>
                        <a class="nav-link <?php if($active_cls == "deals"){ echo "active"; } ?>" href="<?php echo base_url();?>deals">
                            <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>
                            Deals Of the Week
                        </a>
                        <a class="nav-link <?php if($active_cls == "unit"){ echo "active"; } ?>" href="<?php echo base_url();?>unit">
                            <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                            Units
                        </a>
						 <a class="nav-link <?php if($active_cls == "advertisement"){ echo "active"; } ?>" href="<?php echo base_url();?>advertisement_list">
                            <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                            Advertisement
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
<div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
Setting
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseSettings" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link sub_nav_link" href="#">General Settings</a>
<a class="nav-link sub_nav_link" href="#">Payment Settings</a>
<a class="nav-link sub_nav_link" href="#">Email Settings</a>
</nav>
</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                            Reports
                        </a>
                        <?php } ?>


                        <?php if($this->session->userdata('designation')==2) { ?>
                            <a class="nav-link <?php if($active_cls == "dashboard"){ echo "active"; } ?>" href="<?php echo base_url();?>dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link  <?php if($active_cls == "profile"){ echo "active"; } ?>" href="<?php echo base_url();?>profile/<?php echo $this->session->userdata('farmer_id');?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            Profile
                        </a>
                        <a class="nav-link  <?php if($active_cls == "sale"){ echo "active"; } ?>" href="<?php echo base_url();?>sale/<?php echo $this->session->userdata('farmer_id');?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                            Sale
                        </a>
                        <a class="nav-link  <?php if($active_cls == "order"){ echo "active"; } ?>" href="<?php echo base_url();?>farmer_order/<?php echo $this->session->userdata('farmer_id');?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                            Orders
                        </a>
                        <a class="nav-link  <?php if($active_cls == "histry"){ echo "active"; } ?>" href="<?php echo base_url();?>history/<?php echo $this->session->userdata('farmer_id');?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                            History
                        </a>
                        <?php } ?>

                    </div>
                </div>
            </nav>
        </div>