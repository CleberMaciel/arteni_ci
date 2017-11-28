<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Matéria-Prima</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open('Materia_tipo/inserir'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome da matéria-prima</label>
                            <input class="form-control" placeholder="Texto aqui" name="nome" required="true">
                            <input type="hidden" name="ativo" value="1">
                        </div>                    
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" placeholder="Descrição da matéria-prima" name="descricao" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Imagem</label>
                            <input type="file" name="img">
                        </div>
                        <div class="form-group">
                            <label>Quantidade adicionada</label>
                            <input class="form-control" placeholder="Quantidade" name="quantidade" required="true" type="number">                            
                        </div>     

                        <div class="form-group">
                            <label>Tipo da matéria-prima</label>
                            <select class="form-control" name="tipo">
                                <?php foreach ($tipo as $t): ?>
                                    <option value="<?php echo $t->ID_MATERIA_PRIMA_TIPO; ?>"><?php echo $t->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Estampa</label>
                            <select class="form-control" name="estampa">
                                <?php foreach ($estampa as $e): ?>
                                    <option value="<?php echo $e->ID_ESTAMPA; ?>"><?php echo $e->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>

                    </div>
                    <?php form_close(); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Tipo de Matéria-prima</th>
                                    <th>Estatus</th>
                                    <th>Editar</th>
                                    <th>Ativar/Desativar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($tipo as $t): ?>
                                        <td><?php echo $t->NOME; ?> </td>
                                        <td><?php
                                            if ($t->ATIVO_ID_ATIVO == 1) {
                                                echo "Ativo";
                                            } else {
                                                echo "Inativo";
                                            }
                                            ?> </td>
                                        <td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url() . 'Materia_tipo/ativo/' . $t->ID_MATERIA_PRIMA_TIPO; ?>">Editar</a></td>       
                                        <?php
                                        if ($t->ATIVO_ID_ATIVO == 1) {
                                            ?>
                                            <td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url() . 'Materia_tipo/inativo/' . $t->ID_MATERIA_PRIMA_TIPO; ?>">Desativar</a></td> 
                                            <?php
                                        } else {
                                            ?>
                                            <td><a class="btn btn-danger btn-sm" role="button" href="<?php echo base_url() . 'Materia_tipo/ativo/' . $t->ID_MATERIA_PRIMA_TIPO; ?>">Ativar</a></td> 
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

