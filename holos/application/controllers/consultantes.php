<?php

class Consultantes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'usuarios_model',
            'zonas_model',
            'subzonas_model'
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
        $data['title'] = 'Consultantes';
        $data['session'] = $session;
        $data['active'] = 'consultantes';
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de Nacimiento', 'required');
        $this->form_validation->set_rules('direccion', 'Direccion', 'required');
        $this->form_validation->set_rules('zona', 'Zona', 'required');
        $this->form_validation->set_rules('subzona', 'Subzona', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|matches[password2]');
        $this->form_validation->set_rules('password2', 'Reescribir Contraseña', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'email' => $this->input->post('email')
            );
            $usuario = $this->usuarios_model->get_where($datos);
            if(empty($usuario)) {
                $datos = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellido' => $this->input->post('apellido'),
                    'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
                    'direccion' => $this->input->post('direccion'),
                    'zona' => $this->input->post('zona'),
                    'subzona' => $this->input->post('subzona'),
                    'telefono' => $this->input->post('telefono'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'idtipo_usuario' => 3,
                    'activo' => 0
                );
                
                $this->usuarios_model->set($datos);
                
            }
        }
        
        $datos = array(
            'idtipo_usuario' => 3
        );
        
        $data['consultantes'] = $this->usuarios_model->gets_where($datos);
        $data['zonas'] = $this->zonas_model->gets();
        $data['subzonas'] = $this->subzonas_model->gets($data['zonas'][0]['idzona']);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('consultantes/index');
        $this->load->view('layout/footer');
    }
}

?>