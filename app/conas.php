<?php
	/*session_start();
	include('funciones.php');
	verificar_sesion();*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Buscar Productos</title>
    <link rel="stylesheet" href="css/estcas.css">
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
          <h3>Buscar Asistencia</h3>
          <form action="" method="POST">
              <input class="ce" type="date" name="feca" required placeholder="Fecha de asistencia">
              <input class="a" type="submit" name="regis" value="Buscar">
          </form>
          <!--<?php
          if(isset($_POST['consu']))
          {
            include("conexion.php");
            $nom=$_POST['nomb'];
            $exis=0;
            $r=mysqli_query($conexion,"SELECT * FROM productos WHERE NomProd='$nom'");
            echo"
              <table style=\"width:100%; background-color:#F2F3F4; border-collapse:collapse;\">
              <thead style=\"background-color:#EC7063; border-bottom:solid 5px #943126; color:white;\">
                <tr>
                  <td style=\"padding:20px;\">Id Producto</td>
                  <td style=\"padding:20px;\">Nomnbre</td>
                  <td style=\"padding:20px;\">Tipo</td>
                  <td style=\"padding:20px;\">Precio de entrada</td>
                  <td style=\"padding:20px;\">Precio de salida</td>
                  <td style=\"padding:20px;\">Cantidad</td>
                </tr>";
            while($con=mysqli_fetch_array($r))
            {
              echo"
              <thead>
                <tr>
                  <td style=\"padding:20px;\">".$con['IdProd']."</td>
                  <td style=\"padding:20px;\">".$con['NomProd']."</td>
                  <td style=\"padding:20px;\">".$con['TipoProd']."</td>
                  <td style=\"padding:20px;\">".$con['PrecEnt']."</td>
                  <td style=\"padding:20px;\">".$con['PrecSal']."</td>
                  <td style=\"padding:20px;\">".$con['Cant']."</td>
                </tr>
              </table>";
              $exis++;
            }
            if($exis==0)
            {
              echo"<h2>El producto no esta registrado</h2>";
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
