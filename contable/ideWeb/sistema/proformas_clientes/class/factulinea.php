<?php

class Factulinea
{
    private $id_factulinea;
    private $id_factura;
    private $id_producto;
    private $cantidad;
    private $precio;
    private $dcto;
    private $subtotal;


    public function __construct()
    {
        $this->id_factulinea=null;
        $this->id_factura=null;
        $this->id_producto=null;
        $this->cantidad=null;
        $this->precio=null;
        $this->dcto=null;
        $this->subtotal=null;

    }

    public function save_factulinea($conn,$id_factura, $id_producto, $cantidad, $costo, $precio, $dcto, $subtotal,$iva)
    {
        $query="INSERT INTO proforlinea VALUES (null,'$id_factura','$id_producto','$cantidad','$costo','$precio','$dcto','$subtotal','$iva')";
        $result= mysql_query($query, $conn);
        return $result;
    }

    public function delete_factulinea($conn, $idfactulinea)
    {
        $query = "delete from proforlinea  WHERE id_factulinea='$idfactulinea'";
        $result = mysql_query($query, $conn);
        return $result;
    }

    public function update_factulinea($conn, $idfactulinea, $id_producto, $cantidad, $costo, $precio, $dcto, $subtotal, $iva)
    {

        $query = "UPDATE proforlinea SET  id_producto = '$id_producto', cantidad = '$cantidad',
                                      costo='$costo', precio = '$precio', dcto = '$dcto',subtotal = '$subtotal', iva = '$iva'
                  WHERE id_factulinea = '$idfactulinea'";

        $result = mysql_query($query, $conn);

        return $result;

    }

    public function get_factulinea_id($conn, $id)
    {
        $rows;
        $query="SELECT idfactura_venta, id_producto, cantidad, precio, dcto, subtotal FROM proforlinea WHERE id_factulinea ='$id' AND borrado = 0";
        $result = mysql_query($query, $conn);
        $row = mysql_fetch_assoc($result);
        return $row;
    }


}
?>