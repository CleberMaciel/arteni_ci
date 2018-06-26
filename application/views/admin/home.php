<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $materia_estoque; ?></div>
                            <div>Matérias-Primas</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>materia_prima">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Matérias-primas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $pedido; ?></div>
                            <div>Pedidos</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>Pedidos/listarPedidosCliente/">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Pedidos</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $materia; ?></div>
                            <div>Reposição de Estoque</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>materia_prima/relatorio/">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--ultimos pedidos-->
    <div class="col-lg-12">
        <h1 class="page-header">Últimos Pedidos</h1>
    </div>


    <table id="pedidos" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>N° Pedido</th>
                <th>Data recebido</th>
                <th>Valor R$</th>
                <th>Status de Pagamento</th>
                <th>Rastreamento</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($pedidos as $p): ?>
                <tr>
                    <td class="invert"><a href="<?php echo base_url(); ?>pedidos/verPedido/<?php echo$p->ID_PEDIDOS; ?>"><?php echo $p->ID_PEDIDOS; ?></a></td>

                    <td><?php echo $p->DATA_F; ?></td>

                    <td>R$ <?php echo $p->VALOR_PEDIDO; ?></td>
                    <td><?php
                        if ($p->STATUS_VALIDO == 1) {
                            ?>
                            <span class = "badge badge-primary">Pago</span>
                            <?php
                        }
                        ?></td>
                    <td><?php echo $p->RASTREIO; ?></td>
                    <!-- Modal -->

                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>N° Pedido</th>
                <th>Data recebido</th>
                <th>Valor R$</th>
                <th>Status de Pagamento</th>
                <th>Rastreamento</th>

            </tr>
        </tfoot>
    </table>

</div>
<!-- /#page-wrapper -->
<script>
    $(document).ready(function () {
        $('#pedidos').DataTable();
    });
</script>