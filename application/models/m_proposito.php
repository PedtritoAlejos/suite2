<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_proposito
 *
 * @author Pedrito Alejos 
 */
class m_proposito  extends CI_Model{
    //put your code here
    public function ingresar_proposito($nombre,$descripcion){
        $obs='Estado pendiente';
         $sql= "INSERT INTO proposito(id_cliente, nombre, descripcion,observacion_final) VALUES(0,'". $nombre."', '". $descripcion ."','".$obs."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
    }
}
