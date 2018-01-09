
<h1 class="page-header">Criação de Produto</h1>
</div>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">

            <div class="form-group">
                <div class="form-group">
                    <input type="hidden" name="ativo" value="1">
                    <label>Código</label>
                    <input class="form-control" placeholder="Código" name="codigo" required="true" value="<?php echo $informacoes[0]->CODIGO; ?>">
                </div> 
                <div class="form-group">                          
                    <label>Nome do produto</label>
                    <input class="form-control" placeholder="Nome do produto" name="nome" required="true" value="<?php echo $informacoes[0]->NOME; ?>">
                </div>                    
                <div class="form-group">
                    <label>Largura (cm)</label>
                    <input class="form-control" placeholder="Largura" name="largura" required="true" type="number" value="<?php echo $informacoes[0]->LARGURA; ?>">                            
                </div>
                <div class="form-group">
                    <label>Altura (cm)</label>
                    <input class="form-control" placeholder="Altura" name="altura" required="true" type="number" value="<?php echo $informacoes[0]->ALTURA; ?>">                            
                </div>
                <div class="form-group">
                    <label>Profundidade (cm)</label>
                    <input class="form-control" placeholder="Profundidade" name="profundidade" required="true" type="number" value="<?php echo $informacoes[0]->PROFUNDIDADE; ?>">                            
                </div>
            </div>
            <?php form_close(); ?>
        </div>
    </div>




