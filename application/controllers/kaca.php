<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kaca
 *
 * @author KACcA
 */
class Kaca extends frontend_controller{
    public function __construct() {
        parent::__construct();
        
        
    }
    
    public function index() {
        $podaci['base_url']=  base_url();
//           $this->load->view('templates/header',$podaci);
//           $this->load->view('templates/categories',$podaci);
//           $this->load->view('index',$podaci);
//           $this->load->view('templates/footer',$podaci);
        $this->loadView('index',$podaci);
        
        
    }
}
