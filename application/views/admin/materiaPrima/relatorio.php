<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Relatorio Matéria-Prima</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">

                <table id="relamateria" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID
                                <span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" title="Informar o nome da máteria-prima que irá ser cadastrada. Exemplo: Tricoline."></span>
                            </th>
                            <th>Nome
                                <span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" title="Informar o nome da máteria-prima que irá ser cadastrada. Exemplo: Tricoline."></span>
                            </th>
                            <th>Estoque
                                <span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" title="Informar o nome da máteria-prima que irá ser cadastrada. Exemplo: Tricoline."></span>
                            </th>
                            <th>Data adicionado
                                <span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" title="Informar o nome da máteria-prima que irá ser cadastrada. Exemplo: Tricoline."></span>
                            </th>
                            <th>Atualizar Estoque
                                <span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" title="Informar o nome da máteria-prima que irá ser cadastrada. Exemplo: Tricoline."></span>
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($materia as $m): ?>
                            <tr>
                                <td><?php echo $m->ID_MATERIA_PRIMA; ?></td>
                                <td><?php echo $m->NOME; ?></td>

                                <td><?php echo $m->QTD_TOTAL; ?></td>
                                <td><?php echo date_format(new DateTime($m->DATA_ADICIONADO), 'd/m/Y'); ?></td>



                                <td><a href="<?php echo base_url() . 'Materia_prima/editar/' . $m->ID_MATERIA_PRIMA ?>">Atualizar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Estoque</th>
                            <th>Data adicionado</th>
                            <th>Atualizar Estoque</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <!-- /#page-wrapper -->
            <script>
                $(document).ready(function () {
                    $('#relamateria').DataTable();
                });
            </script>

            <script>
                $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>