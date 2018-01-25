
<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<script src="<?php echo base_url('assets/js/jquery.bootstrap-growl.min.js') ?>"></script>



<!--matéria-prima-cadastro-->
<?php
if ($this->session->flashdata('login_fail')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Usuario ou senha incorretos!", {
            ele: 'body', // which element to append to
            type: 'info', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
    </script>
<?php } ?>    
</body>
</html>