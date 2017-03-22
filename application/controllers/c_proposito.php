<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_proposito
 *
 * @author Alejandro
 */
class c_proposito extends CI_Controller {

    public function _construct() {
        parent::_construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));

        $this->load->model('m_proposito');
    }

    public function index() {
        if ( $this->session->userdata('id_tipo_usuario') == null) {
            redirect(base_url() . 'index.php/login');
        } else {
            $this->load->model('m_proposito');
            $data = array('titulo' => 'Crud en codeigniter',
                'prop' => $this->m_proposito->get_pro());
            $this->load->helper('form');

            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
           $this->load->view("v_menu_items");
            $this->load->view('v_pro', $data);
        }
    }

    public function agre_pro() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        $this->form_validation->set_rules('observacion_final', 'Observacion_final', 'required');
        $this->form_validation->set_rules('activo_pro', 'Activo_pro', 'required');
        if ($this->form_validation->run() === true) {
            $id_proposito = '';
            $nombre = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion');
            $observacion_final = $this->input->post('observacion_final');
            $activo_pro = $this->input->post('activo_pro');
            $this->load->model('m_proposito');
            $mensaje = "";
            if ($this->m_proposito->inser_pro($id_proposito,$nombre,$descripcion,$observacion_final,$activo_pro)) {
                echo "<script>alert('Datos insertados!');</script>";
            } else {
                echo "<script>alert('Error al insertar!');</script>";
            }
            $this->load->helper('form');
            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
            $this->load->view("v_menu_items");
            $data = array('titulo' => 'Crud en codeigniter',
                'prop' => $this->m_proposito->get_pro());
            //$this->load->view('v_cliente', compact('mensaje'));
            $this->load->view('v_pro', $data);
        } else {
            $data = array('titulo' => 'Crud en codeigniter',
                'prop' => $this->m_proposito->get_pro());

            $this->load->helper('form');
            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
            $this->load->view("v_menu_items");
            $this->load->view('v_pro', $data);
        }
    }

    public function delete_pro() {
        //comprobamos si es una petición ajax y existe la variable post id
        if ($this->input->is_ajax_request() && $this->input->post('id')) {
            $this->load->model('m_proposito');
            $id = $this->input->post('id');

           
            $this->m_proposito->delete_pro($id);
        }
    }

    //con esta función añadimos y editamos usuarios dependiendo 
    //si llega la variable post id, en ese caso editamos
    public function multi_pro() {
        //comprobamos si es una petición ajax
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion_e', 'Descripcion', 'required');
        $this->form_validation->set_rules('observacion_final_e', 'Observacion_final', 'required');
        
            /* $this->form_validation->set_message('required','El %s es obligatorio');
              $this->form_validation->set_message('valid_email','El %s no es válido');
              $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
              $this->form_validation->set_message('min_length', 'El %s no puede tener menos de %s carácteres'); */
            if ($this->form_validation->run() == FALSE) {
                //de esta forma devolvemos los errores de formularios
                //con ajax desde codeigniter, aunque con php es lo mismo
                $errors = array(
                    'nombre' => form_error('nombre'),
                    'descripcion_e' => form_error('descripcion_e'),
                    'observacion_final_e' => form_error('observacion_final_e')
                );
                //y lo devolvemos así para parsearlo con JSON.parse
                echo json_encode($errors);
                return FALSE;
            } else {
                $nombre = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion_e');
            $observacion_final = $this->input->post('observacion_final_e');
            
                //si estamos editando
                if ($this->input->post('id')) {
                    $id_proposito = $this->input->post('id');
                    $this->load->model('m_proposito');
                    $this->m_proposito->edit_pro($id_proposito,$nombre,$descripcion,$observacion_final);
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
