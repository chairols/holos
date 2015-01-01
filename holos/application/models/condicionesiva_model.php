<?php

class Condicionesiva_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        condicionesiva
                                    ORDER BY
                                        condicion");
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('condicionesiva', $datos);
        return $query->row_array();
    }
}
?>