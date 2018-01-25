<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lista de Produtos</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th>Profundidade</th>
                            <th>Matéria-prima</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">

                            <?php foreach ($produto as $p): ?>
                                <td><?php echo $p->CODIGO; ?> </td>
                                <td>Imagem </td>
                                <td><?php echo $p->NOME; ?> </td>
                                <td><?php echo $p->ALTURA; ?> cm</td>
                                <td><?php echo $p->LARGURA; ?> cm</td>
                                <td><?php echo $p->PROFUNDIDADE; ?> cm</td>
                                <td> <a id="informacoes" class="btn btn-success"  href="<?php echo base_url() . 'produto_listar/verInformacoes/' . $p->CODIGO; ?>"><i class="fa fa-list-alt"></i> Ver Informações</a>
                                <!--<td> <a data-toggle="modal" class="informacoes" href="localhost" data-target="#myModal">click me</a>-->

                                </td>


                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>




        <!--        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>                
                            </div>
                            <h3 id="myModalLabel">URL EXTERNA</h3>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->