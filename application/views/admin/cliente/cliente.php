<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Clientes</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Status</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($cliente as $c): ?>
                                        <td><?php echo $c->ID_CLIENTE; ?> </td>
                                        <td><?php echo $c->NOME; ?> </td>
                                        <td><?php echo $c->SOBRENOME; ?> </td>
                                        <td><?php echo $c->EMAIL; ?> </td>
                                        <td><?php echo $c->TELEFONE; ?> </td>




                                        <td><?php
                                            if ($c->STATUS == 1) {
                                                ?> <span class="label label-success">Verificado</span><?php
                                            } else {
                                                ?> <span class="label label-danger">Não Verificado</span><?php
                                            }
                                            ?> </td>
                                    </tr>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

