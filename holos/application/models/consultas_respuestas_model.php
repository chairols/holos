<?php

class consultas_respuestas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('consultas_respuestas', $datos);
    }
    
    public function gets_where($datos) {
        $query = $this->db->get_where('consultas', $datos);
        return $query->result_array();
    }
    
    public function gets_hilo_para_paciente($idprofesional, $idpaciente, $idconsulta) {
        $query = $this->db->query("SELECT * 
                                    FROM 
                                        consultas_respuestas cr,
                                        usuarios u
                                    WHERE
                                        cr.idprofesional = '$idprofesional' AND 
                                        cr.idpaciente = '$idpaciente' AND 
                                        cr.idconsulta = '$idconsulta' AND
                                        cr.idusuario = u.idusuario
                                    ORDER BY
                                        timestamp");
        return $query->result_array();
    }
}
?>