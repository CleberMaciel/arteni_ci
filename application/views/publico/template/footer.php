<div class="clearfix"></div> 
<div class="clearfix"> </div>
<br>
<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-validation.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-select.js') ?>"></script>
<!--<script src="<?php echo base_url('assets/js/jquery.validate.min.js') ?>"></script>-->
<script src="<?php echo base_url('assets/js/cpf.js') ?>"></script>
<!--<script src="<?php echo base_url('assets/js/valida_form.js') ?>"></script>-->
<!--<script src="<?php echo base_url('assets/js/jquery.validate.unobtrusive.min.js') ?>"></script>-->


<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<script src="<?php echo base_url('assets/js/move-top.js') ?>"></script>
<script src="<?php echo base_url('assets/js/easing.js') ?>"></script>
<script src="<?php echo base_url('assets/js/minicart.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.mask.js') ?>"></script>
<script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets/js/metisMenu.min.js') ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets/js/dataTables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.bootstrap-growl.min.js') ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/js/startmin.js') ?>"></script> 



<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>



<script type="text/javascript">
    $(document).ready(function () {
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#cep').mask('00000-000', {reverse: true});


        $('#datanascimento').mask('00/00/0000', {reverse: true});
        $("#cep").blur(function () {
            $.getJSON("https://viacep.com.br/ws/" + $("#cep").val() + "/json", function (dados) {
                if (!("erro" in dados)) {
                    $("#rua").val(dados.logradouro);
                    $("#bairro").val(dados.bairro);
                    $("#cidade").val(dados.localidade);
                    $("#estado").val(dados.uf);
                    $("#numero").focus();
                } else {
                    alert("CEP não encontrado.");
                }
            });
        });
    });
</script>



<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
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


<!--<div class="container">

    <div class="newsletter">
        <div class="container">
                        <div class="w3agile_newsletter_left">
                            <h3>sign up for our newsletter</h3>
                        </div>
                        <div class="w3agile_newsletter_right">
                            <form action="#" method="post">
                                <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Email';
                                        }" required="">
                                <input type="submit" value="subscribe now">
                            </form>
                        </div>
            <div class="c<learfix"> </div>
        </div>
    </div>
</div>
 //newsletter -->

<!-- footer -->
<div class="footer">
    <div class="container">
        
            <div class="clearfix"> </div>
        </div>
        <div class="wthree_footer_copy">
            <p>© 2016 Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>
</div>

<!-- //footer -->
<!-- Bootstrap Core JavaScript -->

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

        if (total < 1) {
            alert('The minimum order quantity is 1. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });

</script>

<?php if ($this->session->flashdata('item_removido')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Item removido do carrinho.", {
            ele: 'body', // which element to append to
            type: 'success', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });

<?php }else if ($this->session->flashdata('item_add')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Item adicionado ao carrinho.", {
            ele: 'body', // which element to append to
            type: 'success', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
<?php }else if ($this->session->flashdata('quantidade_atualizada')) {
    ?>
    <script type="text/javascript">
            $.bootstrapGrowl("Quantidade atualizada.", {
            ele: 'body', // which element to append to
            type: 'success', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });

<?php }else if ($this->session->flashdata('senha_errada')) {
    ?>
    <script type="text/javascript">
            $.bootstrapGrowl("As senha não conferem.", {
            ele: 'body', // which element to append to
            type: 'danger', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });

</script>
<?php }else if ($this->session->flashdata('senha_alterada')) {
    ?>
    <script type="text/javascript">
            $.bootstrapGrowl("Senha alterada com sucesso.", {
            ele: 'body', // which element to append to
            type: 'success', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
<?php } ?>
</script>

</body>
</html>

