<?php
include ("../conexion/conexion.php");
$usuario = new ServidorBaseDatos();
$conn = $usuario->getConexion();

$idfactura=$_GET["idfactura"];
$id_factulineap=$_GET["id_factulineap"];

$importe=$_GET["subtotal"];
$iva=$_GET["iva"];

$importe_pasar=$_GET["subtotal"];
$iva_pasar=$_GET["iva"];

$utilidad = $_GET["utilidad"];

$idbodega = $_GET["idbodega"];


$descuento=$_GET["descuento"];
$descuento_pasar=$_GET["descuento"];

$descuento_porc=($descuento*100)/$importe;
$descuento_porc_pasar=($descuento*100)/$importe;

$descuento_porc = round($descuento_porc * 10)/10;
$descuento_porc_pasar=$descuento_porc;

if($iva >0 )
{
    $iva_porc=12;
}
 else {
    $iva_porc=0;
}
$query_l="SELECT l.cantidad as cantidad, l.costo as costo, p.nombre as nombre, p.pvp as pvp FROM factulineap l INNER JOIN producto p
          ON l.id_producto = p.id_producto
          WHERE l.id_facturap = ".$idfactura." AND l.id_factulineap = ".$id_factulineap;

$rs_l=mysql_query($query_l, $conn);

$cantidad_pasar=mysql_result($rs_l,0,"cantidad");
$costo_pasar = mysql_result($rs_l,0,"costo");
$pvp_pasar = mysql_result($rs_l,0,"pvp");
$idbodega_pasar = $idbodega;
?>
<html>
<head>
    <title>Modificar Art&iacute;culo</title>
<script>
var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}



function actualizar_importe()
{
        var precio=document.getElementById("precio").value;
        var cantidad=document.getElementById("cantidad").value;
        var descuento_porc=document.getElementById("descuento_porc").value;

        var total=precio*cantidad;
        var descuento = total * (descuento_porc/100);

        var originaldesc=parseFloat(descuento);
        var resultdesc=Math.round(originaldesc*10000)/10000;
        document.getElementById("descuento").value=resultdesc;


        var original=parseFloat(total - descuento);
        var result=Math.round(original*10000)/10000 ;
        document.getElementById("importe").value=result;

        suma_iva();
}


function suma_iva()
{
        var original=parseFloat(document.getElementById("importe").value);
        var result=Math.round(original*10000)/10000 ;
        document.getElementById("importe").value=result;

        document.getElementById("iva").value=parseFloat(result * parseFloat(document.getElementById("ivaporc").value / 100));
        var original1=parseFloat(document.getElementById("iva").value);
        var result1=Math.round(original1*10000)/10000 ;
        document.getElementById("iva").value=result1;
 
}




function guardar_articulo(importe, iva)
{
    var mensaje="";
            if(document.getElementById("cantidad").value=="")
            {
                mensaje+="   - Ingrese la cantidad.\n";
            }

            if(document.getElementById("precio").value=="0")
            {
                mensaje+="   - Ingrese el precio.\n"
            }
            if(mensaje!="")
            {
                alert("Atencion:\n"+mensaje);
            }
            else
            {



//                parent.opener.document.formulario_lineas.baseimponible.value=parseFloat(parent.document.formulario_lineas.baseimponible.value) - parseFloat(importe);
//		var original=parseFloat(parent.opener.document.formulario_lineas.baseimponible.value);
//		var result=Math.round(original*100)/100 ;
//		parent.opener.document.formulario_lineas.baseimponible.value=result;
//
//		parent.opener.document.formulario_lineas.importeiva.value=parseFloat(parent.opener.document.formulario_lineas.importeiva.value) - parseFloat(iva);
//		var original1=parseFloat(parent.opener.document.formulario_lineas.importeiva.value);
//		var result1=Math.round(original1*100)/100 ;
//		parentopener..document.formulario_lineas.importeiva.value=result1;
//                parent.opener.document.formulario_lineas.iva12.value=result1;
//
//
//                var original5=parseFloat(result) + parseFloat(result1);
//		var result5=Math.round(original5*100)/100 ;
//		parent.opener.document.formulario_lineas.preciototal.value=result5;


                
                document.getElementById("form1").submit();

                

            }
}
</script>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
    <div id="pagina">
	<div id="zonaContenido">
		<div align="center">
			<div id="tituloForm" class="header">Articulo</div>
			<div id="frmBusqueda">



        <form name="form1" id="form1" method="get" action="guardar_linea_final.php" >
          <table class="fuente8" width="95%" id="tabla_resultado" name="tabla_resultado" align="center">
                <tr>
                  <td>Producto:<?php echo $idfactura."--".$id_factulineap?></td>
                  <td><strong><?php echo mysql_result($rs_l,0,'nombre')?></strong></td>
                </tr>
				
				<tr>
					<td>Bodega</td>
					<td>
					<?php 
						
						$queryb = "SELECT b.id_bodega as idbodega, b.nombre as nombre FROM bodega b";
							   $resb = mysql_query($queryb, $conn);?>
					
						<select name="cbobodega" id="cbobodega" class="comboPequeno" >
						
						<?php
						
								$contador=0;
								while ($contador < mysql_num_rows($resb))
								{
									if(mysql_result($resb,$contador,"idbodega")==$idbodega)
									{?>
										<option selected value="<?php echo mysql_result($resb,$contador,"idbodega")?>"><?php echo mysql_result($resb,$contador,"nombre");?></option>
									   


									 <?php } else {?>
										<option  value="<?php echo mysql_result($resb,$contador,"idbodega")?>"><?php echo mysql_result($resb,$contador,"nombre");?></option>
								<?php }$contador++;
								} ?>
						
						
						
						</select>	
					</td>
				</tr>
				
				
                <tr>
                    <td width="5%">Cantidad:</td>
                    <td width="40%"><input NAME="cantidad" type="text" class="cajaPequena" id="cantidad" value="<?php echo mysql_result($rs_l,0,'cantidad');?>" maxlength="13" onChange="actualizar_importe()"></td>
                </tr>
                <tr>
                    <td width="5%">Costo:</td>
                    <td width="40%"><input NAME="precio" type="text" class="cajaMedia" id="precio" value="<?php echo mysql_result($rs_l,0,"costo");?>" size="45" maxlength="45" onChange="actualizar_importe()"></td>
                    <td width="5%">PVP:</td>
                    <td><input name="pvp" id="pvp" type="text" class="cajaPequena" value="<?php echo mysql_result($rs_l,0,"pvp");?>"/></td>
                </tr>
                <tr>
                    <td>Dcto.:</td>
                    <td>
                        <input NAME="descuento_porc" type="text" class="cajaMinima" id="descuento_porc" size="10" maxlength="10" onChange="actualizar_importe()" value="<?php echo $descuento_porc?>"> %
                        <input NAME="descuento" type="text" class="cajaPequena2" id="descuento" size="10" maxlength="10" value="<?php echo $descuento?>" readonly="yes">&#36;
                    </td>
                </tr>
                <tr>
                    <td>Utilidad:</td>
                    <td>
                        <input NAME="utilidad" type="text" class="cajaMinima" id="utilidad" size="10" maxlength="10" value="<?php echo $utilidad?>">%
                    </td>
                </tr>
                <tr>
                    <td width="5%">Subtotal:</td>
                    <td width="40%"><input NAME="importe" type="text" class="cajaPequena" id="importe" value="<?php echo $importe;?>" maxlength="13"></td>
                </tr>               
                <tr>
                    <td width="5%">Iva:</td>
                    <td width="40%">
                        <input NAME="ivaporc" type="text" class="cajaMinima" id="ivaporc" size="10" maxlength="10" onChange="suma_iva()" readonly value="<?php echo $iva_porc?>">%
                        <input NAME="iva" type="text" class="cajaMedia" id="iva" value="<?php echo $iva;?>" size="45" maxlength="45" readonly>&#36;
                    </td>
                </tr>

        </table>


        </div>
</div>

        <table width="100%" border="0">
          <tr>
            <td><div align="center">
              <img src="../img/botonaceptar.jpg"  onClick="guardar_articulo(<?php echo $importe_pasar?>,<?echo $iva_pasar?>,<?php echo $descuento_pasar?>)" border="1" onMouseOver="style.cursor=cursor">
              <img src="../img/botoncerrar.jpg" width="70" height="22" onClick="window.close()" border="1" onMouseOver="style.cursor=cursor">

            </div></td>
          </tr>
        </table>
        <iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
                <ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
        </iframe>
            <input id="importe_pasar" name="importe_pasar" value="<?php echo $importe_pasar?>" type="hidden">
            <input id="iva_pasar" name="iva_pasar" value="<?php echo $iva_pasar?>" type="hidden">
            <input id="cantidad_pasar" name="cantidad_pasar" value="<?php echo $cantidad_pasar?>" type="hidden">
            <input id="descuento_pasar" name="descuento_pasar" value="<?php echo $descuento_pasar?>" type="hidden">
       <input id="idproveedor" name="idfactura" value="<?php echo $idfactura?>" type="hidden">
       <input id="idtelefono" name="id_factulineap" value="<?php echo $id_factulineap?>" type="hidden">
       <input id="costo_pasar" name="costo_pasar" value="<?php echo $costo_pasar?>" type="hidden">
       <input id="pvp_pasar" name="pvp_pasar" value="<?php echo $pvp_pasar?>" type="hidden">
	   <input id="bodega_pasar" name="bodega_pasar" value="<?php echo $idbodega_pasar?>" type="hidden">

        </form>


</div>
</div>



</body>
</html>
