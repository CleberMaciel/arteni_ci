
<div class="w3l_banner_nav_right">
    <div class="checkout-right">
        <h3>Pedido Número: <?php echo $pedidos[0]->ID_PEDIDOS;?></h3>
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
    </div>
</div>