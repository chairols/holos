<?php

class Especializaciones extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation'
        ));
        $this->load->model(array(
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
        $data['title'] = 'Especializaciones';
        $data['session'] = $session;
        $data['active'] = 'especializaciones';
        
        $this->form_validation->set_rules('especializacion', 'Especializacion', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'especializacion' => $this->input->post('especializacion')
            );
            $this->especializaciones_model->set($datos);
        }
        
        $data['especializaciones'] = $this->especializaciones_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('especializaciones/index');
        $this->load->view('layout/footer');
    }
}
?>