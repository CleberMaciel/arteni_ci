<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Adicionar Matéria-prima ao produto</h1>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Produto/salvarProdutoMateria'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Produto</label>
                            <select class="form-control" name="produto">
                                <option selected="true" disabled="disabled">Escolha o produto</option>    
                                <?php foreach ($produto as $p): ?>
                                    <option value="<?php echo $p->ID_PRODUTO_CRIACAO; ?>"><?php echo $p->NOME . " - "; ?><?php echo $p->DESCRICAO; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" href="javascript:void(0)" id="addSelect">
                                Adicionar Matéria-Prima
                            </a>
                        </div>
                        <div class="form-group" id="campoDinamico">
                        </div>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>
                    </div>
                    <?php form_close(); ?>
                </div>
            </div>




