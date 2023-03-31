<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="DVBETBF, DVBETBF, Government of NCT of Delhi">
    <meta name="description" content="DVBETBF, DVBETBF, Government of NCT of Delhi">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="" rel="stylesheet">
    <!-- CSS File -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/footer_page.css" rel="stylesheet">
    <!-- OWL carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Bureau of indian standard</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/bis_logo.png" type="image/x-icon">
    <style>
        .inner_gallery_box {
            border-radius: 5px;
        }

        .inner_gallery_box img {
            border-radius: 5px;
            object-fit: fill;
        }
    </style>
</head>

<body style="overflow-x: hidden;">
    <header>
        <div class="sub_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="contact">
                            <ul>
                                <li><a href="#">हिन्दी</a></li>
                                <li><a href="#" onclick="increaseFontSize();" class="me-2">A+</a><a href="#" onclick="normalFontSize();" class="me-2">A</a> <a href="#" onclick="decreaseFontSize();" class="me-2">A-</a></li>
                                <li>
                                    <a href="#" id="blue_theme"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                    <a href="#" id="bright_contrast"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                    <a href="#" id="orange_theme"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                    <a href="#" id="red_theme"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accessibility">
                            <ul>
                                <li><a href="#" class="show"><img src="<?php echo base_url(); ?>assets/images/user.png" style="height:31px;"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login_details">
            <span>Welcome To Bureau of Indian Standards</span>
            <div class="login-link-wrapper">
                <a href="<?php echo base_url(); ?>admin/login" class="ac-login jquery-once-2-processed" title="Login">Login</a>
                <a href="https://www.services.bis.gov.in/php/BIS_2.0/outsider-registration" class="ac-register jquery-once-2-processed" title="Register">Register</a>
            </div>
        </div>
        <div class="menu_header" id="menu_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand d-flex" href="<?php echo base_url(); ?>">
                                    <img src="<?php echo base_url(); ?>assets/images/logo-strip.png" class="main_logo" alt="BIS logo">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <section id="welcome_text">
        <div>
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light navbar_padding">
                    <div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>" style="color: white;">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" target="_blank" aria-current="page" href="https://www.bis.gov.in/" style="color: white;">BIS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>users/about_exchange_forum" style="color: white;">About Exchange Forum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails" style="color: white;">Know Your Standards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>users/contact_us" style="color: white;">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>