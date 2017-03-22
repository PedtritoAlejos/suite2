<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_crud
 *
 * @author Pedrito Alejos 
 */
class c_crud extends CI_Controller {
    
    public function _construct() {
        parent::_construct();
    }
    
    public function index(){ //menu de inicio
    
        if($this->session->userdata('id_tipo_usuario')!=null){
        $nombres = $this->nombres_componentes();
        $tipos_componentes= $this->tipos_componentes();
        $tipos_servicios=$this->listar_tipo_servicios();
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_formulario", compact("nombres","tipos_componentes","tipos_servicios"));
        $this->load->view("v_footer");
        }else{
            redirect(base_url("index.php/c_crud/login"));
        }
        
    }

  
  public function listar_tipo_servicios(){
      $this->load->model('m_tipo_servicio');
      return $this->m_tipo_servicio->listar_tipo_servicio()->result();
  }  
  public function clientes_nombres(){
      $this->load->model('m_cliente');
   
     return $this->m_cliente->mostrar_cliente()->result();
      
  }
  public function nombres_componentes(){
      $this->load->model('m_componente');
      return $this->m_componente->mostrar_componente();
  }
  public function tipos_componentes(){
      $this->load->model('m_componente');
      return $this->m_componente->mostrar_tipo_componente();
  }
  
  public function agregar_datos(){
    //  self::ejemplo();
    $mensaje="valor defecto";
       if($this->input->post()){
            $this->form_validation->set_rules('nombre_cliente', 'Nombre', 'required|callback_letraynumero');
            $this->form_validation->set_rules('f_inicio', 'iniio', 'required');
            $this->form_validation->set_rules('f_final', 'final', 'required');
            $this->form_validation->set_rules('nombre_servicio', 'nombreservicio', 'required');
            $this->form_validation->set_rules('descripcion_sistema', 'descripcionsistema', 'required');
            $this->form_validation->set_rules('tipo_servicio', 'tiposervicio');
            

            $this->form_validation->set_message("required", "El campo %s es requerido");
            $this->form_validation->set_message("letraynumero", "El campo %s debe contenter solo letras y numeros");
            $this->form_validation->set_message("alpha_numeric_spaces", "El campo %s debe contener solo alfa-numericos y espacios");
            $this->form_validation->set_message("xss_clean", "No se permite este tipo de carateres en el campo %s");
            
            if($this->form_validation->run()===true){
          $nombre =  $this->input->post('nombre_cliente');
          $descrip_client =  $this->input->post('descripcion_cli');
          $fecha_i = $this->input->post('f_inicio');
          $fecha_f = $this->input->post('f_final');
          $nom_servi =$this->input->post('nombre_servicio');
          $dsc_sis = $this->input->post('descripcion_sistema');
          $tipo_servicio=$this->input->post("tipo_servicio");
        //si todo esta correcto llega aqui 
         $id_cliente = $this->ingresar_cliente($nombre,$descrip_client ,$fecha_i, $fecha_f);
         if(is_numeric($id_cliente)){
             $id_servicio = $this->ingresar_servicio($nom_servi, $dsc_sis, $tipo_servicio,"18684222", $id_cliente);
             if(is_numeric($id_servicio)){
                 $mensaje="cliente agregado correctamente";
                
             }else{
                 $mensaje="no se pudo agregar el servicio";
             }
         }else{
             $mensaje="no se pudo agregar cliente";
         } 
           }else{
               echo "error en validacion";
           }
      }
      echo $mensaje;
  }
  


 
  

 
  public function ingresar_cliente($nombre,$descripcion_cliente,$fecha_inicio,$fecha_final){
     $this->load->model("m_cliente");
     //si se realizo con exito devuelve el id del cliente creado sino devuelve false
     return $this->m_cliente->agregar_cliente($nombre,$descripcion_cliente,$fecha_inicio,$fecha_final);
   }
  public function ingresar_servicio($nombre,$descripcion,$id_tipoServicio,$run_usuario,$id_cliente){
       $this->load->model("m_servicio");
        //si todo es correcto devuelve el id del servicio , sino de vuelve false
      return $this->m_servicio->ingresar_servicio($nombre,$descripcion,$id_tipoServicio,$run_usuario,$id_cliente);
     } 
  public function ingresar_proposito($nombre,$descripcion){
    $this->load->model("m_proposito");
     //si todo es correcto devuelve el id del propósito , sino de vuelve false
    return $this->m_proposito->ingresar_proposito($nombre,$descripcion);
  }
  public function ingresar_plataforma($nombre,$cpu,$ram,$so,$ip,$id_cliente,$id_proposito,$id_servicio){
      $this->load->model("m_plataforma");
       //si todo es correcto devuelve el id de la plataforma , sino de vuelve false
      return $this->m_plataforma->agregar_plataforma($nombre,$cpu,$ram,$so,$ip,$id_cliente,$id_proposito,$id_servicio);
  }
  
  
  public function login(){
      $this->load->view("v_cabecera_login");
      $this->load->view("v_login", $this->formulario_login());
  }
  public function formulario_login(){
  return   
       array( 
       'correo'=>  array ( 
                        'name'           => 'correo',
                        'maxlength'      => '50',
                        'size'           => '50',
                        'value'          => set_value('correo'),
                        'class'          => 'form-control',
                        'required'       =>'true',
                       'placeholder'    =>'Ingrese su correo',
                       'type'           =>'email'),
           
        'clave'=>array( 'name'           =>'clave',
                        'maxlength'      =>'50' ,
                        'id'             =>'clave' ,
                        'class'          =>'form-control',
                        'value'          => set_value('clave'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su contraseña',
                        'type'           =>'password')
           
        );

  }//
  
  public function cerrar_sesion()
	{
		$this->session->sess_destroy();
		$this->login();
	}
    
  
  
  public function iniciar_sesion(){
      if($this->input->post("submit")){
          $this->form_validation->set_rules("correo","Correo",'required|valid_email|trim|min_length[2]');
          $this->form_validation->set_rules("clave","Clave",'required|trim');
          
           $this->form_validation->set_message("required", "El campo %s es requerido");
           $this->form_validation->set_message("trim", "El campo %s no puede tener espacion em blanco");
           $this->form_validation->set_message("valid_email", "El campo %s debe ser un email");
           if(!$this->form_validation->run())
           {
               //si algo falla
            $this->login(); //pagina de inicio
               
               
             
           }else{
               //si todo es correcto con la validaciones de entrada de formato 
               //// se llama al metodo que valida las credenciales del usuario en la base de datos 
          $this->validar_usuario($this->input->post("correo"), $this->input->post("clave"));
         
           
         
               }
      }else{
        
          if($this->session->userdata('id_tipo_usuario')!=null){
              $this->index();
          }else{
                redirect(base_url("index.php/c_crud/login"));
          }
      }
  }


    public function validar_usuario($usuario,$clave){
        $this->load->model("m_usuario");
        $check_user =$this->m_usuario->validacion_usuario($usuario,$clave);
        if(!is_null($check_user)){
           $data = array(
	                'is_logued_in' 	=> TRUE,
                        'nombre'=>$check_user->nombre,
                        'ap_paterno'=>$check_user->apellido_paterno,
	                'id_usuario' 	=> $check_user->run_usuario,
	                'id_tipo_usuario'=>$check_user->id_tipo_usuario,
	                'correo' =>$check_user->correo
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}

        else{
            //si el usuario no existe
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
           $this->login();
        }
         
    }
            


  /*funcion para validar solo caracteres adecuados*/
    public function letraynumero($cadena) {
        $permitidos = "áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789._-";
        for ($i = 0; $i < strlen($cadena); $i++) {
            if (strpos($permitidos, substr($cadena, $i, 1)) === false) {
                //no es válido; 
                return false;
            }
        }
        //si estoy aqui es que todos los caracteres son validos 
        return true;
    }
}
