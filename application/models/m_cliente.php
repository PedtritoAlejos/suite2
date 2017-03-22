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
   
    /* metodo de alejandro*/
    
    
    public function inser_cliente($id_cliente,$Nombre,$descrip,$fecha_i,$fecha_f,$activo) {
        $data = array(
            'id_cliente' => $id_cliente,
            'Nombre' => $Nombre,
              'descripcion_cliente ' => $descrip,
            'fecha_inicio'=> $fecha_i,
            'fecha_final' => $fecha_f,
            'activo'=>$activo
        ); 
        return $this->db->insert('cliente', $data);
    }
    
    
    public function get_cli()
	{
                 $this->db->where('activo',1);
		$query = $this->db->get('cliente');
		if($query->num_rows() > 0)
		{

			return $query->result();

		}

	}
    public function get_horario()
	{
                $this->db->where('activo_ho',1);
        
		$query = $this->db->get('horario');
		if($query->num_rows() > 0)
		{

			return $query->result();

		}

	}
public function get_alerta()
	{
                 $this->db->where('activo_alert',1);
		$query = $this->db->get('alerta');
		if($query->num_rows() > 0)
		{

			return $query->result();

		}

	}
	//eliminamos usuarios
	public function delete_cli($id)
	{

		
        $data = array(

			'activo' => '0'
        ); 

		$this->db->where('id_cliente',$id);
		$this->db->update('cliente',$data);
		

	}

	//editamos usuarios
	public function edit_cli($id_cliente,$Nombre,$descrip,$fecha_i,$fecha_f)
	{

		$fecha = date('Y-m-d');

		$data = array(

			'nombre' => $Nombre,
              'descripcion_cliente ' => $descrip,
            'fecha_inicio'=> $fecha_i,
            'fecha_final' => $fecha_f
        ); 

		$this->db->where('id_cliente',$id_cliente);
		$this->db->update('cliente',$data);

	}
    public function edit_hora($id_horario,$minuto,$hora,$dia_del_mes,$numero_mes,$anho,$activo_ho)
	{

		$fecha = date('Y-m-d');

		$data = array(

			'minuto' => $minuto,
            'hora ' => $hora,
            'dia_del_mes'=> $dia_del_mes,
            'numero_mes' => $numero_mes,
            'anho'=> $anho,
            'activo_ho' => $activo_ho
        ); 

		$this->db->where('id_horario',$id_horario);
		$this->db->update('horario',$data);

	}
    
    
    
    
    public function delete_hora($id)
	{

		
        $data = array(

			'activo_ho' => '0'
        ); 

		$this->db->where('id_horario',$id);
		$this->db->update('horario',$data);
		

	}
    
    
    
    
    
    
    
    
    
    public function get_cliente(){
                //$this->db->where("Activo", self::STATUS_ACTIVO);
           return $this->db->get("cliente")->result();
      }
public function eliminar_cliente($id_cliente){
             $this->db->where('id_cliente' , $id_cliente);
		return $this->db->delete('cliente');
        }
       
       
        public function actualizar_usuario($id_cliente,$Nombre,$descrip,$fecha_i,$fecha_f){
           $data = array(
                            
                            'Nombre' => $Nombre,
              'descripcion_cliente ' => $descrip,
            'fecha_inicio'=> $fecha_i,
            'fecha_final' => $fecha_f
        ); 
                         $this->db->where('id_cliente', $id_cliente);

           return $this->db->update('cliente', $data); 
        }
        
	
	
   
   
    public function mostrar_cliente(){
        return $this->db->get('cliente');
    }
    
    
  
    
    
   public function inser_horario($id_horario,$minuto,$hora,$dia_del_mes,$numero_mes,$anho,$activo_ho,$id_alerta) {
        $data = array(
            'id_horario' => $id_horario,
            'minuto' => $minuto,
              'hora ' => $hora,
            'dia_del_mes'=> $dia_del_mes,
            'numero_mes' => $numero_mes,
            'anho'=>$anho,
            'activo_ho' => $activo_ho,
            'id_alerta'=>$id_alerta
        ); 
        return $this->db->insert('horario', $data);
    }
    
    /*------*/
}
