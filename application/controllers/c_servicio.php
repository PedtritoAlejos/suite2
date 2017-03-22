<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_servicio
 *
 * @author Alejandro
 */
class c_servicio extends CI_Controller {

    public function _construct() {
        parent::_construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('m_servicio');
    }

    public function index() {
        if ($this->session->userdata('id_tipo_usuario') == null) {
            redirect(base_url() . 'index.php/login');
        } else {
            $this->load->model('m_servicio');
            $data['t_tipo'] = $this->m_servicio->get_tipo();
            $data['t_usu'] = $this->m_servicio->get_usu();
            $data['t_cli'] = $this->m_servicio->get_clien();
            $data['t_serv'] = $this->m_servicio->get_serv();
            $this->load->helper('form');
            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
            $this->load->view("v_menu_items");
            $this->load->view('v_serv', $data);
        }
    }

    public function agre_serv() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        $this->form_validation->set_rules('activo_serv', 'Activo_serv', 'required');
        $this->form_validation->set_rules('id_tipo_servicio', 'Id_tipo_servicio', 'required');
        $this->form_validation->set_rules('run_usuario', 'Run_usuario', 'required');
        $this->form_validation->set_rules('id_cliente', 'Id_cliente', 'required');
        if ($this->form_validation->run() === true) {
            $id_servicio = '';
            $nombre = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion');
            $activo_serv = $this->input->post('activo_serv');
            $id_tipo = $this->input->post('id_tipo_servicio');
            $id_usuario = $this->input->post('run_usuario');
            $id_cliente = $this->input->post('id_cliente');
            $this->load->model('m_servicio');
            
            if ($this->m_servicio->inser_serv($id_servicio, $nombre, $descripcion, $activo_serv, $id_tipo, $id_usuario, $id_cliente)) {
                echo "<script>alert('Datos insertados!');</script>";
            } else {
                echo "<script>alert('Error al insertar!');</script>";
            }
            $this->load->helper('form');
            redirect(base_url("index.php/c_servicio"), "refresh");
            return true;
        } else {

            $this->load->helper('form');
            redirect(base_url("index.php/c_servicio"), "refresh");
        }
    }

    public function delete_serv() {
        //comprobamos si es una petición ajax y existe la variable post id
        if ($this->input->is_ajax_request() && $this->input->post('id')) {
            $this->load->model('m_servicio');
            $id = $this->input->post('id');


            $this->m_servicio->delete_serv($id);
        }
    }

    //con esta función añadimos y editamos usuarios dependiendo 
    //si llega la variable post id, en ese caso editamos
    public function multi_serv() {
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
                    $id_servicio = $this->input->post('id');
                    $this->load->model('m_servicio');
                    $this->m_servicio->edit_serv($id_servicio, $nombre, $descripcion);
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
