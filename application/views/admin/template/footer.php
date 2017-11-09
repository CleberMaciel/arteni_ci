
<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets/js/metisMenu.min.js') ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets/js/dataTables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.bootstrap-growl.min.js') ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/js/startmin.js') ?>"></script>

<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

</script>
<?php
if ($this->session->flashdata('tipo_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Tipo de matéria-prima cadastrado!", {
            ele: 'body', // which element to append to
            type: 'success', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });</script>
<?php } else if ($this->session->flashdata('tipo_fail')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Erro ao cadastrar o tipo de matéria-prima!", {
            ele: 'body', // which element to append to
            type: 'error', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
    </script>
<?php } else if ($this->session->flashdata('tipo_inativo_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Tipo de matéria-prima desativado!", {
            ele: 'body', // which element to append to
            type: 'success', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
    </script> 
<?php } else if ($this->session->flashdata('tipo_inativo_fail')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Erro ao desativar o tipo de matéria-prima!", {
            ele: 'body', // which element to append to
            type: 'error', // (null, 'info', 'error', 'success')
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