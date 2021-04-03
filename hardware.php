<?php
$titulo = 'KYZ Technology - Hardware';
include_once('inc/header.php');
?>



		<div class="container">
			<div class="row">
				<?php
					include_once('inc/carrousel.php');
				?>
			</div>
		</div>
<!-- CosoOpen -->
<div class="container">
    <div class="row my-5">
					<?php
					include_once('inc/productos.php');
					$productos = json_decode(file_get_contents('json/productos.json'), true);

          foreach ($productos as $producto) {
            if ($producto["id_categoria"] == 1) {
              echo "<div class='col'>

						<div class='card' style='width: 17rem;'>
              <img src='" . $producto["imagen"] . "' class='card-img-top' alt=" . $producto["modelo"] . ">
              <div class='card-body'>
                <h5 class='card-title'>" . $producto["modelo"] . "</h5>
              </div>
             
                <h4 class='text-center'> $" . $producto["precio"] . " </h4>
              
            <div class='btn-group'>
							<a href='producto_modelo.php?id_producto=" . $producto["id_producto"] . "' class='btn btn-dark'>Detalles</a>
						</div>

            </div>
          </div>";
            }
          }
          ?>
    </div>
  </div>
<!-- Cosoclest -->

		<?php
			include_once('inc/footer.php');
		?>

		</html>