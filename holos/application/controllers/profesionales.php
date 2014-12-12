<?php

class Profesionales extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'form_validation'
        ));
        $this->load->model(array(
            'categorias_model',
            'especializaciones_model',
            'profesiones_model',
            'zonas_model',
            'usuarios_model',
            'condicionesiva_model'
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
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('cuit', 'CUIT', 'required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
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
                    'cuit' => $this->input->post('cuit'),
                    'condicioniva' => $this->input->post('condicioniva'),
                    'iibb' => $this->input->post('iibb'),
                    'direccion' => $this->input->post('direccion'),
                    'zona' => $this->input->post('zona'),
                    'subzona' => $this->input->post('subzona'),
                    'direccion2' => $this->input->post('direccion2'),
                    'zona2' => $this->input->post('zona2'),
                    'subzona2' => $this->input->post('subzona2'),
                    'telefono' => $this->input->post('telefono'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'idtipo_usuario' => 2,
                    'activo' => 0
                );
                
                $idusuario = $this->usuarios_model->set($datos);
                
                $profesiones = $this->input->post('profesiones');
                $datos = array();
                foreach($profesiones as $profesion) {
                    $d = array(
                        'idusuario' => $idusuario,
                        'idprofesion' => $profesion
                    );
                    $datos[] = $d;
                }
                $this->usuarios_model->set_profesiones($datos);
                
                $especializaciones = $this->input->post('especializaciones');
                $datos = array();
                foreach($especializaciones as $especializacion) {
                    $d = array(
                        'idusuario' => $idusuario,
                        'idespecializacion' => $especializacion
                    );
                    $datos[] = $d;
                }
                $this->usuarios_model->set_especializaciones($datos);
                
                $categorias = $this->input->post('categorias');
                $datos = array();
                foreach($categorias as $categoria) {
                    $d = array(
                        'idusuario' => $idusuario,
                        'idcategoria' => $categoria
                    );
                    $datos[] = $d;
                }
                $this->usuarios_model->set_categorias($datos);
            }
        }
        
        
        $datos = array(
            'idtipo_usuario' => 2
        );
        
        $data['profesionales'] = $this->usuarios_model->gets_where($datos);
        $data['categorias'] = $this->categorias_model->gets();
        $data['especializaciones'] = $this->especializaciones_model->gets();
        $data['profesiones'] = $this->profesiones_model->gets();
        $data['zonas'] = $this->zonas_model->gets();
        $data['condicionesiva'] = $this->condicionesiva_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('profesionales/index');
        $this->load->view('layout/footer');
    }
    
    public function activar($idusuario, $estado) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['tipo_usuario'] != '1') {
            show_404();
        }
        
        $datos = array(
            'activo' => $estado
        );
        $this->usuarios_model->update($datos, $idusuario);
        
        redirect('/profesionales/', 'refresh');
    }
}
?>