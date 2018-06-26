<?php

echo "Olá " . $this->session->userdata('user_clientelogado')->NOME;
echo "<br>";
echo "Recebemos o seu pedido, e ele será separado para envio.";
echo "<br>";
echo "Número do pedido:" . $referencia;
echo "<br>";
echo "Item(s) do seu pedido:";
echo "<br>";
foreach ($this->cart->contents() as $p) {
    if (isset($p['id_materia'])) {
        echo "Nome da Materia prima:" . $p['name'];
        echo "<br>";
        echo "Quantidade:" . $p['qty'];
        echo "<br>";
        echo "------------------------------------------";
        echo "<br>";
        echo "------------------------------------------";
        echo "<br>";
    }

    if (isset($p['id_modelo'])) {
        echo "Nome o Modelo:" . $p['name'];
        echo "<br>";

        echo "ID_PERSONALIZADO:" . $p['id_modelo'];
        echo "<br>";

        echo "Modelo:" . $modelo;
        echo "<br>";

        echo "Matérias primas já definidas do modelo:";
        echo "<br>";
        foreach ($pre as $pp) {
            echo "[" . $pp->ID_MATERIA_PRIMA . "] - ";
            echo " Nome:" . $pp->NOME;
            echo "<br>";
            echo "Quantidade:" . $pp->QUANTIDADE;
            echo "<br>";
        }
    }

    echo "Valor do pedido:" . number_format($valor_total_frete, 2, ",", ".");
}
echo "<br>";
?>