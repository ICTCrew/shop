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
    public function getSlajder() {
        $query= $this->db->select('nazivSlajder, putanjaSlika, url, title');
        $query= $this->db->join('slajder_slika_veza ssv', 'ssv.idSlajder = s.idSlajder');
        $query= $this->db->join('slajder_slika ss', 'ss.idSlajderSlika = ssv.idSlajderSlika');
        $query= $this->db->where('s.status', 2);
        $query= $this->db->get('slajder s');
        return $query->result_array();
    }
    
    /**
     * 
     * @return type asoc array svi meniji ILI linkovi sortirani asc po poziciji
     */
    public function getMeni() {
        $query= $this->db->select('idMeni, idNadMeni, nazivMeni, url, anchor, target, privilegija');
        $query= $this->db->where('status', 2);
        $query= $this->db->order_by('prioritetLink', 'asc');
        $query= $this->db->get('meni');
        return $query->result_array();
    }
    
    
    
    /**
     * 
     * @return type asoc array sve kategorije sortirane asc po poziciji
     */
    public function getKategorija() {
        $query= $this->db->select('idKategorija, idNadKategorija, nazivKategorija, url, alt, s.title AS slikaTitle');
        $query= $this->db->join('slika s', 's.idSlika = k.idSlika');
        $query= $this->db->where('k.status', 2);
        $query= $this->db->order_by('sortOrder', 'asc');
        $query= $this->db->get('kategorija k');
        return $query->result_array();
    }
    
    /**
     * 
     * @param type $mail - mail za ubacivanje na subscribe listu
     */
    public function subscribe($mail) {
        $this->db->set('email', $mail);
        $this->db->insert('pretplata');
    }
    
    public function getGrupa() {
        $query= $this->db->select('idGrupa, nazivGrupa, url, alt');
        $query= $this->db->join('slika s', 's.idSlika = g.idSlika');
        $query= $this->db->where('g.status', 2);
        $query= $this->db->get('grupa g');
        return $query->result_array();
    }
    
    public function getBrend() {
        $query= $this->db->select('idBrend, naziv, url, alt, s.title AS slikaTitle');
        $query= $this->db->join('slika s', 's.idSlika = b.idSlika');
        $query= $this->db->where('b.status', 2);
        $query= $this->db->get('brend b');
        return $query->result_array();
    }
    
    public function getStranica($url) {
        $query= $this->db->select('idStranica, nazivStranica, title, description, keywords, sadrzaj');
        $query= $this->db->where('s.status', 2);
        $query= $this->db->where('s.url', $url);
        $query= $this->db->get('stranica s');
        return $query->result_array();
    }
    
    public function conf_shop() {
        $query= $this->db->select('nazivProdavnica, pdv, statusPrikazCena, v.nazivValuta, v.skracenicaValuta');
        $query= $this->db->join('valuta v', 'v.idValuta = cs.idValuta');
        $query= $this->db->get('conf_shop cs');
        return $query->result_array();
    }
    
    
    
    
}