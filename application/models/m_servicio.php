<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_servicio
 *
 * @author Pedrito Alejos 
 */
class m_servicio extends CI_Model {
    //put your code here
    function ingresar_servicio($nombre,$descripcion,$id_tipoServicio,$run_usuario,$id_cliente){
          $sql= "INSERT INTO servicio(id_servicio, nombre, descripcion,id_tipo_servicio,run_usuario,id_cliente) VALUES(0,'". $nombre."', '". $descripcion ."','".$id_tipoServicio."','".$run_usuario."','".$id_cliente."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
    }
}
