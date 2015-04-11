<?php

/**
 * Description of frontend_model
 *
 * @author Matic
 */
class Frontend_model extends CI_Model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
    
    /**
     * dohvata slajder zadavanjem idSlajdera
     * @param type $idSlajder
     * @return type asoc. array - indeksi: 'putanjaSlika', 'url', 'title'
     */
    public function getSlajder($idSlajder) {
        $query= $this->db->select('putanjaSlika, url, title');
        $query= $this->db->join('slajder_slika_veza ssv', 'ssv.idSlajder = s.idSlajder');
        $query= $this->db->join('slajder_slika ss', 'ss.idSlajderSlika = ssv.idSlajderSlika');
        $query= $this->db->where('s.idSlajder', $idSlajder);
        $query= $this->db->where('s.status', 1);
        $query= $this->db->get('slajder s');
        return $query->result_array();
    }
    
    /**
     * 
     * @return type asoc array svi meniji ILI linkovi sortirani asc po poziciji
     */
    public function getMeni() {
        $query= $this->db->select('idMeni, idNadMeni, nazivMeni, url, anchor, target');
        $query= $this->db->where('statusMeni', 1);
        $query= $this->db->or_where('statusLink', 1);
        $query= $this->db->order_by('prioritetLink', 'asc');
        $query= $this->db->get('meni');
        return $query->result_array();
    }
    
    
    
    /**
     * 
     * @return type asoc array sve kategorije sortirane asc po poziciji
     */
    public function getKategorija() {
        $query= $this->db->select('idKategorija, idNadKategorija, nazivKategorija, k.title AS katTitle, description, url, alt, s.title AS slTitle');
        $query= $this->db->join('slika s', 's.idSlika = k.idSlika');
        $query= $this->db->where('k.status', 1);
        $query= $this->db->order_by('sortOrder', 'asc');
        $query= $this->db->get('kategorija k');
        return $query->result_array();
    }
    
    
    
}