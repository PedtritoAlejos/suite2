<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_tipo_usuario
 *
 * @author pedrito
 */
class c_tipo_usuario extends CI_Controller{
    
    //put your code here

    public function index(){
           if($this->session->userdata('id_tipo_usuario')!=null){ // si no inicio sesion lo manda al login
       
      
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_tipo_usuario");
        $this->load->view("v_footer");
        }else{
            redirect(base_url("index.php/c_crud/login"));
        }
    }
    public function index_mensaje($mensaje){
           if($this->session->userdata('id_tipo_usuario')!=null){ // si no inicio sesion lo manda al login
       
      
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_tipo_usuario", compact("mensaje"));
        $this->load->view("v_footer");
        }else{
            redirect(base_url("index.php/c_crud/login"));
        }
    }
     public function insertar_tipousuario(){
       if(isset($_POST["nombre"] ))
       {
         
         $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|callback_letras_acentos_formato');
       
         
          
          $this->form_validation->set_message('required', 'El campo {field} es requerido');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras');
         
          if($this->form_validation->run()) /**/
          {
              $this->load->model("m_tipo_usuario");
                  
            if( $this->m_tipo_usuario->agregar_tipo_usuario($this->input->post("nombre"),$this->input->post("descripcion"))){
                $mensaje=' <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>.  Agregado correctamente</div>';
                  
                  $this->index_mensaje($mensaje);
           }else{
                    
                 $mensaje=' <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>. Ocurrio un error al agregar </div>';
                 $this->index_mensaje($mensaje);        
  }
               
          }else{
              $this->index();
          }
              
       }
    }
    
         public function modificar_ajax(){
         if($this->input->is_ajax_request())
        {
           $this->form_validation->set_rules('code_tu', 'Codigo', 'required|numeric');
            $this->form_validation->set_rules('nombre_tu', 'Nombre', 'required|callback_letras_acentos_formato|max_length[30]');
        
         $this->form_validation->set_rules('descri_tu', 'Descripción', 'required|callback_letras_acentos_formato|max_length[99]');
        
         
          
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
         
             
          if(  $this->form_validation->run())
          {   
           $id =$this->input->post("code_tu");
           $nombre =$this->input->post("nombre_tu");
           $descripcion =$this->input->post("descri_tu");
           
            $this->load->model("m_tipo_usuario");
          
           if( $this->m_tipo_usuario->actualizar_tipousuario($id,$nombre,$descripcion)){
            echo json_encode(array("status" => "success"));
           }else{
                echo json_encode(array("status" => "error"));
           }
        }else{
              echo json_encode(array("error"=> validation_errors()));
        }
        }
    }
    
         public function eliminar_tipousuario(){
         
            if($this->input->is_ajax_request())
            {

                $this->load->model("m_tipo_usuario");
               if( $this->m_tipo_usuario->eliminar_tipo_usuario($this->input->post("id_tuser")))
               {
                    echo json_encode(array("status" => "success"));
               }else{
                    echo json_encode(array("status" => "error"));
               }
           
         }
         
        }
    
        public function listar_tipos_usuarios() {
        $this->load->model("m_tipo_usuario");
        echo json_encode($this->m_tipo_usuario->get_tipo_usuarios());
    }
    
       function letras_formato($fullname){ //solo letras sin acentos
        if (! preg_match('/^[a-zA-Z]+$/', $fullname)) {
       return FALSE;
        } else {
        return TRUE;
        }
   }
   function letras_acentos_formato($fullname){ //letras y acentos
        if(preg_match('/^[a-záéíóúñüÁÉÍÓÚÑÜ ]+$/i',$fullname)){
            return true;
        }else{
            return false;
        }
   }
      
}
