<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lista de Modelos</h1>
            </div>
        </div>
        <?php
        $id_modelo;
        ?>
        <div class="panel-body">
            <?php
            foreach ($modelo as $m) {
                $id_modelo = $m->ID_MODELO;
                echo "<br>";
                echo "Nome:" . $m->NOME;
                echo "<br>";
                echo "Nome:" . $m->CAT_NOME;
                echo "<br>";
                echo "Materias-Primas:";
                echo "<br>";
                echo $m->SUB_NOME;
                echo "<br>";
                echo "Quantidade:" . $m->QUANTIDADE;
            }
            ?>

            <br>
            <br>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Modelo_tipo/inserir'); ?> 
                            <div class="form-group">
                                <label>Materia-Prima Tipo</label>
                                <input type="hidden" name="modelo" value="<?php echo $id_modelo; ?>">
                                <select class="form-control" name="materia_tipo" id="materia_tipo" aria-label="ngSelected demo">
                                    <?php foreach ($tipo as $t): ?>
                                        <option value="<?php echo $t->ID_MATERIA_PRIMA_TIPO; ?>"><?php echo $t->NOME; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Materia-Prima usada</label>
                                <select class="form-control" name="materia_prima" id="materia_prima" aria-label="ngSelected demo">
                                    <option value="" ></option>
                                    <?php foreach ($sub as $s): ?>
                                        <option value="<?php echo $s->ID_SUB_MPT; ?>"><?php echo $s->NOME; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unidades usadas</label>
                                <input class="form-control" placeholder="Unidades usadas de matéria-prima" name="quantidade" required="true" type="number">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-default">Salvar</button>
                            <button type="reset" class="btn btn-default">Limpar campo</button>
                        </div>
                        <?php form_close(); ?>
                    </div>
                </div>
            </div>
            <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

            <script type="text/javascript">
                var base_url = "<?php echo base_url() ?>";
                $(function () {
                    $('#materia_tipo').change(function () {
                        var materia_tipo = $('#materia_tipo').val();
                        $.post(base_url + 'index.php/ajax/Materia_sub/listarSubMateriaAjax', {
                            materia_tipo: materia_tipo
                        }, function (data) {
                            $('#materia_prima').html(data);
                            $('#materia_prima').removeAttr('disabled');
                        });
                    });
                });
            </script>



