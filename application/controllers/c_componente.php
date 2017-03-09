<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_componente
 *
 * @author pedrito
 */
class c_componente extends CI_Controller {

    //put your code here
    public function _construct() {
        parent::_construct();
    }

    public function index() {
        $lista = $this->mostrar_tipo_componente();
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_componente", compact("lista"));
        $this->load->view("v_footer");
    }
    public function index_mensaje($mensaje) {
        $lista = $this->mostrar_tipo_componente();
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_componente", compact("lista","mensaje"));
        $this->load->view("v_footer");
    }

    public function listar_componentes() {
        $this->load->model("m_componente");
        echo json_encode($this->m_componente->listar_componente());
    }

    public function mostrar_tipo_componente() {
        $this->load->model("m_componente");
        return $this->m_componente->mostrar_tipo_componente();
    }

    public function insertar_componente(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
         $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('descripcion', 'Descripción ', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('tipo_componente', 'Tipo Componente', 'required|numeric');
         
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
          
          if(  $this->form_validation->run())
          { 
           $mensaje="";  
           $nombre =$this->input->post("nombre");
           $descripcion =$this->input->post("descripcion");
           $tipo_componente =$this->input->post("tipo_componente");
           
           $this->load->model("m_componente");
          if( $this->m_componente->insertar_componente($nombre,$descripcion,$tipo_componente)){
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
}
    }
    
     public function modificar_ajax(){
         if($this->input->is_ajax_request())
        {
//             $this->load->helper('security');
         $this->form_validation->set_rules('cod_m', 'Código', 'required|numeric|max_length[10]');
       
         $this->form_validation->set_rules('nombre_c', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('descripcion_m', 'Descripción ', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('tipo_componente_m', 'TipoComponente', 'required|numeric');
         
          
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
        
             
          if(  $this->form_validation->run())
          {   
           $code =$this->input->post("cod_m");
          
           $nombre =$this->input->post("nombre_c");
           $descripcion =$this->input->post("descripcion_m");
           $tipo_componente =$this->input->post("tipo_componente_m");
           
           $this->load->model("m_componente");
          
           if( $this->m_componente->actualizar_componente($code,$nombre,$descripcion,$tipo_componente)){
            echo json_encode(array("status" => "success"));
           }else{
                echo json_encode(array("status" => "error"));
           }
        }else{
              echo json_encode(array("error"=> validation_errors()));
        }
        }
    }
    
   
     function letras_acentos_formato($fullname){ //letras y acentos
        if(preg_match('/^[a-záé íóúñüÁÉÍÓÚÑÜ]+$/i',$fullname)){
            return true;
        }else{
            return false;
        }
   }

     function letras_formato($fullname){ //solo letras sin acentos
        if (! preg_match('/^[a-zA-Z]+$/', $fullname)) {
       return FALSE;
        } else {
        return TRUE;
        }
   }
    
   
   public function  imprimir(){
       $this->load->model("m_componente");
     $lista=  $this->m_componente->imprimir_tabla();
     print_r($lista);
     
   } 


   public function eliminar_componente() {

        if ($this->input->is_ajax_request()) {
            
            $id_c = $this->input->post("id_cc");
            $this->load->model("m_componente");
            $this->m_componente->eliminar_componente($id_c);
            echo json_encode(array("status" => "success"));
        
        }
    }
    
}
