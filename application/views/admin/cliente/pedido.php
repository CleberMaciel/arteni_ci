<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pedido - <?php echo $pedidos[0]->ID_PEDIDOS; ?></h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h3>Pedido Número: <?php echo $pedidos[0]->ID_PEDIDOS; ?></h3>
                    <strong>Rastreio</strong>: <?php echo $pedidos[0]->RASTREIO; ?>
                    <br>
                    <strong>Cliente</strong>: <?php echo $pedidos[0]->NOME; ?>
                    <br>
                    <strong>Endereço</strong>:<?php echo $pedidos[0]->RUA; ?>
                    <br>
                    <strong>Bairro</strong>: <?php echo $pedidos[0]->BAIRRO; ?>
                    <br>
                    <strong>Número</strong>: <?php echo $pedidos[0]->NUMERO; ?>
                    <br>
                    <strong>Data do Pedido</strong>: <?php echo date("d/m/Y", strtotime($pedidos[0]->DATA)); ?>
                    <br>

                    Produtos:
                    <br>


                    <?php
                    if (isset($materia)) {
                        foreach ($materia as $mat) {
                            echo "<strong>" . $mat->NOME . "</strong>";
                            echo "<br>";
                            echo "Quantidade:" . $mat->QUANTIDADE;
                            echo "<br>";
                        }
                    }

                    if (isset($modelo)) {
                        foreach ($modelo as $mod) {
                            echo "Código do modelo: <strong>" . $mod->ID_MODELO . "</strong>";
                            echo "<br>";
                            echo "<strong>" . $mod->NOME . "</strong>";
                            echo "<br>";
                            echo "Quantidade:" . $mod->QUANTIDADE;
                            echo "<br>";
                            echo "Tecido Interno:" . $mod->INTERNO;
                            echo "<br>";
                            echo "Tecido Externo:" . $mod->EXTERNO;
                            echo "<br>";
                        }
                    }
                    ?>
                    <strong>Total do Pedido: R$ </strong><?php echo $pedidos[0]->VALOR_PEDIDO; ?>
                    <br>
                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Atualizar Rastreio</button>
                </div>



                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Atualizar Rastreio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open('Pedidos/atualizarRastreio'); ?>
                                <input type="hidden" name="pedido" value="<?php echo $pedidos[0]->ID_PEDIDOS; ?>"
                                       <div class="form-group">
                                    <input class="form-control" type="text" placeholder="código de rastreio" name="codigo">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="sutmit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>




