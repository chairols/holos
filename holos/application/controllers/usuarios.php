<?php

class Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation'
        ));
        $this->load->model(array(
            'usuarios_model',
            'especializaciones_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function login() {
        $session = $this->session->all_userdata();
        if(!empty($session['SID'])) {
            redirect('/dashboard/', 'refresh');
        }
        
        $this->form_validation->set_rules('usuario', 'Usuario', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $usuario = $this->usuarios_model->login($this->input->post('usuario'), $this->input->post('password'));
            
            if(!empty($usuario)) {
                $datos = array(
                    'SID' => $usuario['idusuario'],
                    'tipo_usuario' => $usuario['idtipo_usuario'],
                    'nombre' => $usuario['nombre'],
                    'apellido' => $usuario['apellido']
                );
                $this->session->set_userdata($datos);

                redirect('/dashboard/', 'refresh');
            }
            
        }
        
        $this->load->view('usuarios/login');
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('/usuarios/login/', 'refresh');
    }
    
    public function perfil() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        switch ($session['tipo_usuario']) {
            case '1':
            case '2':
                $data['title'] = 'Perfil';
                $data['session'] = $session;
                $data['active'] = 'perfil';
                $datos = array(
                    'idusuario' => $session['SID']
                );
                $data['usuario'] = $this->usuarios_model->get_where($datos);
                $data['especializaciones'] = $this->especializaciones_model->gets_mis_especializaciones_para_combo($session['SID']);
                break;

            default:
                show_404();
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('usuarios/perfil');
        $this->load->view('layout/footer');
    }
}

?>