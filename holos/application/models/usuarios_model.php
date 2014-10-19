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
        return $this->db->insert_id();
    }
    
    public function set_profesiones($datos) {
        $this->db->insert_batch('usuarios_profesiones', $datos);
    }
    
    public function set_especializaciones($datos) {
        $this->db->insert_batch('usuarios_especializaciones', $datos);
    }
    
    public function set_categorias($datos) {
        $this->db->insert_batch('usuarios_categorias', $datos);
    }
    
    public function update($datos, $idusuario) {
        $this->db->where('idusuario', $idusuario);
        $this->db->update('usuarios', $datos);
    }
}
?>