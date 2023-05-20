<?php
	function verificar_sesion()
	{
		if(!isset($_SESSION['usuario'])){
			unset($_SESSION);
			echo '<script>alert("Por favor inicia sesion para continuar");<script>';
			header("Refresh:0; url=inicioSesion.html");
		}
	}
?>
