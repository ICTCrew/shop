<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of prince
 *
 * @author Matic
 */
class Test_Controller extends FrontEnd_Controller{
    
    public function __construct() {
        parent::__construct();
        //$this->load->model('admin_model');
        $this->load->model('proizvod_model');
    }
    
    public function index() {
        $data['sadrzaj']=  $this->proizvod_model->dohvatiSadrzajMain();
        
        
        print_r($data);
    }
    
    
}