<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_sub_valor
 *
 * @author Pedrito Alejos 
 */
class m_sub_valor extends CI_Model {
    
    //put your code here

    public function agregar_sub_valor($nombre,$resultado,$id_valor){
          $sql= "INSERT INTO sub_valor(id_sub_valor, nombre,resultado,id_valor) VALUES(0,'". $nombre."', '".$resultado."','".$id_valor."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
    }
}
