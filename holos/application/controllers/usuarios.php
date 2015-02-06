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
            'especializaciones_model',
            'condicionesiva_model',
            'profesiones_model',
            'categorias_model',
            'zonas_model'
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
                break;
            case '2':
                $data['title'] = 'Perfil';
                $data['session'] = $session;
                $data['active'] = 'perfil';
                
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido', 'Apellido', 'required');
                $this->form_validation->set_rules('cuit', 'CUIT', 'required');
                $this->form_validation->set_rules('direccion', 'Dirección', 'required');
                $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
                
                if($this->form_validation->run() == FALSE) {
                    
                } else {
                    $datos = array(
                        'nombre' => $this->input->post('nombre'),
                        'apellido' => $this->input->post('apellido'),
                        'cuit' => $this->input->post('cuit'),
                        'condicioniva' => $this->input->post('condicion'),
                        'iibb' => $this->input->post('iibb'),
                        'direccion' => $this->input->post('direccion'),
                        'zona' => $this->input->post('zona'),
                        'subzona' => $this->input->post('subzona'),
                        'direccion2' => $this->input->post('direccion2'),
                        // zona2 y subzona2
                        'telefono' => $this->input->post('telefono')
                    );
                    if(($this->input->post('password') == $this->input->post('password2')) && strlen($this->input->post('password'))) {
                        $datos['password'] = $this->input->post('password'); 
                    }
                    
                    $this->usuarios_model->update($datos, $session['SID']);
                    
                    
                    $this->profesiones_model->delete_usuarios_profesiones($session['SID']);
                    if($this->input->post('profesiones')) {
                        foreach($this->input->post('profesiones') as $profesion) {
                            $datos = array(
                                'idusuario' => $session['SID'],
                                'idprofesion' => "$profesion"
                            );
                            $this->profesiones_model->set_usuarios_profesiones($datos);
                        }
                    }
                    
                    $this->especializaciones_model->delete_usuarios_especializaciones($session['SID']);
                    if($this->input->post('especializaciones')) {
                        foreach($this->input->post('especializaciones') as $especializacion) {
                            $datos = array(
                                'idusuario' => $session['SID'],
                                'idespecializacion' => "$especializacion"
                            );
                            $this->especializaciones_model->set_usuarios_especializaciones($datos);
                        }
                    }
                    
                    $this->categorias_model->delete_usuarios_categorias($session['SID']);
                    if($this->input->post('categorias')) {
                        foreach($this->input->post('categorias') as $categoria) {
                            $datos = array(
                                'idusuario' => $session['SID'],
                                'idcategoria' => "$categoria"
                            );
                            $this->categorias_model->set_usuarios_categorias($datos);
                        }
                    }
                }
                
                $datos = array(
                    'idusuario' => $session['SID']
                );
                $data['usuario'] = $this->usuarios_model->get_where($datos);
                $data['condicionesiva'] = $this->condicionesiva_model->gets();
                $data['especializaciones'] = $this->especializaciones_model->gets_mis_especializaciones_para_combo($session['SID']);
                $data['categorias'] = $this->categorias_model->gets_mis_categorias_para_combo($session['SID']);
                $data['profesiones'] = $this->profesiones_model->gets_mis_profesiones_para_combo($session['SID']);
                $data['zonas'] = $this->zonas_model->gets();
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