<?php

/**
 * Description of config_model
 *
 * @author Matic
 */
class Config_model extends Backend_model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
    
    public function getOpcije($idUloga) {
        $query= $this->db->select('nazivOpcija, opisOpcija, linkOpcija');
        $query= $this->db->join('opcija_uloga ou', 'o.idOpcija=ou.idOpcija');
        $query= $this->db->join('uloga u', 'u.idUloga=ou.idUloga');
        $query= $this->db->get('opcija o');
        return $query->result_array();
    }
    
    
    
    
    
}