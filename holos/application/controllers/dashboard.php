<?php

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
        $this->load->model(array(
            'categorias_model',
            'usuarios_model',
            'especializaciones_model',
            'profesiones_model',
            'vinculos_model'
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
        
        switch ($session['tipo_usuario']) {
            case '1':  // Administrador
                $data['title'] = 'Dashboard';
                $data['session'] = $session;
                $data['active'] = 'dashboard';

                $data['categorias'] = $this->categorias_model->gets();
                $datos = array(
                    'idtipo_usuario' => '2',
                    'activo' => '1'
                );
                $data['profesionales'] = $this->usuarios_model->gets_where($datos);
                $datos = array(
                    'idtipo_usuario' => '3',
                    'activo' => '1'
                );
                $data['consultantes'] = $this->usuarios_model->gets_where($datos);
                $data['especializaciones'] = $this->especializaciones_model->gets();
                $data['profesiones'] = $this->profesiones_model->gets();

                break;
            case '2':
                $data['title'] = 'Dashboard';
                $data['session'] = $session;
                $data['active'] = 'dashboard';
                
                $datos = array(
                    'idtipo_usuario' => '2',
                    'activo' => '1'
                );
                $data['profesionales'] = $this->usuarios_model->gets_where($datos);
                
                $data['vinculos_pendientes'] = $this->vinculos_model->gets_vinculos_pendientes($session['SID']);
                break;
            case '3':
                $data['title'] = 'Dashboard';
                $data['session'] = $session;
                $data['active'] = 'dashboard';
                break;
            default:
                show_404();
                break;
        }
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
    }
}
?>