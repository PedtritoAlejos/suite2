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
    public function index_formulario($idvalor, $componente, $resultado,$idsistema){
      
        
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_actualizar_valor", compact("idvalor","componente","resultado","idsistema"));
        $this->load->view("v_footer");
    }
    
    public function index_mensaje($mensaje){
        $componente = $this->listar_componente();
        $sistema = $this->listar_sistema();
        $muestra = $this->listar_muestra();
        
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_valor", compact("componente","sistema","muestra","mensaje"));
        $this->load->view("v_footer");
    }
    public function index_datos($datos,$sistemamsj){
        $componente = $this->listar_componente();
        $sistema = $this->listar_sistema();
        $muestra = $this->listar_muestra();
        
        $this->load->view("cabecera");
        $this->load->view("v_menu_superior");
        $this->load->view("v_menu_items");
        $this->load->view("v_valor", compact("componente","sistema","muestra","datos","sistemamsj"));
        $this->load->view("v_footer");
    }
    
   public function reenviar() {
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('id_valor', 'Valor', 'required|numeric');
            $this->form_validation->set_rules('resultado', 'Resultado', 'required');
            $this->form_validation->set_rules('componente', 'Componente', 'required');
            if($this->form_validation->run()){
                $idvalor =$this->input->post("id_valor");
                $resultado=$this->input->post("resultado");
                $componente=$this->input->post("componente");
                $idsistema=$this->input->post("id_sistema");
                $this->index_formulario($idvalor, $componente, $resultado,$idsistema);
            }else{
                $this->index();
            }
            
           
       }else{
           $this->index();
       }
   } 
   
   
   
   public function modificar_valor(){
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $mensaje="";
            $this->form_validation->set_rules('idvalor', 'Valor', 'required|numeric');
            $this->form_validation->set_rules('resultado_nuevo', 'Resultado', 'required|xss_clean|strip_tags');
            
           if($this->form_validation->run()){
               
            $idvalor= $this->input->post("idvalor");
            $resultado = $this->input->post("resultado_nuevo");
            $idsistema = $this->input->post("idsistema");
            $this->load->model("m_valor");
            if($this->m_valor->actualizar($resultado ,$idvalor)){
                $mensaje="<script>alert('Actualizado correctamente');</script>";
            }else{
                 $mensaje="<script>alert('Error al actualizar');</script>";
            }
            $datos =$this->mostrar($idsistema);
            $this->index_datos($datos, $mensaje) ;
           }else{
                $this->index();
           }
             
         }else{
             $this->index();
         }
       
       
   }
    
    public function buscar(){
         $this->form_validation->set_rules('sistema_select', 'Sistema', 'required|numeric');
         
         $sis = $this->input->post('sistema_select');
         $this->form_validation->set_message('numeric', 'El formato debe ser númerico');
         $this->form_validation->set_message('required', 'El campo {field} es requerido');
            if($this->form_validation->run()){
                $codesistema= $this->input->post("sistema_select");
              $sistemamsj="El código del sistema es : ".$sis;

         $this->index_datos($this->mostrar($codesistema),$sistemamsj);
             
            }else{
                $this->index();
            }
    }
    
    public function eliminar(){
        $mensaje="";
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             
          $this->form_validation->set_rules('id_valor', 'Valor', 'required|numeric');
             
          $this->form_validation->set_message('numeric', 'El formato debe ser númerico');
          $this->form_validation->set_message('required', 'El campo {field} es requerido');
             
          if($this->form_validation->run()) /**/
            {
              $code =$this->input->post("id_valor");
              $this->load->model("m_valor");
              if($this->m_valor->eliminar_valor($code)){
                 $mensaje="<script>alert('Eliminado correctamente el valor con el código :".$code." ');</script>";
              }else{
                   $mensaje="<script>alert('Error al eliminar el valor con el código :".$code." ');</script>";
              }
              $datos =$this->mostrar($this->input->post("id_sistema"));
              
               $this->index_datos($datos, $mensaje);
              
              
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
         $this->form_validation->set_rules('resultado', 'Resultado', 'required');
        
      
         
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
