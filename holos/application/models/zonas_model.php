<?php

class Zonas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        zonas
                                    ORDER BY
                                        zona");
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('zonas', $datos);
        return $query->row_array();
    }
}
?>