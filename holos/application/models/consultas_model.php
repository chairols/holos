<?php

class Consultas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('consultas', $datos);
    }
    
    public function gets_where($datos) {
        $query = $this->db->get_where('consultas', $datos);
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('consultas', $datos);
        return $query->row_array();
    }
    
}

?>