<?php

class Profesionales extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
        $this->load->model(array(
            'categorias_model',
            'especializaciones_model'
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
        $data['title'] = 'Profesionales';
        $data['session'] = $session;
        $data['active'] = 'profesionales';
        
        $data['categorias'] = $this->categorias_model->gets();
        $data['especializaciones'] = $this->especializaciones_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('profesionales/index');
        $this->load->view('layout/footer');
    }
}
?>