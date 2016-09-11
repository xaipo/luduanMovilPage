<?php

class Empleado
{
    private $id_empleado;
    private $nombre;
    private $ci;
    private $borrado;
    

    public function __construct()
    {
        $this->id_empleado=null;
        $this->nombre=null;
        $this->ci=null;
        $this->borrado=null;
    }

    public function save_cliente($conn, $nombre, $ci)
    {        
        $this->nombre=strtoupper($nombre);
        $query="INSERT INTO empleado VALUES (null,'$this->nombre', '$ci','0')";
        $result= mysql_query($query, $conn);
        $idempleado=mysql_insert_id();
        return $idempleado;
    }

    public function delete_cliente($conn, $idempleado)
    {
        $query = "UPDATE empleado SET borrado = 1 WHERE id_empleado='$idempleado'";
        $result = mysql_query($query, $conn);
        return $result;
    }

    public function update_cliente($conn, $nombre, $ci, $idempleado)
    {
        $this->nombre=strtoupper($nombre);        
        $query = "UPDATE empleado SET  nombre = '$this->nombre', ci = '$ci',                                     
                  WHERE id_empleado = '$idempleado'";

        $result = mysql_query($query, $conn);

        return $result;

    }

    public function get_empleado_id($conn, $id)
    {
        $query="SELECT  nombre, ci
                FROM empleado 
                WHERE id_empleado ='$id' AND borrado = 0";
        $result = mysql_query($query, $conn);
        $row = mysql_fetch_assoc($result);
        return $row;
    }
     public function get_cliente_borrado_id($conn, $id)
    {
        $rows;
        $query="SELECT  nombre, ci
                FROM empleado 
                WHERE id_empleado ='$id' AND borrado = 1";
        $result = mysql_query($query, $conn);
        $row = mysql_fetch_assoc($result);
        return $row;
    }

}
?>