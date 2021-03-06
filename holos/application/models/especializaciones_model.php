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
    
    public function gets_mis_especializaciones_para_combo($idusuario) {
        $query = $this->db->query("SELECT e.idespecializacion, e.especializacion, ue.idusuario
                                    FROM 
                                        especializaciones e
                                    LEFT JOIN
                                        usuarios_especializaciones ue
                                    ON
                                        e.idespecializacion = ue.idespecializacion AND
                                        ue.idusuario = '$idusuario'
                                    ORDER BY
                                        e.especializacion");
        return $query->result_array();
    }
    
    public function gets_especializaciones_por_usuario($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios_especializaciones ue,
                                        especializaciones e
                                    WHERE
                                        ue.idespecializacion = e.idespecializacion AND
                                        ue.idusuario = $idusuario");
        return $query->result_array();
    }
    
    public function delete_usuarios_especializaciones($idusuario) {
        $this->db->delete('usuarios_especializaciones', array('idusuario' => $idusuario));
        
    }
    
    public function set_usuarios_especializaciones($datos) {
        $this->db->insert('usuarios_especializaciones', $datos);
    }
}
?>