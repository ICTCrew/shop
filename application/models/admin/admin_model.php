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
    
    public function idInsertPretplata($uneseno){
        $this->db->insert('pretplata',$uneseno);
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
    
    //////////////////////////////////////////////////////
    
    /**
     * sintaksa: insert"NazivTabele"($niz)
     * isto vazi za sve "insert" funkcije
     * 
     * @param type $uneseno - asoc. niz - indeksi=nazivi kolona, 
     *                                    vrednosti=zapisi za insert
     * 
     */
    
    
    public function insertCena($uneseno){
        $this->db->insert('cena',$uneseno);
    }
    
    public function insertConfShop($uneseno){
        $this->db->insert('conf_shop',$uneseno);
    }
    
    public function insertDobavljac($uneseno){
        $this->db->insert('dobavljac',$uneseno);
    }
    
    public function insertDrzava($uneseno){
        $this->db->insert('drzava',$uneseno);
    }

    public function insertGrad($uneseno){
        $this->db->insert('grad',$uneseno);
    }
    
    public function insertGrupa($uneseno){
        $this->db->insert('grupa',$uneseno);
    }
    
    
    
    public function insertKomentar($uneseno){
        $this->db->insert('komentar',$uneseno);
    }
    
    public function insertKorisnik($uneseno){
        $this->db->insert('korisnik',$uneseno);
    }
    
    public function insertKurir($uneseno){
        $this->db->insert('kurir',$uneseno);
    }
    
    public function insertMeni($uneseno){
        $this->db->insert('meni',$uneseno);
    }
    
    public function insertNabavka($uneseno){
        $this->db->insert('nabavka',$uneseno);
    }
    
    public function insertNacinIsporuke($uneseno){
        $this->db->insert('nacin_isporuke',$uneseno);
    }
    
    public function insertNacinKurirPlacanje($uneseno){
        $this->db->insert('nacin_kurir_placanje',$uneseno);
    }
    
    public function insertNacinPlacanja($uneseno){
        $this->db->insert('nacin_placanja',$uneseno);
    }
    
    public function insertOsobina($uneseno){
        $this->db->insert('osobina',$uneseno);
    }
    
    public function insertPopust($uneseno){
        $this->db->insert('popust',$uneseno);
    }
    
    public function insertPorudzbina($uneseno){
        $this->db->insert('porudzbina',$uneseno);
    }
    
    public function insertPretplata($uneseno){
        $this->db->insert('pretplata',$uneseno);  
    }
    
    public function insertProizvod($uneseno){
        $this->db->insert('proizvod',$uneseno);
    }
    
    public function insertProizvodGrupa($uneseno){
        $this->db->insert('proizvod_grupa',$uneseno);
    }
    
    public function insertProizvodPopust($uneseno){
        $this->db->insert('proizvod_popust',$uneseno);
    }
    
    public function insertProizvodPorudzbina($uneseno){
        $this->db->insert('proizvod_porudzbina',$uneseno);
    }
    
    public function insertProizvodRelacija($uneseno){
        $this->db->insert('proizvod_relacija',$uneseno);
    }
    
    public function insertSlajder($uneseno){
        $this->db->insert('slajder',$uneseno);
    }
    
    public function insertSlajderSlika($uneseno){
        $this->db->insert('slajder_slika',$uneseno);
    }
    
    public function insertSlajderSlikaVeza($uneseno){
        $this->db->insert('slajder_slika_veza',$uneseno);
    }
    
    public function insertSlika($uneseno){
        $this->db->insert('slika',$uneseno);
    }
    
    public function insertStranica($uneseno){
        $this->db->insert('stranica',$uneseno);
    }
    
    public function insertTipOsobina($uneseno){
        $this->db->insert('tip_osobina',$uneseno);
    }
    
    public function insertTipPopust($uneseno){
        $this->db->insert('tip_popust',$uneseno);
    }
    
    public function insertTipProizvoda($uneseno){
        $this->db->insert('tip_proizvoda',$uneseno);
    }
    
    public function insertTipRelacija($uneseno){
        $this->db->insert('tip_relacija',$uneseno);
    }
    
    public function insertUloga($uneseno){
        $this->db->insert('uloga',$uneseno);
    }
    
    public function insertValuta($uneseno){
        $this->db->insert('valuta',$uneseno); 
    }
    
    public function insertVrednost($uneseno){
        $this->db->insert('vrednost',$uneseno);
    }
    
    public function insertVrednostProizvodOsobina($uneseno){
        $this->db->insert('vrednost_proizvod_osobina',$uneseno);
    }
    /**
     * 
     * kraj "insert" funkcija
     * 
     */
   
    /////////////////////////////////////////////////////////////////////////////////////
    
    /**
     * vraca osobine za zadati idProizvoda
     * @param type $idProizvod
     * @return type assoc. array indeksi - 'nazivosobina', 'jedinica', 'nazivVrednost'
     */
    public function getOsobine($idProizvod) {
        $query= $this->db->select('o.nazivOsobina, o.jedinica, v.nazivVrednost');
        $query= $this->db->join('vrednost_proizvod_osobina vpo', 'o.idOsobina = vpo.idOsobina');
        $query= $this->db->join('vrednost v', 'v.idVrednost = vpo.idVrednost');
        $query= $this->db->where('idProizvod', $idProizvod);
        $query= $this->db->where('vpo.status', 1);
        $query= $this->db->get('osobina o');
        return $query->result_array();
    }
    
    
    /**         citanje i "prepisivanje" osobina proizvoda u string u tabelu proizvod
     * 
     * @param type $idProizvod
     */
    public function prepisiOsobine($idProizvod) {
        $query= $this->db->select('o.nazivOsobina, o.jedinica, v.nazivVrednost');
        $query= $this->db->join('vrednost_proizvod_osobina vpo', 'o.idOsobina = vpo.idOsobina');
        $query= $this->db->join('vrednost v', 'v.idVrednost = vpo.idVrednost');
        $query= $this->db->where('idProizvod', $idProizvod);
        $query= $this->db->where('vpo.status', 1);
        $query= $this->db->get('osobina o');
        $osobine= $query->result_array();
        $string="";
        foreach ($osobine as $osobina) {
            $string.=$osobina['nazivOsobina']."|".$osobina['nazivVrednost']."|".$osobina['jedinica']."*";
        }
        $data=array('osobine'=>$string);
        $query=  $this->db->where('idProizvod', $idProizvod);
        $query=  $this->db->update('proizvod', $data);
    }
    
}