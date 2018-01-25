<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Informações sobre <?php echo $informacoes[0]->NOME; ?></h1>
            </div>
        </div>


        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">


                        <div class="form-group">

                            <label>Código</label>
                            <input class="form-control" placeholder="Código" name="codigo" required="true" value="<?php echo $informacoes[0]->CODIGO; ?>" disabled>
                        </div> 
                        <div class="form-group">                          
                            <label>Nome do produto</label>
                            <input class="form-control" placeholder="Nome do produto" name="nome" required="true" value="<?php echo $informacoes[0]->NOME; ?>" disabled>
                        </div>                    
                        <div class="form-group">
                            <label>Largura (cm)</label>
                            <input class="form-control" placeholder="Largura" name="largura" required="true" type="number" value="<?php echo $informacoes[0]->LARGURA; ?>"disabled>                            
                        </div>
                        <div class="form-group">
                            <label>Altura (cm)</label>
                            <input class="form-control" placeholder="Altura" name="altura" required="true" type="number" value="<?php echo $informacoes[0]->ALTURA; ?>"disabled>                            
                        </div>
                        <div class="form-group">
                            <label>Profundidade (cm)</label>
                            <input class="form-control" placeholder="Profundidade" name="profundidade" required="true" type="number" value="<?php echo $informacoes[0]->PROFUNDIDADE; ?>"disabled>                            
                        </div>
                        <div class="form-group">
                            <label>Matéria-Prima</label>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <?php foreach ($materia as $mat): ?>
                                        <td><?php echo $mat->NOME; ?> </td>
                                        <td><?php echo $mat->QUANTIDADE; ?> </td>
                                    </tr>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




