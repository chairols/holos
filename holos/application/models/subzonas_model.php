<?php

class Subzonas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function gets($idzona) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        subzonas
                                    WHERE
                                        idzona = '$idzona'
                                    ORDER BY
                                        subzona");
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('subzonas', $datos);
        return $query->row_array();
    }
}
?>