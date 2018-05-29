<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar Cor</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('cor/atualizar'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome da cor</label>
                            <input class="form-control" placeholder="Nome da cor" name="cor" required="true" value="<?php echo $cor[0]->NOME; ?>">
                            <input name="ID_COR" type="hidden" value="<?php echo $cor[0]->ID_COR; ?>">
                        </div>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>
                    </div>
                    <?php form_close(); ?>
                </div>