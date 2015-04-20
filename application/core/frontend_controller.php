<?php

/**
 * Description of FrontEnd_Controller
 *
 * @author Matic
 */
class frontend_controller extends MY_Controller {
    private $role;
    function __construct(){
        parent::__construct();
        $this->session->userdata('role')?$this->role = $this->session->userdata('role'):$this->role = null;
        $this->load->model('frontend_model');
    }
    
    
    public function loadView() {
        
    }
}
