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
                            <th>Nome</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th>Profundidade</th>
                            <th>Matéria-prima</th>
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Ativar/Desativar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <?php foreach ($produto as $p): ?>
                                <td><?php echo $p->CODIGO; ?> </td>
                                <td><?php echo $p->NOME; ?> </td>
                                <td><?php echo $p->ALTURA; ?> cm</td>
                                <td><?php echo $p->LARGURA; ?> cm</td>
                                <td><?php echo $p->PROFUNDIDADE; ?> cm</td>
                                <td> <a class="btn btn-success" href="#"><i class="fa fa-list-alt"></i> Ver</a></td>
                                <td><?php
                                    if ($p->ID_ATIVO == 1) {
                                        echo "Ativo";
                                    } else {
                                        echo "Inativo";
                                    }
                                    ?> </td>
                                <td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url() . 'Materia_tipo/ativo/' . $p->ID_PRODUTO_CRIACAO; ?>">Editar</a></td>       
                                <?php
                                if ($p->ID_ATIVO == 1) {
                                    ?>
                                    <td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url() . 'Materia_tipo/inativo/' . $p->ID_PRODUTO_CRIACAO; ?>">Desativar</a></td> 
                                    <?php
                                } else {
                                    ?>
                                    <td><a class="btn btn-danger btn-sm" role="button" href="<?php echo base_url() . 'Materia_tipo/ativo/' . $p->ID_PRODUTO_CRIACAO; ?>">Ativar</a></td> 
                                    <?php
                                }
                                ?>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
