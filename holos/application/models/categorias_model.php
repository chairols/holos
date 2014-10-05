<?php

class Categorias_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('categorias', $datos);
    }
    
    public function gets() {
        $query = $this->db->query("SELECT * 
                                    FROM 
                                        categorias 
                                    WHERE
                                        activo = '1'
                                    ORDER BY 
                                        categoria");
        return $query->result_array();
    }
    
    public function get_where($idcategoria) {
        $datos = array(
            'idcategoria' => $idcategoria,
            'activo' => '1'
        );
        $query = $this->db->get_where('categorias', $datos);
        return $query->row_array();
    }
    
    public function editar($datos, $idcategoria) {
        $this->db->where('idcategoria', $idcategoria);
        $this->db->update('categorias', $datos);
    }
}
?>