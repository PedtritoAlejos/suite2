<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_sistema
 *
 * @author Pedrito Alejos 
 */
class m_sistema extends CI_Model{
    //put your code here
      const STATUS_DELETED = 0; //constante con el valor de eliminado
      const STATUS_ACTIVO = 1; //constante con el valor  activo
     
     
    
    function agregar_sistema ($nombre,$descripcion,$id_plataforma){
        
          $sql= "INSERT INTO sistema(id_sistema, nombre, descripcion,id_plataforma) VALUES(0,'". $nombre."', '".$descripcion."','".$id_plataforma."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
    }
     public function insertar_sistema($nombre, $descripcion,$id_plataforma) {
     $data = array(
                    'id_sistema'   => '0',
                    'nombre'         => $nombre,
                    'descripcion'    => $descripcion,
                    'id_plataforma'  => $id_plataforma,
                    'activo'         =>self::STATUS_ACTIVO
        );
       
        return  $this->db->insert('sistema', $data);
    }
    
     function listar_plataforma(){
        $this->db->select('plataforma.id_plataforma , plataforma.nombre');
        $this->db->from('plataforma');
        return $this->db->get()->result();
    }
    
     public function mostrar_sistema(){
        $this->db->select('sistema.id_sistema , sistema.nombre, sistema.descripcion ,plataforma.nombre as "plataforma"  ');
        $this->db->from('sistema');
        $this->db->join('plataforma', 'sistema.id_plataforma = plataforma.id_plataforma');
        $this->db->where('sistema.activo',self::STATUS_ACTIVO);

        return $this->db->get()->result();
    }
    
      public function eliminar_sistema($id){
           return  $this->db->set("activo", self::STATUS_DELETED)->where("id_sistema", $id)->update("sistema");
        }
    
     public function actualizar_sistema($cod,$nombre,$descripcion) {
             $data = array(
                            'nombre' => $nombre,
                            'descripcion' => $descripcion
                         );
                         $this->db->where('id_sistema', $cod);

           return $this->db->update('sistema', $data); 
        }
}
