<?php

class Liquidacion extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
        $this->load->model(array(
            'usuarios_model',
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
        if($session['tipo_usuario'] != '1') {
            show_404();
        }
        $data['title'] = 'Liquidación';
        $data['session'] = $session;
        $data['active'] = 'liquidacion';
        
        $datos = array(
            'idtipo_usuario' => '2',
            'activo' => '1'
        );
        $data['profesionales'] = $this->usuarios_model->gets_where($datos);
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('liquidacion/index');
        $this->load->view('layout/footer_form');
    }
    
    public function listar() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['tipo_usuario'] != '1') {
            show_404();
        }
        $data['title'] = 'Liquidación';
        $data['session'] = $session;
        $data['active'] = 'liquidacion';
        
        $datos = array(
            'idtipo_usuario' => '2',
            'idusuario' => $this->input->post('profesional'),
            'activo' => '1'
        );
        $data['usuario'] = $this->usuarios_model->get_where($datos);
        $data['periodo'] = $this->input->post('fecha');
        
        $desde = substr($this->input->post('fecha'), 6, 4);
        $desde.= '-';
        $desde.= substr($this->input->post('fecha'), 3, 2);
        $desde.= '-';
        $desde.= substr($this->input->post('fecha'), 0, 2);
        $desde.= ' 00:00:00';
        
        $hasta = substr($this->input->post('fecha'), 19, 4);
        $hasta.= '-';
        $hasta.= substr($this->input->post('fecha'), 16, 2);
        $hasta.= '-';
        $hasta.= substr($this->input->post('fecha'), 13, 2);
        $hasta.= ' 23:59:59';
        
        $data['liquidacion'] = $this->consultas_model->get_liquidacion($this->input->post('profesional'), $desde, $hasta);
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('liquidacion/listar');
        $this->load->view('layout/footer_form');
    }
}
?>