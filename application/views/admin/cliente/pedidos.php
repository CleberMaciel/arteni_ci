<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pedidos</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Referencia</th>
                                    <th>Rastreamento</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>E-mail</th>
                                    <th>Status Compra</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php
                                    foreach ($pedidos as $p):
                                        ?>
                                        <td class="invert"><?php echo $p->ID_PEDIDOS; ?></td>
                                        <td class="invert"><?php echo $p->RASTREIO; ?></td>
                                        <td class="invert"><?php echo $p->NOME; ?></td>
                                        <td class="invert"><?php echo date("d/m/Y", strtotime($p->DATA)); ?></td>
                                        <td class="invert">R$ <?php echo number_format($p->VALOR_PEDIDO, 2, ",", "."); ?></td>
                                        <td class="invert"><?php echo $p->EMAIL; ?></td>
                                        <?php
                                        $status = $p->STATUS_COMPRA;
                                        if ($status == 1) {
                                            ?> <td class="invert">Aguardando Pagamento</td><?php
                                        } elseif ($status == 2) {
                                            ?> <td class="invert">Em analise</td><?php
                                        } elseif ($status == 3) {
                                            ?> <td class="invert">Pago</td><?php
                                        } elseif ($status == 4) {
                                            ?> <td class="invert">Disponivel</td><?php
                                        } elseif ($status == 5) {
                                            ?> <td class="invert">Em Disputa</td><?php
                                        } elseif ($status == 6) {
                                            ?> <td class="invert">Devolvido</td><?php
                                        } elseif ($status == 7) {
                                            ?> <td class="invert">Cancelado</td><?php
                                        } elseif ($status == 8) {
                                            ?> <td class="invert">Debitado</td><?php
                                        } elseif ($status == 9) {
                                            ?> <td class="invert">Retenção Temporaria</td><?php
                                        }
                                        ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

