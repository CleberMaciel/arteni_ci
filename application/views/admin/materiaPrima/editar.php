<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar Matéria-Prima</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open_multipart('Materia_prima/atualizar'); ?> 
                    <input type="hidden" id="id" name="id" value="<?php echo $materia[0]->ID_MATERIA_PRIMA; ?>"/>
                    <div class="form-group">
                        <div class="form-group">

                            <label>Nome da matéria-prima</label>
                            <input class="form-control" placeholder="Texto aqui" name="nome" required="true" value="<?php echo $materia[0]->NOME; ?>">

                        </div>                    
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" placeholder="Descrição da matéria-prima" name="descricao" rows="3"><?php echo $materia[0]->DESCRICAO ?></textarea>

                        </div>
                        <div class="form-group">
                            <label>Imagem</label>
                            <img  class="form-control img-thumbnail"  style="width: 100px; height: 100px;" src="<?php echo base_url(); ?>img/materia_prima/<?php echo $materia[0]->IMAGEM; ?>">

                        </div>
                        <div class="form-group">

                            <input type="checkbox" name="img_check" onclick="document.getElementById('img_alterar').disabled = !this.checked;">
                            <label>Marque aqui caso queira alterar a imagem.</label>
                            <input type="file" name="img_alterar" id="img_alterar" disabled="disabled">
                        </div>
                        <div class="form-group">
                            <label>Quantidade adicionada</label>
                            <input class="form-control" placeholder="Quantidade" name="quantidade" required="true" type="number" value="<?php echo $materia[0]->QTD_TOTAL; ?>">                            
                        </div>     
                        <div class="form-group">
                            <label>Valor</label>
                            <input class="form-control" placeholder="Valor" name="valor" required="true" type="number" step="0.01" value="<?php echo $materia[0]->VALOR; ?>">                            
                        </div>     

                        <div class="form-group">
                            <label>Tipo da matéria-prima</label>
                            <select class="form-control" name="tipo">
                                <?php foreach ($tipo as $t): ?>
                                    <option value="<?php echo $t->ID_MATERIA_PRIMA_TIPO; ?>"><?php echo $t->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Estampa/Cor</label>
                            <select class="form-control" name="estampa">
                                <?php foreach ($estampa as $e): ?>
                                    <option value="<?php echo $e->ID_ESTAMPA; ?>"><?php echo $e->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>

                    </div>
                    <?php form_close(); ?>
                </div>