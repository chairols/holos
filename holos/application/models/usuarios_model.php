<?php

class Usuarios_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function login($usuario, $password) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios
                                    WHERE
                                        email = '$usuario' AND
                                        password = '$password'");
        return $query->row_array();
    }
    
    public function gets_where($datos) {
        $query = $this->db->get_where('usuarios', $datos);
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('usuarios', $datos);
        return $query->row_array();
    }
    
    public function set($datos) {
        $this->db->insert('usuarios', $datos);
    }
}
?>