<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/estreg.css">
	<meta charset="UTF-8">
	<title>Registrar</title>
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
          <a id="botones2" href="index.html">Inicio</a>
          <a id="botones3" href="iniciarSesion.html">Iniciar sesión</a>
        </nav>
      </div>
    </div>
    <div id="conpad">
      <div class="conpap">
    	<h2 class="title">REGISTRO</h2>
    	<img src="css/img/user.png" width="100" height="100"/>
      	<form name="form3" action=""  method="post"> 
          <div class="orgins">
            <input id="de" type="text" name="idu" required placeholder= "N° Documento" size="40"> 

            <input id="de" type="text" name="nomb" required placeholder= "Nombre" size="40"> 

            <input id="de" type="text" name="apel" required placeholder="Apellidos" size="40"> 

          	<input id="de" type="text" name="tel" required placeholder= "Telefono">

            <input id="de" type="email" name="email" required placeholder="Email">

            <input id="de" type="password" name="pass" required placeholder="Contraseña">
          </div>
         <input class="regis" type="submit" name="regiusu" value="Registrar"/>
        </form>
      </div>
    </div>
<footer>
    <hr>
    <h3>SENA© 2019 Todos los derechos reservados</h3>
  </footer>
  <?php
      if(isset($_POST['regiusu']))
      {
        include("connect.php");
        $idus = $_POST['idu'];
        $nombre = $_POST['nomb'];
        $apellido = $_POST['apel'];
        $telef = $_POST['tel'];
        $cor = $_POST['email'];
        $contra = $_POST['pass'];

        $resu1 = mysqli_query($connect,"INSERT INTO usuarios (DocUsua,NomUsua,ApeUsua,TelUsua,Correo) VALUES ('$idus','$nombre','$apellido','$telef','$cor')");
        $resu2=mysqli_query($connect,"INSERT INTO users (Nom,Contra,IdUsua) VALUES ('$nombre','$contra','$idus')");
        $resu=mysqli_query($connect,"SELECT * FROM users WHERE Nom='$nombre',Contra='$contra',IdUsua='$idus'");
        while ($cons=mysqli_fetch_array($resu)) {
          $idenuser=$cons['IdUser'];
        }
        $fecha=date("Y-m-d");
        $resu3=mysqli_query($connect,"INSERT INTO users_roles (IdUser,IdRol,FechaAsig) VALUES ('$idenuser','2','$fecha')");

        if(($resu1)&&($resu2)&&($resu3)){
            echo "usuario registrado";
            header('Location: iniciarSesion.html');
        }else{
            echo "error";
        }
      }
  ?>
</body>
</html>