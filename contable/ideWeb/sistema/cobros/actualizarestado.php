<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
</head>
<? include ("../conexion/conexion.php");
$usuario = new ServidorBaseDatos();
$conn = $usuario->getConexion();
 ?>
<body>
<?
	$estado=$_GET["estado"];
	$idfactura=$_GET["idfactura"];
	$act_factura="UPDATE facturas SET estado='$estado' WHERE id_factura='$idfactura'";
	$rs_act=mysql_query($act_factura,$conn);
?>
</body>
</html>
