<?php
	/*session_start();
	include('funciones.php');
	verificar_sesion();*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar Productos</title>
    <link rel="stylesheet" type="text/css" href="css/estras.css">
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
            <a id="botones" href="usua.php">Usuarios</a>
            <a id="botones" href="asiste.php">Asistencias</a>
            <a id="botones" href="evin.php">Evidencia</a>
            <a id="botones" href="cerrar.php">Cerrar sesión</a>
          </nav>
        </div>
      </div>
      <div id="conpad">
        <div id="menop">
          <h2>Opciones</h2>
            <a id="botones2" href="regas.php">Tomar asistencia</a>
            <a id="botones2" href="modas.php">Editar registros</a>
            <a id="botones2" href="conas.php">Buscar asistencia</a>
            <a id="botones2" href="delas.php">Eliminar registros</a>
        </div>
        <div class="form">
          <h3>Registrar Asistencia</h3>
            <?php
              include("connect.php");
              $r=mysqli_query($connect,"SELECT usu.*, usr.*, ur.* FROM usuarios AS usu INNER JOIN users AS usr ON usu.DocUsua=usr.IdUsua INNER JOIN users_roles AS ur ON usr.IdUser=ur.IdUser WHERE ur.IdRol='2'");
              echo"
              <form action=\"\" method=\"POST\">
              <table style=\"width:100%; background-color:#F2F3F4; border-collapse:collapse;\">
              <thead style=\"background-color:#EC7063; border-bottom:solid 5px #943126; color:white;\">
                <tr>
                  <td style=\"padding:10px;\">Nombre Aprendiz</td>
                  <td style=\"padding:10px;\">Apellido</td>
                  <td style=\"padding:10px;\">Hora de llegada</td>
                </tr>";
                $resti=mysqli_query($connect,"SELECT curtime()");
                while($consulta=mysqli_fetch_array($resti))
                {
                  $hora=$consulta['curtime()'];
                }
            while($con=mysqli_fetch_array($r))
            {
              echo"
              <thead>
                <tr>
                  <td style=\"padding:10px;\">".$con['NomUsua']."</td>
                  <td style=\"padding:10px;\">".$con['ApeUsua']."</td>
                  <td style=\"padding:10px;\"><input class=\"iden\" type=\"time\" name=\"hor\" required value=\"$hora\"></td>
                </tr>";
            }
            echo "</table>
            <input class=\"a\" type=\"submit\" name=\"regis\" value=\"Registrar\">
            </form>";
            if(isset($_POST['regis']))
            {
              $hora=$_POST['hor'];
              $resda=mysqli_query($connect,"SELECT curdate()");
                while($cs=mysqli_fetch_array($resda))
                {
                  $fechapa=$cs['curdate()'];
                }
              $fecha="$fechapa-$hora";
            }
            ?>
        </div>
  </div>
  <footer>
      <hr>
      <h4>SENA© 2019 Todos los derechos reservados</h4>
  </footer>
</body>
</html>