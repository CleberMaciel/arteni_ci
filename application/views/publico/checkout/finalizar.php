
<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>" rel="stylesheet"> 

<title>ArtêNí - Simulação de Compra</title>

<label>
    Código da compra:#<?php echo $referencia; ?>
</label>
<br>
<div class="container">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->cart->contents() as $p) {
                    if (isset($p['id_materia'])) {
                        ?>
                        <tr>
                            <td><?php echo $p['id_materia'] ?></td>
                            <td><?php echo $p['name'] ?></td>
                            <td><?php echo $p['qty']; ?></td>
                            <td><?php echo number_format($p['price'], 2, ",", "."); ?></td>


                        </tr>
                    <?php } ?>
                    <?php if (isset($p['id_modelo'])) { ?>
                        <tr>
                            <td><?php echo $p['id_modelo']; ?></td>
                            <td><?php echo $p['name']; ?></td>
                            <td><?php echo $p['qty']; ?></td>
                            <td><?php echo $p['price']; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>