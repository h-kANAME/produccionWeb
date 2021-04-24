<?php
$titulo = 'KYZ Technology - Inicio';
require_once('inc/header.php');
include_once('inc/con_db.php');
?>

<div class="container">
    <div class="row">
        <div class="col md-12 my-4 ">
            <?php
            include_once('inc/carrousel.php');
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php
            if (isset($_REQUEST['id_marca']))
                $id_marca = $_REQUEST['id_marca'];
            else $id_marca = array();

            if (isset($_REQUEST['id_categoria']))
                $id_categoria = $_REQUEST['id_categoria'];
            else $id_categoria = array();

            if (isset($_REQUEST['id_marca'])) $id_marca = $_REQUEST['id_marca'];
            else $id_marca = array();
            ?>

            <div class="card text-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marcas
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form class="dropdown" action="" method="GET">
                        <!-- Marcas -->
                        <ul class="list-group">
                            <?php
                            $query = "SELECT * FROM marcas WHERE estado_activo = 1";
                            $respuesta = $connect->query($query);

                            foreach ($respuesta as $marcasArray) {

                                if (in_array($marcasArray['id_marca'], $id_marca)) {
                                    $checkar = 'checked="chequed"';
                                } else $checkar = '';
                            ?>
                                <li class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <p> <?php
                                            echo '<input type="checkbox" class="form-check-input type="checkbox" onChange="this.form.submit()" name="id_marca[]" value = "' . $marcasArray['id_marca'] . '"' . $checkar . '>' . $marcasArray['nombre'];
                                            ?></p>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                </div>
                <!-- </form> Cierre de composicion de filtros -->
            </div>
        </div>

        <!-- Categorias -->
        <?php
        if (isset($_REQUEST['id_categoria']))
            $id_categoria = $_REQUEST['id_categoria'];
        else $id_categoria = array();

        if (isset($_REQUEST['id_categoria']))
            $id_categoria = $_REQUEST['id_categoria'];
        else $id_categoria = array();

        if (isset($_REQUEST['id_categoria'])) $id_categoria = $_REQUEST['id_categoria'];
        else $id_categoria = array();

        $query = "SELECT * FROM categorias WHERE estado_activo = 1";
        $respuesta = $connect->query($query);
        ?>

        <div class="col -md-4">
            <div class="card text-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="list-group">
                        <?php
                        foreach ($respuesta as $categoriasArray) {
                            if (in_array($categoriasArray['id_categoria'], $id_categoria)) {
                                $checkar = 'checked="chequed"';
                            } else $checkar = '';
                        ?>
                            <li class="dropdown-item">
                                <?php
                                echo '<input type="checkbox" class="form-check-input type="checkbox" onChange="this.form.submit()" name="id_categoria[]" value = "' . $categoriasArray['id_categoria'] . '"' . $checkar . '>' . $categoriasArray['nombre'];
                                ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ul> <!-- Cierro categorias -->
                </div>
            </div>
        </div>

        <!-- Sub Categorias -->
        <?php
        if (isset($_REQUEST['id_sub_categoria']))
            $id_sub_categoria = $_REQUEST['id_sub_categoria'];
        else $id_sub_categoria = array();

        if (isset($_REQUEST['id_sub_categoria'])) $id_sub_categoria = $_REQUEST['id_sub_categoria'];
        else $id_sub_categoria = array();

        $query = "SELECT * FROM sub_categorias";
        $respuesta = $connect->query($query);

        ?>

        <div class="col -md-4">
            <div class="card text-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Condicion
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="list-group">
                        <?php
                        foreach ($respuesta as $sub_categoriasArray) {

                            if (in_array($sub_categoriasArray['id_sub_categoria'], $id_sub_categoria)) {
                                $checkar = 'checked="chequed"';
                            } else $checkar = '';
                            if ($sub_categoriasArray > 1) {
                        ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <?php
                                        echo '<input type="checkbox" class="form-check-input type="checkbox" onChange="this.form.submit()" name="id_sub_categoria[]" value = "' . $sub_categoriasArray['id_sub_categoria'] . '"' . $checkar . '>' . $sub_categoriasArray['nombre'];
                                        ?>
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                </form>
                <!-- Sub Categorias -->
            </div>
        </div>

    </div> <!-- Cierro la row de los filtros -->

    <!-- Inicia destacados -->
    <div class="card text-center my-5">
        <div class="btn btn-primary">
            <h5 class="mb-0">Productos destacados</h5>
        </div>
    </div>

    <div class="container">
        <div class="col -md-9 my-3">
            <div class="card-deck">

                <?php
                $query = "SELECT * FROM productos WHERE destacado = 'true' AND estado_activo = 1";
                $resultadoProducto = $connect->query($query);

                foreach ($resultadoProducto as $row) {
                    if ($row["destacado"]) {
                ?>

                        <div class="card">
                            <img src="<?php echo $row["imagen"] ?>" class="card-img-top" alt="..." style="width: 5rem;">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['modelo'] ?></h5>
                                <p class="card-text"><?php echo 'ARS ' . $row['precio'] ?></p>
                            </div>
                            <a href="producto_modelo.php?id_producto=<?php echo $row["id_producto"] ?>" class="btn btn-primary">Detalles</a>
                        </div>

                    <?php } ?>
                <?php } ?>
            </div>

        </div>
    </div>
    <!-- Finaliza destacados -->

</div><!-- Cierra el container de los filtros -->


<div class="container my-5">
    <div class="row">
        <div class="col">

            <a href="inicio.php?columna=nombre&tipo=asc"><img src="img/Logos_Banners/orderAZ.jpg" alt="rowOrder" width="50" height="50"></a>
                        <span style="margin-left: 10px;"></span>
            <a href="inicio.php?columna=nombre&tipo=desc"><img src="img/Logos_Banners/orderZA.jpg" alt="rowOrder" width="50" height="50"></a>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        $orderBy = '';

        if (isset($_REQUEST['columna'])) {
            $orderBy = $_REQUEST['tipo'];
        }

        $query = "SELECT * FROM productos WHERE estado_activo = 1 ORDER BY modelo $orderBy";
        $resultado = $connect->query($query);

        foreach ($resultado as $a_producto) {
            if ((in_array($a_producto['id_marca'], $id_marca) || empty($id_marca)) &&
                ((in_array($a_producto['id_categoria'], $id_categoria) || empty($id_categoria)) &&
                    ((in_array($a_producto['id_sub_categoria'], $id_sub_categoria) || empty($id_sub_categoria))))
            ) {

                echo '<div class="col-md-4 card-body">';
                echo '<div class="card" style="width: 17rem;">';
                echo '<div class="card text-center">';

                echo '<img src="' . $a_producto['imagen'] . '" class="card-img-top"  alt="' . $a_producto['modelo'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $a_producto['modelo'] . '</h5>';

                echo '<h6 class="card-text">' . '$' . $a_producto['precio'] . '</h6>';
                echo '</div>'; //Cry

                echo '<div class="btn-group">';
                echo '<a href="producto_modelo.php?id_producto=' . $a_producto['id_producto'] . '" class="btn btn-dark">Detalles</a>';

                echo '</div>'; // Card body
                echo '</div>'; // Style width 20

                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>
</div>

</div>
<?php
require_once('inc/footer.php');
?>