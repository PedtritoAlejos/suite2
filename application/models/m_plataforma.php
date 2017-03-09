<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_plataforma
 *
 * @author Pedrito Alejos 
 */
class m_plataforma extends CI_Model {

    const STATUS_DELETED = 0; //constante con el valor de eliminado
    const STATUS_ACTIVO = 1; //constante con el valor de Usuario activo

    public function listar_plataforma() {

        $this->db->select("plataforma.id_plataforma as 'Codigo',plataforma.nombre  as 'Nombre' ,plataforma.ip as 'Ip' ,plataforma.cpu as 'Cpu',servicio.nombre as 'Servicio'"
                . ",plataforma.ram as 'Ram',plataforma.so as 'So' ,cliente.nombre as 'Cliente',proposito.nombre as 'Proposito'");
        $this->db->from('plataforma');
        $this->db->join('cliente', 'plataforma.id_cliente = cliente.id_cliente');
        $this->db->join('proposito', 'plataforma.id_proposito=proposito.id_proposito');
        $this->db->join('servicio', 'plataforma.id_servicio=servicio.id_servicio');
        $this->db->where('plataforma.activo', self::STATUS_ACTIVO);

        return $this->db->get()->result();
    }

    public function listar_cliente() {
        return $this->db->get('cliente')->result();
    }

    //
    public function listar_tp_servicio() {
        $this->db->select('id_tipo_servicio,nombre');
        $this->db->from('tipo_servicio');

        return $this->db->get()->result();
    }

    public function eliminar_plataforma($id_plataforma) {
        return $this->db->set("activo", self::STATUS_DELETED)->where("id_plataforma", $id_plataforma)->update("plataforma");
    }

    public function actualizar_plataforma($cod, $nombre, $cpu, $ram, $ip, $so) {
        $data = array(
            'nombre' => $nombre,
            'cpu' => $cpu,
            'ram' => $ram,
            'so' => $so,
            'ip' => $ip,
        );
        $this->db->where('id_plataforma', $cod);

        return $this->db->update('plataforma', $data);
    }

    /* --------- metodos para crear una plataforma ----------- */

    public function agregar_plataforma($nombre, $cpu, $ram, $so, $ip, $id_cliente, $id_proposito, $id_servicio) {


        $data = array('id_plataforma' => '0',
            'nombre' => $nombre,
            'cpu' => $cpu,
            'ram' => $ram,
            'so' => $so,
            'ip' => $ip,
            'id_cliente' => $id_cliente,
            'id_proposito' => $id_proposito,
            'id_servicio' => $id_servicio,
            'activo' => self::STATUS_ACTIVO
        );

        $this->db->insert('plataforma', $data);
        if($this->db->affected_rows() > 0)
            {
                
                return true; 
            }
       
    }

    public function agregar_proposito($nombre, $descripcion) {


        $data = array('id_proposito' => '0',
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'observacion_final' => 'En espera...'
        );
        $this->db->insert('proposito', $data);
        return $this->db->insert_id();
    }

    public function insertar_servicio($nombre, $descripcion, $tipo_servicio, $run_usuario, $cliente) {
        $sql = "INSERT INTO servicio(id_servicio, nombre,descripcion, id_tipo_servicio,"
                . "run_usuario,id_cliente,activo) VALUES(0,'" . $nombre . "','" . $descripcion . "' ,'" . $tipo_servicio . ""
                . "','" . $run_usuario . "','" . $cliente . "','" . self::STATUS_ACTIVO . "')";
        if ($this->db->query($sql)) {
            return $this->db->insert_id(); // devuelve el id generado del servicio
        } else {
            return false;
        }
    }

}
