<?php
$id_producto = $_REQUEST['id_producto'];
include_once('inc/con_db.php');

$query = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
$respuesta = $connect->query($query);

if ($respuesta) {
	foreach ($respuesta as $producto) {
		$imagenMax = $producto['imagen_max'];
		$id_marca = $producto['id_marca'];
	}

	$query = "SELECT * FROM marcas WHERE id_marca = '$id_marca' ";
	$respuesta = $connect->query($query);
	if ($respuesta) {
		foreach ($respuesta as $rowMarcas) {
			$marca = $rowMarcas['nombre'];
		}
	}
}
$titulo = 'KYZ - ' . $producto['modelo'];
include_once('inc/header.php');
include_once('fpdf/fpdf.php');
$fechaActual = getdate();
?>

<div class="container py-5">
	<div class="row cardMainColor">
		<div class="card body bg-dark col-12 mt-5">
			<div class="container">
				<div class="row">
					<div class="col-8 py-5">
						<a href=<?php echo $producto["imagen_max"] ?> target="_blank">
							<img src=<?php echo $producto["imagen_max"] ?> class="card-img-top" alt=""></a>
					</div>
					<div class="col-4 m-auto py-3">
						<h2 class=""> <strong> <?php echo 'Modelo: ' . '<br>' . $producto["modelo"] ?> </strong> </h2>
						<h4><?php echo '<br>' . 'Marca: ' . $marca ?></h4>
						<h5><?php echo '<br>' . 'Descripcion: ' . '<br>' . $producto["descripcion"] ?></h5>
						<h4 class="my-5"> ARS: <strong>$<?php echo $producto["precio"] ?> </strong> </h4>

						<form name="form" method="POST" action="pdf.php">
							<div class="">
								<a href="pdf.php?id_producto=<?php echo $producto["id_producto"] ?>" target="_blank" type="submit" class="btn btn-success">Ficha Técnica</a>
							</div>
						</form>

					</div>
				</div>
				<div class="row">
					<div class="col">
						<form name="form" method="POST" action="">
							<div class="form-group">
								<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Tu email" required>
								<br>
							</div>
							<textarea class="form-control" name="descripcion" rows="6" placeholder="Tu comentario..." required></textarea>
							<label class="my-3" for="">¿Que valoracion le daria a este producto?</label>
							<div class="form-group ">
								<select name="califaicacion">
									<option value="1">★</option>
									<option value="2">★★</option>
									<option value="3">★★★</option>
									<option value="4">★★★★</option>
									<option value="5">★★★★★</option>
								</select>
							</div>
							<button type="submit" name="comentar" class="btn btn-success">Comentar</button>
						</form>
					</div>
				</div><!-- /row -->
			</div><!-- /container -->

			<?php
			if (isset($_REQUEST['email']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['califaicacion'])) {
				$fecha = date('Y-m-d');
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$email = $_REQUEST['email'];
				$comentario = $_REQUEST['descripcion'];
				$califaicacion = $_REQUEST['califaicacion'];
				$ipActual = 124; //$_SERVER['REMOTE_ADDR'];
				$estado = 0;

				$query = "SELECT * FROM comentarios WHERE ip = '$ipActual' AND fecha = '$fecha'";
				$consulta = $connect->query($query);

				foreach ($consulta as $row) {
				}

				if (isset($row)) {
					echo 'Usted no puede realizar mas de un comentario por dia';
				} else {

					$sql = "INSERT INTO comentarios (id_comentario, fecha, ip, id_producto, descripcion, calificacion, email, aprobado) VALUES (NULL, '$fecha', $ipActual, '$id_producto', '$comentario', '$califaicacion', '$email', '$estado');";
					$submit = $connect->exec($sql);

					echo 'Comentario enviado, aguarda aprobacion del administrador';

					if ($submit) {
						echo '<br>';
						echo $fecha;
					} else {
						echo 'Rompe';
					}
				}
			}
			?>

			<div class="container">
				<div class="text-center">
					<h2>Comentarios</h2>
					<?php

					$query = "SELECT * FROM comentarios ORDER BY fecha DESC";
					$resultado = $connect->query($query);
					if ($resultado) {
						foreach ($resultado as $row) {

							if ($row['aprobado'] > 0 && $id_producto == $row['id_producto']) {

								$comentarioF = $row["calificacion"];
								if ($comentarioF == 1) {
									$calificacion = '★';
								} else if ($comentarioF == 2) {
									$calificacion = '★★';
								} else if ($comentarioF == 3) {
									$calificacion = '★★★';
								} else if ($comentarioF == 4) {
									$calificacion = '★★★★';
								} else if ($comentarioF == 5) {
									$calificacion = '★★★★★';
								}

								echo " <div class='card-body bg-secondary'>
							<h4> Comentario de: " . $row["email"] . "</h4>
							<p class='my-3'></p>
							
							<h5>" . $row["descripcion"] . "</h5>
							<p class='my-3'></p>
							
							<h4><strong>Valoración: </strong> " . $calificacion . "</h4>
							<p class='my-3'></p>
							
							<p>" . $row["fecha"] . "</p>
							</div>";
								echo '<br>';
							}
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
//$connect = null;
include_once('inc/footer.php');
?>