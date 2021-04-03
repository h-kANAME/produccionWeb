<div class="col -md-9 my-3">

        <div class="card text-center">
            <div class="btn btn-primary">
                <h5 class="mb-0">¡Productos destacados!</h5>
            </div>
        </div>

        <div class="card-group my-5">
            <div class="row">
                <?php
                foreach ($productos as $producto) {
                    if ($producto["destacado"]) {
                        echo "<div class='card md-3'>

                        <div class='card' style='width: 17rem;'>
                            <img src='" . $producto["imagen"] . "' class='card-img-top' alt=" . $producto["modelo"] . ">
                            <div class='card-body'>
                                <h5 class='card-title'>" . $producto["modelo"] . "</h5>
                            </div>
                            
                            <h4 class='text-center'> $" . $producto["precio"] . " </h4>
                            
                            <div class='btn-group'>
                                 <a href='producto_modelo.php?id_producto=" . $producto["id_producto"] . "' class='btn btn-primary'>Detalles</a>
                            </div>
                        </div>
                  </div>";
                    }
                }

                ?>

            </div>
    </div>
</div>





















        <?php
        foreach ($productos as $producto) {
            if ($producto["destacado"]) {
        ?>
                <div class="card-group">
                    <div class="row">

                        <div class="card" style="width: 17rem;">
                            <img src="<?php echo $producto["imagen"] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto["modelo"] ?></h5>
                                <p class="card-text"><?php echo $producto["precio"] ?></p>
                                <a href="producto_modelo.php?id_producto=<?php echo $producto["id_producto"] ?>" class="btn btn-primary">Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }

        ?>


*********************















<div class="card" style="width: 17rem;">
  <img src="<?php $producto["imagen"] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php $producto["modelo"]?></h5>
    <p class="card-text"><?php $producto["precio"]?></p>
    <a href="producto_modelo.php?id_producto=<?php $producto["id_producto"] ?>" class="btn btn-primary">Detalles</a>
  </div>
</div>











        <div class="card-group my-5">
            <div class="row">
                <?php
                foreach ($productos as $producto) {
                    if ($producto["destacado"]) {
                        echo "<div class='card md-3'>

                        <div class='card' style='width: 17rem;'>
                            <img src='" . $producto["imagen"] . "' class='card-img-top' alt=" . $producto["modelo"] . ">
                            <div class='card-body'>
                                <h5 class='card-title'>" . $producto["modelo"] . "</h5>
                            </div>
                            
                            <h4 class='text-center'> $" . $producto["precio"] . " </h4>
                            
                            <div class='btn-group'>
                                 <a href='producto_modelo.php?id_producto=" . $producto["id_producto"] . "' class='btn btn-primary'>Detalles</a>
                            </div>
                        </div>
                  </div>";
                    }
                }

                ?>

            </div>
        </div>













                    <div class="row">
                <?php
                foreach ($productos as $producto) {
                    if ($producto["destacado"]) {
                ?>
                        <div class="card-group">

                            <div class="card" style="width: 17rem;">

                                <img src="<?php echo $producto["imagen"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto["modelo"] ?></h5>
                                    <p class="card-text"><?php $producto["precio"] ?></p>
                                </div>
                                <a href="producto_modelo.php?id_producto=<?php echo $producto["id_producto"] ?>" class="btn btn-primary">Detalles</a>

                            </div>
                        <?php } ?>

                        </div>
                    <?php } ?>
            </div>

            ************************************************************************************************

            <div class="col -md-9 my-3">

        <div class="card text-center">
            <div class="btn btn-primary">
                <h5 class="mb-0">¡Productos destacados!</h5>
            </div>
        </div>

        <div class="card-group my-5">
            <div class="row">
                <?php
                foreach ($productos as $producto) {
                    if ($producto["destacado"]) {
                        echo "<div class='card md-3'>

                        <div class='card' style='width: 17rem;'>
                            <img src='" . $producto["imagen"] . "' class='card-img-top' alt=" . $producto["modelo"] . ">
                            <div class='card-body'>
                                <h5 class='card-title'>" . $producto["modelo"] . "</h5>
                            </div>
                            
                            <h4 class='text-center'> $" . $producto["precio"] . " </h4>
                            
                            <div class='btn-group'>
                                 <a href='producto_modelo.php?id_producto=" . $producto["id_producto"] . "' class='btn btn-primary'>Detalles</a>
                            </div>
                        </div>
                  </div>";
                    }
                }

                ?>

            </div>
    </div>
</div>







*el que anda*******



    <?php
    foreach ($productos as $producto) {
        if ($producto["destacado"]) {


    ?>



            <div class="col -md-9 my-3">
                <div class="card-group">

                    <div class="card">
                        <img src="<?php echo $producto["imagen"] ?>" style="width:12rem;" class="card-img-top" alt="...">
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>

                </div>


        <?php
        }
    }
        ?>
           ***** cierra el que anda****************












           ultimo se



                   <!-- a -->
        <?php
        foreach ($productos as $producto) {
            if ($producto["destacado"]) {


        ?>



                <div class="col -md-9 my-3">
                    <div class="">

                        <div class="card col -md-3">

                            <div class="card-body">
                                <img src="<?php echo $producto["imagen"] ?>" class="card-img-top" alt="...">

                                <div class="">
                                    <h5 class="card-title"><?php echo $producto['modelo'] ?></h5>
                                    <p class="card-text"><?php echo 'ARS ' . $producto['precio'] ?></p>
                                </div>

                            </div>



                        </div>


                    <?php
                } ?>
                    </div>
                <?php }
                ?>
                </div>
                <!-- b -->