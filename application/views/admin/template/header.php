<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="Content-Language" content="pt-br">
        <title>ArtêNí - Painel Administrativo</title>

        <!-- Bootstrap Core CSS -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico" />
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<!--        <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-social.css') ?>" rel="stylesheet">-->


        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/bar/style.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/metisMenu.min.css') ?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url('assets/css/timeline.css') ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/css/startmin.css') ?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('assets/css/morris.css') ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url('assets/css/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url('assets/css/dataTables/dataTables.responsive.css') ?>" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src = "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>home">Arteni</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Top Navigation: Left Menu -->
                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="<?php echo base_url() ?>ecommerce"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <!-- Top Navigation: Right Menu -->
                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <!--                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                                                </a>-->
                        <!--                        <ul class="dropdown-menu dropdown-alerts">
                                                    <li>
                                                        <a href="#">
                                                            <div>
                                                                <i class="fa fa-comment fa-fw"></i> New Comment
                                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a class="text-center" href="#">
                                                            <strong>See All Alerts</strong>
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>-->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('userlogado')->NOME; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
<!--                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>-->
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>Painel/sair"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Sidebar -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">

                        <ul class="nav" id="side-menu">
                            <!--relatorios-->
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i>Relatórios<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>materia_prima/relatorio/"><i class="fa fa-list fa-fw"></i> Estoque Matéria-prima</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Pedidos/listarPedidosCliente/"><i class="fa fa-list fa-fw"></i> Pedidos </a>
                                    </li>
                                    <li>

                                    </li>
                                </ul>
                            </li>
                            <!--scan-->
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i>Clientes<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>Cliente/listarCliente/"><i class="fa fa-list fa-fw"></i> Ver Clientes</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Pedidos/listarPedidosCliente/"><i class="fa fa-list fa-fw"></i> Pedidos </a>
                                    </li>
                                    <li>

                                    </li>
                                </ul>
                            </li>

                            <!--cor-->
                            <li>
                                <a href="#"><i class="fa fa-plus-circle fa-fw"></i>Cores<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>cor">Adicionar cor</a>
                                    </li>
                                </ul>
                            </li>
                            <!--cor-->
                            <!--medida-->
                            <li>
                                <a href="#"><i class="fa fa-plus-circle fa-fw"></i>Medida<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>medida">Adicionar Medida</a>
                                    </li>

                                </ul>
                            </li>
                            <!--medida-->
                            <!--materia prima-->
                            <li>
                                <a href="#"><i class="fa fa-plus-circle fa-fw"></i>Matéria-Prima<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>materia_prima">Matéria-Prima</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>materia_tipo"> Tipo de Matéria-Prima</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>materia_sub_mpt">SubCategoria de Matéria-Prima</a>
                                    </li>
                                </ul>
                            </li>
                            <!--materia-prima-->

                            <!--estampa-->
                            <li>
                                <a href="#"><i class="fa fa-plus-circle fa-fw"></i>Estampa<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>estampa">Estampa</a>
                                    </li>
                                </ul>
                            </li>
                            <!--estampa-->
                            <!--produto-->
                            <li>
<!--                                <a href="#"><i class="fa fa-plus-circle fa-fw"></i>Produto<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>produto">Criar Produto</a>
                                        <a href="<?php echo base_url(); ?>produto/adicionarMateria">Adicionar Matéria-prima</a>
                                        <a href="<?php echo base_url(); ?>produto_listar">Listar Produtos</a>
                                    </li>
                                </ul>-->
                            </li>
                            <!--produto-->
                            <!--modelo-->
                            <li>
                                <a href="#"><i class="fa fa-plus-circle fa-fw"></i>Modelo<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>categoria_modelo">Categoria Modelo</a>
                                        <a href="<?php echo base_url(); ?>modelo">Criar Modelo</a>
                                        <a href="<?php echo base_url(); ?>modelo/listarModelosCriados">Adicionar Matéria</a>
                                        <a href="<?php echo base_url(); ?>modelo/listaModelos">Remover Matéria</a>
                                    </li>
                                </ul>
                            </li>
                            <!--modelo-->


                        </ul> <!---fim do sidbar --->

                    </div>
                </div>
            </nav>

        </div>
