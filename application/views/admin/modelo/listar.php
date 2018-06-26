<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lista de Modelos</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome do Modelo</th>
                            <th>Venda</th>
                            <th>Informações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <?php foreach ($modelo as $m): ?>

                                <td><img  class="img-thumbnail"  style="width: 100px;" src="<?php echo base_url(); ?>img/materia_prima/<?php echo $m->IMAGEM; ?>"></td>
                                <td><?php echo $m->NOME; ?> </td>

                                <td><?php
                                    if ($m->STATUS_MODELO == 1) {
                                        ?><a class = "btn btn-danger btn-sm" role = "button" href = "<?php echo base_url() . 'Modelo/inativoVenda/' . $m->ID_MODELO; ?>">Desativar</a>
                                        <?php
                                    } else {
                                        ?><a class = "btn btn-success btn-sm" role = "button" href = "<?php echo base_url() . 'Modelo/ativoVenda/' . $m->ID_MODELO; ?>">Ativar</a>
                                        <?php
                                    }
                                    ?></td>
                                <td> <a id="informacoes" class="btn btn-success"  href="<?php echo base_url() . 'modelo/informacoes/' . $m->ID_MODELO; ?>"><i class="fa fa-list-alt"></i> Ver Informações</a></td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>




        <!--        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>                
                            </div>
                            <h3 id="myModalLabel">URL EXTERNA</h3>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->