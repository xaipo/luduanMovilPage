<?php

class Anticipo {

    private $id_anticipo;
    private $id_rolpago;
    private $valor;
    private $fecha;

    public function __construct() {
        $this->id_anticipo = null;
        $this->id_rolpago = null;
        $this->valor = null;
        $this->fecha = null;
    }

    public function save_anticipo($conn, $id_rolpago, $valor, $fecha) {
        $query = "INSERT INTO anticipo VALUES (null,'$id_rolpago', '$valor','$fecha')";
        $result = mysql_query($query, $conn);
        $id = mysql_insert_id();
        return $id;
    }

    public function delete_anticipo($conn, $idanticipo) {
        $query = "DELETE FROM anticipo WHERE id_anticipo='$idanticipo'";
        $result = mysql_query($query, $conn);
        return $result;
    }

    public function update_anticipo($conn, $id_rolpago, $valor, $fecha, $idanticipo) {
                
        $query = "UPDATE anticipo SET  id_rolpago = '$id_rolpago', valor = '$valor', fecha = '$fecha'                                     
                  WHERE id_anticipo = '$idanticipo'";

        $result = mysql_query($query, $conn);
        return $result;
    }

    public function get_anticipo_id($conn, $id) {
        $query = "SELECT  id_rolpago, valor, fecha
                FROM anticipo 
                WHERE id_anticipo ='$id'";
        $result = mysql_query($query, $conn);
        $row = mysql_fetch_assoc($result);
        return $row;
    }

    

}

?>