<?php
$contador = 0;
$contador1 = 0;
?>
<div class="w3l_banner_nav_right">
    <div class="checkout-right">
        <h4>Carrinho de Compras </h4>
        <!--<a class="btn btn-default btn-sm" role="button" href="#">Atualizar Quantidades</a>-->

        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>Item</th>	
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Nome do Produto</th>
                    <th>Valor unitario</th>
                    <th>Subtotal</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                <tr class="rem1">
                    <?php
                    echo form_open('checkout/atualizar');
                    $quantidade = 1;
                    foreach ($this->cart->contents() as $item) :
                        ?>
                        <?php
                        echo form_hidden($quantidade . '[rowid]', $item['rowid']);
                        $contador1 = $contador++
                        ?>    
                        <td class="invert"><?php echo $contador; ?></td>
                        <td class="invert-image"><a href="single.html"><img src="<?php echo base_url(); ?>img/materia_prima/<?php echo $item['foto']; ?>" alt=" " class="img-responsive"></a></td>
                        <td class="invert">
                            <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <!--<div class="entry value-minus">&nbsp;</div>-->


                                    <div class=""><span><?php echo form_input(array("name" => $quantidade . "[qty]", "value" => $item['qty'])); ?></span></div>
                                    <?php $quantidade++; ?>
                                    <!--<div class="entry value-plus active">&nbsp;</div>-->
                                </div>
                            </div>
                        </td>
                        <td class="invert"><?php echo $item['name']; ?></td>

                        <td class="invert">R$ <?php
                            echo number_format($item['price'], 2, ",", ".");
                            ;
                            ?></td>
                        <td class="invert">R$ <?php
                            $valor_item = $item['price'];
                            $total_item = $valor_item * $item['qty'];
                            echo number_format($total_item, 2, ",", ".");
                            ;
                            ?></td>
                        <td class="invert">
                            <div class="rem">
                                <div class="">
                                    <strong><a href="<?php echo base_url() . 'Checkout/remover/' . $item['rowid']; ?>">Remover</a></strong>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody></table>
        <strong>Total</strong>:R$ <?php echo number_format($this->cart->total(), 2, ",", "."); ?>

        <div class="clearfix"> </div>
        <button type="submit" class="btn btn-default btn-sm">Atualizar Quantidades</button>
        <?php echo form_close(); ?>
        <div class="checkout-right-basket">
            <?php echo $botao; ?>

        </div>
    </div>

    <div class="checkout-left">	
        <div class="col-md-8 address_form_agile">
            <div class="checkout-right-basket">
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="clearfix"> </div>

<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<!--quantity-->
<script>
    $('.value-plus').on('click', function () {
        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
        divUpd.text(newVal);
    });

    $('.value-minus').on('click', function () {
        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
        if (newVal >= 1)
            divUpd.text(newVal);
    });
</script>
<!--quantity-->
<script>$(document).ready(function (c) {
        $('.close1').on('click', function (c) {
            $('.rem1').fadeOut('slow', function (c) {
                $('.rem1').remove();
            });
        });
    });
</script>
<script>$(document).ready(function (c) {
        $('.close2').on('click', function (c) {
            $('.rem2').fadeOut('slow', function (c) {
                $('.rem2').remove();
            });
        });
    });
</script>
<script>$(document).ready(function (c) {
        $('.close3').on('click', function (c) {
            $('.rem3').fadeOut('slow', function (c) {
                $('.rem3').remove();
            });
        });
    });
</script>

<!-- //js -->
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function () {
        var navoffeset = $(".agileits_header").offset().top;
        $(window).scroll(function () {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".agileits_header").addClass("fixed");
            } else {
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<!-- //script-for sticky-nav -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url('assets/js/move-top.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/easing.js') ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
        );
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //here ends scrolling icon -->
<script src="<?php echo base_url('assets/js/minicart.js') ?>"></script>
<script>
    paypal.minicart.render();

    paypal.minicart.cart.on('checkout', function (evt) {
        var items = this.items(),
                len = items.length,
                total = 0,
                i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });

</script>