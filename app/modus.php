<?php
	session_start();
	include('funciones.php');
	verificar_sesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Productos</title>
    <link rel="stylesheet" href="css/estea.css">
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
          <h3>Actualizar datos de usuario</h3>
          <form action="" method="POST">
            <p>
              <input class="cont" type="text" name="idus" required placeholder="Nº de documento">
            </p>
            <p>
              <input class="iden" type="text" name="nom" required placeholder="Nombre">
              <input class="iden" type="text" name="apel" required placeholder="Apellido">
            </p>
            <p>
              <input class="cont" type="text" name="tel" required placeholder="Teléfono">
              <input class="cocoro" type="text" name="email" required placeholder="Correo Electrónico">
            </p>
            <p>
              <input class="cont" type="password" name="pass" required placeholder="Contraseña">
            </p>
            <p>
              <input class="a" type="submit" name="actu" value="Actualizar">
            </p>
          </form>
          <?php
            if(isset($_POST['actu']))
            {
              include("connect.php");
              $idu = $_POST['idus'];
              $nombre = $_POST['nom'];
              $apellido = $_POST['apel'];
              $telef = $_POST['tel'];
              $cor = $_POST['email'];
              $nwpas = $_POST['pass'];
              $exis=0;
              $res=mysqli_query($connect,"SELECT usu.*, usr.*, ur.* FROM usuarios AS usu INNER JOIN users AS usr ON usu.DocUsua=usr.IdUsua INNER JOIN users_roles AS ur ON usr.IdUser=ur.IdUser WHERE usu.DocUsua='$idu'");
              while($consul=mysqli_fetch_array($res))
              {
                $exis++;
              }
              if($exis==0)
              {
                echo"<h3>El usuario no existe</h3>";
              }
              else
              {
                mysqli_query($connect,"UPDATE usuarios SET
                DocUsua='$idu',
                NomUsua='$nombre',
                ApeUsua='$apellido',
                TelUsua='$telef',
                Correo='$cor'
                WHERE  DocUsua='$idu'");

                mysqli_query($connect,"UPDATE users SET
                Nom='$nombre',
                Contra='$nwpas',
                IdUsua='$idu'
                WHERE IdUsua='$idu'");
                echo'<script>
                alert("Usuario modificado correctamente");
                </script>';
                header("Refresh:0; url=usua.php");
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
