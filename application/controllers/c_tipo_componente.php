<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_tipo_componente
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class c_tipo_componente extends CI_Controller {
    public function _construct() {
         parent::_construct();
    }
    
    public function index() {
       if($this->session->userdata('id_tipo_usuario')!=null){ // si no inicio sesion lo manda al login
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_tipo_componente");
        $this->load->view("v_footer");
         }else{
            redirect(base_url("index.php/c_crud/login"));
        }
    }
    public function index_mensaje($mensaje) {
       if($this->session->userdata('id_tipo_usuario')!=null){ // si no inicio sesion lo manda al login
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_tipo_componente", compact("mensaje"));
        $this->load->view("v_footer");
         }else{
            redirect(base_url("index.php/c_crud/login"));
        }
    }

    public function listar_tipos_componentes() {
        $this->load->model("m_tipo_componente");
        echo json_encode($this->m_tipo_componente->listar_tipo_componente());
    }

    public function insertar_tipo_componente(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
         $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('descripcion', 'Descripción ', 'required|callback_letras_acentos_formato');
       
         
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
          
          if(  $this->form_validation->run())
          { 
           $mensaje="";  
           $nombre =$this->input->post("nombre");
           $descripcion =$this->input->post("descripcion");
         
           
           $this->load->model("m_tipo_componente");
          if( $this->m_tipo_componente->insertar_tipo_componente($nombre,$descripcion)){
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
    
     public function modificar_tipo_componente_ajax(){
         if($this->input->is_ajax_request())
        {
//             $this->load->helper('security');
              
         $this->form_validation->set_rules('cod_tc', 'Código', 'required|numeric|max_length[10]');
       
         $this->form_validation->set_rules('nombre_tc', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('descripcion_tc', 'Descripción ', 'required|callback_letras_acentos_formato');
       
         
          
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
        
             
          if(  $this->form_validation->run())
          {   
           $code =$this->input->post("cod_tc");
          
           $nombre =$this->input->post("nombre_tc");
           $descripcion =$this->input->post("descripcion_tc");
          
           
           $this->load->model("m_tipo_componente");
          
           if( $this->m_tipo_componente->actualizar_tipo_componente($code,$nombre,$descripcion)){
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
    
    public function eliminar_tipocomponente() {

        if ($this->input->is_ajax_request()) {
            
            $id_c = $this->input->post("id_tcc");
            $this->load->model("m_tipo_componente");
            $this->m_tipo_componente->eliminar_tipo_componente($id_c);
            echo json_encode(array("status" => "success"));
        
        }
    }
    
}
