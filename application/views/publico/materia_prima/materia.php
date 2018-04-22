<div class="w3l_banner_nav_right">
    <div class="w3ls_w3l_banner_nav_right_grid">
        <div class="w3ls_w3l_banner_nav_right_grid1">
            <?php foreach ($materia as $mat) : ?>
                <div class="col-md-3 w3ls_w3l_banner_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="<?php echo base_url() . 'listar_materia/detalhes/' . $mat->ID_MATERIA_PRIMA ?>"><img style="width:140px" src="<?php echo base_url(); ?>img/materia_prima/<?php echo $mat->IMAGEM; ?>" alt="<?php echo $mat->NOME; ?>" /></a>
                                            <p><?php echo $mat->NOME; ?></p>
                                            <h4>R$<?php echo $mat->VALOR; ?></h4>
                                        </div>
                                        <div class="snipcart-details">
                                            <?php echo form_open("Checkout/adicionar"); ?>
                                            <fieldset>
                                                <input type="hidden" name="id" value="<?php echo $mat->ID_MATERIA_PRIMA; ?>" />
                                                <input type="hidden" name="descricao" value="<?php echo $mat->DESCRICAO; ?>" />
                                                <input type="hidden" name="nome" value="<?php echo $mat->NOME; ?>" />
                                                <input type="hidden" name="preco" value="<?php echo $mat->VALOR ?>" />
                                                <input type="hidden" name="foto" value="<?php echo $mat->IMAGEM; ?>" />
                                                <input type="hidden" name="quantidade" value="1" />
                                                <input type="submit" name="submit" value="Adicionar ao carrinho" class="button" />
                                            </fieldset>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="clearfix"> </div>
