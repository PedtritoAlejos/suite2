<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_sistema
 *
 * @author pedrito
 */
class c_sistema  extends CI_Controller{
    //put your code here
      public function _construct() {
         parent::_construct();
    }
    
    
     public function index(){
       $lista = $this->listar_plataforma();
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_sistema", compact("lista"));
        $this->load->view("v_footer");
    }
     public function index_mensaje($mensaje){
       $lista = $this->listar_plataforma();
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_sistema", compact("lista","mensaje"));
        $this->load->view("v_footer");
    }
     public function listar_plataforma(){
         $this->load->model("m_sistema");
        return $this->m_sistema->listar_plataforma(); 
    }
    
      public function mostrar_sistema(){
        $this->load->model("m_sistema");
     echo json_encode( $this->m_sistema->mostrar_sistema());
    }
    
     public function insertar_sistema(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
         $this->form_validation->set_rules('nombre_sis', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('descripcion_sis', 'Descripción ', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('id_plataforma', 'Plataforma ', 'required|numeric');
       
         
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
          
          if(  $this->form_validation->run())
          { 
           $mensaje="";  
           $nombre =$this->input->post("nombre_sis");
           $descripcion =$this->input->post("descripcion_sis");
           $id_plataforma=$this->input->post("id_plataforma");
         
           
           $this->load->model("m_sistema");
          if( $this->m_sistema->insertar_sistema($nombre, $descripcion,$id_plataforma)){
              $mensaje=' <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Agregado correctamente</div>';
          }else{
              ' <div class="alert alert-alert alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Error al agregar</div>';
          }
              $this->index_mensaje($mensaje);
          }else{
              $this->index();
          }
          
          
    // …
}else{
    echo "ingrese al formulario";
}
    }
    
      public function modificar_sistema_ajax(){
         if($this->input->is_ajax_request())
        {
//             $this->load->helper('security');
         $this->form_validation->set_rules('cod_sistema', 'Código', 'required|numeric|max_length[10]');
         $this->form_validation->set_rules('nombre_sistena', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('descr_sistema', 'Descripción ', 'required|callback_letras_acentos_formato');
         
          
         
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
       
        
             
          if(  $this->form_validation->run())
          {  
           $code =$this->input->post("cod_sistema");
           $nombre =$this->input->post("nombre_sistena");
           $descripcion =$this->input->post("descr_sistema");
         
           
           $this->load->model("m_sistema");
          
           if( $this->m_sistema->actualizar_sistema($code,$nombre,$descripcion)){
            echo json_encode(array("status" => "success"));
           }else{
                echo json_encode(array("status" => "error"));
           }
        }else{
              echo json_encode(array("error"=> validation_errors()));
        }
        }
    }
    
    
       public function eliminar_sistema_ajax() {

        if ($this->input->is_ajax_request()) {
            
            $id_sistema = $this->input->post("sistemaid");
            $this->load->model("m_sistema");
           if( $this->m_sistema->eliminar_sistema($id_sistema)){
               echo json_encode(array("status" => "success")); 
           }else{
                echo json_encode(array("status" => "error"));
           }
           
        
        }  else {
            echo "";
        }
    }
     
      function letras_formato($fullname){ //solo letras sin acentos
        if (! preg_match('/^[a-zA-Z]+$/', $fullname)) {
       return FALSE;
        } else {
        return TRUE;
        }
   }
   function letras_acentos_formato($fullname){ //letras y acentos
        if(preg_match('/^[a-záéíóúñüÁÉÍÓÚÑÜ0123456789_,. ]+$/i',$fullname)){
            return true;
        }else{
            return false;
        }
}
}
