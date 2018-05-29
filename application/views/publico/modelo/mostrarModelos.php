<div class="w3l_banner_nav_right">
    <div class="w3ls_w3l_banner_nav_right_grid">
        <div class="w3ls_w3l_banner_nav_right_grid1">
            <?php foreach ($modelos as $m) : ?>
                <div class="col-md-3 w3ls_w3l_banner_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <!--<a href="<?php echo base_url() . 'modelo/detalhes/' . $mat->ID_MATERIA_PRIMA ?>"><img style="width:140px" src="<?php echo base_url(); ?>img/materia_prima/<?php echo $mat->IMAGEM; ?>" alt="<?php echo $mat->NOME; ?>" /></a>-->
                                            <p><?php echo $m->NOME; ?></p>

                                            <h4>R$<?php echo $m->VALOR; ?></h4>
                                        </div>
                                        <div class="snipcart-details">

                                            <fieldset>
                                            <a href="<?php echo base_url() . 'modelo/detalhes/' . $m->ID_MODELO;?>">Ver Detalhes</a>
                                            </fieldset>

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