<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Informaçẽs sobre modelo</h1>
            </div>
        </div>

        <div class="panel-body">
            <?php
            $id_modelo;
            echo "Nome do Produto:" . $modelo[0]->NOME;
            echo "<br>";
            echo "Categoria:" . $modelo[0]->CAT_NOME;
            echo "<br>";
            echo "Quantidade de tecido interno:" . $modelo[0]->QUANTIDADE_INTERNO;
            echo "<br>";
            echo "Quantidade de tecido externo:" . $modelo[0]->QUANTIDADE_EXTERNO;
            echo "<br>";
            echo "<br>";
            echo "Materias-primas pré-definidas:";


            foreach ($modelo as $m) {
                $id_modelo = $m->ID_MODELO;
                echo "<br>";
                echo "Material:" . $m->SUB_NOME;
                echo "<br>";
                echo "Quantidade:" . $m->QUANTIDADE;
            }
            ?>

            <br>
            <br>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Adicionar Matéria-prima
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Matéria-prima</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Modelo_materia/inserir'); ?> 
                            <div class="form-group">
                                <label>Materia-Prima usada</label>
                                <select class="form-control" name="sub" id="sub" aria-label="ngSelected demo">
                                    <option value="" ></option>
                                    <?php foreach ($sub as $s): ?>
                                        <option value="<?php echo $s->ID_SUB_MPT; ?>"><?php echo $s->NOME; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Materia-Prima</label>
                                <input type="hidden" name="modelo" value="<?php echo $id_modelo; ?>">
                                <select class="form-control" name="materia_prima" id="materia_prima" aria-label="ngSelected demo">
                                    <?php foreach ($materia as $t): ?>
                                        <option value="<?php echo $t->ID_MATERIA_PRIMA; ?>"><?php echo $t->NOME; ?></option>
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
                    $('#sub').change(function () {
                        var sub = $('#sub').val();
                        $.post(base_url + 'index.php/ajax/Materia_sub/listarSubMateria', {
                            sub: sub


                        }, function (data) {
                            $('#materia_prima').html(data);
                            $('#materia_prima').removeAttr('disabled');
                        });
                        console.log(materia_tipo);
                    });
                });
            </script>



