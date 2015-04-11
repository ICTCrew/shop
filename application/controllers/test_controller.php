<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of test_controller
 *
 * @author Matic
 */
class Test_Controller extends FrontEnd_Controller{
    
    public function __construct() {
        parent::__construct();
        //$this->load->model('admin_model');
        $this->load->model('proizvod/proizvod_model');
    }
    
    public function index() {
       
        $data1=array('idProizvod', 'modelOpis', 'opis');
        
        $data=  $this->proizvod_model->getProizvod(1);
        //$data['title']='Home';
        //$data['ulogovan']=false;
        
        $this->load_view($data);
    }
    
    
}