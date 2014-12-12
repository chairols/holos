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
}
?>