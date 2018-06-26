<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Categoria de modelos</h1>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Categoria_modelo/inserir'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome da Categoria</label>
                            <input class="form-control" placeholder="Nome da categoria" name="nome" required="true">
                        </div>

                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>
                    </div>
                    <?php form_close(); ?>
                </div>
                <!-- /.panel-heading -->
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                          
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($categoria as $cat): ?>
                                        <td><?php echo $cat->NOME; ?> </td>
<!--                                        <td><?php echo $medi->DESCRICAO; ?> </td>
                                        <td><a href="<?php echo base_url() . 'medida/editar/' . $medi->ID_MEDIDA; ?>">Editar</a></td>-->
                                    </tr>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
