<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_usuario
 *
 * @author AdvisorIT
 */
class m_usuario  extends CI_Model{
    //put your code here
     const STATUS_DELETED = 0; //constante con el valor de eliminado
     const STATUS_ACTIVO = 1; //constante con el valor de Usuario activo
     
        public function __construct() {
                      parent::__construct();
              }
        
  
	
	public function validacion_usuario($username,$password)// datos se cargan en la sesion
	{
		$this->db->where('correo',$username);
		$this->db->where('contrasenha',$password);
		$this->db->where('Activo',1);
		$query = $this->db->get('usuario');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			return null;
		}
	}
        
        public function get_usuarios(){
                $this->db->where("Activo", self::STATUS_ACTIVO);
           return $this->db->get("usuario")->result();
      }
        public function eliminar_usuario($run){
             $this->db->set("Activo", self::STATUS_DELETED)->where("run_usuario", $run)->update("usuario");
        }
        public function mostrar_tipos_usuarios(){//listar para el combo box
            return $this->db->get("tipo_usuario")->result();
           
        }
        
        public function agregar_usuario($run,$dv_run,$nombre,$paterno,$materno,$correo,$clave,$tipo){
           $data = array(
                            'run_usuario' => $run,
                            'dv_run' => $dv_run ,
                            'nombre' => $nombre,
                            'apellido_paterno' => $paterno,
                            'apellido_materno' => $materno,
                            'correo' => $correo,
                            'contrasenha'=> $clave,
                            'Activo' => self::STATUS_ACTIVO,
                            'id_tipo_usuario' => $tipo
                         );

           return $this->db->insert('usuario', $data); 
        }
        public function actualizar_usuario($run,$nombre,$paterno,$materno,$correo,$clave,$tipo){
           $data = array(
                            
                            'nombre' => $nombre,
                            'apellido_paterno' => $paterno,
                            'apellido_materno' => $materno,
                            'correo' => $correo,
                            'contrasenha'=> $clave,
                            'Activo' => self::STATUS_ACTIVO,
                            'id_tipo_usuario' => $tipo
                         );
                         $this->db->where('run_usuario', $run);

           return $this->db->update('usuario', $data); 
        }
        
        public function validar_run($run,$dv_run){
            $this->db->where('run_usuario',$run);
            $this->db->where('dv_run',$dv_run);
            $query = $this->db->get('usuario');
		if($query->num_rows() == 1)
		{
			return false;
		}else{
			return true;
		}
        }
        public function validar_correo($correo){
            $this->db->where('correo',$correo);
            $query = $this->db->get('usuario');
		if($query->num_rows() == 1)
		{
			return false;
		}else{
			return true;
		}
        }
}
