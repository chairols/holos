<?php

class Profesiones_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('profesiones', $datos);
    }
    
    public function gets() {
        $query = $this->db->query("SELECT * 
                                    FROM 
                                        profesiones 
                                    WHERE
                                        activo = '1'
                                    ORDER BY 
                                        profesion");
        return $query->result_array();
    }
    
    public function get_where($idprofesion) {
        $datos = array(
            'idprofesion' => $idprofesion,
            'activo' => '1'
        );
        $query = $this->db->get_where('profesiones', $datos);
        return $query->row_array();
    }
    
    public function editar($datos, $idprofesion) {
        $this->db->where('idprofesion', $idprofesion);
        $this->db->update('profesiones', $datos);
    }
}
?>