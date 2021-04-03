<?php
$id_producto = $_REQUEST['id_producto'];
$productos = json_decode(file_get_contents('json/productos.json'), true);
$producto = $productos[$id_producto];
$titulo = 'KYZ - ' . $producto['modelo'];
include_once('inc/header.php');
include_once('fpdf/fpdf.php');
include_once('inc/con_db.php')
?>

<?php
$marcas = json_decode(file_get_contents('json/marcas.json'), true);
$comentarios = json_decode(file_get_contents('json/comentarios.json'), true);
?>

<div class="container py-5">
	<div class="row cardMainColor">
		<div class="card body bg-dark col-12 mt-5">
			<div class="container">
				<div class="row">
					<div class="col-8 py-5">
						<a href=<?php echo $producto["imagenMax"] ?> target="__blank">
							<img src=<?php echo $producto["imagenMax"] ?> class="card-img-top" alt=""></a>
					</div>
					<div class="col-4 m-auto py-3">
						<h2 class=""> <strong> <?php echo 'Modelo: ' . '<br>' . $producto["modelo"] ?> </strong> </h2>
						<h4><?php echo '<br>' . 'Marca: ' . $producto["marca"] ?></h4>
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

			<!-- GUARDADO EN JSON DE COMENTARIOS -->

			<?php
			if (isset($_REQUEST['email']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['califaicacion'])) {

				$email = $_REQUEST['email'];
				$comentario = $_REQUEST['descripcion'];
				$califaicacion = $_REQUEST['califaicacion'];
				$estado = 0;

				$sql = "INSERT INTO comentarios (id_comentario, fecha, id_producto, descripcion, calificaccion, email, aprobado) VALUES ('', '2020-04-02', '$id_producto', '$comentario', '$califaicacion', '$email', '$estado');";

				$submit = $connect->exec($sql);


				$fecha = date("Y-m-d");
				date_default_timezone_set("America/Argentina/Buenos_Aires");
				$comentarios[date($fecha)] = array(
					"fecha" => date('d-m-Y H:i:s'),
					"id_producto" => $id_producto,
					"descripcion" => $comentario,
					"califaicacion" => $califaicacion,
					"email" => $email,
					"aprobado" => $estado,
				);




				file_put_contents('json/comentarios.json', json_encode($comentarios));
			}
			?>
			<div class="container">
				<div class="text-center">
					<h2>Comentarios</h2>
					<br>
					<?php
					$query = "SELECT * FROM comentarios";
					$respuesta = $connect->query($query);

					die();
					if ($comentarios <= 0) {

						echo ';(';
					} else {

						if (count($comentarios) > 0) {
							arsort($comentarios);
							$contador = 0;

							foreach ($comentarios as $comentario) {
								if ($comentario["id_producto"] == $id_producto && $comentario['aprobado'] == 1) {
									$contador++;
									if ($contador == 4) break;

									$comentarioF = $comentario["califaicacion"];
									if ($comentarioF == 1) {
										$califaicacion = '★';
									} else if ($comentarioF == 2) {
										$califaicacion = '★★';
									} else if ($comentarioF == 3) {
										$califaicacion = '★★★';
									} else if ($comentarioF == 4) {
										$califaicacion = '★★★★';
									} else if ($comentarioF == 5) {
										$califaicacion = '★★★★★';
									}

									echo " <div class='card-body bg-secondary'>
					
						<h4> Comentario de: " . $comentario["email"] . "</h4>
						<p class='my-3'></p>
						
						<h5>" . $comentario["descripcion"] . "</h5>
						<p class='my-3'></p>
						
						<h4><strong>Valoración: </strong> " . $califaicacion . "</h4>
						<p class='my-3'></p>
						
						<p>" . $comentario["fecha"] . "</p>
						</div>";
									echo '<br>';
								}
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
$connect = null;
include_once('inc/footer.php');
?>