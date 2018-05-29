<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar Estampa</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Estampa/atualizar'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Titulo da Estampa</label>
                            <input class="form-control" placeholder="Titulo da estampa" name="estampa" required="true" value="<?php echo $estampa[0]->NOME; ?>">
                            <input type="hidden" name="ID_ESTAMPA" value="<?php echo $estampa[0]->ID_ESTAMPA; ?>">
                        </div>
                        <div class="form-group">
                            <label>Cor da estampa</label>
                            <select class="form-control" name="cor">
                                <option selected="true" disabled="disabled">Escola a cor</option>    
                                <?php foreach ($cor as $c): ?>
                                    <option value="<?php echo $c->ID_COR; ?>"><?php echo $c->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>

                    </div>
                    <?php form_close(); ?>
                </div>