<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_servicio
 *
 * @author Pedrito Alejos 
 */
class m_servicio extends CI_Model {
    //put your code here
    function ingresar_servicio($nombre,$descripcion,$id_tipoServicio,$run_usuario,$id_cliente){
          $sql= "INSERT INTO servicio(id_servicio, nombre, descripcion,id_tipo_servicio,run_usuario,id_cliente) VALUES(0,'". $nombre."', '". $descripcion ."','".$id_tipoServicio."','".$run_usuario."','".$id_cliente."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
    }
    /* metodo del alejandro */
    public function inser_serv($id_servicio, $nombre, $descripcion, $activo_serv, $id_tipo, $id_usuario, $id_cliente) {
        $data = array(
            'id_servicio' => $id_servicio,
            'nombre' => $nombre,
            'descripcion ' => $descripcion,
            'activo' => $activo_serv,
            'id_tipo_servicio' => $id_tipo,
            'run_usuario' => $id_usuario,
            'id_cliente' => $id_cliente
        );
        return $this->db->insert('servicio', $data);
    }

    public function get_serv() {
        $this->db->where('activo', 1);
        $query = $this->db->get('servicio');
        if ($query->num_rows() > 0) {

            return $query->result();
        }
    }

    public function delete_serv($id) {


        $data = array(
            'activo' => '0'
        );

        $this->db->where('id_servicio', $id);
        $this->db->update('servicio', $data);
    }

    public function edit_serv($id_servicio, $nombre, $descripcion) {

        $fecha = date('Y-m-d');

        $data = array(
            'nombre' => $nombre,
            'descripcion ' => $descripcion
        );

        $this->db->where('id_servicio', $id_servicio);
        $this->db->update('servicio', $data);
    }

    public function get_tipo() {
        $this->db->where('activo', 1);
        $query = $this->db->get('tipo_servicio');
        if ($query->num_rows() > 0) {

            return $query->result();
        }
    }

    public function get_usu() {
        $this->db->where('activo', 1);
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {

            return $query->result();
        }
    }

    public function get_clien() {
        $this->db->where('activo', 1);
        $query = $this->db->get('cliente');
        if ($query->num_rows() > 0) {

            return $query->result();
        }
    }

}
