<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Criar Produto</h1>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Produto/inserir'); ?> 
                    <div class="form-group">
                        <label>Tipo de Produto</label>
                        <select class="form-control" name="custo">
                            <option selected="true" disabled="disabled">Escolha o tipo do produto</option>    

                            <?php foreach ($custo as $c): ?>
                                <option value="<?php echo $c->ID_CUSTO; ?>"><?php echo $c->DESCRICAO . " - Mão de Obra:"; ?><?php echo $c->VALOR; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nome do Produto</label>
                        <input class="form-control" placeholder="Nome do produto" name="nome" required="true" type="text">                            
                    </div>
                    <div class="form-group">
                        <label>Largura (cm)</label>
                        <input class="form-control" placeholder="Largura" name="largura" required="true" type="number">                            
                    </div>
                    <div class="form-group">
                        <label>Altura (cm)</label>
                        <input class="form-control" placeholder="Altura" name="altura" required="true" type="number">                            
                    </div>
                    <div class="form-group">
                        <label>Profundidade (cm)</label>
                        <input class="form-control" placeholder="Profundidade" name="profundidade" required="true" type="number">                            
                    </div>
                    <button type="submit" class="btn btn-default">Salvar</button>
                    <button type="reset" class="btn btn-default">Limpar campo</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>




