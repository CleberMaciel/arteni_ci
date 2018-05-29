<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar Medida</h1>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Medida/atualizar'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome da Medida</label>
                            <input class="form-control" placeholder="Nome da cor" name="medida" required="true" value="<?php echo $medida[0]->NOME; ?>">
                            <input type="hidden" name="ID_MEDIDA" value="<?php echo $medida[0]->ID_MEDIDA; ?>">
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <input class="form-control" placeholder="Descrição" name="descricao" required="true" value="<?php echo $medida[0]->DESCRICAO; ?>">
                                   </div>

                                   <button type="submit" class="btn btn-default">Salvar</button>
                            <button type="reset" class="btn btn-default">Limpar campo</button>
                        </div>
                        <?php form_close(); ?>
                    </div>
                    <!-- /.panel-heading -->