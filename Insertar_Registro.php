<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		h1{
	text-align:center;
	color:#00F;
	border-bottom:dotted #0000FF;
	width:50%;
	margin:auto;
	
	
}

#tabla td{
	border:1px solid #F00;
	padding:20px 50px;
	margin-top:50px;

body{
	background-color:#FFC;
}

	</style>
</head>
<body>
<?php
		$cod=$_GET["c_art"];
		$sec=$_GET["seccion"];
		$nom=$_GET["n_art"];
		$pre=$_GET["precio"];
		$fec=$_GET["fecha"];
		$imp=$_GET["importado"];
		$por=$_GET["p_orig"];
		require("datos_conexion.php");
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

		if (mysqli_connect_errno()) {//cuando no hay conexion a la base de datos
			echo "Fallo en la conectar con la base de datos";
			exit(); //si hay error salir.
		}

		mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
		mysqli_set_charset($conexion, "utf-8");

		$consulta="INSERT INTO PRODUCTOS (CODIGOARTICULO, SECCION, NOMBREARTICULO, PRECIO, FECHA, IMPORTADO, PAISDEORIGEN) VALUES ('$cod','$sec','$nom',$pre,'$fec','$imp','$por')";

		$resultados=mysqli_query($conexion, $consulta);//aqui ALMACENAMOS la informacion de la tabla DATOS PERSONALES.

		if ($resultados==false) {
					echo "Error en la consulta";
				}		
		else{
			echo "Registro Guardado";

			echo "<table id='tabla'><tr><td>$cod</td>";
			echo "<td>$sec</td>";
			echo "<td>$nom</td>";
			echo "<td>$pre</td>";
			echo "<td>$fec</td>";
			echo "<td>$imp</td>";
			echo "<td>$por</td></tr></table>";
		}
		
		mysqli_close($conexion); //indicamos que cierra la conexion para obtimizar recursos.

	
?>

</body>
</html>