<?php
  session_start();
  include('funciones.php');
  verificar_sesion();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Eliminar Productos</title>
    <link rel="stylesheet" type="text/css" href="css/estdela.css">
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
          <a id="botones2" href="regus.php">Registrar usuario</a>
          <a id="botones2" href="modus.php">Editar datos</a>
          <a id="botones2" href="conus.php">Buscar usuario</a>
          <a id="botones2" href="delus.php">Eliminar datos</a>
        </div>

        <div class="form">
          <h3>Eliminar registro de usuarios</h3>
          <h5>Advertencia: Recuerda que al llenar este formulario se eliminará todos los datos de ese usuario ingresado</h5>
          <form action="" method="POST">
              <input class="bus" type="text" name="idd" required placeholder="Nº de documento">
              <input class="bus" type="text" name="nom" required placeholder="Nombre">
              <input class="ce" type="text" name="apel" required placeholder="Apellido">
              <input class="a" type="submit" name="elim" value="Eliminar">
          </form>
          <?php
            if(isset($_POST['elim']))
            {
              include("connect.php");
              $idp=$_POST['idd'];
              $nom=$_POST['nom'];
              $ap=$_POST['apel'];
              $exis=0;
              $resu=mysqli_query($connect,"SELECT * FROM usuarios WHERE DocUsua='$idp' AND NomUsua='$nom' AND ApeUsua='$ap'");
                while($consu=mysqli_fetch_array($resu))
              {
                $exis++;
              }
              if($exis==0)
              {
                echo'<script>
                alert("El usuario no está registrado");
                </script>';
              }
              else
              {
                mysqli_query($connect,"DELETE FROM usuarios WHERE DocUsua='$idp' AND NomUsua='$nom' AND ApeUsua='$ap'");
                $r=mysqli_query($connect,"SELECT * FROM users WHERE IdUsua='$idp'");
                while ($con=mysqli_fetch_array($r))
                {
                  $iden=$con['IdUser'];
                }
                mysqli_query($connect,"DELETE FROM users_roles WHERE IdUser='$iden'");
                mysqli_query($connect,"DELETE FROM users WHERE IdUsua='$idp'");
                header("location: usua.php");
              }
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