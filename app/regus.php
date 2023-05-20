<?php
	session_start();
	include('funciones.php');
	verificar_sesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar Productos</title>
    <link rel="stylesheet" type="text/css" href="css/estru.css">
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
          <h3>Registrar nuevo usuario</h3>
          <form action="" method="POST">
            <p>
              <input class="cont" type="text" name="idusua" required placeholder="Nº de documento">
            </p>
            <p>
              <input class="iden" type="text" name="nom" required placeholder="Nombre">
              <input class="iden" type="text" name="apel" required placeholder="Apellido">
            </p>
            <p>
              <input class="cont" type="text" name="telef" required placeholder="Teléfono">
              <input class="cocoro" type="text" name="corel" required placeholder="Correo Electrónico">
            </p>
            <p>
              Selecciona el rol &nbsp;
              <select class="gen" name="erol">
               <option value="1">Instructor</option>
               <option value="2">Aprendiz</option> 
              </select>
            </p>
            <p>
              <input class="cont" type="password" name="pass" required placeholder="Contraseña">
            </p>
            <p>
              <input class="a" type="submit" name="regis" value="Registrar">
            </p>
          </form>
        </div>
    </div>
    <?php
          include("connect.php");
          if(isset($_POST['regis']))
          {
            $idus=$_POST['idusua'];
            $nom=$_POST['nom'];
            $ap=$_POST['apel'];
            $tel=$_POST['telef'];
            $corre=$_POST['corel'];
            $contra=$_POST['pass'];
            $rol=$_POST['erol'];
            $exis=0;

            $resu=mysqli_query($connect,"SELECT * FROM usuarios WHERE DocUsua='$idus' AND NomUsua='$nom' AND ApeUsua='$ap' AND TelUsua='$tel' AND Correo='$corre'");
            while($consulta=mysqli_fetch_array($resu))
            {
              $exis=$exis+1;
            }
            if($exis>0)
            {
              echo"<h3>El usuario ya está registrado</h3>";
            }
            else
            {
              $resu1 = mysqli_query($connect,"INSERT INTO usuarios (DocUsua,NomUsua,ApeUsua,TelUsua,Correo) VALUES ('$idus','$nom','$ap','$tel','$corre')");
              $resu2 = mysqli_query($connect,"INSERT INTO users (Nom,Contra,IdUsua) VALUES ('$nom','$contra','$idus')");
              $r=mysqli_query($connect,"SELECT * FROM users WHERE Nom='$nom' AND Contra='$contra' AND IdUsua='$idus'");
              while ($cons=mysqli_fetch_array($r)) {
                $idenuser=$cons['IdUser'];
              }
              $fecha=date("Y-m-d");
              $resu3 = mysqli_query($connect,"INSERT INTO users_roles (IdUser,IdRol,FechaAsig) VALUES ('$idenuser','$rol','$fecha')");

              if(($resu1)&&($resu2)&&($resu3))
              {
                header('location: usua.php');
              }
              else
              {
                echo "error";
              }
            }
          }
        ?>
  <footer>
      <hr>
      <h4>SENA© 2019 Todos los derechos reservados</h4>
  </footer>
</body>
</html>