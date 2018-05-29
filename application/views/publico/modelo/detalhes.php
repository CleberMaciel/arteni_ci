<div class="w3l_banner_nav_right">

    <!--<h5><?php echo $modelo[0]->NOME; ?></h5>-->
    <div class="agileinfo_single">
        imagem
        <!--        <div class="col-md-4 agileinfo_single_left">
                    <img id="example" src="<?php echo base_url(); ?>img/materia_prima/<?php echo $materia[0]->IMAGEM; ?>" alt=" " class="img-responsive" />
                </div>-->

    </div>

    <?php echo form_open("Checkout/adicionarModelo"); ?>
    <div class="w3agile_description" style="margin-left: 40px;">
        <p>Produto:<?php echo $modelo[0]->NOME; ?></p>
        <p>Descrição:<?php echo $modelo[0]->DESCRICAO; ?></p>
        <input type="hidden" name="idmodelo" value="<?php echo $modelo[0]->ID_MODELO; ?>">
        <input type="hidden" name="nome" value="<?php echo $modelo[0]->NOME; ?>">
        <p>ID_ MODELO:<?php echo $modelo[0]->ID_MODELO; ?></p>
        <p>Altura:<?php echo $modelo[0]->ALTURA; ?>cm</p>
        <p>Largura:<?php echo $modelo[0]->LARGURA; ?>cm</p>
        <p>Profundidade:<?php echo $modelo[0]->PROFUNDIDADE; ?>cm</p>
    </div>
    <div class="form-group">
        <label>matéria-prima Interno</label>
        <select class="form-control" name="materiaprima[]">
            <option selected="true" disabled="disabled">Escola a categoria</option>    
            <?php foreach ($materia as $mat): ?>
                <option value="<?php echo $mat->ID_MATERIA_PRIMA; ?>"><?php echo $mat->NOME; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>matéria-prima Externo</label>
        <select class="form-control" name="materiaprima[]">
            <option selected="true" disabled="disabled">Escola a categoria</option>    
            <<?php foreach ($materia as $mat): ?>
                <option value="<?php echo $mat->ID_MATERIA_PRIMA; ?>"><?php echo $mat->NOME; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="snipcart-thumb agileinfo_single_right_snipcart"style="margin-left: 40px;">
        <h4>R$<?php echo $modelo[0]->VALOR; ?></h4>
        
                <input type="hidden" name="preco" value="<?php echo $modelo[0]->VALOR; ?>">

        <input type="submit" name="submit" value="Adicionar ao carrinho" class="button" />

    </div>

    <?php echo form_close(); ?>
    <div class="snipcart-details agileinfo_single_right_details">

    </div>
</div>
<div class="clearfix"> </div>
</div>

<div class="clearfix"> </div>
