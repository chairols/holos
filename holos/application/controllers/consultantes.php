<?php

class Consultantes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
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
        $data['title'] = 'Consultantes';
        $data['session'] = $session;
        $data['active'] = 'consultantes';
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('consultantes/index');
        $this->load->view('layout/footer');
    }
}

?>