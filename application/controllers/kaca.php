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
        $this->loadView('index',$podaci);
    }
    public function reg(){
             $podaci['base_url']=  base_url();
             $this->loadView('register',$podaci);
    }
    public function products(){
             $podaci['base_url']=  base_url();
             $this->loadView('products',$podaci);
    }
    public function login(){
             $podaci['base_url']=  base_url();
             $this->loadView('login',$podaci);
    }
    public function contact(){
             $podaci['base_url']=  base_url();
             $this->loadView('contact',$podaci);
    }
    public function account(){
             $podaci['base_url']=  base_url();
             $this->loadView('account',$podaci);
    }
    public function single(){
             $podaci['base_url']=  base_url();
             $this->loadView('single_product',$podaci);
    }
    public function filter(){
             $podaci['base_url']=  base_url();
             $this->loadView('filter_products',$podaci);
    }
}
