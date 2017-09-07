<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		$busqueda=$_GET["buscar"];//almacena en la variable lo que estamos pasando por formulario.

		require("datos_conexion.php");
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

		if (mysqli_connect_errno()) {//cuando no hay conexion a la base de datos
			echo "Fallo en la conectar con la base de datos";
			exit(); //si hay error salir.
		}

		mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
		mysqli_set_charset($conexion, "utf-8");

		$consulta="SELECT * FROM INGRESOS WHERE CLIENTE LIKE '%$busqueda%'";//aqui seleccionamos la talba DATOSPERSONALES y lo almacenamos en la variable

		$resultados=mysqli_query($conexion, $consulta);//aqui ALMACENAMOS la informacion de la tabla DATOS PERSONALES.

		
		while ( $fila=mysqli_fetch_array($resultados,MYSQL_ASSOC)) {//mostrar la tabla.

			//echo "<table><tr><td>";

			echo "<form action='Actualizar.php' method='get'>";
			echo "<input type='text' name='id' value='" . $fila['ID'] . "'><br>";
			echo "<input type='text' name='cl' value='" . $fila['CLIENTE'] . "'><br>";
			echo "<input type='text' name='pr' value='" . $fila['PROVEEDOR'] . "'><br>";
			echo "<input type='text' name='fo' value='" . $fila['FORMA_P'] . "'><br>";
			echo "<input type='text' name='to' value='" . $fila['TOTAL'] . "'><br>";
			echo "<input type='submit' name='enviando' value='Actualizar!'>";
			echo "</form>";
			echo "<br>";

		}
		
		mysqli_close($conexion); //indicamos que cierra la conexion para obtimizar recursos.


	?>

</body>
</html>