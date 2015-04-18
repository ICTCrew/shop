<?php
/**
 * Description of MY_Controller
 *
 * @author Aleksa Novakovic
 */
class MY_Controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session'); 
    }
    
}
