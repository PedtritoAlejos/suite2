<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_cliente
 *
 * @author Alejandro
 */
class c_cliente extends CI_Controller {

    public function _construct() {
        parent::_construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));

        $this->load->model('m_cliente');
    }

    public function index() {
        
        if($this->session->userdata('id_tipo_usuario')!=null){
            $this->load->model('m_cliente');
           $data = array('titulo' => 'Crud en codeigniter',
					  'users' => $this->m_cliente->get_cli());
            $this->load->helper('form');

            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
            $this->load->view("v_menu_items");
            $this->load->view('v_cliente',$data);
            }else{
            redirect(base_url("index.php/c_crud/login"));
        }
        
    }
    
    public function eliminar_cliente(){
         
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            $this->load->model("m_cliente");
            $this->m_usuario->eliminar_usuario($id);
            echo json_encode(array("status" => "success"));
        }
    
    }
    public function get_clientes_todos(){
        $this->load->model("m_cliente");
         echo   json_encode($this->m_cliente->get_cliente());
        
    }
    public function modificar_ajax(){
         if($this->input->is_ajax_request())
        {
             $this->form_validation->set_rules('idc', 'Id', 'required');
         $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion_cliente', 'Descripcion_cliente', 'required');
        $this->form_validation->set_rules('fecha_inicio', 'Fecha_inicio', 'required');
        $this->form_validation->set_rules('fecha_final', 'Fecha_final', 'required');
          
             
          if(  $this->form_validation->run())
          {   
             $idc = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $descrip = $this->input->post('descripcion_cliente');
            $fecha_i = $this->input->post('fecha_inicio');
            $fecha_f = $this->input->post('fecha_final');
            $this->load->model('m_cliente');
           
          
           if( $this->m_cliente->actualizar_cliente($idc,$nombre,$descrip,$fecha_i,$fecha_f)){
            echo json_encode(array("status" => "success"));
           }else{
                echo json_encode(array("status" => "error"));
           }
        }else{
              echo 'no' /*json_encode(array("error"=> validation_errors()))*/;
        }
        }
    }
    /*
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
*/
    public function agre_client() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion_cliente', 'Descripcion_cliente', 'required');
        $this->form_validation->set_rules('fecha_inicio', 'Fecha_inicio', 'required');
        $this->form_validation->set_rules('fecha_final', 'Fecha_final', 'required');
        $this->form_validation->set_rules('activo', 'Activo', 'required');
        if ($this->form_validation->run() === true) {
            $id_cliente = '';
            $nombre = $this->input->post('nombre');
            $descrip = $this->input->post('descripcion_cliente');
            $fecha_i = $this->input->post('fecha_inicio');
            $fecha_f = $this->input->post('fecha_final');
            $activo =$this->input->post('activo');
            $this->load->model('m_cliente');
            $mensaje = "";
            if ($this->m_cliente->inser_cliente($id_cliente, $nombre, $descrip, $fecha_i, $fecha_f,$activo)) {
                $mensaje = "Datos insertados!";
            } else {
                $mensaje = "Error al insertar!";
            }
            $this->load->helper('form');
            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
            $this->load->view("v_inicio");
$data = array('titulo' => 'Crud en codeigniter',
					  'users' => $this->m_cliente->get_cli());
               //$this->load->view('v_cliente', compact('mensaje'));
                       $this->load->view('v_cliente', $data);
        } else {
            $data = array('titulo' => 'Crud en codeigniter',
					  'users' => $this->m_cliente->get_cli());
            
            $this->load->helper('form');
            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
            $this->load->view("v_inicio");
            $this->load->view('v_cliente',$data);
        }
        
        
        
        
        
        
        
        
        
        
    }
        
        
        
        public function delete_user()
    {
        
        //comprobamos si es una petición ajax y existe la variable post id
        if($this->input->is_ajax_request() && $this->input->post('id'))
        {
$this->load->model('m_cliente');
        	$id = $this->input->post('id');

            echo 'esto es '.$id;
			$this->m_cliente->delete_cli($id);

        }

    }
 
 	//con esta función añadimos y editamos usuarios dependiendo 
 	//si llega la variable post id, en ese caso editamos
    public function multi_user()
    {

    	//comprobamos si es una petición ajax
    	if($this->input->is_ajax_request())
        {

        	$this->form_validation->set_rules('descripcion_e', 'Descripcion', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('fecha_inicio_e', 'Fecha_inicio', 'required');
            $this->form_validation->set_rules('fecha_final_e', 'Fecha_final', 'required');
            

            
            
            /*$this->form_validation->set_message('required','El %s es obligatorio');
            $this->form_validation->set_message('valid_email','El %s no es válido');
            $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
            $this->form_validation->set_message('min_length', 'El %s no puede tener menos de %s carácteres');*/

            if($this->form_validation->run() == FALSE)
            {

            	//de esta forma devolvemos los errores de formularios
            	//con ajax desde codeigniter, aunque con php es lo mismo
            	$errors = array(
				    'nombre' => form_error('nombre'),
				    'descripcion_e' => form_error('descripcion_e'),
                    'fecha_inicio_e' => form_error('fecha_inicio_e'),
                    'fecha_final_e' => form_error('fecha_final_e')
				);
            	//y lo devolvemos así para parsearlo con JSON.parse
				echo json_encode($errors);

				return FALSE;

            }else{

            	$nombre = $this->input->post('nombre');
	        	$descripcion = $this->input->post('descripcion_e');
$fecha_inicio = $this->input->post('fecha_inicio_e');
	        	$fecha_final = $this->input->post('fecha_final_e');
	        	//si estamos editando
            	if($this->input->post('id'))
            	{

            		$id = $this->input->post('id');
                    $this->load->model('m_cliente');
            		$this->m_cliente->edit_cli($id,$nombre,$descripcion,$fecha_inicio,$fecha_final);

            	//si estamos agregando un usuario
            	}else{

            		//$this->m_cliente->new_user($nombre,$email);

            	}
	        	
	        	//en cualquier caso damos ok porque todo ha salido bien
	        	//habría que hacer la comprobación de la respuesta del modelo

	        	$response = array(
				    'respuesta'	=>	'ok'
				);
            	
				echo json_encode($response);

            }
 
        }
        
    }
    

}
