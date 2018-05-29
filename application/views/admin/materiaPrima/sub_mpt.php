<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Matéria-Prima - Subcategoria</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open_multipart('Materia_sub_mpt/inserir'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome da matéria-prima</label>
                            <input class="form-control" placeholder="Texto aqui" name="nome" required="true">
                            <input type="hidden" name="ativo" value="1">
                        </div>                    
                        <div class="form-group">
                            <label>Tipo da matéria-prima</label>
                            <select class="form-control" name="tipo">
                                    <option selected="true" disabled="disabled">Escolha o tipo</option>    
                                        <?php foreach ($tipo as $t): ?>
                                    <option value="<?php echo $t->ID_MATERIA_PRIMA_TIPO; ?>"><?php echo $t->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>

                    </div>
                    <?php form_close(); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered  table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>SubCategoria</th>
                                    <th>Tipo Materia-prima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($sub as $s): ?>
                                        <td><?php echo $s->NOME; ?> </td>


                                        <td><?php echo $s->NOMET; ?> </td>

                                    </tr>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>



