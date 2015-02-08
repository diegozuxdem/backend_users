<?php
/**
 * Created by PhpStorm.
 * User: diegoamaya
 * Date: 2/5/15
 * Time: 11:18 PM
 */

include "classes/userAction.php";
include "config.php";

$connectDB = new userAction();
$objConnection = $connectDB->connect($serverName,$user,$password,$database);
$objResultQuery = $connectDB->query($usersTable,$objConnection);
$data = $connectDB->show_results($objResultQuery);


?>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bienvenido al módulo de usuarios</title>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Módulo de Usuarios</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" name ="auth" method="post" action="auth.php">
                        <div class="form-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Email" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" class="form-control" placeholder="Contraseña" autocomplete="off" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Entrar</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container">
            <h1>Bienvenido al módulo de usuarios</h1>
            <p>En este módulo podrá ingresar al sistema, registrar y administrar usuarios</p>
            <p>
                <a class="btn btn-primary btn-lg" href="login_user.php" role="button">Iniciar Sesión (Login)</a>
                <a class="btn btn-primary btn-lg" href="register.php" role="button">Registrarse</a>
                <a class="btn btn-primary btn-lg" href="manage_users.php" role="button">Administrar Usuarios</a>
                <h3>Web Services</h3>
                <a class="btn btn-primary btn-lg" href="login_user.php" role="button">Login</a>
                <a class="btn btn-primary btn-lg" href="create.php" role="button">Create</a>
                <a class="btn btn-primary btn-lg" href="update.php" role="button">Update</a>
                <a class="btn btn-primary btn-lg" href="delete.php" role="button">Delete</a>
                <a class="btn btn-primary btn-lg" href="list.php" role="button">List</a>

            </p>
        </div>
    </div>
    </body>
    </html>
<?php