<?php

/**
 * Description of admin_model
 *
 * @author Matic
 */
class admin_model extends CI_Model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
    
    /**
     * @param type $tip - naziv tabele, dohvata sve 
     * @return type asocijativni niz
     */
    public function get($tip) {
        $query = $this->db->get($tip);
        return $query->result_array();
    }
    
    
}