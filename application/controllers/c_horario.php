<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_horario
 *
 * @author Alejandro
 */
class c_horario extends CI_Controller {

    public function _construct() {
        parent::_construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));

        $this->load->model('m_cliente');
    }

    public function index() {
        if ($this->session->userdata('id_tipo_usuario') == null) {
            redirect(base_url() . 'index.php/login');
        } else {
            $this->load->model('m_cliente');

            $data['aler'] = $this->m_cliente->get_alerta();
            $data['horari'] = $this->m_cliente->get_horario();
            $this->load->helper('form');

            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
             $this->load->view("v_menu_items");
            $this->load->view('v_horario', $data);
        }
    }

    public function agre_horario() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('alertaforan', 'Alertaforan', 'required');
        $this->form_validation->set_rules('fecha_h', 'Fecha_h', 'required');
        $this->form_validation->set_rules('hora_h', 'Hora_h', 'required');
        $this->form_validation->set_rules('minuto_h', 'Minuto_h', 'required');
        $this->form_validation->set_rules('activo_h', 'Activo_h', 'required');
        if ($this->form_validation->run() === true) {

            $id_horario = '';
            $id_alerta = $this->input->post('alertaforan');
            $fecha_h = $this->input->post('fecha_h');
            //$f_fecha = date_create_from_format('M/d/Y', $fecha_h);
            $hora = $this->input->post('hora_h');
            $minuto = $this->input->post('minuto_h');
            $activo_ho = $this->input->post('activo_h');
            $this->load->model('m_cliente');
            $format = 'm-d-Y';
$date = DateTime::createFromFormat($format, $fecha_h);
            //date("d-m-Y", strtotime($fecha_h));
            echo "<script>alert('"+$date->format('Y-m-d')+"');</script>";

            $mensaje = "";
            if ($this->m_cliente->inser_horario($id_horario, $minuto, $hora, $date->format('d'), $date->format('m'), $date->format('Y'), $activo_ho, $id_alerta)) {


                echo "<script>alert('Datos insertados!');</script>";
            } else {
                echo "<script>alert('Error al insertar!');</script>";
            }
            $this->load->model('m_cliente');
            $this->load->helper('form');
            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
            $this->load->view("v_menu_items");
            $data['aler'] = $this->m_cliente->get_alerta();
            $data['horari'] = $this->m_cliente->get_horario();
            //$this->load->view('v_cliente', compact('mensaje'));
            $this->load->view('v_horario', $data );
        } else {
            $this->load->model('m_cliente');
            $data['aler'] = $this->m_cliente->get_alerta();
            $data['horari'] = $this->m_cliente->get_horario();

            $this->load->helper('form');
            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
             $this->load->view("v_menu_items");
            $this->load->view('v_horario', $data );
        }
    }

    public function multi_hora() {

        //comprobamos si es una petición ajax
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('minuto_e', 'Minuto_e', 'required');
            $this->form_validation->set_rules('hora_e', 'Hora_e', 'required');
            $this->form_validation->set_rules('fechaf_e', 'Fechaf_e', 'required');
            $this->form_validation->set_rules('activo_ho_e', 'Activo_ho_e', 'required');




            /* $this->form_validation->set_message('required','El %s es obligatorio');
              $this->form_validation->set_message('valid_email','El %s no es válido');
              $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
              $this->form_validation->set_message('min_length', 'El %s no puede tener menos de %s carácteres'); */

            if ($this->form_validation->run() == FALSE) {

                //de esta forma devolvemos los errores de formularios
                //con ajax desde codeigniter, aunque con php es lo mismo
                $errors = array(
                    'minuto_e' => form_error('minuto_e'),
                    'hora_e' => form_error('hora_e'),
                    'dia_del_mes' => form_error('dia_del_mes'),
                    'numero_mes_e' => form_error('numero_mes_e'),
                    'anho_e' => form_error('anho_e'),
                    'activo_ho_e' => form_error('activo_ho_e')
                );
                //y lo devolvemos así para parsearlo con JSON.parse
                echo json_encode($errors);

                return FALSE;
            } else {

                $minuto = $this->input->post('minuto_e');
                $hora = $this->input->post('hora_e');
                
                $fechaf_e = $this->input->post('fechaf_e');
                $format = 'd-m-Y';
$date = DateTime::createFromFormat($format, $fechaf_e);
                $activo_ho = $this->input->post('activo_ho_e');
                //si estamos editando
                if ($this->input->post('id')) {

                    $id = $this->input->post('id');
                    $this->load->model('m_cliente');
                    $this->m_cliente->edit_hora($id, $minuto, $hora, $date->format('d'), $date->format('m'), $date->format('Y'),$activo_ho);

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

    public function delete_hora() {

        //comprobamos si es una petición ajax y existe la variable post id
        if ($this->input->is_ajax_request() && $this->input->post('id')) {
            $this->load->model('m_cliente');
            $id = $this->input->post('id');

            echo 'esto es ' . $id;
            $this->m_cliente->delete_hora($id);
        }
    }

}
