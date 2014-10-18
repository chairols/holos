<?php

class Subzonas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'subzonas_model'
        ));
    }
    
    public function ajax($idzona) {
        $subzonas = $this->subzonas_model->gets($idzona);
        foreach($subzonas as $subzona) {
            echo "<option value='".$subzona['idsubzona']."'>".$subzona['subzona']."</option>\n";
        }
    }
    
}

?>