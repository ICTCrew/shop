<?php

/**
 * Description of admin_model
 *
 * @author Matic
 */
class proizvod_model extends CI_Model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
    
    //nezavršen
    public function getProizvodiKategorije($idKategorija) {
        $query= $this->db->select('idProizvod, idTipProizvod, idBrend, idSlika, title, description, modelOpis, opis, prikazCenaStatus, statusPopust, cena');
        $query= $this->db->from('proizvod');
        $query= $this->db->where('idKategorija', $idKategorija);
        $query= $this->db->get();
        return $query->result_array();
    }
    
    //nezavršen
    public function getProizvod($idProizvod) {
        $query= $this->db->select('idTipProizvod, idBrend, idKategorija, idSlika, title, description, modelOpis, opis, prikazCenaStatus, statusPopust, cena');
        $query= $this->db->from('proizvod');
        $query= $this->db->where('idProizvod', $idProizvod);
        $query= $this->db->get();
        return $query->result_array();
    }
    
    
}