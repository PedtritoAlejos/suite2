<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_plataforma
 *
 * @author pedrito
 */
class c_plataforma extends CI_Controller{
    //put your code here
     public function _construct() {
         parent::_construct();
    }
    public function index(){
        $lista=$this->listar_cliente();
        $lista_ts=$this->mostrar_ts();
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_plataforma", compact("lista","lista_ts"));
        $this->load->view("v_footer");
    }
    public function index_mensaje($mensaje){
        $lista=$this->listar_cliente();
        $lista_ts=$this->mostrar_ts();
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_plataforma", compact("lista","lista_ts","mensaje"));
        $this->load->view("v_footer");
    }
   
    public function mostrar_ts(){
        $this->load->model("m_plataforma");
       return $this->m_plataforma->listar_tp_servicio(); 
    }
    public function lis_com(){
        $this->load->model("m_plataforma");
     echo json_encode( $this->m_plataforma->listar_plataforma());
    }

    public function listar_cliente(){
         $this->load->model("m_plataforma");
        return $this->m_plataforma->listar_cliente(); 
    }
    /*------------------------------------------------------------------------*/
    
    public function formulario_plataforma(){
          if($this->input->post()){
              $mensaje="valor por defecto";
                /*datos del servidor*/
            $this->form_validation->set_rules('nombre_servidor', 'Nombre', 'required|callback_letras_acentos_formato');
            $this->form_validation->set_rules('cpu', 'CPU', 'required|numeric');
            $this->form_validation->set_rules('ram', 'Ram', 'required|numeric');
            $this->form_validation->set_rules('so', 'nombreservicio', 'required|callback_letras_acentos_formato');
            $this->form_validation->set_rules('ip', 'IP', 'required|valid_ip');
            $this->form_validation->set_rules('run_usuario', 'Run', 'required');
            /*datos del servicio*/
            $this->form_validation->set_rules('servicio', 'Servicio', 'required|callback_letras_acentos_formato');
            $this->form_validation->set_rules('proposito', 'Propósito', 'required|callback_letras_acentos_formato');
            $this->form_validation->set_rules('ds_po', 'Descripción_propósito', 'required|callback_letras_acentos_formato');
            $this->form_validation->set_rules('descripcion', 'Descripción', 'required|callback_letras_acentos_formato');
            $this->form_validation->set_rules('id_cliente', 'Cliente', 'required|numeric');
            $this->form_validation->set_rules('tipo_servicio', 'Tipo servicio', 'required|numeric');
            
            
            $this->form_validation->set_message("required", "El campo %s es requerido");
            $this->form_validation->set_message("valid_ip", "El campo %s no tiene el formato correcto");
            $this->form_validation->set_message("letras_acentos_formato", "El campo %s no tiene el formato correcto");
            $this->form_validation->set_message("numeric", "El campo %s debe ser númerico");
            
            
           if($this->form_validation->run()===true){
             $id_proposito = $this->insertar_proposito($this->input->post("proposito"), $this->input->post("ds_po"));
             if(is_numeric($id_proposito)){
                 $id_servicio =$this->agregar_servicio($this->input->post("servicio"), $this->input->post("descripcion"),
             $this->input->post("tipo_servicio")  , $this->input->post("run_usuario"), $this->input->post("id_cliente"));
                 if(is_numeric($id_servicio)){
                 $id_cliente= $this->input->post("id_cliente");
                 $nombre_servidor =$this->input->post("nombre_servidor");
                 $cpu=$this->input->post("cpu");
                 $ram=$this->input->post("ram");
                 $so=$this->input->post("so");
                 $ip=$this->input->post("ip");
              if( $this->insertar_plataforma($nombre_servidor, $cpu , $ram, $so,$ip , $id_cliente,
                 $id_proposito, $id_servicio)){
                  $mensaje=' <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>.  Agregado correctamente</div>'; 
                    
                    
              }else{
                   $mensaje=' <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>. Error al agregar!</div>'; 
                    
             }      
                 
                 }else{
                       $mensaje=' <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>.  Error al agregar servicio</div>'; 
                 }
                 
             }else{
                    $mensaje=' <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>.  Error al agregar propósito</div>'; 
             }
             
            $this->index_mensaje($mensaje);
           
             
           }else{
               $this->index();
           }
           
          }else {
               $this->index();
          }
    }
    
    /*--------------------metodos para agregar plataforma-------------------*/
      public function insertar_proposito($nombre,$descripcion) {
          $this->load->model("m_plataforma");
          return $this->m_plataforma->agregar_proposito($nombre,$descripcion);
      }
   
    public function agregar_servicio($nombre,$descripcion,$tipo_servicio,$run_usuario,$cliente){
        $this->load->model("m_plataforma");
        return $this->m_plataforma->insertar_servicio($nombre,$descripcion,$tipo_servicio,$run_usuario,$cliente);
    }
    public function insertar_plataforma($nombre,$cpu,$ram,$so,$ip,$id_cliente,$id_proposito,$id_servicio){
        $this->load->model("m_plataforma");
      return  $this->m_plataforma->agregar_plataforma ($nombre,$cpu,$ram,$so,$ip,$id_cliente,$id_proposito,$id_servicio);
        
    }
    
    /*-------------------------------------------------------*/
     public function eliminar_plataforma() {

        if ($this->input->is_ajax_request()) {
            
            $id_plataforma = $this->input->post("id_plataforma");
            $this->load->model("m_plataforma");
           if( $this->m_plataforma->eliminar_plataforma($id_plataforma)){
               echo json_encode(array("status" => "success")); 
           }else{
                echo json_encode(array("status" => "error"));
           }
           
        
        }
    }
     
      public function modificar_plataforma_ajax(){
         if($this->input->is_ajax_request())
        {
//             $this->load->helper('security');
         $this->form_validation->set_rules('cod_pla', 'Código', 'required|numeric|max_length[10]');
       
         $this->form_validation->set_rules('nombre_pla', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('cpu_pla', 'CPU ', 'required|numeric');
         $this->form_validation->set_rules('ram_pla', 'RAM', 'required|numeric');
         $this->form_validation->set_rules('ip_pla', 'IP', 'required|valid_ip');
         $this->form_validation->set_rules('so_pla', 'S.O', 'required|callback_letras_acentos_formato');
         
          
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('valid_ip', 'El campo {field} no tiene el formato correcto.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
        
             
          if(  $this->form_validation->run())
          {   
  
           $code =$this->input->post("cod_pla");
           $nombre =$this->input->post("nombre_pla");
           $cpu =$this->input->post("cpu_pla");
           $ram =$this->input->post("ram_pla");
           $ip =$this->input->post("ip_pla");
           $so =$this->input->post("so_pla");
           
           $this->load->model("m_plataforma");
          
           if( $this->m_plataforma->actualizar_plataforma($code,$nombre,$cpu,$ram,$ip,$so)){
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
