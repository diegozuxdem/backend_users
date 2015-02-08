<? session_start(); ?>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Bienvenidos</title>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Iniciar Sesión</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li class="active"><a href="register.php">Registrarse</a></li>
                <li><a href="show_users.php">Administrar Usuarios</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <div class="container">
        <h1>Regístrese</h1>
        <p><span class="glyphicon glyphicon-cloud-upload large" aria-hidden="true"></span> Bienvenidos a la interfaz de registro de usuarios</p>
    </div>
</div>
<div class="container">
    <form class="form-signin" name="register" method="post" action="register.php">
        <label for="first_name" class="sr-only">Nombre</label>
        <input name="first_name" type="text" class="form-control" placeholder="Nombre" required autofocus>
        <label for="last_name" class="sr-only">Apellido</label>
        <input name="last_name" type="text" class="form-control" placeholder="Apellido" required autofocus>
        <label for="password" class="sr-only">Contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required autofocus>
        <label for="email" class="sr-only">Correo Electrónico</label>
        <input name="email" type="text" class="form-control" placeholder="Correo ELectrónico" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
    </form>
</div>
</body>
</html>