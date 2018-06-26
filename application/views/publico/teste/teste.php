<?php

if (isset($erro)) {
    echo $erro;
}
if (!isset($senha_alterada)) {
    echo "id_cliente" . $id_cliente;
    echo "<br>";
    echo "senha" . $senha;
    echo "<br>";
    echo "senha post " . $senha_post;
    echo "<br>";
    echo "senha nova" . $senha_nova;
    echo "<br>";
    echo "senha nova2 " . $senha_nova2;
} else {
    echo $senha_alterada;
}
