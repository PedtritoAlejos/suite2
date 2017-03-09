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
        $componente = $this->listar_componente();
        $sistema = $this->listar_sistema();
        $muestra = $this->listar_muestra();
        
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_valor", compact("componente","sistema","muestra"));
        $this->load->view("v_footer");
    }
    
    public function agregar_valor() {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       
       
         $this->form_validation->set_rules('idsistema', 'Sistema', 'required|numeric');
         $this->form_validation->set_rules('idcomponente', 'Componente', 'required|numeric');
         $this->form_validation->set_rules('idmuestra', 'Componente', 'required|numeric');
        
      
         
          $this->form_validation->set_message('numeric', 'Ya existe un usuario con ese run');
          $this->form_validation->set_message('required', 'El campo {field} es requerido');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras');
        
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
    
    public function listar_componente(){
       $this->load->model("m_valor");
      return $this->m_valor->listar_componente();  
        
    }
    public function listar_sistema(){
       $this->load->model("m_valor");
      return $this->m_valor->listar_sistema();  
        
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
