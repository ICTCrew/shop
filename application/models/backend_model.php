<?php

/**
 * Description of backend_model
 *
 * @author Matic
 */
class Backend_model extends CI_Model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
    
    public function search($search) {
        $query= $this->db->select('idProizvod, idTipProizvod, idBrend, idKategorija, p.title AS Ptitle, description, modelOpis, opis, prikazCenaStatus, statusPopust, cena, s.url, s.title AS Stitle, s.alt');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->like('opis', $search);
        $query= $this->db->get('proizvod p');
        return $query->result_array();
    }
    
    
}