<?php
$titulo = 'KYZ Technology - Perifericos';
include_once ('inc/con_db.php');
include_once ('inc/header.php');
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
		$query = "SELECT * FROM productos WHERE id_categoria = 3";
		$resultado = $connect->query($query);

          foreach ($resultado as $producto) {
           
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
          
          ?>
    </div>
  </div>
<!-- Cosoclest -->

		<?php
			include_once('inc/footer.php');
		?>

		</html>