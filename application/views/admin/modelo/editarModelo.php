<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Informaçẽs sobre modelo</h1>
            </div>
        </div>

        <div class="panel-body">
            <?php
            $id_modelo;
            echo "Nome do Produto:" . $modelo[0]->NOME;
            echo "<br>";
            echo "Categoria:" . $modelo[0]->CAT_NOME;
            echo "<br>";
            echo "Quantidade de tecido interno:" . $modelo[0]->QUANTIDADE_INTERNO;
            echo "<br>";
            echo "Quantidade de tecido externo:" . $modelo[0]->QUANTIDADE_EXTERNO;
            echo "<br>";
            echo "<br>";
            echo "Materias-primas pré-definidas:";
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Material</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Remover</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($modelo as $m) {
                        echo "<tr>";
                        $id_modelo = $m->ID_MODELO;

                        echo "<td>" . $m->SUB_NOME . "</td>";
                        echo "<td>" . $m->QUANTIDADE . "</td>";
                        echo "<td>" . "<a href = " . base_url() . 'Modelo/deletar/' . $m->ID_MODELO . "/" . $m->ID_MATERIA_PRIMA . ">Deletar</a>";
                        echo "<tr>";
                    }
                    ?>

