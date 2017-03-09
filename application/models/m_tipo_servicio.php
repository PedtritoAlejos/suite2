<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_tipo_servicio
 *
 * @author Pedrito Alejos 
 */
class m_tipo_servicio  extends CI_Model{
    
    //put your code here

 function listar_tipo_servicio (){
     return $this->db->get("tipo_servicio");
 }   
}
