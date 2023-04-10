<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BIS</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
  
    <link href="<?php echo base_url();?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/css/dashboard.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/admin/js/jquery-3.5.1.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
 
    <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
        <?php 
        require('side_menu.php');
        ?>
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <?php require('navbar.php'); ?>
    <!-- End of Topbar -->
