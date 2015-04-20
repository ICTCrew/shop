<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of test_controller
 *
 * @author 
 */
class Controller extends frontend_controller{
    
    public function __construct() {
        parent::__construct();
        
        
    }
    
    public function index() {
           $this->loadView('test_view_aleksa');
        
    }
    
    
}