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
    
    /**
     * sintaksa: idInsert"NazivTabele"($niz)
     * isto vazi za sve "idInsert" funkcije
     * 
     * @param type $uneseno - asoc. niz - indeksi=nazivi kolona, vrednosti=zapisi za insert
     * @return type int - id unetog zapisa
     */
    public function idInsertBrend($uneseno){
        $this->db->insert('brend',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertCena($uneseno){
        $this->db->insert('cena',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertDobavljac($uneseno){
        $this->db->insert('dobavljac',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertDrzava($uneseno){
        $this->db->insert('drzava',$uneseno);
        return $this->db->insert_id();  
    }

    public function idInsertGrad($uneseno){
        $this->db->insert('grad',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertGrupa($uneseno){
        $this->db->insert('grupa',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertKategorija($uneseno){
        $this->db->insert('kategorija',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertKomentar($uneseno){
        $this->db->insert('komentar',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertKorisnik($uneseno){
        $this->db->insert('korisnik',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertKurir($uneseno){
        $this->db->insert('kurir',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertMeni($uneseno){
        $this->db->insert('meni',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertNabavka($uneseno){
        $this->db->insert('nabavka',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertNacinIsporuke($uneseno){
        $this->db->insert('nacin_isporuke',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertNacinKurirPlacanje($uneseno){
        $this->db->insert('nacin_kurir_placanje',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertNacinPlacanja($uneseno){
        $this->db->insert('nacin_placanja',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertOsobina($uneseno){
        $this->db->insert('osobina',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertPopust($uneseno){
        $this->db->insert('popust',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertPorudzbina($uneseno){
        $this->db->insert('porudzbina',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertProizvod($uneseno){
        $this->db->insert('proizvod',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertSlajder($uneseno){
        $this->db->insert('slajder',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertSlajderSlika($uneseno){
        $this->db->insert('slajder_slika',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertSlika($uneseno){
        $this->db->insert('slika',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertStranica($uneseno){
        $this->db->insert('stranica',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertTipPopust($uneseno){
        $this->db->insert('tip_popust',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertTipProizvoda($uneseno){
        $this->db->insert('tip_proizvoda',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertTipRelacija($uneseno){
        $this->db->insert('tip_relacija',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertUloga($uneseno){
        $this->db->insert('uloga',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertValuta($uneseno){
        $this->db->insert('valuta',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertVrednost($uneseno){
        $this->db->insert('vrednost',$uneseno);
        return $this->db->insert_id();  
    }
    /**
     * 
     * kraj "idInsert" funkcija
     * 
     */
    
   
    
}