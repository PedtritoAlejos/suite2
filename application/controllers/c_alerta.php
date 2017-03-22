<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_alerta
 *
 * @author Alejandro
 */
class c_alerta extends CI_Controller {

    public function _construct() {
        parent::_construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('m_alerta');
    }

    public function index() {
        if ( $this->session->userdata('id_tipo_usuario') == null) {
            redirect(base_url() . 'index.php/login');
        } else {
            $this->load->model('m_alerta');
            $data['sistem'] = $this->m_alerta->get_sistem();
            $data['alertt'] = $this->m_alerta->get_alert();
            $this->load->helper('form');

            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
             $this->load->view("v_menu_items");
            $this->load->view('v_alert', $data);
        }
    }

    public function agre_alert() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        $this->form_validation->set_rules('activo_alert', 'Activo_alert', 'required');
        $this->form_validation->set_rules('id_sistema', 'Id_sistema', 'required');
        if ($this->form_validation->run() === true) {
            $id_proposito = '';
            $nombre = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion');
            $activo_alert = $this->input->post('activo_alert');
            $id_sistema = $this->input->post('id_sistema');
            $this->load->model('m_alerta');
            $mensaje = "";
            if ($this->m_alerta->inser_alert($id_proposito,$nombre,$descripcion,$activo_alert,$id_sistema)) {
                echo "<script>alert('Datos insertados!');</script>";
            } else {
                echo "<script>alert('Error al insertar!');</script>";
            }
            $this->load->helper('form');
            redirect(base_url("index.php/c_alerta"), "refresh");
            return true;
        } else {
            
            $this->load->helper('form');
            redirect(base_url("index.php/c_alerta"), "refresh");
        }
    }

    public function delete_alert() {
        //comprobamos si es una petición ajax y existe la variable post id
        if ($this->input->is_ajax_request() && $this->input->post('id')) {
            $this->load->model('m_alerta');
            $id = $this->input->post('id');

           
            $this->m_alerta->delete_alert($id);
        }
    }

    //con esta función añadimos y editamos usuarios dependiendo 
    //si llega la variable post id, en ese caso editamos
    public function multi_alert() {
        //comprobamos si es una petición ajax
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion_e', 'Descripcion', 'required');
     
        
            /* $this->form_validation->set_message('required','El %s es obligatorio');
              $this->form_validation->set_message('valid_email','El %s no es válido');
              $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
              $this->form_validation->set_message('min_length', 'El %s no puede tener menos de %s carácteres'); */
            if ($this->form_validation->run() == FALSE) {
                //de esta forma devolvemos los errores de formularios
                //con ajax desde codeigniter, aunque con php es lo mismo
                $errors = array(
                    'nombre' => form_error('nombre'),
                    'descripcion_e' => form_error('descripcion_e')
                );
                //y lo devolvemos así para parsearlo con JSON.parse
                echo json_encode($errors);
                return FALSE;
            } else {
                $nombre = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion_e');
            
            
                //si estamos editando
                if ($this->input->post('id')) {
                    $id_alerta = $this->input->post('id');
                    $this->load->model('m_alerta');
                    $this->m_alerta->edit_alert($id_alerta,$nombre,$descripcion);
                    //si estamos agregando un usuario
                } else {
                    //$this->m_cliente->new_user($nombre,$email);
                }
                //en cualquier caso damos ok porque todo ha salido bien
                //habría que hacer la comprobación de la respuesta del modelo
                $response = array(
                    'respuesta' => 'ok'
                );
                echo json_encode($response);
            }
        }
    }
}
