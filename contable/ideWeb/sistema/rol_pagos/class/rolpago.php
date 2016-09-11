<?php

class Rolpago {

    private $id_rolpago;
    private $id_empleado;
    private $id_actividad;
    private $mes;
    private $ano;
    private $sueldo;
    private $desc_fondoreserva;
    private $porc_fondoreserva;
    private $total_fondoreserva;
    private $porc_iess;
    private $total_iess;
    private $sueldo_extra;

    public function __construct() {
        $this->id_rolpago = null;
        $this->id_empleado = null;
        $this->id_actividad = null;
        $this->mes = null;
        $this->ano = null;
        $this->sueldo = null;
        $this->desc_fondoreserva = null;
        $this->porc_fondoreserva = null;
        $this->total_fondoreserva = null;
        $this->porc_iess = null;
        $this->total_iess = null;
        $this->sueldo_extra = null;
    }

    public function save_rolpago($conn, $id_empleado, $id_actividad, $mes, $ano, $sueldo, $desc_fondoreserva, $porc_fondoreserva, $total_fondoreserva, $porc_iess, $total_iess, $sueldo_extra) {
        
        $query = "INSERT INTO rolpago VALUES (null,'$id_empleado', '$id_actividad', '$mes', '$ano', '$sueldo', '$desc_fondoreserva', '$porc_fondoreserva', '$total_fondoreserva', '$porc_iess', '$total_iess', '$sueldo_extra')";
        $result = mysql_query($query, $conn);
        $id = mysql_insert_id();
        return $id;
    }    

    public function update_rolpago($conn, $id_empleado, $id_actividad, $mes, $ano, $sueldo, $desc_fondoreserva, $porc_fondoreserva, $total_fondoreserva, $porc_iess, $total_iess, $sueldo_extra, $id_rolpago) {        

        $query = "UPDATE rolpago SET  id_empleado ='$id_empleado', id_actividad = '$id_actividad', mes ='$mes', ano= '$ano', sueldo ='$sueldo', desc_fondoreserva = '$desc_fondoreserva', porc_fondoreserva = '$porc_fondoreserva', total_fondoreserva = '$total_fondoreserva', porc_iess = '$porc_iess', total_iess = '$total_iess', sueldo_extra = '$sueldo_extra'                                     
                  WHERE id_rolpago = '$id_rolpago'";

        $result = mysql_query($query, $conn);
        return $result;
    }

    public function get_rolpago_id($conn, $id) {
        $query = "SELECT  id_empleado, id_actividad, mes, ano, sueldo, desc_fondoreserva, porc_fondoreserva, total_fondoreserva, porc_iess, total_iess, sueldo_extra
                FROM rolpago 
                WHERE id_rolpago ='$id'";
        $result = mysql_query($query, $conn);
        $row = mysql_fetch_assoc($result);
        return $row;
    }

    

}

?>