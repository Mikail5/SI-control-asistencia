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
    <link rel="stylesheet" type="text/css" href="css/estrev.css">
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
          <h3>Registrar evidencia del aprendiz</h3>
          <form action="" method="POST">
            <p>
              <input class="formin" type="text" name="doca" required placeholder="Doc. aprendiz">
              <input class="arc" type="file" name="evi" required placeholder="Evidencia">
            </p>
            <p>
              <input class="a" type="submit" name="regis" value="Subir evidencia">
            </p>
          </form>
        </div>
    <!--<?php
      include("conexion.php");
      if(isset($_POST['regis']))
      {
        $nom=$_POST['nom'];
        $tip=$_POST['tip'];
        $pren=$_POST['pre'];
        $pres=$_POST['pres'];
        $can=$_POST['can'];
        $exis=0;

        $resu=mysqli_query($conexion,"SELECT * FROM productos WHERE NomProd='$nom' AND TipoProd='$tip' AND PrecEnt='$pren' AND PrecSal='$pres' AND Cant='$can'");
        while($consulta=mysqli_fetch_array($resu))
        {
          $exis=$exis+1;
        }
        if($exis>0)
        {
          echo"<h3>El producto ya está registrado</h3>";
        }
        else
        {
          $datos=mysqli_query($conexion,"INSERT INTO productos (NomProd,TipoProd,PrecEnt,PrecSal,Cant) VALUES('$nom','$tip','$pren','$pres','$can')");

          if($datos)
          {
            header('Location: productos.php');
          }
          else
          {
            echo "error";
          }
        }
      }
    ?>-->
  </div>
  <footer>
      <hr>
      <h4>SENA© 2019 Todos los derechos reservados</h4>
  </footer>
</body>
</html>