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
    
    public function update($datos, $id) {
        $this->db->update('consultas', $datos, $id);
    }
    
    public function get_liquidacion($idusuario, $desde, $hasta) {
        $query = $this->db->query("SELECT con.fecha, u.nombre, u.apellido, cat.categoria, cat.honorario
                                    FROM
                                        consultas con,
                                        vinculos v,
                                        categorias cat,
                                        usuarios u
                                    WHERE
                                        con.idusuario = '$idusuario' AND
                                        con.fecha BETWEEN '$desde' AND '$hasta' AND
                                        con.idconsulta = v.idconsulta AND
                                        con.idcategoria = cat.idcategoria AND
                                        v.idusuario = u.idusuario AND
                                        v.estado = 'Aceptado'
                                    ORDER BY
                                        con.fecha");
        return $query->result_array();
    }
}

?>