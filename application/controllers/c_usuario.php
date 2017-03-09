<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_usuario
 *
 * @author pedrito
 */
class c_usuario extends CI_Controller {
    
    //put your code here
    public function _construct() {
        parent::_construct();
    }
    public function index_usuario(){
        $lista =$this->listar_tipos_usuarios();
      
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_usuario", compact("lista"));
        $this->load->view("v_footer");
    }
    public function index_usuario_mensaje($mensaje){
        $lista =$this->listar_tipos_usuarios();
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_usuario", compact("lista","mensaje"));
        $this->load->view("v_footer");
    }
    

    public function get_usuarios_todos(){
        $this->load->model("m_usuario");
         echo   json_encode($this->m_usuario->get_usuarios());
        
    }
    public function listar_tipos_usuarios(){
       $this->load->model("m_usuario");
      return $this->m_usuario->mostrar_tipos_usuarios();  
        
    }
    public function eliminar_usuario(){
         
        if($this->input->is_ajax_request())
        {
            $run = $this->input->post("id");
            $this->load->model("m_usuario");
            $this->m_usuario->eliminar_usuario($run);
            echo json_encode(array("status" => "success"));
        }
    
    }
    public function insertar_usuario(){
       if(isset($_POST["dv"] ))
       {
         $dv_run =$this->input->post("dv");
         $this->form_validation->set_rules('run', 'Run', 'required|numeric|max_length[10]|callback_validar_run_usuario['.$dv_run.']');
         $this->form_validation->set_rules('dv', 'Dv', 'required|callback_formato_dv');
         $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('paterno', 'Paterno', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('materno', 'Materno', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email|callback_validar_correo_usuario');
         $this->form_validation->set_rules('clave', 'Clave', 'required|callback_formato_clave');
         $this->form_validation->set_rules('tipo_usuario', 'Tipo usuario', 'required|numeric');
         
          $this->form_validation->set_message('validar_run_usuario', 'Ya existe un usuario con ese run');
          $this->form_validation->set_message('validar_correo_usuario', 'Ya existe un usuario con ese correo');
          $this->form_validation->set_message('required', 'El campo {field} es requerido');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numerico');
          $this->form_validation->set_message('email', 'El campo {field} no tiene el formato correcto');
          $this->form_validation->set_message('formato_dv', 'El campo {field} no tiene el formato correcto');
          $this->form_validation->set_message('formato_clave', 'El campo {field} no tiene el formato correcto debe ser solo números y letras');
          
          if($this->form_validation->run()) /**/
          {
              
                  
            if( $this->agregar_usuario_($this->input->post("run"), $this->input->post("dv"), $this->input->post("nombre"), $this->input->post("paterno"), $this->input->post("materno"), $this->input->post("correo"), $this->input->post("clave"), $this->input->post("tipo_usuario"))){
                $mensaje=' <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>. Usuario Agregado correctamente</div>';
                  
                  $this->index_usuario_mensaje($mensaje);
           }else{
                    
                 $mensaje=' <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>. Ocurrio un error al agregar al usuario </div>';
                 $this->index_usuario_mensaje($mensaje);        
  }
               
          }else{
              $this->index_usuario();
          }
              
       }
    }
    
    
    public function modificar_ajax(){
         if($this->input->is_ajax_request())
        {
         $this->form_validation->set_rules('run_m', 'Run', 'required|numeric|max_length[10]');
       
         $this->form_validation->set_rules('nombre_m', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('paterno_m', 'Apellido Paterno', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('materno_m', 'Apellido Materno', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('correo_m', 'Correo', 'required|valid_email');
         $this->form_validation->set_rules('clave_m', 'Clave', 'required|callback_formato_clave');
         $this->form_validation->set_rules('tipo_m', 'Tipo usuario', 'required|numeric');
         
          
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
          $this->form_validation->set_message('email', 'El campo {field} no tiene el formato correcto.');
          $this->form_validation->set_message('formato_dv', 'El campo {field} no tiene el formato correcto.');
          $this->form_validation->set_message('formato_clave', 'El campo {field} no tiene el formato correcto debe ser solo números y letras.');
          
             
          if(  $this->form_validation->run())
          {   
           $run =$this->input->post("run_m");
          
           $nombre =$this->input->post("nombre_m");
           $paterno =$this->input->post("paterno_m");
           $materno =$this->input->post("materno_m");
           $correo =$this->input->post("correo_m");
           $clave =$this->input->post("clave_m");
           $tipo =$this->input->post("tipo_m");
            $this->load->model("m_usuario");
          
           if( $this->m_usuario->actualizar_usuario($run,$nombre,$paterno,$materno,$correo,$clave,$tipo)){
            echo json_encode(array("status" => "success"));
           }else{
                echo json_encode(array("status" => "error"));
           }
        }else{
              echo json_encode(array("error"=> validation_errors()));
        }
        }
    }
    
    public function formulario_registro_usuario(){
        return   
            array( 
       'run'=>  array ( 
                        'name'            => 'run',
                        'maxlength'       => '10',
                        'min'             => '0',
                        'aria-describedby'=>'basic-addon1',
                        'value'           => set_value('run'),
                        'class'           => 'form-control',
                        'required'        =>'true',
                        'id'              =>'run_v',
                        'placeholder'     =>'Ingrese el run sin puntos...',
                        'type'            =>'number'),
           
        'nombre'=>array('name'          =>'nombre',
                        'maxlength'      =>'30' ,
                        'class'          =>'form-control',
                        'value'          => set_value('nombre'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su nombre...',
                        'type'           =>'text'),
            
        'clave'=>array( 'name'          =>'clave',
                        'maxlength'      =>'150' ,
                        'class'          =>'form-control',
                        'value'          => set_value('clave'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su contraseña...',
                        'type'           =>'password'),
            
        'paterno'=>array('name'          =>'paterno',
                        'maxlength'      =>'50' ,
                        'class'          =>'form-control',
                        'value'          => set_value('paterno'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su apellido paterno...',
                        'type'           =>'text'),
        
        'materno'=>array('name'          =>'materno',
                        'maxlength'      =>'50' ,
                        'class'          =>'form-control',
                        'value'          => set_value('materno'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su apellido materno...',
                        'type'           =>'text'),
            
        'correo'=>array('name'          =>'correo',
                        'maxlength'      =>'50' ,
                        'class'          =>'form-control',
                        'value'          => set_value('correo'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su email...',
                        'type'           =>'email') 
                
           
        );
    }
    
    public function formato_dv($param) {
          $permitidos = "0123456789kK";
        for ($i = 0; $i < strlen($param); $i++) {
            if (strpos($permitidos, substr($param, $i, 1)) === false) {
                //no es vÃ¡lido; 
                return false;
            }
        }
        //si estoy aqui es que todos los caracteres son validos 
        return true;
    }
   
    
   function letras_formato($fullname){ //solo letras sin acentos
        if (! preg_match('/^[a-zA-Z]+$/', $fullname)) {
       return FALSE;
        } else {
        return TRUE;
        }
   }
   function letras_acentos_formato($fullname){ //letras y acentos
        if(preg_match('/^[a-záéíóúñüÁÉÍÓÚÑÜ]+$/i',$fullname)){
            return true;
        }else{
            return false;
        }
   }
      

    public function formato_clave($param) {
          $permitidos = "0123456789.abcdefghijklmnopqrstuvwxyzABCDEFGHIJKJLMNOPQRSTUVWYXZ";
        for ($i = 0; $i < strlen($param); $i++) {
            if (strpos($permitidos, substr($param, $i, 1)) === false) {
                //no es vÃ¡lido; 
                return false;
            }
        }
        //si estoy aqui es que todos los caracteres son validos 
        return true;
    }
    
    public function agregar_usuario_($run,$dv_run,$nombre,$paterno,$materno,$correo,$clave,$tipo){
        $this->load->model("m_usuario");
        $flag = $this->m_usuario->agregar_usuario($run,$dv_run,$nombre,$paterno,$materno,$correo,$clave,$tipo); 
        //retorna el true o false dependiendo si se agrego 
        return $flag;
    }
    
    public function validar_run_usuario($run,$dv_run){
        //valida que no exista el  mismo run en la base de datos
        //retorna true si no existe 
     $this->load->model("m_usuario");
    return $this->m_usuario->validar_run($run,$dv_run);
    }
    
    public function validar_correo_usuario($correo){
     //valida que no exista el  mismo correo en la base de datos
        //retorna true si no existe 
     $this->load->model("m_usuario");
    return $this->m_usuario->validar_correo($correo);
    }
    
}
    