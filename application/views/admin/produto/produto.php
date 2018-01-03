<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Criação de Produto</h1>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Produto/inserir');?> 
                    <div class="form-group">
                        <div class="form-group">
                            <input type="hidden" name="ativo" value="1">
                            <label>Código</label>
                            <input class="form-control" placeholder="Código" name="codigo" required="true">
                        </div> 
                        <div class="form-group">                          
                            <label>Nome do produto</label>
                            <input class="form-control" placeholder="Nome do produto" name="nome" required="true">
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
                        <div class="form-group">
                            <label>Materia-Prima</label>
                            <select class="form-control" name="materia_prima">
                                <?php foreach ($materia as $m): ?>
                                    <option value="<?php echo $m->ID_MATERIA_PRIMA; ?>"><?php echo $m->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unidades usadas de matéria-prima</label>
                            <input class="form-control" placeholder="Unidades usadas de matéria-prima" name="quantidade" required="true" type="number">                            
                        </div>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>
                    </div>
                    <?php form_close(); ?>
                </div>
            </div>

