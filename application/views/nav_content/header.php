<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Cafeimers Mobile Olshop by Cimols Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />

    <!--        Datepicker CSS         -->
    <link href="<?php echo base_url('assets/css/bootstrap-datepicker.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/css/css/custom.min.css'); ?>" rel="stylesheet" />
    
    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url('assets/css/light-bootstrap-dashboard.css'); ?>" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url('assets/css/demo.css'); ?>" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/pe-icon-7-stroke.css'); ?>" rel="stylesheet" />
    
    <!--        Dropzone CSS         -->
    <link href="<?php echo base_url('assets/css/dropzone.css'); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>" type="text/javascript"></script>
      <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="<?php echo base_url('assets/img/sidebar-5.jpg'); ?>">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo" >
                <img src="<?php echo base_url('assets/img/favicon.png'); ?>" class="img-responsive">
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo base_url('admin/index'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/Profile/daftar'); ?>">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/Barang'); ?>">
                        <i class="pe-7s-shopbag"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/Edt_Barang/view'); ?>">
                        <i class="pe-7s-edit"></i>
                        <p>Edit Barang</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/Resi') ?>">
                        <i class="pe-7s-drawer"></i>
                        <p>Order Masuk</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/Kategori/index'); ?>">
                        <i class="pe-7s-photo-gallery"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/Rekap'); ?>">
                        <i class="pe-7s-date"></i>
                        <p>Rekap Data</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>