<?php

class Actividad {

    private $id_actividad;
    private $cargo;
    private $codigo_sectorial;
    private $borrado;

    public function __construct() {
        $this->id_actividad = null;
        $this->cargo = null;
        $this->codigo_sectorial = null;
        $this->borrado = null;
    }

    public function save_actividad($conn, $cargo, $codigo_sectorial) {
        $this->cargo = strtoupper($cargo);
        $this->codigo_sectorial = strtoupper($codigo_sectorial);
        $query = "INSERT INTO actividad VALUES (null,'$this->cargo', '$this->codigo_sectorial','0')";
        $result = mysql_query($query, $conn);
        $id = mysql_insert_id();
        return $id;
    }

    public function delete_actividad($conn, $idactividad) {
        $query = "UPDATE actividad SET borrado = 1 WHERE id_actividad='$idactividad'";
        $result = mysql_query($query, $conn);
        return $result;
    }

    public function update_actividad($conn, $cargo, $codigo_sectorial, $idactividad) {
        $this->cargo = strtoupper($cargo);
        $this->codigo_sectorial = strtoupper($codigo_sectorial);
        $query = "UPDATE actividad SET  cargo = '$this->cargo', codigo_sectorial = '$this->codigo_sectorial',                                     
                  WHERE id_actividad = '$idactividad'";

        $result = mysql_query($query, $conn);
        return $result;
    }

    public function get_actividad_id($conn, $id) {
        $query = "SELECT  cargo, codigo_sectorial
                FROM actividad 
                WHERE id_actividad ='$id' AND borrado = 0";
        $result = mysql_query($query, $conn);
        $row = mysql_fetch_assoc($result);
        return $row;
    }

    public function get_actividad_borrado_id($conn, $id) {
        $rows;
        $query = "SELECT  cargo, codigo_sectorial
                FROM actividad 
                WHERE id_empleado ='$id' AND borrado = 1";
        $result = mysql_query($query, $conn);
        $row = mysql_fetch_assoc($result);
        return $row;
    }
}

?>