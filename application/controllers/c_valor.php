<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_valor
 *
 * @author pedrito
 */
class c_valor extends CI_Controller{
    //put your code here
     public function _construct() {
        parent::_construct();
    }
    public function index(){
           if($this->session->userdata('id_tipo_usuario')!=null){ // si no inicio sesion lo manda al login
        $componente = $this->listar_componente();
        $sistema = $this->listar_sistema();
        $muestra = $this->listar_muestra();
        
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_valor", compact("componente","sistema","muestra"));
        $this->load->view("v_footer");
        }else{
            redirect(base_url("index.php/c_crud/login"));
        }
    }
   
    
    public function index_mensaje($mensaje){
        
       if($this->session->userdata('id_tipo_usuario')!=null){ // si no inicio sesion lo manda al login
        $componente = $this->listar_componente();
        $sistema = $this->listar_sistema();
        $muestra = $this->listar_muestra();
        
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_valor", compact("componente","sistema","muestra","mensaje"));
        $this->load->view("v_footer");
        }else{
            redirect(base_url("index.php/c_crud/login"));
        }
    }
   
    
  
   public function modificar_valor_ajax(){
         if($this->input->is_ajax_request())
        {
             $this->form_validation->set_rules('cod_valor', 'Sistema', 'required|numeric');
             $this->form_validation->set_rules('resultado_valor', 'Sistema', 'required|xss_clean|strip_tags');
             
               $this->form_validation->set_message('numeric', 'El formato debe ser númerico');
               $this->form_validation->set_message('required', 'El campo {field} es requerido');
               $this->form_validation->set_message('xss_clean', 'El formato es incorrecto {field}');
               $this->form_validation->set_message('strip_tags', 'El formato es incorrecto {field}');
               
               if($this->form_validation->run()){
                   
                   $this->load->model("m_valor");
                  if( $this->m_valor->actualizar($this->input->post("resultado_valor") ,$this->input->post("cod_valor")) ){
                      echo json_encode(array("status" => "success"));
                  }else{
                       echo json_encode(array("status" => "error"));
                  }
                   
               }else{
                    echo json_encode(array("error"=> validation_errors()));
               }
               
               
        }else{
            $this->index();
        }
       
       
   }
   
   public function listar(){
       $this->form_validation->set_rules('id_sistema', 'Sistema', 'required|numeric');
       if($this->form_validation->run()){
          
           echo json_encode($this->mostrar($this->input->post("id_sistema")));
       }else{
           $this->index();
       }
   }
   
    
    
    public function eliminar(){
       
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             
          $this->form_validation->set_rules('code_valor', 'Valor', 'required|numeric');
             
          $this->form_validation->set_message('numeric', 'El formato debe ser númerico');
          $this->form_validation->set_message('required', 'El campo {field} es requerido');
             
          if($this->form_validation->run()) /**/
            {
              $code =$this->input->post("code_valor");
              $this->load->model("m_valor");
              if($this->m_valor->eliminar_valor($code)){
               echo json_encode(array("status" => "success"));
              }else{
                  echo json_encode(array("status" => "error"));
              }
            
              
              
            }else{
                $this->index();
            }
             
         }else{
             $this->index();
         }
         
    }


    public function mostrar($codesistema){
        $this->load->model("m_valor");
      return  $this->m_valor->mostrar_resultado($codesistema);
    }
    
    public function agregar_valor() { // este metodo es para ingresar los valores que se toman 
        $mensaje="";
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       
       
         $this->form_validation->set_rules('idsistema', 'Sistema', 'required|numeric');
         $this->form_validation->set_rules('idcomponente', 'Componente', 'required|numeric');
         $this->form_validation->set_rules('idmuestra', 'Componente', 'required|numeric');
         $this->form_validation->set_rules('runusuario', 'Run', 'required|numeric');
         $this->form_validation->set_rules('resultado', 'Resultado', 'required|xss_clean|strip_tags');
        
      
         
          $this->form_validation->set_message('numeric', 'El formato debe ser númerico');
          $this->form_validation->set_message('required', 'El campo {field} es requerido');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras');
        
          if($this->form_validation->run()) /**/
            {
              
          
           if($this->insertar_valor( $this->input->post('resultado'),  $this->input->post('idcomponente'),  $this->input->post('idsistema'),   $this->input->post('idmuestra'), $this->input->post('runusuario'))){
               $mensaje=' <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>.  Agregado correctamente</div>';
           }else{
              $mensaje=' <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>. No se pudo agregar </div>';
           }
           
            }else{
                $this->index();
            }
            $this->index_mensaje($mensaje);
          
              
       }else{
           echo "ingresa al formulario";
             $this->index();
       }
        
    }
    
    public function listar_componente(){
       $this->load->model("m_valor");
      return $this->m_valor->listar_componente();  
        
    }
    public function listar_sistema(){
       $this->load->model("m_valor");
      return $this->m_valor->listar_sistema();  
        
    }
    function insertar_valor($resultado,$id_componente,$id_sistema,$id_muestra,$run_autor) {
        $this->load->model("m_valor");
       return $this->m_valor->agregar_valores($resultado,$id_componente,$id_sistema,$id_muestra,$run_autor);
        
    }
    
    public function listar_muestra(){
       $this->load->model("m_valor");
      return $this->m_valor->listar_muestra();  
        
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
      
}
