<?php

function mensagem($mensagem, $tipo) {
    $this->session->set_flashdata($mensagem, $tipo);
    ?>
    <script type = 'text/javascript'>

        $.bootstrapGrowl('<?php echo $mensagem; ?>', {
            ele: 'body', // which element to append to
            type: '<?php echo $tipo; ?>', // (null, 'info', 'error', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 250, // (integer, or 'auto')
            delay: 4000,
            allow_dismiss: true,
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
    </script>
    <?php
}
