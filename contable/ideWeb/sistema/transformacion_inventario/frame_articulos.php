<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<title>Inventario de Productos</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">

                <!-- INICIO archivos para DATA TABLES-->
                <style type="text/css" title="currentStyle">

			@import "../css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>

		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

                <!-- FIN archivos para DATA TABLES-->


		<script language="javascript">

		function ver_producto(idproducto) {
			parent.location.href="ver_producto.php?idproducto=" + idproducto;
		}

		function modificar_producto(idproducto) {
			parent.location.href="modificar_producto.php?idproducto=" + idproducto;
		}

		function eliminar_producto(idproducto) {
			parent.location.href="eliminar_producto.php?idproducto=" + idproducto;
		}


        $(document).ready(function() {

                oTable = $('#example').dataTable( {

                        "bProcessing": true,
                        "bServerSide": true,
                        "sAjaxSource": "processing_inventario_productos.php",
                        "sPaginationType": "full_numbers",

                       /*"sDom": 'T<"clear">lfrtip',
                        "oTableTools": {
                            "sSwfPath": "TableTools-2.0.1/media/swf/copy_cvs_xls_pdf.swf",
                            "aButtons": [

                                "xls",
                                {
                                        "sExtends": "pdf",
                                        "sPdfOrientation": "landscape",
                                        "sPdfMessage": " Agro "

                                },
                                {
                                        "sExtends": "print",
                                        "sButtonText": "Imprimir",
                                        "sInfo": "<h6>Vista Impresi&oacute;n</h6>Por favor use las funciones de impresi&oacute;n de su navegador para imprimir la tabla.<br/> Presione ESCAPE cuando haya finalizado.",
                                        "sMessage": "<H3>Inventario Productos</H3><br/>"

                                }
                            ]
                        },*/
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


                } );

        } );
		</script>
</head>
<script language="javascript">

function pon_prefijo(nombre,idarticulo,iva,costo,pvp,stock,stock_consignacion)
{	
	parent.opener.document.formulario.nombrearticulo.value=nombre;
	parent.opener.document.formulario.id_producto.value=idarticulo;

        parent.opener.document.formulario.costo_aux.value=costo;
        parent.opener.document.formulario.pvp_aux.value=pvp;
        parent.opener.document.formulario.stock_producto.value=stock;
        parent.opener.document.formulario.stockconsignacion_producto.value=stock_consignacion;

        if(iva==1)
        {
            parent.opener.document.formulario.iva_show.value='Si';
            parent.opener.document.formulario.iva.value='1';
        }
        else
        {
             parent.opener.document.formulario.iva_show.value='No';
             parent.opener.document.formulario.iva.value='0';
        }
	parent.opener.document.formulario.conversion.value=1;
        parent.opener.document.formulario.cantidad_convertir.value=0;
		
		parent.opener.activar_subgrupo('bodegas.php?idproducto='+idarticulo ,'Acbobodega');
	parent.window.close();
}

</script>

<body>
<div id="pagina">
<div id="zonaContenido">
<form id="form1" name="form1">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">

                                <thead>
                                    <tr>
                                        <th width="70%"><span style="font-size: 12px">Nombre</span></th>
                                        <th width="10%"><span style="font-size: 12px">Stock</span></th>
                                        <th width="10%"><span style="font-size: 12px">Consig.</span></th>
                                        <th width="10%"><span style="font-size: 12px">Costo</span></th>
<!--                                                                          -->
                                        <th width="10%"><span style="font-size: 12px">&nbsp;</span></th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 10px; padding: 1px" align="center">
                                            <tr>
                                                    <td colspan="3" class="dataTables_empty">Cargando Datos del Servidor</td>
                                            </tr>

                                    </tbody>

                            </table>

</form>
</div>
</div>
</body>
</html>
