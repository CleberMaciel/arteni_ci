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
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
              />

        <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet'
              type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
              rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico" />

        <!-- start-smoth-scrolling -->



        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>" rel="stylesheet">


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
                <form action="<?php echo base_url(); ?>Checkout" method="post" class="last">
                    <fieldset>
                        <input type="submit" name="submit" value="Seu carrinho   " class="button" />
                        <!--<a class="button" href="<?php echo base_url(); ?>Checkout">Seu carrinho   </a>-->
                    </fieldset>
                </form>
            </div>
            <div class="w3l_header_right">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <?php if (!$this->session->userdata('user_clientelogado')) { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="caret"></span>
                            </a>
                            <div class="mega-dropdown-menu">
                                <div class="w3ls_vegetables">
                                    <ul class="dropdown-menu drp-mnu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>cliente/login">Entrar</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>cliente">Cadastre-se</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } else { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo $this->session->userdata('user_clientelogado')->NOME; ?>
                                <span class="caret"></span>
                            </a>
                            <div class="mega-dropdown-menu">
                                <div class="w3ls_vegetables">
                                    <ul class="dropdown-menu drp-mnu">

                                        <li>
                                            <a href="<?php echo base_url(); ?>pedidos/meusPedidos/<?php echo $this->session->userdata('user_clientelogado')->ID_CLIENTE; ?>">Meus Pedidos</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#senha">Alterar senha</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#endereco">Alterar Endereço</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>cliente/sair">Sair</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </li>
                </ul>
            </div>

            <div class="w3l_header_right4">
                <h2>
                    <a href="<?php echo base_url(); ?>contato">Entre em contato</a>
                </h2>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- script-for sticky-nav -->

        <!-- //script-for sticky-nav -->
        <div class="logo_products">
            <div class="container">
                <div class="w3ls_logo_products_left">
                    <h1>
                        <a href="<?php echo base_url(); ?>Ecommerce">
                            <img class="img_logo" src="<?php echo base_url('assets/images/img-sp.png'); ?>">
                        </a>
                    </h1>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="special_items">
                        <li>
                            <a href="about.html">Sobre Nós</a>
                            <i>/</i>
                        </li>
                        <li>
                            <a href="services.html">Serviços</a>
                        </li>
                    </ul>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="phone_email">
                        <!--<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>-->
                        <li>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <a href="mailto:admin@clebermaciel.online">admin@clebermaciel.online</a>
                        </li>
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
                            <!--                            <li>
                                                            <a href="kitchen.html">Faça seu pedido!</a>
                                                        </li>-->

                            <li class="dropdown mega-dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Modelos
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                    <div class="w3ls_vegetables">
                                        <ul>
                                            <?php foreach ($categoria as $c): ?>
                                                <li>

                                                    <a href="<?php echo base_url('modelo/mostrarModelos/') . $c->ID_CATEGORIA; ?>">
                                                        <?php echo $c->NOME; ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?php foreach ($tipo as $t): ?>
                                <li class="dropdown mega-dropdown active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $t->NOME; ?>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                        <div class="w3ls_vegetables">
                                            <ul>
                                                <?php foreach ($sub as $s): ?>
                                                    <li>
                                                        <?php if ($t->ID_MATERIA_PRIMA_TIPO == $s->ID_MATERIA_PRIMA_TIPO) { ?>
                                                            <a href="<?php echo base_url('materia_prima/mostrarMateria/') . $s->ID_SUB_MPT; ?>">
                                                                <?php echo $s->NOME; ?>
                                                            </a>
                                                        <?php } ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <!--            <div class="clearfix"></div>-->
        </div>
        <!--senha-->
        <div class="modal fade" id="senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alterar senha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <legend id="legenda">Alterar senha de acesso</legend>
                        <?php echo form_open('Cliente/alterarSenha') ?>
                        <div class="form-group">
                            <label for="cep" >Senha antiga</label>
                            <input type="password" class="form-control" name="senhaantiga" id="senhantiga" placeholder="******" required>
                        </div>
                        <div class="form-group">
                            <label for="cep" >Senha nova</label>
                            <input type="password" class="form-control" name="senhanova" id="senhanova" placeholder="******" required>
                        </div>
                        <div class="form-group">
                            <label for="cep" >Confirma a nova senha</label>
                            <input type="password" class="form-control" name="senhanova2" id="senhanova2" placeholder="******" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!--senha-->

        <!--endereco-->
        <div class="modal fade" id="endereco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Endereço</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="form-group">
                            <legend id="legenda">Alterar Endereço de Entrega</legend>
                            <div class="form-group">
                                <label for="cep" class="control-label required">CEP(*)</label>
                                <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP" required>
                            </div>
                            <div class="form-group">
                                <label for="estado" class="control-label required">Estado(*)</label>
                                <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" required>
                            </div>
                            <div class="form-group">
                                <label for="cidade" class="control-label required">Cidade(*)</label>
                                <input type="text"  class="form-control" name="cidade" id="cidade" placeholder="Cidade" required>
                            </div>
                            <div class="form-group">
                                <label for="bairro" class="control-label required">Bairro(*)</label>
                                <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required>
                            </div>
                            <div class="form-group">
                                <label for="rua" class="control-label required">Rua(*)</label>
                                <input type="text"  class="form-control" name="rua" id="rua" placeholder="Rua" required>
                            </div>
                            <div class="form-group">
                                <label for="numero" class="control-label required">Número(*)</label>
                                <input type="text" class="form-control" name="numero" id="numero" placeholder="Número" required>
                            </div>
                            <div class="form-group">
                                <label for="complemento" class="control-label required">Complemento</label>
                                <input type="text" class="form-control" name="complemento" placeholder="Complemento">
                            </div>
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--endereco-->
    </body>

</html>