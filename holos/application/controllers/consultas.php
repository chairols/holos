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
            'consultas_model',
            'consultas_respuestas_model',
            'categorias_model'
        ));
    }
    
    public function frecuencia() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        $this->form_validation->set_rules('dia', 'Dia', 'required');
        $this->form_validation->set_rules('hora', 'Hora', 'required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        
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
                'idcategoria' => $this->input->post('categoria'),
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
                $data['consultas'] = $this->consultas_model->gets_mis_consultas($session['SID']);
                $data['categorias'] = $this->categorias_model->gets_mis_categorias_para_combo($session['SID']);
                break;

            default:
                show_404();
        }
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('consultas/frecuencia');
        $this->load->view('layout/footer_form');
    }
    
    public function vinculos($idusuario) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['tipo_usuario'] != '3') {
            show_404();
        }
        $data['title'] = 'Vínculos';
        $data['session'] = $session;
        $data['active'] = 'vinculos';
        
        $datos = array(
            'estado' => 'Disponible',
            'idusuario' => $idusuario
        );
        $data['disponibles'] = $this->consultas_model->gets_where($datos);
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('consultas/vinculos');
        $this->load->view('layout/footer');
    }
    
    public function crear($idconsulta) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/usuarios/login/', 'refresh');
        }
        if($session['tipo_usuario'] != '3') {
            show_404();
        }
        $data['title'] = 'Crear vínculo';
        $data['session'] = $session;
        $data['active'] = 'vinculos';
        
        $datos = array(
            'idconsulta' => $idconsulta
        );
        $data['consulta'] = $this->consultas_model->get_where($datos);
        $data['respuestas'] = $this->consultas_respuestas_model->gets_hilo_para_paciente($data['consulta']['idusuario'], $session['SID'], $idconsulta);
        
        
        $this->form_validation->set_rules('texto', 'Texto', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $config['upload_path'] = './upload';
            $config['allowed_types'] = '*';
            
            $this->load->library('upload', $config);
            $nombre_de_campo = 'adjunto';
            $adjunto = null;
            if(!$this->upload->do_upload($nombre_de_campo)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data' => $this->upload->data());
            }
            
            $datos = array(
                'texto' => $this->input->post('texto'),
                'idconsulta' => $idconsulta,
                'idprofesional' => $data['consulta']['idusuario'],
                'idpaciente' => $session['SID'],
                'idusuario' => $session['SID']
            );
            
            if($adjunto != null) {
                $datos['adjunto'] = '/upload/'.$adjunto['upload_data']['raw_name'].$adjunto['upload_data']['file_ext'];
            }
            
            
            $this->consultas_respuestas_model->set($datos);
            
            redirect("/consultas/crear/$idconsulta/", 'refresh');
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('consultas/crear');
        $this->load->view('layout/footer');
    }
}
?>