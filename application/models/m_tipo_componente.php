<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_tipo_componente
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class m_tipo_componente extends CI_Model{
    const STATUS_DELETED = 0; //constante con el valor de eliminado
  const STATUS_ACTIVO = 1; //constante con el valor de Usuario activo
     
     
     
     
      public function listar_tipo_componente(){
        $this->db->select('tipo_componente.id_tipo_componente , tipo_componente.nombre,tipo_componente.descripcion');
        $this->db->from('tipo_componente');
        $this->db->where('tipo_componente.activo',self::STATUS_ACTIVO);

        return $this->db->get()->result();

    }
    
    
    
     public function eliminar_tipo_componente($id){
             $this->db->set("activo", self::STATUS_DELETED)->where("id_tipo_componente", $id)->update("tipo_componente");
        }
        
        public function insertar_tipo_componente($nombre,$descripcion) {
            $data = array(
                    'nombre' => $nombre ,
                    'descripcion' => $descripcion,
                    'activo' => self::STATUS_ACTIVO ,
                   
                 );

              return   $this->db->insert('tipo_componente', $data); 
        }
        
        
        public function actualizar_tipo_componente($code,$nombre,$descripcion) {
             $data = array(
                            
                            'nombre' => $nombre,
                            'descripcion' => $descripcion
                           
                           
                         );
                         $this->db->where('id_tipo_componente', $code);

           return $this->db->update('tipo_componente', $data); 
        }
}
