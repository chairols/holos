<?php

class Profesiones extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation'
        ));
        $this->load->model(array(
            'profesiones_model'
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
        $data['title'] = 'Profesiones';
        $data['session'] = $session;
        $data['active'] = 'profesiones';
        
        $this->form_validation->set_rules('profesion', 'Profesión', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'profesion' => $this->input->post('profesion')
            );
            $this->profesiones_model->set($datos);
        }
        
        $data['profesiones'] = $this->profesiones_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('profesiones/index');
        $this->load->view('layout/footer');
    }
}
?>