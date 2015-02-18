<?php

class Vinculos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
        $this->load->model(array(
            'vinculos_model',
            'consultas_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        $data['title'] = 'Vínculos';
        $data['session'] = $session;
        $data['active'] = 'vinculos';
        switch ($session['tipo_usuario']) {
            case '1':
            case '2':
                $data['vinculos'] = $this->vinculos_model->gets_vinculos_para_profesional($session['SID']);
                foreach ($data['vinculos'] as $key => $value) {
                    $data['vinculos'][$key]['asignado'] = $this->vinculos_model->get_usuario_asignado($value['idconsulta']);
                }
                break;
            case '3':
                $data['vinculos'] = $this->vinculos_model->gets_vinculos_por_paciente($session['SID']);
                foreach ($data['vinculos'] as $key => $value) {
                    $data['vinculos'][$key]['asignado'] = $this->vinculos_model->get_usuario_asignado($value['idconsulta']);
                }
                break;
            default:
                show_404();
                break;
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('vinculos/index');
        $this->load->view('layout/footer');
    }
    
    public function crear($idconsulta) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['tipo_usuario'] != '3') {
            show_404();
        }
        
        $datos = array(
            'idconsulta' => $idconsulta,
            'idusuario' => $session['SID']
        );
        $resultado = $this->vinculos_model->get_where($datos);
        
        if(!count($resultado)) {
            $datos = array(
                'idconsulta' => $idconsulta,
                'idusuario' => $session['SID'],
                'estado' => 'Pendiente'
            );

            $this->vinculos_model->set($datos);
        }
        
        redirect('/consultas/crear/'.$idconsulta.'/', 'refresh');
    }
    
    public function asignar($idconsulta, $idusuario) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        switch ($session['tipo_usuario']) {
            case '1':
                break;
            case '2':
                $datos = array(
                    'estado' => 'Asignado'
                );
                $id = array(
                    'idconsulta' => $idconsulta
                );
                $this->consultas_model->update($datos, $id);
                
                $datos = array(
                    'estado' => 'Rechazado'
                );
                $id = array(
                    'idconsulta' => $idconsulta
                );
                $this->vinculos_model->update($datos, $id);
                
                $datos = array(
                    'estado' => 'Aceptado'
                );
                $id = array(
                    'idconsulta' => $idconsulta,
                    'idusuario' => $idusuario
                );
                $this->vinculos_model->update($datos, $id);
                
                break;
            default:
                break;
        }
        
        redirect('/vinculos/', 'refresh');
    }
}
?>