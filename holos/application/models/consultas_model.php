<?php

class Consultas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('consultas', $datos);
    }
    
    public function gets_where($datos) {
        $this->db->select("*");
        $this->db->from("consultas");
        $this->db->where($datos);
        $this->db->order_by("fecha", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function gets_mis_consultas($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        categorias cat,
                                        consultas con
                                    WHERE
                                        con.idusuario = '$idusuario' AND
                                        con.idcategoria = cat.idcategoria
                                    ORDER BY
                                        con.fecha DESC");
        return $query->result_array();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('consultas', $datos);
        return $query->row_array();
    }
    
}

?>