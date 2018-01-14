
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
    $('#informacoes').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="yes" allowtransparency="true" src="' + url + '"></iframe>');
    });
</script>

<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(function () {
        var scntDiv = $('#campoDinamico');
        $(document).on('click', '#addSelect', function () {
            $('<span>' +
                    '<div class="form-group">' +
                    '<label>Materia-Prima</label>' +
                    '<select class="form-control" name="materia_prima[]">' +
                    "<?php foreach ($materia as $m): ?>" +
                    '<option value="<?php echo $m->ID_MATERIA_PRIMA; ?>"><?php echo $m->NOME . "-" . $m->QTD_TOTAL; ?></option>' +
                    "<?php endforeach; ?>" +
                    '</select>' +
                    '</div>' +
                    '</select>' +
                    '<div class="form-group">' +
                    '<label>Unidades usadas de matéria-prima</label>' +
                    '<input class="form-control" placeholder="Unidades usadas de matéria-prima" name="quantidade[]" required="true" type="number">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<a class = "btn btn-danger" href="javascript:void(0)" id ="remSelect">' +
                    'Remover campo' +
                    '</a>' +
                    '<br>' +
                    '-----------------------------------------------------------' +
                    '</span>').appendTo(scntDiv);
            return false;
        });
        $(document).on('click', '#remSelect', function () {
            $(this).parents('span').remove();
            return false;
        });

    });
</script>

<!--matéria-prima-cadastro-->
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


    <!--matéria-prima-inativo-->
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

    <!--matéria-prima-ativo-->
<?php } else if ($this->session->flashdata('tipo_ativo_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Tipo de matéria-prima ativado!", {
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
<?php } else if ($this->session->flashdata('tipo_ativo_fail')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Erro ao ativar o tipo de matéria-prima!", {
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
<?php } else if ($this->session->flashdata('tipo_existe')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Tipo de matéria-prima já existe no banco de dados!", {
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
    <!--Estampa-->
<?php } else if ($this->session->flashdata('estampa_existe')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Está estampa já existe no banco de dados!", {
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
<?php } else if ($this->session->flashdata('estampa_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Estampa cadastrada!", {
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
<?php } else if ($this->session->flashdata('estampa_fail')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Erro ao cadastrar estampa!", {
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
<?php } else if ($this->session->flashdata('estampa_inativo_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Estampa desativada!", {
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
<?php } else if ($this->session->flashdata('estampa_ativo_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Estampa Ativada!", {
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
<?php } else if ($this->session->flashdata('prima_existe')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Matéria-prima existente!!", {
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
<?php } else if ($this->session->flashdata('prima_fail')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Erro ao cadastrar Matéria-Prima!!", {
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
<?php } else if ($this->session->flashdata('prima_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Matéria-Prima cadastrada!!", {
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
<?php } else if ($this->session->flashdata('prima_inativo_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Matéria-Prima desativada!!", {
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
<?php } else if ($this->session->flashdata('prima_ativo_ok')) {
    ?>
    <script type="text/javascript">
        $.bootstrapGrowl("Matéria-Prima ativada!!", {
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

<?php } ?>    
</body>
</html>