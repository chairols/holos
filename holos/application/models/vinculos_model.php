<?php

class Vinculos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_where($datos) {
        $query = $this->db->get_where('vinculos', $datos);
        return $query->row_array();
    }
    
    public function gets_where($idconsulta, $idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        vinculos v,
                                        consultas c,
                                        usuarios u
                                    WHERE
                                        v.idconsulta = c.idconsulta AND
                                        v.idusuario = u.idusuario AND
                                        v.idconsulta = '$idconsulta' AND
                                        v.idusuario = '$idusuario'");
        return $query->result_array();
    }
    
    public function gets_vinculos_pendientes($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        consultas c,
                                        vinculos v
                                    WHERE
                                        c.idusuario = $idusuario AND
                                        c.idconsulta = v.idconsulta AND
                                        v.estado = 'Pendiente'");
        return $query->result_array();
    }
    
    public function gets_vinculos_por_paciente($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        vinculos v,
                                        consultas c,
                                        usuarios u
                                    WHERE
                                        v.idconsulta = c.idconsulta AND
                                        c.idusuario = u.idusuario AND
                                        v.idusuario = '$idusuario'
                                    ORDER BY
                                        c.fecha DESC");
        return $query->result_array();
    }
    
    public function set($datos) {
        $this->db->insert('vinculos', $datos);
    }
    
    public function gets_vinculos_para_profesional($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        vinculos v,
                                        consultas c,
                                        usuarios u
                                    WHERE
                                        v.idconsulta = c.idconsulta AND
                                        v.idusuario = u.idusuario AND
                                        c.idusuario = '$idusuario'
                                    ORDER BY
                                        c.fecha DESC");
        return $query->result_array();
    }
    
    public function update($datos, $id) {
        $this->db->update('vinculos', $datos, $id);
    }
    
    public function get_usuario_asignado($idconsulta) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        vinculos v,
                                        usuarios u
                                    WHERE
                                        v.idconsulta = $idconsulta AND
                                        v.estado = 'Aceptado' AND
                                        v.idusuario = u.idusuario");
        return $query->row_array();
    }
    
    public function get_mi_estado_paciente($idconsulta, $idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        vinculos v,
                                        usuarios u
                                    WHERE
                                        v.idconsulta = $idconsulta AND
                                        v.idusuario = u.idusuario AND
                                        v.idusuario = $idusuario");
        return $query->row_array();
    }
}
?>