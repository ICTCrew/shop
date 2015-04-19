<?php

/**
 * Description of catalogue_model
 *
 * @author Matic
 */
class Catalogue_model extends Backend_model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
    
    ////////////// KATEGORIJA START //////////////////////////
    
    /** prikaz informacija o svim kategorijama
     * 
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getKategorije($limit=0, $offset=0) {
        $query= $this->db->select('idKategorija, idNadKategorija, k.idSlika, nazivKategorija, k.title, description, sortOrder, k.status,');
        $query= $this->db->join('slika s', 's.idSlika = k.idSlika');
        $query= $this->db->where('k.status>', -1);
        $query= $this->db->order_by('sortOrder', 'asc');
        $query= $this->db->get('kategorija k', $limit, $offset);
        return $query->result_array();
    }
    
    /**     unos kategorije
     * 
     * @param type $uneseno
     */
    public function insertKategorija($uneseno){
        $this->db->insert('kategorija',$uneseno);
    }
    
    /**     update kategorije
     *      
     * @param type $uneseno
     */
    public function updateKategorija($uneseno) {
        $this->db->where('idKategorija', $uneseno['idKategorija']);
        $this->db->update('kategorija', $uneseno); 
    }
    
    /**     "brisanje" kategorije
     * 
     * @param type $idKategorija
     */
    public function deleteKategorija($idKategorija) {
        $this->db->where('idKategorija', $idKategorija);
        $this->db->update('kategorija', array('status'=> '-1')); 
    }
    
    ////////////////// KATEGORIJA KRAJ /////////////////////////
    
    ////////////////// BREND START /////////////////////////////
    
    /**     dohvatanje informacija o svim brendovima
     * 
     * @return type
     */
    public function getBrend($limit=0, $offset=0) {
        $query= $this->db->select('idBrend, naziv, url, b.idSlika, b.status');
        $query= $this->db->join('slika s', 's.idSlika = b.idSlika');
        $query= $this->db->where('b.status>', -1);
        $query= $this->db->get('brend b', $limit, $offset);
        return $query->result_array();
    }
    
    /**     insert brend
     * 
     * @param type $uneseno
     */
    public function insertBrend($uneseno){
        $this->db->insert('brend',$uneseno);
    }
    
    /**     update brend
     * 
     * @param type $uneseno
     */
    public function updateBrend($uneseno) {
        $this->db->where('idBrend', $uneseno['idBrend']);
        $this->db->update('brend', $uneseno); 
    }
    
    /**     "brisanje" brenda
     * 
     * @param type $idKategorija
     */
    public function deleteBrend($idBrend) {
        $this->db->where('idBrend', $idBrend);
        $this->db->update('brend', array('status'=> '-1')); 
    }
    
    /////////////////////   BREND KRAJ  //////////////////////
    
}