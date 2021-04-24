<?php
include_once ('../inc/con_db.php');
include_once ('inc/header.php');
?>

    <div class="text-center">
        <div class="">
            <div class="">
                <img src="../img/Logos_Banners/adm.png" alt="">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="card">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="">Coso</a></li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-footer">
                        Card footer
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <h4 class="card-header text-center bg-secondary text-white">Gestion de Productos</h4>
                    <form action="gestionProductos.php" method="post">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Edicion-Alta</th>
                                </tr>
                                <?php
                                $query = "SELECT * FROM productos ORDER BY 'ASC'";
                                $respuesta = $connect->query($query);

                                if ($respuesta) {
                                    foreach ($respuesta as $row) {
                                        //  $producto = $row['modelo'];
                                ?>

                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['id_producto'] ?></td>
                                    <td><?php echo $row['modelo'] ?></td>

                                    <td><button class="btn btn-success" name="productoID" value="<?php echo $row['id_producto'] ?>" type="submit">Administracion</button></td>
                                </tr>
                            </tbody>
                    <?php
                                    }
                                }
                    ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card">
            <h5 class="card-header text-center bg-secondary text-white">Gestion de Marcas</h5>
            <form class="">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Set-Activo</th>
                            <th scope="col">Set-Invactivo</th>
                        </tr>
                        <?php
                        $query = "SELECT* FROM marcas ORDER BY 'ASC'";
                        $respuesta = $connect->query($query);

                        if ($respuesta) {
                            foreach ($respuesta as $row) {
                        ?>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id_marca'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><button class="btn btn-success text-white">Activar</button></td>
                            <td><button class="btn btn-danger text-white">Desactivar</button></td>
                        </tr>
                    </tbody>
            <?php
                            }
                        }
            ?>
                </table>
            </form>
        </div>
    </div>

</body>