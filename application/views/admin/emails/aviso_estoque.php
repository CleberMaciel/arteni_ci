<?php

echo "Olá.";
echo "<br>";
echo "Seu estoque precisa de atenção.";
echo "<br>";
echo "Alguma(s) matéria(s)-prima(s) podem estar próximo do seu estoque minimo.";
echo "<br>";
echo "Isso significa que podem estar automaticamente fora de venda, verifique por gentileza o dashboard.";
echo "<br>";
foreach ($info as $d) {
    echo "Código: " . "<strong>" . $d->ID_MATERIA_PRIMA . "</strong>";
    echo "<br>";
    echo "Matéria-prima: " . "<strong>" . $d->NOME . "</strong>";
    echo "<br>";
    echo "Quantidade em estoque: " . "<strong>" . $d->QTD_TOTAL . "</strong>";
    echo "<br>";
}
echo "<br>";
echo "Este e-mail é automatico, gerado pelo sistema. Por favor não responda.";
