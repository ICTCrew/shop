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
        if($this->session->userdata('role')?$this->role = $this->session->userdata('role'):$this->role = null);
        $this->load->model('frontend_model');
    }
    
    
    
    public function load_view_test($data) {
        /*
        $this->load->model('frontend_model');
        $this->load->view('template/header', $data);
        $this->load->view('template/aside', $data);
        $this->load->view('template/footer', $data); 
         */
        echo "<a href='http://localhost/shop/'>http://localhost/shop</a>";
        echo '<br>';
        echo "<a href='http://localhost/shop/index.php/test_controller'>http://localhost/shop/index.php/test_controller</a>";
        echo '<br><br><br><br><br>';
        $data1['sve']=$data;
        $this->load->view('test_view', $data1);
    }
}
