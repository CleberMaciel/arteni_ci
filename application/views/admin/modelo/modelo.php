<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Criar Modelo</h1>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_open_multipart('Modelo/inserir'); ?> 
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nome do Modelo</label>
                            <span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" title="Informar o nome da máteria-prima que irá ser cadastrada. Exemplo: Tricoline."></span>
                            <input class="form-control" placeholder="Nome do modelo criado" name="nome" required="true">
                        </div>                    
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" placeholder="Descrição do modelo" name="descricao" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Imagem (Tamanho máximo 2MB).</label>
                            <input type="file" name="img">
                        </div>
                        <div class="form-group">
                            <label>Valor da mão de obra</label>
                            <input class="form-control" placeholder="Valor" name="valor" required="true" type="number" step="0.01">                            
                        </div>     

                        <div class="form-group">
                            <label>Altura(cm)</label>
                            <input class="form-control" placeholder="Altura" name="altura" required="true" type="number" step="0.01">                            
                        </div>     

                        <div class="form-group">
                            <label>Largura(cm)</label>
                            <input class="form-control" placeholder="Largura" name="largura" required="true" type="number" step="0.01">                            
                        </div>     

                        <div class="form-group">
                            <label>Profundidade(cm)</label>
                            <input class="form-control" placeholder="Profundidade" name="profundidade" required="true" type="number" step="0.01">                            
                        </div>     

                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option selected="true" disabled="disabled">Escola a Categoria</option>    
                                <?php foreach ($categoria as $c): ?>
                                    <option value="<?php echo $c->ID_CATEGORIA; ?>"><?php echo $c->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Materia-Prima Tipo</label>
                            <select class="form-control" name="materia_tipo" id="materia_tipo">
                                <?php foreach ($tipo as $t): ?>
                                    <option value="<?php echo $t->ID_MATERIA_PRIMA_TIPO; ?>"><?php echo $t->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Materia-Prima usada</label>
                            <select class="form-control" name="materia_prima[]" id="materia_prima" aria-label="ngSelected">
                                option value="" ></option>
                                <?php foreach ($sub as $s): ?>
                                    <option value="<?php echo $s->ID_SUB_MPT; ?>"><?php echo $s->NOME; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unidades usadas</label>
                            <input class="form-control" placeholder="Unidades usadas de matéria-prima" name="quantidade[]" required="true" type="number">
                        </div>

                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="reset" class="btn btn-default">Limpar campo</button>

                    </div>
                    <?php form_close(); ?>
                </div>
                <!-- /.panel-heading -->
            </div>


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
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>


            <script>
                $(function () {
                    $('').change(function () {
                        var ID_MATERIA_PRIMA_TIPO = $('#materia_tipo').val();
                        alert(ID_MATERIA_PRIMA_TIPO);
                    });
                });
            </script>


