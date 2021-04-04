<?php
function Activo ($item_seleccionado){
echo strpos ($_SERVER['PHP_SELF'] , $item_seleccionado) ? 'active activo' : '';
}
?>

<!doctype html>
<html>

<head>

<title> <?php echo $titulo?> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- library -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/styles.css">
</head>

<header>
<nav class="navbar navbar-expand-md bg-dark ">
			<div class="container ml-6 px-5">
				<a class="navbar-brand text-white" href="index.php"><img src="img/Logos_Banners/logoKYZ.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
					aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse md-pt-4 mdx-5 lg-pt-1 sm-pt-5" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
						<li class="nav-item md-px-3">
							<a class="nav-link text-white <?php Activo('hardware.php')?>" href="hardware.php">Hardware</a>
						</li>
						<li class="nav-item md-px-3">
							<a class="nav-link text-white <?php Activo('software.php')?>" href="software.php">Software</a>
						</li>
						<li class="nav-item md-px-3">
							<a class="nav-link text-white <?php Activo('perifericos.php')?>" href="perifericos.php">Perifericos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white <?php Activo('contacto.php')?>" href="contacto.php">Contacto</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
</header>

<body class="index">