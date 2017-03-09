<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_valor
 *
 * @author Pedrito Alejos 
 */
class m_valor  extends CI_Model{
     const STATUS_DELETED = 0; //constante con el valor de eliminado
    const STATUS_ACTIVO = 1; //constante con el valor de Usuario activo
    //put your code here
    public function agregar_valor($resultado,$fecha,$id_componente,$id_sistema,$id_tipo_muestra,$run_autor){
          $sql= "INSERT INTO valor(id_valor, resultado,fecha,id_componente,id_sistema,id_tipo_muestra,run_autor) "
                  . "VALUES(0,'".$resultado."', '".$fecha."','".$id_componente."','".$id_sistema."','".$id_tipo_muestra."','".$run_autor."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
    }
    
    public function listar_sistema(){
        
           $this->db->select('id_sistema,nombre');
           $this->db->from('sistema');
           $this->db->where('activo',self::STATUS_ACTIVO);
        return $this->db->get()->result();
    }
    public function listar_muestra(){
        
           $this->db->select('id_tipo_muestra,nombre');
           $this->db->from('tipo_muestra');
           $this->db->where('activo',self::STATUS_ACTIVO);
        return $this->db->get()->result();
    }
    public function listar_componente(){
        
           $this->db->select('id_componente,nombre_componente');
           $this->db->from('componente');
           $this->db->where('activo',self::STATUS_ACTIVO);
        return $this->db->get()->result();
    }
}
