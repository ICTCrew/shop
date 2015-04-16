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
    
    public function load_view($data) {
        /**
         * 
        $this->load->model('frontend_model');
        
        $this->load->view('template/header', $data);
        $this->load->view('template/aside', $data);
        $this->load->view($view, $data);
        $this->load->view('template/footer', $data);
         * 
         */
        echo "<a href='http://localhost/shop/'>http://localhost/shop</a>";
        echo '<br>';
        echo "<a href='http://localhost/shop/index.php/test_controller'>http://localhost/shop/index.php/test_controller</a>";
        echo '<br><br><br><br><br>';
        print_r($data);
    }
}
