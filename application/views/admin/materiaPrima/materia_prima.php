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
                    <?php echo form_open_multipart('Materia_prima/inserir'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" name="externo">
                            <label class="form-check-label" for="exclusivo">Matéria-prima exclusiva para uso externo.</label>
                        </div>
                        <div class="form-group">
                            <label>Nome da matéria-prima</label>
                            <span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" title="Informar o nome da máteria-prima que irá ser cadastrada. Exemplo: Tricoline."></span>
                            <input class="form-control" placeholder="Nome da matéria-prima" name="nome" required="true">
                        </div>                    
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" placeholder="Descrição da matéria-prima" name="descricao" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Imagem (Tamanho máximo 2MB).</label>
                            <input type="file" name="img">
                        </div>
                        <div class="form-group">
                            <label>Quantidade adicionada</label>
                            <input class="form-control" placeholder="Quantidade" name="quantidade" required="true" type="number">                            
                        </div>
                        <div class="form-group">
                            <label>Quantidade do estoque minimo</label>
                            <input class="form-control" placeholder="Quantidade do estoque minimo" name="minimo" required="true" type="number">                            
                        </div>
                        <div class="form-group">
                            <label>Valor R$</label>
                            <input class="form-control" placeholder="Valor" name="valor" required="true" type="number" step="0.01">                            
                        </div>     

                        <div class="form-group">
                            <label>Cor da Matéria-prima</label>
                            <select class="form-control" name="cor">
                                <option selected="true" disabled="disabled">Escola a cor</option>    
                                <?php foreach ($cor as $c): ?>
                                    <option value="<?php echo $c->ID_COR; ?>"><?php echo $c->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Unidade de Medida</label>
                            <select class="form-control" name="medida" required="required">
                                <option value="">Escolha a medida</option>    
                                <?php foreach ($medida as $m): ?>
                                    <option value="<?php echo $m->ID_MEDIDA; ?>"><?php echo $m->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Categoria da matéria-prima</label>
                            <select class="form-control" name="sub" required="required">
                                <option value="">Escolha a Subcategoria</option>    
                                <option selected="true" disabled="disabled">Escola a categoria</option>    
                                <?php foreach ($sub as $s): ?>
                                    <option value="<?php echo $s->ID_SUB_MPT; ?>"><?php echo $s->NOMET . " - "; ?><?php echo $s->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Estampa</label>
                            <select class="form-control" name="estampa" required="required">
                                <option value="">Escolha o tipo de estampa</option>    
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
                        <table class="table table-striped table-bordered  table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Matéria-prima</th>
                                    <th>Img.</th>
                                    <th>Quantidade Disp.</th>
                                    <th>Valor.</th>
                                    <th>Data adicionada</th>
                                    <th>Funções</th>
                                    <th>Venda</th>
                                    <th>Estatus Visualização</th>
                                    <th>Visualização</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($materia as $m): ?>
                                        <td><?php echo $m->NOME; ?> </td>
                                        <td> <img  class="img-thumbnail"  style="width: 100px;" src="<?php echo base_url(); ?>img/materia_prima/<?php echo $m->IMAGEM; ?>"></td>

                                        <td><?php echo $m->QTD_TOTAL; ?> </td>
                                        <td>R$ <?php echo $m->VALOR; ?> </td>
                                        <td><?php echo date_format(new DateTime($m->DATA_ADICIONADO), 'd/m/Y'); ?> </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    <i class="fa fa-gear"></i> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <!--<li><a href=" href="<?php echo base_url() . 'Materia_prima/editarImg/' . $m->ID_MATERIA_PRIMA ?>">Alterar Imagem</a>-->
                                                    <li><a href="<?php echo base_url() . 'Materia_prima/editar/' . $m->ID_MATERIA_PRIMA ?>">Editar</a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </td>
                                        <?php
                                        if ($m->STATUS_VENDA == 1) {
                                            ?>
                                            <td><a class="btn btn-danger btn-sm" role="button" href="<?php echo base_url() . 'Materia_prima/inativoVenda/' . $m->ID_MATERIA_PRIMA ?>">Desativar Venda</a></td> 
                                            <?php
                                        } else {
                                            ?>
                                            <td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url() . 'Materia_prima/ativoVenda/' . $m->ID_MATERIA_PRIMA ?>">Ativar Venda</a></td> 
                                            <?php
                                        }
                                        ?>
                                        <td><?php
                                            if ($m->STATUS_MP == 1) {
                                                ?> <span class="label label-success">Ativo</span><?php
                                            } else {
                                                ?> <span class="label label-danger">Inativo</span><?php
                                            }
                                            ?> </td>

                                        <?php
                                        if ($m->STATUS_MP == 1) {
                                            ?>
                                            <td><a class="btn btn-danger btn-sm" role="button" href="<?php echo base_url() . 'Materia_prima/inativo/' . $m->ID_MATERIA_PRIMA; ?>">Desativar</a></td> 
                                            <?php
                                        } else {
                                            ?>
                                            <td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url() . 'Materia_prima/ativo/' . $m->ID_MATERIA_PRIMA; ?>">Ativar</a></td> 
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



                <script>
                    $(document).ready(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>