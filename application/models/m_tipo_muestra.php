<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_tipo_muestra
 *
 * @author pedrito
 */
class m_tipo_muestra extends CI_Model {
    //put your code here
    
      const STATUS_DELETED = 0; //constante con el valor de eliminado
      const STATUS_ACTIVO = 1; //constante con el valor  activo
     
    public function mostrar_muestra(){
        $this->db->where('activo', self::STATUS_ACTIVO);
        return $this->db->get("tipo_muestra")->result();
        
    }
     public function eliminar_muestra($id){
           return  $this->db->set("activo", self::STATUS_DELETED)->where("id_tipo_muestra", $id)->update("tipo_muestra");
        }
    public function insertar_muestra($nombre) {
            $data = array(
                    'nombre' => $nombre ,
                    'activo' => self::STATUS_ACTIVO ,
                 );

              return   $this->db->insert('tipo_muestra', $data); 
        }
        
    public function actualizar_muestra($code,$nombre) {
             $data = array(
                       'nombre' => $nombre,
                         );
                         $this->db->where('id_tipo_muestra', $code);

           return $this->db->update('tipo_muestra', $data); 
        }
}
