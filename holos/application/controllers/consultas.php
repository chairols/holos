<?php

class Consultas extends CI_Controller {
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
            'consultas_model'
        ));
    }
    
    public function frecuencia() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        $this->form_validation->set_rules('dia', 'Dia', 'required');
        $this->form_validation->set_rules('hora', 'Hora', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $fecha = '';
            $fecha.= substr($this->input->post('dia'), 6, 4);
            $fecha.= '-';
            $fecha.= substr($this->input->post('dia'), 3, 2);
            $fecha.= '-';
            $fecha.= substr($this->input->post('dia'), 0, 2);
            $fecha.= ' ';
            $fecha.= $this->input->post('hora');
            $fecha.= ':00';
            
            $datos = array(
                'fecha' => $fecha,
                'estado' => 'Disponible',
                'idusuario' => $session['SID']
            );
            
            $this->consultas_model->set($datos);
            
            redirect('/consultas/frecuencia/', 'refresh');
        }
        switch ($session['tipo_usuario']) {
            case '1':
            case '2':
                $data['title'] = 'Frecuencia de Consultas';
                $data['session'] = $session;
                $data['active'] = 'frecuencia';
                $datos = array(
                    'idusuario' => $session['SID']
                );
                $data['consultas'] = $this->consultas_model->gets_where($datos);
                
                break;

            default:
                show_404();
        }
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('consultas/frecuencia');
        $this->load->view('layout/footer_form');
    }
    
    public function feed() {
        $data = array(
            'title' => 'algo',
            'start' => '2014-12-17',
            'allDay' => true
        );
        
        echo json_encode($data);
    }
}
?>