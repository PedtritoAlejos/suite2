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
    public function eliminar_valor($idvalor){
          return  $this->db->set("activo", self::STATUS_DELETED)->where("id_valor", $idvalor)->update("valor");
    }


    public function listar_componente(){
        
           $this->db->select('id_componente,nombre_componente');
           $this->db->from('componente');
           $this->db->where('activo',self::STATUS_ACTIVO);
        return $this->db->get()->result();
    }
   public function mostrar_resultado($idsistema)
    {
       $sql=" select 
                sistema.id_sistema,
                valor.id_valor,
                valor.resultado,
                componente.id_componente,
                nombre_componente,
                valor.fecha
                /* sub_valor.nombre,
                sub_valor.resultado */
                from sistema 
                join valor on sistema.id_sistema=valor.id_sistema 
                join componente on componente.id_componente=valor.id_componente
                /* join sub_valor on valor.id_valor=sub_valor.id_valor*/
                WHERE sistema.id_sistema=$idsistema and valor.activo='1' ORDER BY componente.id_componente; ";
       if($query = $this->db->query($sql))
        {
            return $query->result();
        }else{
            show_error('Error!');
        }
    }
    
    
    
    public function agregar_valores ($resultado,$id_componente,$id_sistema,$id_muestra,$run_autor){
     date_default_timezone_set('America/Argentina/Salta'); // zona horaria a la de Chile
     $fecha = date('Y-m-d H:i:s');
      
        
        $data = array(
                    'id_valor'          => '0',
                    'resultado'         => $resultado,
                    'fecha'             => $fecha,
                    'id_componente'     => $id_componente,
                    'id_sistema'        =>$id_sistema,
                    'id_tipo_muestra'   =>$id_muestra,
                    'run_autor'         =>$run_autor,
                    'activo'            =>self::STATUS_ACTIVO
               
        );
       
        return  $this->db->insert('valor', $data);
    }
}
