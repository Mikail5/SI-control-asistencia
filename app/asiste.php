<?php
	/*session_start();
	include('funciones.php');
	verificar_sesion();*/
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Inventario</title>
    <link rel="stylesheet" type="text/css" href="css/estaas.css">
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
          <div id="contener">
            <h3>Asistencias</h3>
            <?php
              include("connect.php");
              $r=mysqli_query($connect,"SELECT asi.*, usis.* FROM asistencia AS asi INNER JOIN usuarios AS usis ON asi.IdUsua=usis.DocUsua");
            echo"
              <table style=\"width:100%; background-color:#F2F3F4; border-collapse:collapse;\">
              <thead style=\"background-color:#EC7063; border-bottom:solid 5px #943126; color:white;\">
                <tr>
                  <td style=\"padding:10px;\">Id asistencia</td>
                  <td style=\"padding:10px;\">Nomnbre Aprendiz</td>
                  <td style=\"padding:10px;\">Fecha y hora de llegada</td>
                </tr>";
            while($con=mysqli_fetch_array($r))
            {
              echo"
              <thead>
                <tr>
                  <td style=\"padding:10px;\">".$con['IdAsis']."</td>
                  <td style=\"padding:10px;\">".$con['NomUsua']."</td>
                  <td style=\"padding:10px;\">".$con['Fecha']."</td>
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
