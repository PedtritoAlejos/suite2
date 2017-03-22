<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_alerta
 *
 * @author Alejandro
 */
class m_alerta extends CI_Model{
    //put your code here
    
   
    
     public function inser_alert($id_alerta,$nombre,$descripcion,$activo_alert,$id_sistema) {
        $data = array(
            'id_alerta' => $id_alerta,
            'nombre' => $nombre,
              'descripcion ' => $descripcion,
            'activo_alert'=> $activo_alert,
            'id_sistema' => $id_sistema
          
        ); 
        return $this->db->insert('alerta', $data);
    }
    public function get_alert()
	{
                 $this->db->where('activo_alert',1);
		$query = $this->db->get('alerta');
		if($query->num_rows() > 0)
		{

			return $query->result();

		}

	}
    public function delete_alert($id)
	{

		
        $data = array(

			'activo_alert' => '0'
        ); 

		$this->db->where('id_alerta',$id);
		$this->db->update('alerta',$data);
		

	}
    public function edit_alert($id_alerta,$nombre,$descripcion)
	{

		$fecha = date('Y-m-d');

		$data = array(

			'nombre' => $nombre,
              'descripcion ' => $descripcion
        ); 

		$this->db->where('id_alerta',$id_alerta);
		$this->db->update('alerta',$data);

	}
    public function get_sistem()
	{
                 //$this->db->where('activo_pro',1);
		$query = $this->db->get('sistema');
		if($query->num_rows() > 0)
		{

			return $query->result();

		}

	}
}
