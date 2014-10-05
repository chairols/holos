<?php

class Categorias extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation'
        ));
        $this->load->model(array(
            'categorias_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        if($session['tipo_usuario'] != '1') {
            show_404();
        }
        
        $data['title'] = 'Categorias';
        $data['session'] = $session;
        $data['active'] = 'categorias';
        
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('honorario', 'Honorario', 'required|numeric');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'categoria' => $this->input->post('categoria'),
                'honorario' => $this->input->post('honorario')
            );
            
            $this->categorias_model->set($datos);
        }
        
        $data['categorias'] = $this->categorias_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('categorias/index');
        $this->load->view('layout/footer');
    }
    
    public function editar($idcategoria = null) {
        $session = $this->session->all_userdata();
        if($session['tipo_usuario'] != '1') {
            show_404();
        }
        
        $data['title'] = 'Categorias';
        $data['session'] = $session;
        $data['active'] = 'categorias';
        
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('honorario', 'Honorario', 'required|numeric');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'categoria' => $this->input->post('categoria'),
                'honorario' => $this->input->post('honorario')
            );
            
            $this->categorias_model->editar($datos, $idcategoria);
            
            redirect('/categorias/', 'refresh');
        }
        
        $data['categorias'] = $this->categorias_model->gets();
        $data['cat'] = $this->categorias_model->get_where($idcategoria);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('categorias/editar');
        $this->load->view('layout/footer');
    }
}
?>