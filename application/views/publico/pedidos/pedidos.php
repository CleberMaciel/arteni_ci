
<div class="w3l_banner_nav_right">
    <div class="checkout-right">
        <h4>Meus Pedidos</h4>
        <!--<a class="btn btn-default btn-sm" role="button" href="#">Atualizar Quantidades</a>-->

        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>Codigo</th>	
                    <th>Subtotal da Compra</th>

                    <th>Data da Compra</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="rem1">
                    <?php
                    foreach ($pedidos as $p):
                        ?>
                        <td class="invert"><a href="<?php echo base_url() . 'Pedidos/verItensPedidos/' . $p->ID_PEDIDOS; ?>"><?php echo $p->ID_PEDIDOS; ?></a></td>
                        <td class="invert">R$ <?php echo number_format($p->VALOR_PEDIDO, 2, ",", "."); ?></td>
                        <td class="invert"><?php echo date("d/m/Y", strtotime($p->DATA)); ?></td>

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

            </tbody></table>


        <div class="clearfix"> </div>

    </div>
</div>

<div class="checkout-left">	
    <div class="col-md-8 address_form_agile">
        <div class="checkout-right-basket">
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
</div>
<div class="clearfix"> </div>
<div class="clearfix"> </div>

