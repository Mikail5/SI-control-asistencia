<?php
  /*session_start();
  include('funciones.php');
  verificar_sesion();*/
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Eliminar Productos</title>
    <link rel="stylesheet" type="text/css" href="css/estdelev.css">
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
            <a id="botones2" href="regev.php">Registrar evidencia</a>
            <a id="botones2" href="modev.php">Editar estados</a>
            <a id="botones2" href="conev.php">Buscar usuario</a>
            <a id="botones2" href="delev.php">Eliminar regsitros</a>
        </div>

        <div class="form">
          <h3>Eliminar registros de acumulaciones</h3>
          <h5>Advertencia: Recuerda que al llenar este formulario se eliminará todos los datos de ese usuario ingresado</h5>
          <form action="" method="POST">
              <input class="bus" type="text" name="ida" required placeholder="Id acumulacion">
              <input class="ce" type="text" name="doca" required placeholder="Doc. aprendiz">
              <input class="a" type="submit" name="regis" value="Eliminar">
          </form>
          <!--<?php
            if(isset($_POST['elim']))
            {
              include("conexion.php");
              $idp=$_POST['idpro'];
              $nom=$_POST['nomb'];
              $exis=0;
              $resu=mysqli_query($conexion,"SELECT * FROM productos WHERE IdProd='$idp' AND NomProd='$nom'");
              while($consu=mysqli_fetch_array($resu))
              {
                $exis++;
              }
              if($exis==0)
              {
                echo'<script>
                alert("El producto no está registrado");
                </script>';
              }
              else
              {
                mysqli_query($conexion," DELETE FROM productos WHERE IdProd='$idp' AND NomProd='$nom'");
                header("location: productos.php");
              }
            }
          ?>-->
        </div>
    </div>
    <footer>
      <hr>
      <h4>SENA© 2019 Todos los derechos reservados</h4>
    </footer>
</body>
</html>