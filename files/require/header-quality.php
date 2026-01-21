<?php include_once ('../config/config.inc.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pioneer Pumps &amp; Motors | Pump Manufacturer | Water Pumping Solutions | Self Priming Pumps | Centrifugal
        Pumps | Jet Pumps | Mini Pumps | Submersible Pumps | Openwell Pumps | Booster Pumps</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">

    <!-- Fonts-->
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro&family=Literata" rel="stylesheet">
    <!-- Css-->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/css/vegas.min.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">
    <link rel="stylesheet" href="assets/css/nouislider.pips.css">
    <link rel="stylesheet" href="assets/css/agrikol_iconl.css">
    <!-- Template styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>



    <div class="page-wrapper">


        <div class="site-header__header-one-wrap">

            <div class="topbar-one">
                <div class="topbar_bg" style="background-image: url(assets/images/shapes/header-bg.png)"></div>
                <div class="container">
                    <div class="topbar-one__left">
                  
                    </div>
                    <div class="topbar-one__middle">
                    <a href="index.php" class="main-nav__logo">
                            <img src="assets/images/resources/logo-new.png" class="main-logo" alt="Awesome Image" />
                        </a>
                    </div>
                    <div class="topbar-one__right">
                   
                    </div>
                </div>
            </div>

            <header class="main-nav__header-one">
                <nav class="header-navigation stricky">
                    <div class="container clearfix">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="pioneer_one">
                        <div  > 
                               
                               <img src="assets/images/resources/logo-pioneer.png"  alt="Awesome Image"  />
                         
                               </div>
                        </div>
                        <div class="main-nav__left">
                            
                            <a href="#" class="side-menu__toggler">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                        <div class="main-nav__main-navigation">
                            <ul class=" main-nav__navigation-box">
                                <li >
                                    <a href="index.php">Home</a>
                                
                                </li>
                                <li >
                                    <a href="about.php">About Us</a>
                                    
                                </li>
                                <li class="dropdown">
                                    <a href="#">Products</a>
                                    <ul>
                                         <li>
                                         <a href="catalogues.php">Product Catalogues</a>
                                       </li>
                                        <?php
                                            $CategoryRec = getAllRecords('category','ORDER BY `tbid` DESC'); if ($CategoryRec && is_object($CategoryRec) && method_exists($CategoryRec, 'fetch')) { while ($CategoryDetails = $CategoryRec->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <li>
                                            <a href="products.php?id=<?php echo $CategoryDetails['tbid']?>"><?php echo $CategoryDetails['category_name']; ?></a>
                                        </li>
                                        <?php    } } ?>
                                       
                                    </ul><!-- /.sub-menu -->
                                </li>
                                <li >
                                    <a href="gallery.php">Gallery</a>
                                    
                                </li>
                                <li  class="dropdown current">
                                    <a href="#">Services</a>
                                     <ul>
                                              <li >
                                    <a href="quality.php">Quality</a>
                                    
                                </li>
                                      
                                        <li>
                                            <a href="service.php">Warranty</a>
                
                                        </li>
                                        <li>
                                         <a href="service.php#Problem_Resolving_Chart">Problem Resolving Chart</a>
                                       </li>
                                    
                                       
                                    </ul>
                                    
                                </li>
                                
                             
                                <li>
                                    <a href="contact.php">Contact</a>
                                </li>
                                
                            </ul>
                        </div><!-- /.navbar-collapse -->
                        <div class="pioneer_two">
                        <div  > 
                               
                               <img src="assets/images/resources/logo-pioneer.png"  alt="Awesome Image" class="pioneer" />
                         
                               </div>
                        </div>
                 
                    </div>
                </nav>
            </header>
        </div>
