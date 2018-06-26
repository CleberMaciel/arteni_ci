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
                    <?php echo form_open('Materia_tipo/atualizar'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome do tipo da matéria-prima</label>
                            <input class="form-control" placeholder="Tipo de matéria-prima" name="tipo" required="true" value="<?php echo $model[0]->NOME; ?>">
                            <input type="hidden"name="id" value="<?php echo $model[0]->ID_MATERIA_PRIMA_TIPO; ?>">
                        </div>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>
                    </div>
                    <?php form_close(); ?>
                </div>
                <!-- /.panel-heading -->

