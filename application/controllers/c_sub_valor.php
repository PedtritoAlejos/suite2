<?php


class c_sub_valor extends CI_Controller {

    public function _construct() {
        parent::_construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('m_sub_valor');
    }

    public function index() {
        if ($this->session->userdata('id_tipo_usuario') == null) {
            redirect(base_url() . 'index.php/login');
        } else {
            $this->load->model('m_sub_valor');
            $data['valor_s'] = $this->m_sub_valor->get_valor();
            $data['sub_v'] = $this->m_sub_valor->get_sub_v();
            $this->load->helper('form');

            $this->load->view("cabecera");
            $this->load->view("v_menu_superior");
             $this->load->view("v_menu_items");
            $this->load->view('v_sub', $data);
        }
    }

    public function agre_sub() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre_sv', 'Nombre_sv', 'required');
        $this->form_validation->set_rules('resultado_sv', 'Resultado_sv', 'required');
        $this->form_validation->set_rules('activo_sv', 'Activo_sv', 'required');
        $this->form_validation->set_rules('id_valor', 'Id_valor', 'required');
        if ($this->form_validation->run() === true) {
            $id_sub_valor = '';
            $nombre_sv = $this->input->post('nombre_sv');
            $resultado_sv = $this->input->post('resultado_sv');
            $activo_sv = $this->input->post('activo_sv');
            $id_valor = $this->input->post('id_valor');
            $this->load->model('m_sub_valor');
            $mensaje = "";
            if ($this->m_sub_valor->inser_sub_v($id_sub_valor,$nombre_sv,$resultado_sv,$activo_sv,$id_valor)) {
                echo "<script>alert('Datos insertados!');</script>";
            } else {
                echo "<script>alert('Error al insertar!');</script>";
            }
            $this->load->helper('form');
            redirect(base_url("index.php/c_sub_valor"), "refresh");
            return true;
        } else {
            
            $this->load->helper('form');
            redirect(base_url("index.php/c_sub_valor"), "refresh");
        }
    }

    public function delete_sub() {
        //comprobamos si es una petición ajax y existe la variable post id
        if ($this->input->is_ajax_request() && $this->input->post('id')) {
            $this->load->model('m_sub_valor');
            $id = $this->input->post('id');

           
            $this->m_sub_valor->delete_sub_v($id);
        }
    }

    //con esta función añadimos y editamos usuarios dependiendo 
    //si llega la variable post id, en ese caso editamos
    public function multi_sub() {
        //comprobamos si es una petición ajax
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nombre_sv_e', 'Nombre', 'required');
        $this->form_validation->set_rules('resultado_sv_e', 'Resultado', 'required');
     
        
            /* $this->form_validation->set_message('required','El %s es obligatorio');
              $this->form_validation->set_message('valid_email','El %s no es válido');
              $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
              $this->form_validation->set_message('min_length', 'El %s no puede tener menos de %s carácteres'); */
            if ($this->form_validation->run() == FALSE) {
                //de esta forma devolvemos los errores de formularios
                //con ajax desde codeigniter, aunque con php es lo mismo
                $errors = array(
                    'nombre_sv_e' => form_error('nombre_sv_e'),
                    'resultado_sv_e' => form_error('resultado_sv_e')
                );
                //y lo devolvemos así para parsearlo con JSON.parse
                echo json_encode($errors);
                return FALSE;
            } else {
                $nombre_sv = $this->input->post('nombre_sv_e');
            $resultado_sv = $this->input->post('resultado_sv_e');
            
            
                //si estamos editando
                if ($this->input->post('id')) {
                    $id_sub_valor = $this->input->post('id');
                    $this->load->model('m_sub_valor');
                    $this->m_sub_valor->edit_sub_v($id_sub_valor,$nombre_sv,$resultado_sv);
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