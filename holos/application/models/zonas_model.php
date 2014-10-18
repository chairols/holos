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
}
?>