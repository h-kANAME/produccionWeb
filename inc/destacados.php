  <div class="container">
    <div class="row my-0">
   
          <?php
          foreach ($productos as $producto) {
            if ($producto["destacado"]) {
              echo "<div class='col'>

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