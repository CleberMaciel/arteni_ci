<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tipo de Matéria-Prima</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Materia_tipo/inserir'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome do tipo da matéria-prima</label>
                            <input class="form-control" placeholder="Texto aqui" name="texto" required="true">
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
                                    <th>Tipo de Matéria-prima</th>
                                    <th>Estatus</th>
                                    <th>Editar</th>
                                    <th>Ativar/Desativar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($tipo as $t): ?>
                                    <td><?php echo $t->NOME; ?> </td>
                                    <td><?php if($t->ATIVO_ID_ATIVO == 1){echo "Ativo";}else{echo "Inativo";} ?> </td>
                                    <td>Link/Botão</td>
                                    <td>Link/Botão</td>
                                </tr>   
                                 <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

