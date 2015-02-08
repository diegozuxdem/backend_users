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
        <title>Usuarios Activos</title>
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
                <a class="navbar-brand" href="#">Administrador de Usuarios</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Inicio</a></li>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container theme-showcase" role="main">
    <div class="jumbotron">
        <h1>Usuarios Activos</h1>
        <p>Bienvenidos al panel de administración de usuarios</p>
        <p>
            <?php include "update_user.html";?>
            <?php include "delete_user.html";?>
        </p>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>EMAIL</th>
            </tr>
        </thead>
        <tbody>
    <?php
    foreach ($data as  $index => $row) {

        ?><tr><?php
        foreach ($row as $valor){
            ?><td><?php echo($valor); ?></td><?php
        }
        ?><tr><?php
    }

?>     </tbody>
    </table>
    </div>
</body>
</html>
<?