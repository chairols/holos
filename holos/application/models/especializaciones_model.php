<?php

class Especializaciones_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('especializaciones', $datos);
    }
    
    public function gets() {
        $query = $this->db->query("SELECT * 
                                    FROM 
                                        especializaciones 
                                    WHERE
                                        activo = '1'
                                    ORDER BY 
                                        especializacion");
        return $query->result_array();
    }
    
    public function get_where($idespecializacion) {
        $datos = array(
            'idespecializacion' => $idespecializacion,
            'activo' => '1'
        );
        $query = $this->db->get_where('especializaciones', $datos);
        return $query->row_array();
    }
    
    public function editar($datos, $idespecializacion) {
        $this->db->where('idespecializacion', $idespecializacion);
        $this->db->update('especializaciones', $datos);
    }
}
?>