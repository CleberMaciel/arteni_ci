<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>ArtêNí - Artesanato feito à mão!</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

        <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico" />

        <!-- start-smoth-scrolling -->



        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">


        <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/sweetalert.css') ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/css/metisMenu.min.css') ?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url('assets/css/timeline.css') ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/css/startmin.css') ?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('assets/css/morris.css') ?>" rel="stylesheet">
        <!--<link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">-->

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
                <a href="<?php echo base_url(); ?>Ecommerce">ArtêNí - Artesanato</a>
            </div>
            <div class="w3l_search">
            </div>
            <div class="product_list_header">  
                <form action="#" method="post" class="last">
                    <fieldset>
                        <input type="hidden" name="cmd" value="_cart" />
                        <input type="hidden" name="display" value="1" />
                        <input type="submit" name="submit" value="Seu carrinho   " class="button" />
                    </fieldset>
                </form>
            </div>
            <div class="w3l_header_right">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <?php if (!$this->session->userdata('user_clientelogado')) { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                            <div class="mega-dropdown-menu">
                                <div class="w3ls_vegetables">
                                    <ul class="dropdown-menu drp-mnu">
                                        <li><a href="<?php echo base_url(); ?>cliente/login">Entrar</a></li> 
                                        <li><a href="<?php echo base_url(); ?>cliente">Cadastre-se</a></li>
                                    </ul>
                                </div>                  
                            </div>
                        <?php } else { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('user_clientelogado')->NOME;?><span class="caret"></span></a>
                            <div class="mega-dropdown-menu">
                                <div class="w3ls_vegetables">
                                    <ul class="dropdown-menu drp-mnu">
                                        <li><a href="<?php echo base_url(); ?>cliente">Conta</a></li>
                                        <li><a href="<?php echo base_url(); ?>cliente/sair">Sair</a></li> 
                                    </ul>
                                </div>                  
                            </div>	
                        <?php } ?>
                    </li>
                </ul>
            </div>

            <div class="w3l_header_right4">
                <h2><a href="<?php echo base_url(); ?>contato">Entre em contato</a></h2>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- script-for sticky-nav -->

        <!-- //script-for sticky-nav -->
        <div class="logo_products">
            <div class="container">
                <div class="w3ls_logo_products_left">
                    <h1><a href="<?php echo base_url(); ?>Ecommerce"><img  class="img_logo"src="<?php echo base_url('assets/images/img-sp.png'); ?>"></a></h1>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="special_items">
                        <li><a href="about.html">Sobre Nós</a><i>/</i></li>
                        <li><a href="services.html">Serviços</a></li>
                    </ul>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="phone_email">
                        <!--<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>-->
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
                            <li><a href="kitchen.html">Faça seu pedido!</a></li>

                            <li class="dropdown mega-dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos<span class="caret"></span></a>				
                                <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                    <div class="w3ls_vegetables">
                                        <ul>	
                                            <?php foreach ($tipo as $tipos): ?>
                                                <li><a href="<?php echo base_url('listar_materia/listar_materia/') . $tipos->ID_MATERIA_PRIMA_TIPO; ?>"><?php echo $tipos->NOME; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>                  
                                </div>				
                            </li>
                            <li class="dropdown mega-dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matéria-Prima<span class="caret"></span></a>				
                                <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                    <div class="w3ls_vegetables">
                                        <ul>	
                                            <?php foreach ($tipo as $tipos): ?>
                                                <li><a href="<?php echo base_url('listar_materia/listar_materia/') . $tipos->ID_MATERIA_PRIMA_TIPO; ?>"><?php echo $tipos->NOME; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>                  
                                </div>				
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
            <!--            <div class="clearfix"></div>-->
        </div>
    </body>
</html>