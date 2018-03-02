
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ArtêNí - Arte feita à mão!</title>
    </head>
    <body>
        <h2>ArtêNí - Arte feita à mão!</h2>
        <h3> Confirmação de cadastro. </h3>
        <p>Olá: <?php echo $NOME . " " . $SOBRENOME?>.<br> Muito obrigado por se cadastrar em nosso website.</p>
        <p>Para concluir seu cadastro e liberar sua conta para compras clique no link abaixo.</p>
        <p><a href="<?php echo base_url("cliente/confirmar/" . md5($EMAIL)) ?>">Confimar cadastro no website!</a></p>
        <h4>Seja bem vindo, e boas compras!<br>ArtêNí - Arte feita à mão. </h4>
    </body>
</html>