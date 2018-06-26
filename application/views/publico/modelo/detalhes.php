<style>
    .data-thumbnail{
        width: 40px;
        height: 40px;
    }


</style>

<div class="w3l_banner_nav_right">
    <!--    <div class="agileinfo_single">
            <h5><?php echo $modelo[0]->NOME; ?></h5>
        </div>-->
    <div class="form-group">

        <div class="col-md-4 agileinfo_single_left">
            <img id="example" src="<?php echo base_url(); ?>img/materia_prima/<?php echo $modelo[0]->IMAGEM; ?>" alt=" " class="img-responsive" />
        </div>
    </div>
    <?php echo form_open("Checkout/adicionarModelo"); ?>
    <div class="w3agile_description" style="margin-left: 40px;">
        <div class="form-group">
            <p><h4>Produto:<?php echo $modelo[0]->NOME; ?></h4></p>
        </div>
        <div class="form-group">
            <p><h4>Descrição:<?php echo $modelo[0]->DESCRICAO; ?></h4></p>
        </div>
        <div class="form-group">
            <h4><input type="hidden" name="idmodelo" value="<?php echo $modelo[0]->ID_MODELO; ?>"></h4>
            <input type="hidden" name="foto" value="<?php echo $modelo[0]->IMAGEM; ?>">
        </div>
        <div class="form-group">
            <h4><input type="hidden" name="nome" value="<?php echo $modelo[0]->NOME; ?>"></h4>
        </div>
        <div class="form-group">
            <!--<p><h4>ID_ MODELO:<?php echo $modelo[0]->ID_MODELO; ?></h4></p>-->
        </div>
        <div class="form-group">
            <p><h4>Altura:<?php echo $modelo[0]->ALTURA; ?>cm</h4></p>
        </div>
        <div class="form-group">
            <p><h4>Largura:<?php echo $modelo[0]->LARGURA; ?>cm</h4></p>
        </div>
        <div class="form-group">
            <p><h4>Profundidade:<?php echo $modelo[0]->PROFUNDIDADE; ?>cm</h4></p>
        </div>
        <div class="form-group">
            <h4>R$<?php echo $modelo[0]->VALOR; ?></h4>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <a href="#" data-toggle="modal" data-target="#exampleModalLong"> Ver lista de tecidos Interno.</a>
        </div>
        <div class="form-group">
            <label>Matéria-prima Interno</label>
            <select required class="form-control" name="interno" >
                <option value="">Escolha o material interno</option>    
                <?php foreach ($interno as $inter): ?>
                    <option value="<?php echo $inter->ID_MATERIA_PRIMA; ?>"><?php echo $inter->NOME; ?></option>
                <?php endforeach; ?>
            </select>

        </div>
    </div>  
    <div class="col-md-4">
        <div class="form-group">
            <a href="#" data-toggle="modal" data-target="#exampleModalLong1">Ver lista de tecidos Externo.</a>
        </div>
        <div class="form-group">
            <label>Matéria-prima Externo</label>
            <select required class="form-control" name="externo" required="required">
                <option value="">Escolha o material externo</option>    
                <?php foreach ($externo as $exter): ?>
                    <option value="<?php echo $exter->ID_MATERIA_PRIMA; ?>"><?php echo $exter->NOME; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="snipcart-thumb agileinfo_single_right_snipcart"style="margin-left: 40px;">

        <input type="hidden" name="organizar" value="1" />
        <div class="form-group">
            <input type="hidden" name="preco" value="<?php echo $modelo[0]->VALOR; ?>">
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Adicionar ao carrinho" class="button" />

            </div>
        </div>

    </div>

    <?php echo form_close(); ?>
    <div class="snipcart-details agileinfo_single_right_details">

    </div>
</div>
<div class="clearfix"> </div>
</div>

<div class="clearfix"> </div>


<!--interno-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tecidos Internos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Imagem</th>
                            <th scope="col">Nome</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($interno as $inter): ?>
                            <tr>

                                <td><img  src="<?php echo base_url(); ?>img/materia_prima/<?php echo $inter->IMAGEM; ?>" class="img-thumbnail" width="150" height="150"/></td>
                                <td><?php echo $inter->NOME; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!--externo-->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tecidos Externos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Imagem</th>
                            <th scope="col">Nome</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($externo as $exter): ?>
                            <tr>

                                <td><img  src="<?php echo base_url(); ?>img/materia_prima/<?php echo $exter->IMAGEM; ?>" class="img-thumbnail" width="150" height="150"/></td>
                                <td><?php echo $exter->NOME; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>