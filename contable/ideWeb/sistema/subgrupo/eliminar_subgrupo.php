<?

$idsubgrupo=$_REQUEST["idsubgrupo"];

include_once '../conexion/conexion.php';
include_once 'class/subgrupo.php';

$usuario = new ServidorBaseDatos();
$conn= $usuario->getConexion();

$subgrupo= new Subgrupo();
$row = $subgrupo->get_subgrupo_id($conn, $idsubgrupo);

$grupo= $subgrupo->get_nombregrupo($row['id_grupo'],$conn);
?>

<html>
	<head>
                <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function aceptar(idsubgrupo) {
			location.href="save_subgrupo.php?idsubgrupo=" + idsubgrupo + "&accion=baja";
		}
		
		function cancelar() {
			location.href="index.php";
		}
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">ELIMINAR SUBGRUPO </div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                             <tr>
                                                <td width="15%"><strong>C&oacute;digo</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['codigo']?></td>
					    </tr>
                                            <tr>
                                                <td width="15%"><strong>Nombre</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['nombre']?></td>
					    </tr>
                                            <tr>
                                                <td width="15%"><strong>Grupo</strong></td>
                                                <td width="85%" colspan="2"><?php echo $grupo['nombre']?></td>
					    </tr>
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar(<? echo $idsubgrupo?>)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
			  </div>
		  </div>
		</div>
	</body>
</html>
