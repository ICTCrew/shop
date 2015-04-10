<?php

/**
 * Description of FrontEnd_Controller
 *
 * @author Matic
 */
class FrontEnd_Controller extends MY_Controller {
    
    function __construct(){
        
        parent::__construct();
        
        //$this->load->model('frontend_model');
    }
    
    public function load_view($view, $data) {
        
        //$this->load->model('frontend_model');
        
        
        /*
        $this->load->view('template/header', $data);
        $this->load->view('template/aside', $data);
        $this->load->view($view, $data);
        $this->load->view('template/footer', $data);
         * 
         */
    }
}
