<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_sub_valor
 *
 * @author Pedrito Alejos 
 */
class m_sub_valor extends CI_Model {
    
    //put your code here

    public function agregar_sub_valor($nombre,$resultado,$id_valor){
          $sql= "INSERT INTO sub_valor(id_sub_valor, nombre,resultado,id_valor) VALUES(0,'". $nombre."', '".$resultado."','".$id_valor."')";
        if ( $this->db->query($sql) ){
            return $this->db->insert_id(); // devuelve el id generado del cliente
        } else {
            return false;
        }
    }
    
    /*metodo del Alejandro Santibañez*/
    
     public function inser_sub_v($id_sub_valor, $nombre_sv, $resultado_sv, $activo_sv, $id_valor) {
        $data = array(
            'id_sub_valor' => $id_sub_valor,
            'nombre' => $nombre_sv,
            'resultado' => $resultado_sv,
            'activo_sv' => $activo_sv,
            'id_valor' => $id_valor
        );
        return $this->db->insert('sub_valor', $data);
    }

    public function get_sub_v() {
        $this->db->where('activo_sv', 1);
        $query = $this->db->get('sub_valor');
        if ($query->num_rows() > 0) {

            return $query->result();
        }
    }

    public function get_valor() {

        $query = $this->db->get('valor');
        if ($query->num_rows() > 0) {

            return $query->result();
        }
    }

    public function delete_sub_v($id) {


        $data = array(
            'activo_sv' => '0'
        );

        $this->db->where('id_sub_valor', $id);
        $this->db->update('sub_valor', $data);
    }

    public function edit_sub_v($id_sub_valor, $nombre_sv, $resultado_sv) {

        $fecha = date('Y-m-d');

        $data = array(
            'nombre' => $nombre_sv,
            'resultado' => $resultado_sv
        );

        $this->db->where('id_sub_valor', $id_sub_valor);
        $this->db->update('sub_valor', $data);
    }
public function next_result()
 {
     if (is_object($this->conn_id))
     {
         return mysqli_next_result($this->conn_id);
     }
 }
    public function get_tc($id_sistema,$idvalor) {

        $query = $this->db->query("select 

sub_valor.nombre
from sistema 
join valor on sistema.id_sistema=valor.id_sistema 
join componente on componente.id_componente=valor.id_componente
join sub_valor on valor.id_valor=sub_valor.id_valor
WHERE sistema.id_sistema=".$id_sistema." and valor.id_valor=".$idvalor."");


        return $query->result_array();
    }

    public function get_n($id_sistem,$id_comp) {
$query = $this->db->query("call nuevo2(".$id_sistem.",".$id_comp.")");

        
        return $query->result_array();
        


        //return $query->row();
    }

}
