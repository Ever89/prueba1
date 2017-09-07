<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title></title>
<?php
		require("datos_conexion.php");
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

		if (mysqli_connect_errno()) {//cuando no hay conexion a la base de datos
			echo "Fallo en la conectar con la base de datos";
			exit(); //si hay error salir.
		}

		mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
		mysqli_set_charset($conexion, "utf-8");

		$consulta="INSERT INTO INGRESOS (ID, CLIENTE, PROVEEDOR) VALUES (30,'Ever Santos','SI')";

		$resultados=mysqli_query($conexion, $consulta);//aqui ALMACENAMOS la informacion de la tabla DATOS PERSONALES.

		
		
		
		mysqli_close($conexion); //indicamos que cierra la conexion para obtimizar recursos.

	
	?>
</head>
<body>

	<?php
		$mibusqueda=$_GET["buscar"];

		$mipagina=$_SERVER["PHP_SELF"];

		if ($mibusqueda!=NULL) {
			ejecuta_consulta($mibusqueda);
		}
		else{
			echo ("<form action='" . $mipagina . "'method='get'>
			<label>Buscar:<input type='text' name='buscar'</label>
			<input type='submit' name='enviando' value='Dale!'>
			</form>");
		}



	?>


</body>
</html>