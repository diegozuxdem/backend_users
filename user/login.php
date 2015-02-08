<? session_start(); ?>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                <li class="active"><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="register.php">Registrarse</a></li>
                <li><a href="manage_users.php">Administrar Usuarios</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <p><span class="glyphicon glyphicon-log-in large" aria-hidden="true"></span> Bienvenidos, Ingrese sus datos para iniciar sesión.</p>
    </div>
</div>
<?
if (empty($username))

{
    ?>
    <div class="container">
        <form class="form-signin" name ="auth" method="post" action="auth.php">
            <h2 class="form-signin-heading">Ingrese sus datos</h2>
            <label for="username" class="sr-only">Correo</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Email" required autofocus>
            <label for="password" class="sr-only">Contraseña</label>
            <input type="password" id="password" class="form-control" placeholder="Contraseña" name="password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Recordarme
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>

<?
}
?>
</body>
</html>