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
    
    public function editar($idprofesion = null) {
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
        
        $this->form_validation->set_rules('profesion', 'Profesion', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'profesion' => $this->input->post('profesion')
            );
            
            $this->profesiones_model->editar($datos, $idprofesion);
            
            redirect('/profesiones/', 'refresh');
        }
        
        $data['profesiones'] = $this->profesiones_model->gets();
        $data['prof'] = $this->profesiones_model->get_where($idprofesion);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('profesiones/editar');
        $this->load->view('layout/footer');
    }
    
    public function borrar($idprofesion) {
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

        $this->profesiones_model->editar($datos, $idprofesion);

        redirect('/profesiones/', 'refresh');
    }
}
?>