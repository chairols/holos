<?php

class Agenda extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        if($session['tipo_usuario'] == '2') {
            $data['title'] = 'Agenda';
            $data['session'] = $session;
            $data['active'] = 'agenda';
        } else {
            show_404();
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('agenda/index');
        $this->load->view('layout/footer');
    }
}
?>