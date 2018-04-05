<?php
$contador = 0;
$contador1 = 0;
?>
<div class="w3l_banner_nav_right">
    <div class="checkout-right">
        <h4>Carrinho de Compras </h4>
        <!--<a class="btn btn-default btn-sm" role="button" href="#">Atualizar Quantidades</a>-->

        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>Item</th>	
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Nome do Produto</th>
                    <th>Valor unitario</th>
                    <th>Subtotal</th>

                </tr>
            </thead>
            <tbody>
                <tr class="rem1">
                    <?php
                    echo form_open('');
                    $quantidade = 1;
                    foreach ($this->cart->contents() as $item) :
                        ?>
                        <?php
                        echo form_hidden($quantidade . '[rowid]', $item['rowid']);
                        $contador1 = $contador++
                        ?>    
                        <td class="invert"><?php echo $contador; ?></td>
                        <td class="invert-image"><a href="single.html"><img src="<?php echo base_url(); ?>img/materia_prima/<?php echo $item['foto']; ?>" alt=" " class="img-responsive"></a></td>
                        <td class="invert">
                            <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <!--<div class="entry value-minus">&nbsp;</div>-->
                                    <div class=""><span><?php echo form_input(array("name" => $quantidade . "[qty]", "value" => $item['qty'], "disabled" => true)); ?></span></div>
                                    <?php $quantidade++; ?>
                                    <!--<div class="entry value-plus active">&nbsp;</div>-->
                                </div>
                            </div>
                        </td>
                        <td class="invert"><?php echo $item['name']; ?></td>

                        <td class="invert">R$ <?php
                            echo number_format($item['price'], 2, ",", ".");
                            ;
                            ?></td>
                        <td class="invert">R$ <?php
                            $valor_item = $item['price'];
                            $total_item = $valor_item * $item['qty'];
                            echo number_format($total_item, 2, ",", ".");
                            ;
                            ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody></table>
        <strong>Total</strong>:R$ <?php echo number_format($this->cart->total(), 2, ",", "."); ?>

        <div class="clearfix"> </div>

        <?php echo form_close(); ?>
        <div class="checkout-right-basket">

            <?php echo $botao; ?>
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

