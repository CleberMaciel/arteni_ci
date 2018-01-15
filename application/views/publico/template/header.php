<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
       
        <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- start-smoth-scrolling -->

        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        
        
        <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/css/metisMenu.min.css') ?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url('assets/css/timeline.css') ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/css/startmin.css') ?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('assets/css/morris.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url('assets/css/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url('assets/css/dataTables/dataTables.responsive.css') ?>" rel="stylesheet">

        <!-- start-smoth-scrolling -->
    </head>
    <body>
        <!-- header -->
        <div class="agileits_header">
            <div class="w3l_offers">
                <a href="products.html">Today's special Offers !</a>
            </div>
            <div class="w3l_search">
                <form action="#" method="post">
                    <input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Search a product...';
                            }" required="">
                    <input type="submit" value=" ">
                </form>
            </div>
            <div class="product_list_header">  
                <form action="#" method="post" class="last">
                    <fieldset>
                        <input type="hidden" name="cmd" value="_cart" />
                        <input type="hidden" name="display" value="1" />
                        <input type="submit" name="submit" value="Seu carrinho" class="button" />
                    </fieldset>
                </form>
            </div>
            <div class="w3l_header_right">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                        <div class="mega-dropdown-menu">
                            <div class="w3ls_vegetables">
                                <ul class="dropdown-menu drp-mnu">
                                    <li><a href="login.html">Login</a></li> 
                                    <li><a href="login.html">Sign Up</a></li>
                                </ul>
                            </div>                  
                        </div>	
                    </li>
                </ul>
            </div>
            <div class="w3l_header_right1">
                <h2><a href="mail.html">Contact Us</a></h2>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- script-for sticky-nav -->

        <!-- //script-for sticky-nav -->
        <div class="logo_products">
            <div class="container">
                <div class="w3ls_logo_products_left">
                    <h1><a href="index.html"><span>Grocery</span> Store</a></h1>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="special_items">
                        <li><a href="about.html">Sobre Nós</a><i>/</i></li>
                        <li><a href="services.html">Serviços</a></li>
                    </ul>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="phone_email">
                        <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //header -->
        <!-- banner -->
        <div class="banner">
            <div class="w3l_banner_nav_left">
                <nav class="navbar nav_bottom">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> 
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav nav_1">
                            <li><a href="products.html">Branded Foods</a></li>
                            <li><a href="household.html">Households</a></li>
                            <li class="dropdown mega-dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Veggies & Fruits<span class="caret"></span></a>				
                                <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                    <div class="w3ls_vegetables">
                                        <ul>	
                                            <li><a href="vegetables.html">Vegetables</a></li>
                                            <li><a href="vegetables.html">Fruits</a></li>
                                        </ul>
                                    </div>                  
                                </div>				
                            </li>
                            <li><a href="kitchen.html">Kitchen</a></li>
                            <li><a href="short-codes.html">Short Codes</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
                                <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                    <div class="w3ls_vegetables">
                                        <ul>
                                            <li><a href="drinks.html">Soft Drinks</a></li>
                                            <li><a href="drinks.html">Juices</a></li>
                                        </ul>
                                    </div>                  
                                </div>	
                            </li>
                            <li><a href="pet.html">Pet Food</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
                                <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                    <div class="w3ls_vegetables">
                                        <ul>
                                            <li><a href="frozen.html">Frozen Snacks</a></li>
                                            <li><a href="frozen.html">Frozen Nonveg</a></li>
                                        </ul>
                                    </div>                  
                                </div>	
                            </li>
                            <li><a href="bread.html">Bread & Bakery</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>

            <div class="clearfix"></div>
        </div>