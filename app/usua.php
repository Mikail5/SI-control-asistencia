<?php
	session_start();
	include('funciones.php');
	verificar_sesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inventario</title>
    <link rel="stylesheet" type="text/css" href="css/estada.css">
</head>
<body>
      <div class="barrapad">
        <div class="barra">
          <img class="logo" src="css/img/logo.png">
        </div>
        <div class="barra2">
          <input type="checkbox" id="bot-menu">
          <label for="bot-menu"><img class="menucon" src="css/img/menico.png"></label>
          <nav class="barraop">
            <a id="botones" href="instructor.php">Inicio</a>
            <a id="botones" href="asiste.php">Asistencias</a>
            <a id="botones" href="evin.php">Evidencia</a>
            <a id="botones" href="cerrar.php">Cerrar sesión</a>
          </nav>
        </div>
      </div>
      <div id="conpad">
        <div id="menop">
          <h2>Opciones</h2>
          <a id="botones2" href="regus.php">Registrar usuario</a>
          <a id="botones2" href="modus.php">Editar datos</a>
          <a id="botones2" href="conus.php">Buscar usuario</a>
          <a id="botones2" href="delus.php">Eliminar datos</a>
        </div>
          <div id="contener">
            <h3>Usuarios</h3>
            <?php
              include("connect.php");
              $r=mysqli_query($connect,"SELECT usu.*, usr.*, ur.* FROM usuarios AS usu INNER JOIN users AS usr ON usu.DocUsua=usr.IdUsua INNER JOIN users_roles AS ur ON usr.IdUser=ur.IdUser");
            echo"
              <table style=\"width:100%; background-color:#F2F3F4; border-collapse:collapse;\">
              <thead style=\"background-color:#EC7063; border-bottom:solid 5px #943126; color:white;\">
                <tr>
                  <td style=\"padding:10px;\">Doc. usuario</td>
                  <td style=\"padding:10px;\">Nomnbre</td>
                  <td style=\"padding:10px;\">Apellido</td>
                  <td style=\"padding:10px;\">Telefono</td>
                  <td style=\"padding:10px;\">Correo electrónico</td>
                  <td style=\"padding:10px;\">Rol</td>
                  <td style=\"padding:10px;\">Contraseña</td>
                </tr>";
            while($con=mysqli_fetch_array($r))
            {
              echo"
              <thead>
                <tr>
                  <td style=\"padding:10px;\">".$con['DocUsua']."</td>
                  <td style=\"padding:10px;\">".$con['NomUsua']."</td>
                  <td style=\"padding:10px;\">".$con['ApeUsua']."</td>
                  <td style=\"padding:10px;\">".$con['TelUsua']."</td>
                  <td style=\"padding:10px;\">".$con['Correo']."</td>
                  <td style=\"padding:10px;\">".$con['IdRol']."</td>
                  <td style=\"padding:10px;\">".$con['Contra']."</td>
                </tr>";
            }
            echo "</table>";
            ?>
          </div>
      </div>
    <footer>
      <hr>
      <h4>SENA© 2019 Todos los derechos reservados</h4>
    </footer>
  </body>
</html>