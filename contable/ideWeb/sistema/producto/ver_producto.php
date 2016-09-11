<?php
include_once '../conexion/conexion.php';
include_once 'class/producto.php';
 error_reporting(0);
$idproducto=$_REQUEST["idproducto"];

$usuario = new ServidorBaseDatos();
$conn= $usuario->getConexion();

$producto= new Producto();
$row = $producto->get_producto_id($conn, $idproducto);

?>

<html>
	<head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		
		 <!-- INICIO archivos para DATA TABLES-->
        <style type="text/css" title="currentStyle">

            @import "../css/demo_table.css";
            @import "TableTools-2.0.1/media/css/TableTools.css";
        </style>
        <script type="text/javascript" language="javascript" src="js/jquery.js"></script>

        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

        <script type="text/javascript" charset="utf-8" src="TableTools-2.0.1/media/js/ZeroClipboard.js"></script>
        <script type="text/javascript" charset="utf-8" src="TableTools-2.0.1/media/js/TableTools.js"></script>
        <!-- FIN archivos para DATA TABLES-->
		
		<script language="javascript">
		
		function cargar(idp){
			location.href= "ver_producto.php?idproducto="+idp;
		}
		
		
		function aceptar() {
			location.href="index.php";
		}
		
		
		
		$(document).ready(function() {
              
                oTable = $('#example').dataTable( {
                        
                        "bProcessing": true,
                        "bServerSide": true,
                        "sAjaxSource": "processing_bodega_producto.php?idproducto=<?php echo $idproducto;?>",
                        "sPaginationType": "full_numbers",


                       "sDom": 'T<"clear">lfrtip',
                        "oTableTools": {
                            "sSwfPath": "TableTools-2.0.1/media/swf/copy_cvs_xls_pdf.swf",
                            "aButtons": [

                                "xls",
                                {
                                        "sExtends": "pdf",
                                        "sPdfOrientation": "landscape",
                                        "sPdfMessage": " Agro "

                                },
                               
                            ]
                        },
                        "oLanguage": {
                            "oPaginate": {
                            "sPrevious": "Anterior",
                            "sNext": "Siguiente",
                            "sLast": "Ultima",
                            "sFirst": "Primera"
                            },

                            "sLengthMenu": 'Mostrar <select>'+
                            '<option value="5">5</option>'+
                            '<option value="10">10</option>'+
                            
                            
                            '</select> registros',

                            "sInfo": "Mostrando _START_ a _END_ (de _TOTAL_ resultados)",

                            "sInfoFiltered": " - filtrados de _MAX_ registros",

                            "sInfoEmpty": "No hay resultados de b\xfasqueda",

                            "sZeroRecords": "No hay registros a mostrar",

                            "sProcessing": "Espere, por favor...",

                            "sSearch": "Buscar:"

                            }
                            
                            


                } )
                
        } );
		
		
		
		
		
		
		
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}

                function modificar_producto(idproducto) {
			location.href="modificar_producto.php?idproducto=" + idproducto;
		}

		function eliminar_producto(idproducto) {
                    if (confirm("Atencion va a proceder a la baja de un producto. Desea continuar?")) {
			location.href="eliminar_producto.php?idproducto=" + idproducto;
                    }
		}
		
		

		
		function modificar_stock(idproducto, idbodega){
			miPopup = window.open("modificar_stock_final.php?idproducto="+idproducto+"&idbodega=" + idbodega,"miwin","width=600,height=300,scrollbars=yes");
			miPopup.focus();
		}
		


		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">VER PRODUCTO </div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                            <tr>
                                                <td width="15%">Producto Gasto: </td>                                                    
                                                <td width="43%">                                                    
                                                    <?php if($row['gasto']==0) {?>
                                                    No
                                                    <?php } else {?>
                                                    Si
                                                    <?php }?>                                                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><strong>C&oacute;digo</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['codigo']?></td>
					    </tr>
                                            <tr>
                                                <td width="15%"><strong>Nombre</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['nombre']?></td>
					    </tr>
                                            <tr>
                                                <td>GRAVA IVA</td>
                                                <?php if ($row["iva"]==0){?>
                                                    <td>No</td>
                                                <?php }else{?>
                                                    <td>Si</td>
                                                <?php }?>
                                            </tr>
                                            <tr>
                                                <td width="15%"><strong>Stock</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['stock']?></td>
					    </tr>
                                             <tr>
                                                <td width="15%"><strong>Stock Consig.</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['stock_consignacion']?></td>
					    </tr>
                                            <tr>
                                                <td width="15%"><strong>Costo</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['costo']?></td>
					    </tr>
                                            <tr>
                                                <td width="15%"><strong>PVP</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['pvp']?></td>
					    </tr>
                                            <tr>
                                                <td width="15%"><strong>Utilidad</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['utilidad']?>%</td>
					    </tr>
                                            
                                            <tr>
                                                <td width="15%"><strong>Composici&oacute;n</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['composicion']?></td>
					    </tr>
                                            <tr>
                                                <td width="15%"><strong>Aplicaci&oacute;n</strong></td>
                                                <td width="85%" colspan="2"><?php echo $row['aplicacion']?></td>
					    </tr>

                                             <?php
                                                $proveedor=$row['proveedor'];
                                                $quer="SELECT empresa FROM proveedor WHERE id_proveedor=$proveedor";
                                                $res=mysql_query($quer,$conn);
                                            ?>
                                            <tr>
                                                <td width="15%"><strong>Proveedor</strong></td>
                                                <td width="85%" colspan="2"><?php echo mysql_result($res,0,"empresa")?></td>
					    </tr>

                                            <?php
                                                $grupo=$row['grupo'];
                                                $quer="SELECT nombre FROM grupo WHERE id_grupo=$grupo";
                                                $res=mysql_query($quer,$conn);
                                            ?>
                                            <tr>
                                                <td width="15%"><strong>Grupo</strong></td>
                                                <td width="85%" colspan="2"><?php echo mysql_result($res,0,"nombre")?></td>
					    </tr>

                                            <?php
                                                $subgrupo=$row['subgrupo'];
                                                $quer="SELECT nombre FROM subgrupo WHERE id_subgrupo=$subgrupo";
                                                $res=mysql_query($quer,$conn);
                                            ?>
                                            <tr>
                                                <td width="15%"><strong>Subgrupo</strong></td>
                                                <td width="85%" colspan="2"><?php echo mysql_result($res,0,"nombre")?></td>
					    </tr>

											
					</table>
					
					
					
					
					
				</div>
				<div id="botonBusqueda">
                                        <img src='../img/botonmodificar.jpg' border='1' width='85' height='22' border='1' title='Modificar' onClick='modificar_producto(<?echo $idproducto?>)' onMouseOver='style.cursor=cursor'>
					<img src='../img/botoneliminar.jpg' border='1' width='85' height='22' border='1' title='Eliminar' onClick='eliminar_producto(<?echo $idproducto?>)' onMouseOver='style.cursor=cursor'>
                                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">

			  </div>
			  
			  
				<!-- Inicio PRODUCTOS BODEGA--------------------------------------------------------->                                                                
                   

				<div style="width:40%">
				
				 <div id="tituloForm" class="header" style="background: #024769">STOCK EN BODEGAS</div>
				
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                        <thead>
                            <tr>
                                <th width=""><span style="font-size: 10px">BODEGA</span></th>
                                <th width=""><span style="font-size: 10px">STOCK</span></th>
								 <th width=""><span style="font-size: 10px"></span></th>
								
                            </tr>
                        </thead>
                        <tbody style="font-size: 10px; padding: 1px" align="center">
                            <tr>
                                <td colspan="2" class="dataTables_empty">Cargando Datos del Servidor</td>
                            </tr>
                        </tbody>
                    </table>
					
				</div>
                <!-- Fin PRODUCTOS BODEGA------------------------------------------------------------>	
				
				
			  
			 </div>
		  </div>
		  
		  
		</div>
		
		
	</body>
</html>
