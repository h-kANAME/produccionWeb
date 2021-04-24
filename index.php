<?php
session_start();
?>

</head>
<!-- library -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles/styles.css">
</head>
<!-- library -->

<body class="login index">

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <a href="index.php"><img src="img/Logos_Banners/logoKYZ.png" alt="" width="422" height="102"></a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col -md-6">
                <div class="col-lg-8 offset-lg-2 col-md-12 offset-md-6 col-12">
                    <h1 class="text-white">Ingresar</h1>

                    <form action="inc/validacion.php" method="post" class="my-5">

                        <p><input type="text" class="form-control" placeholder="Usuario" name="usuario"></p>
                        <p><input type="password" class="form-control" placeholder="Contraseña" name="clave"></p>

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>

                        <div class="container">
                            <div class="row">
                                <span class="card-body text-left"><a href="#">Olvide mi Clave</a></span>
                                <span class="card-body text-right"><a href="#">Cambiar Clave</a></span>
                            </div>
                        </div>

                    </form>
                    <p class="text-center mt-5 mb-3 text-muted">© 2021-2021</p>

                </div>
            </div>
            <div class="col -md-6">
                <h1 class="text-white">Crear usuario</h1>
                <form action="altaUsuarios/altaUsuario.php" class="my-5" method="post">
                    <div class="form-group">
                        <input name="nombre" type="text" class="form-control" required placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <input name="apellido" type="text" class="form-control" required placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <input name="mail" type="mail" class="form-control" required placeholder="Correo electrónico">
                    </div>
                    <div class="form-group">
                        <input name="clave" type="password" class="form-control" required placeholder="Clave">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary" type="submit">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>