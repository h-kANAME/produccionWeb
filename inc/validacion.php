<?php
include('con_db.php');
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
session_start();
$_SESSION['usuario'] = $usuario;

$query = "SELECT * FROM usuarios where usuario = '$usuario' and clave = '$clave';";
$resultado = $connect->query($query);

foreach ($resultado as $rows) {
}

if ($rows['usuario'] == $usuario) {
    header("location:../index2.php");
} else {
    //include ('../index.php');
?>
    <html>
    </head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/styles.css">
    </head>

    <body class="login">
        <main role="main" class="container my-auto">
            <div class="row">
                <div id="login" class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-12">
                    <div class="my-5">
                        <a href="index2.php"><img class="card-img-top" src="../img/Logos_Banners/logoKYZ.png" alt="" width="" height=""></a>
                        <div class="my-15"></div>
                        <form action="inc/validacion.php" method="post" class="my-5">
                            <p><input type="text" class="form-control" placeholder="Usuario" name="usuario"></p>
                            <p><input type="password" class="form-control" placeholder="Contraseña" name="clave"></p>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>

                            <div class="container">
                                <div class="row">
                                    <span class="card-body text-left"><a href="recuperar.php">Olvide mi Clave</a></span>
                                    <span class="card-body text-right"><a href="inc/cambiarClave.php">Cambiar Clave</a></span>
                                </div>
                            </div>

                        </form>
                        <p class="text-center mt-5 mb-3 text-muted">© 2021-2021</p>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <div class="container my-7">
        <div class="text-center shadow p-3 mb-5 bg-body rounded">
            <h3 class="text-danger">Datos de usuario INVALIDOS</h3>
        </div>
    </div>
<?php
}
?>
</html>