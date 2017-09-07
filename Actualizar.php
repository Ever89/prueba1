<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	
	$id=$_GET['id'];
	$cli=$_GET['cl'];
	$pro=$_GET['pr'];
	$for=$_GET['fo'];
	$tot=$_GET['to'];

	require("datos_conexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

	if (mysqli_connect_errno()) {
		echo "Fallo al conectar con la Base de Datos";
		exit();
	}
	else{
		echo "conexion exitosa<br>";
	}
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion,"utf8");

	$consulta="UPDATE INGRESOS SET ID='$id', CLIENTE='$cli', PROVEEDOR='$pro', FORMA_P='$for', TOTAL='$tot' WHERE ID='$id'";

	$resultados=mysqli_query($conexion,$consulta);
	if ($resultados==false) {
		echo "Error en la Consulta";
	}else{
		echo "Registro Guardado<br><br>";
		echo "<table><tr><td>$id</td></tr>";
		echo "<tr><td>$cli</td></tr>";
		echo "<tr><td>$pro</td></tr>";
		echo "<tr><td>$for</td></tr>";
		echo "<tr><td>$tot</td></tr></table>";

	}
	mysqli_close($conexion);
?>

</body>
</html>