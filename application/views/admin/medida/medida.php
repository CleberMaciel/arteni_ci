<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Medida</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Medida/inserir'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Medida</label>
                            <input class="form-control" placeholder="Medida" name="medida" required="true">
                            <input type="hidden" name="ativo" value="1">
                        </div>
                        <div class="form-group">
                            <label>Abreviatura</label>
                            <input class="form-control" placeholder="Medida abreviado" name="abreviado" required="true">
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
                                    <th>Medida</th>
                                    <th>Abreviatura</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($medida as $m): ?>
                                        <td><?php echo $m->NOME; ?> </td>
                                        <td><?php echo $m->ABREVIADO; ?> </td>

                                    </tr>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>