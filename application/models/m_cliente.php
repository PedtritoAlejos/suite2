<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_cliente
 *
 * @author Pedrito Alejos 
 */
class m_cliente extends CI_Model{
    //put your code here
    
    public function agregar_cliente ($nombre ,$descrip_client,$fecha_inicio,$fecha_final){
        
         $sql= "INSERT INTO cliente(id_cliente, nombre,descripcion_cliente fecha_inicio,fecha_final) VALUES(0,'". $nombre."','".$descrip_client."' ,'". $fecha_inicio ."','".$fecha_final."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
       
    }
    
    public function actualizar_cliente(){
        
    }
    public function buscar_cliente(){
        
    }
    public function eliminar_cliente(){ // este se modifica como dado de baja 
        
    }
    public function mostrar_cliente(){
        return $this->db->get('cliente');
    }
}
