<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"0>
	<title></title>
	<?php
		function ejecuta_consulta($labusqueda){

		require("datos_conexion.php");
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

		if (mysqli_connect_errno()) {//cuando no hay conexion a la base de datos
			echo "Fallo en la conectar con la base de datos";
			exit(); //si hay error salir.
		}

		mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
		mysqli_set_charset($conexion, "utf-8");

		$consulta="SELECT * FROM INGRESOS WHERE CLIENTE LIKE '%$labusqueda%'";//aqui seleccionamos la talba DATOSPERSONALES y lo almacenamos en la variable

		$resultados=mysqli_query($conexion, $consulta);//aqui ALMACENAMOS la informacion de la tabla DATOS PERSONALES.

		
		while ( $fila=mysqli_fetch_array($resultados,MYSQL_ASSOC)) {//mostrar la tabla.

			echo "<table><tr><td>";
			echo $fila['ID'] . "</td><td>";
			echo $fila['CLIENTE'] . "</td><td>";
			echo $fila['PROVEEDOR'] . "</td><td>";
			echo $fila['FORMA P.'] . "</td><td>";
			echo $fila['TOTAL'] . "</td><tr></table>";
			echo "<br>";

		}
		
		mysqli_close($conexion); //indicamos que cierra la conexion para obtimizar recursos.

	}
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







