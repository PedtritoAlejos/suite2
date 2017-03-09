<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_tipo_muestra
 *
 * @author pedrito
 */
class c_tipo_muestra extends CI_Controller{
    //put your code here
     public function _construct() {
         parent::_construct();
    }
    public function index(){
       
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_tipomuestra");
        $this->load->view("v_footer");
    }
    public function index_mensaje($mensaje){
       
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_tipomuestra",  compact("mensaje"));
        $this->load->view("v_footer");
    }
    //lista los datos
    public function listar_muestra() {
        $this->load->model("m_tipo_muestra");
        echo json_encode($this->m_tipo_muestra->mostrar_muestra());
    }
    
     
     public function insertar_muestra(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
         $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_letras_acentos_formato');
      
       
         
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
       
          if(  $this->form_validation->run())
          { 
           $mensaje="";  
           $nombre =$this->input->post("nombre");
         
           
           $this->load->model("m_tipo_muestra");
          if( $this->m_tipo_muestra->insertar_muestra($nombre)){
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

     public function eliminar_muestra() {

        if ($this->input->is_ajax_request()) {
            
            $id = $this->input->post("id_muestra");
            $this->load->model("m_tipo_muestra");
           if( $this->m_tipo_muestra->eliminar_muestra($id)){
            echo json_encode(array("status" => "success"));
           }else{
               echo json_encode(array("status" => "error")); 
           }
        
        }
    }
   
    
    
         public function modificar_tipo_muestra_ajax(){
         if($this->input->is_ajax_request())
        {
//             $this->load->helper('security');
              
         $this->form_validation->set_rules('cod_tm', 'Código', 'required|numeric|max_length[10]');
       
         $this->form_validation->set_rules('nombre_tm', 'Nombre', 'required|callback_letras_acentos_formato');
        
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
        
             
          if(  $this->form_validation->run())
          {   
           $code =$this->input->post("cod_tm");
          
           $nombre =$this->input->post("nombre_tm");
           $this->load->model("m_tipo_muestra");
          
           if( $this->m_tipo_muestra->actualizar_muestra($code,$nombre)){
            echo json_encode(array("status" => "success"));
           }else{
                echo json_encode(array("status" => "error"));
           }
        }else{
              echo json_encode(array("error"=> validation_errors()));
        }
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
