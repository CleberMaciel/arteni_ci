<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Estampa</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Estampa/inserir'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome da Estampa</label>
                            <input class="form-control" placeholder="Texto aqui" name="estampa" required="true">
                            <input type="hidden" name="ativo" value="1">
                        </div>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>

                    </div>
                    <?php form_close(); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Estampa</th>
                                    <th>Estatus</th>
                                    <th>Editar</th>
                                    <th>Ativar/Desativar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($estampa as $e): ?>
                                        <td><?php echo $e->NOME; ?> </td>
                                        <td><?php
                                            if ($e->ID_ATIVO == 1) {
                                                echo "Ativo";
                                            } else {
                                                echo "Inativo";
                                            }
                                            ?> </td>
                                        <td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url() . 'Estampa/ativo/' . $e->ID_ESTAMPA; ?>">Editar</a></td>       
                                        <?php
                                        if ($e->ID_ATIVO == 1) {
                                            ?>
                                            <td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url() . 'Estampa/inativo/' . $this->encryption->encrypt($e->ID_ESTAMPA); ?>">Desativar</a></td> 
                                            <?php
                                        } else {
                                            ?>
                                            <td><a class="btn btn-danger btn-sm" role="button" href="<?php echo base_url() . 'Estampa/ativo/' . $this->encryption->encrypt($e->ID_ESTAMPA); ?>">Ativar</a></td> 
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

