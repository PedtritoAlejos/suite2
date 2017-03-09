<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_componente
 *
 * @author Pedrito Alejos 
 */
class m_componente extends CI_Model {
    
    //put your code here
 const STATUS_DELETED = 0; //constante con el valor de eliminado
  const STATUS_ACTIVO = 1; //constante con el valor de Usuario activo
     
     
     
      public function mostrar_componente(){
        return $this->db->get('componente')->result();
    }
      public function mostrar_tipo_componente(){
        return $this->db->get('tipo_componente')->result();
    }
    
    public function listar_componente(){
        $this->db->select('componente.id_tipo_componente,componente.id_componente ,componente.nombre_componente,componente.descripcion,tipo_componente.nombre');
        $this->db->from('componente');
        $this->db->join('tipo_componente', 'tipo_componente.id_tipo_componente = componente.id_tipo_componente');
        $this->db->where('componente.activo',self::STATUS_ACTIVO);

        return $this->db->get()->result();
    }
    
    
    public function ingresar_componente($nombre_componente,$descripcion,$id_tipo_componente){
          $sql= "INSERT INTO componente(id_componente, nombre_componente, descripcion,id_tipo_componente) VALUES(0,'".$nombre_componente."', '".$descripcion ."','".$id_tipo_componente."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
    }
    
     public function eliminar_componente($id){
             $this->db->set("activo", self::STATUS_DELETED)->where("id_componente", $id)->update("componente");
        }
        
        public function insertar_componente($nombre,$descripcion,$tipo_componente) {
            $data = array(
                    'nombre_componente' => $nombre ,
                    'descripcion' => $descripcion,
                    'activo' => self::STATUS_ACTIVO ,
                    'id_tipo_componente' => $tipo_componente
                 );

              return   $this->db->insert('componente', $data); 
        }
        
        
        public function imprimir_tabla() {
            if($query = $this->db->query("CALL tabla()"))
        {
           return $query->result();
        }else{
            show_error('Error!');
        }
        }
        
        
        public function actualizar_componente($cod,$nombre,$descripcion,$tipo) {
             $data = array(
                            
                            'nombre_componente' => $nombre,
                            'descripcion' => $descripcion,
                            'id_tipo_componente' => $tipo
                           
                         );
                         $this->db->where('id_componente', $cod);

           return $this->db->update('componente', $data); 
        }
       
}
