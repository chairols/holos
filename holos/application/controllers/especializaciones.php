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
    
    public function editar($idespecializacion = null) {
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
            
            $this->especializaciones_model->editar($datos, $idespecializacion);
            
            redirect('/especializaciones/', 'refresh');
        }
        
        $data['especializaciones'] = $this->especializaciones_model->gets();
        $data['esp'] = $this->especializaciones_model->get_where($idespecializacion);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('especializaciones/editar');
        $this->load->view('layout/footer');
    }
    
    public function borrar($idespecializacion) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['tipo_usuario'] != '1') {
            show_404();
        }
        
        $datos = array(
            'activo' => '0'
        );

        $this->especializaciones_model->editar($datos, $idespecializacion);

        redirect('/especializaciones/', 'refresh');
    }
    
    public function mis_especializaciones() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['tipo_usuario'] != '2') {
            show_404();
        }
        
        $data['title'] = 'Especializaciones';
        $data['session'] = $session;
        $data['active'] = 'especializaciones';
        
        $data['especializaciones'] = $this->especializaciones_model->gets_mis_especializaciones_para_combo($session['SID']);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('especializaciones/mis_especializaciones');
        $this->load->view('layout/footer');
    }
}
?>