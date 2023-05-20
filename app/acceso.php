<?php
	if(isset($_POST['inise'])){
		include("connect.php");
		if((isset($_POST['nomb']))&&(isset($_POST['cont'])))
    {
			$name=$_POST['nomb'];
			$pass=$_POST['cont'];
			$resu=mysqli_query($connect,"SELECT usu.*, usr.*, ur.* FROM usuarios AS usu INNER JOIN users AS usr ON usu.DocUsua=usr.IdUsua
			INNER JOIN users_roles AS ur ON usr.IdUser=ur.IdUser");
			while($consu=mysqli_fetch_array($resu))
			{
				$nom=$consu['Nom'];
				$conts=$consu['Contra'];
				$rol=$consu['IdRol'];
				if(($nom==$name)&&($conts==$pass))
	      {
	        session_start();
					$_SESSION['usuario']=$nom;
					if($rol=1)
					{
						header("location: instructor.php");
					}
					else if($rol=2)
					{
						header("location: aprendiz.php");
					}
				}
				else{
					echo "<script>alert('Usuario o contraseña incorrectos')</script>";
					header("Refresh:0; url=iniciarSesion.html");
				}
			}
		}
	}
	else{
		header("location: iniciarSesion.html");
	}
?>
