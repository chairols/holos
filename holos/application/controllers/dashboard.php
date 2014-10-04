<?php

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
        
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        if($session['tipo_usuario'] != '1') {
            show_404();
        }
        
        $data['title'] = 'Dashboard';
        $data['session'] = $session;
        $data['active'] = 'dashboard';
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
    }
}
?>