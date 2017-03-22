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
    
    /* metodo del alejandro*/
     public function inser_pro($id_proposito,$nombre,$descripcion,$observacion_final,$activo_pro) {
        $data = array(
            'id_proposito' => $id_proposito,
            'nombre' => $nombre,
              'descripcion ' => $descripcion,
            'observacion_final'=> $observacion_final,
            'activo_pro' => $activo_pro
          
        ); 
        return $this->db->insert('proposito', $data);
    }
    public function get_pro()
	{
                 $this->db->where('activo_pro',1);
		$query = $this->db->get('proposito');
		if($query->num_rows() > 0)
		{

			return $query->result();

		}

	}
    public function delete_pro($id)
	{

		
        $data = array(

			'activo_pro' => '0'
        ); 

		$this->db->where('id_proposito',$id);
		$this->db->update('proposito',$data);
		

	}
    public function edit_pro($id_proposito,$nombre,$descripcion,$observacion_final)
	{

		$fecha = date('Y-m-d');

		$data = array(

			'nombre' => $nombre,
              'descripcion ' => $descripcion,
            'observacion_final'=> $observacion_final
        ); 

		$this->db->where('id_proposito',$id_proposito);
		$this->db->update('proposito',$data);

	}
}
