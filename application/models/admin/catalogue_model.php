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
    
     /**     unos podataka u tabele
     * 
     * @param string $tabela - naziv tabele u koju se unosi 
     * @param type $uneseno - podaci za unos u asoc nizu
     */
    
    public function insertTabela($tabela, $uneseno){
        $this->db->insert($tabela,$uneseno);
    }
    // isti ko prethodni s tim sto vraca poslednji uneti ID
    public function idInsertTabela($tabela, $uneseno){
        $this->db->insert($tabela,$uneseno);
        return $this->db->insert_id();  
    }
    
    /**     update kategorije
     *      
     * @param type $uneseno
     */
    //NETESTIRAN
    public function updateTabela($tabela, $nizId, $uneseno) {
        $this->db->where($nizId['nazivId'], $nizId['vrednostId']);
        $this->db->update($tabela, $uneseno); 
    }
    
    
    ////////////// KATEGORIJA START //////////////////////////
    
    /** prikaz informacija o svim kategorijama
     * 
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getKategorije($limit=0, $offset=0) {
        $query= $this->db->select('k.idKategorija, k.idNadKategorija, kk.nazivKategorija AS nazivNadKategorija, k.idSlika, k.nazivKategorija AS nazivkategorija, k.title, k.description, k.sortOrder, k.status,');
        $query= $this->db->join('slika s', 's.idSlika = k.idSlika');
        $query= $this->db->join('kategorija kk', 'k.idNadKategorija = kk.idKategorija', 'left');
        $query= $this->db->where('k.status>', -1);
        $query= $this->db->order_by('sortOrder', 'asc');
        $query= $this->db->get('kategorija k', $limit, $offset);
        return $query->result_array();
    }
    
    
    public function getKategorija($idKategorija) {
        $query= $this->db->select('k.idKategorija, k.idSlika, s.url, k.nazivKategorija AS nazivKategorija, kk.nazivKategorija AS nazivNadKategorija, k.title, k.description, k.sortOrder, k.status,');
        $query= $this->db->join('slika s', 's.idSlika = k.idSlika');
        $query= $this->db->join('kategorija kk', 'k.idNadKategorija = kk.idKategorija');
        $query= $this->db->where('k.idKategorija', $idKategorija);
        $query= $this->db->get('kategorija k');
        return $query->result_array();
    }
   
    /**     "brisanje" kategorije i kaskadno prebacivanje proizvoda
     * 
     * @param int $idKategorija -id kategorije koja se brise
     * @param int $nacin - nacin kaskadnog brisanja
     */
    
    public function deleteKategorija($idKategorija, $nacinProizvod, $nacinPodKategorija) {
        $this->db->where('idKategorija', $idKategorija);
        $this->db->update('kategorija', array('status'=> '-1'));
        if($nacinProizvod<1){
            $this->db->where('idKategorija', $idKategorija);
            $this->db->update('proizvod', array('status'=> $nacinProizvod));
        }
        else{
            $this->db->where('idKategorija', $idKategorija);
            $this->db->update('proizvod', array('idKategorija'=> $nacinProizvod));
        }
        if($nacinPodKategorija<1){
            $this->db->where('idNadKategorija', $idKategorija);
        $this->db->update('kategorija', array('status'=>$nacinPodKategorija));
        }
        else{
            $this->db->where('idNadKategorija', $idKategorija);
            $this->db->update('proizvod', array('idKategorija'=> $nacinPodKategorija));
        }
        
    }
    
    ////////////////// KATEGORIJA KRAJ /////////////////////////
    
    ////////////////// BREND START /////////////////////////////
    
    /**     dohvatanje informacija o svim brendovima
     * 
     * @return type
     */
    public function getBrendovi($limit=0, $offset=0) {
        $query= $this->db->select('idBrend, naziv, url, b.idSlika, b.status');
        $query= $this->db->join('slika s', 's.idSlika = b.idSlika');
        $query= $this->db->where('b.status>', -1);
        $query= $this->db->get('brend b', $limit, $offset);
        return $query->result_array();
    }
    
    
    public function getBrend($idBrend) {
        $query= $this->db->select('idBrend, naziv, url, b.idSlika, b.status');
        $query= $this->db->join('slika s', 's.idSlika = b.idSlika');
        $query= $this->db->where('idBrend', $idBrend);
        $query= $this->db->where('b.status>', -1);
        $query= $this->db->get('brend b');
        return $query->result_array();
    }
    
    
    
    /**     "brisanje" brenda
     * 
     * @param type $idKategorija
     */
   
    public function deleteBrend($idBrend, $nacin) {
        $this->db->where('idBrend', $idBrend);
        $this->db->update('brend', array('status'=> '-1')); 
        if($nacin<1){
            $this->db->where('idBrend', $idBrend);
            $this->db->update('proizvod', array('status'=> $nacin));
        }
        else{
            $this->db->where('idBrend', $idBrend);
            $this->db->update('proizvod', array('idBrend'=> $nacin));
        }
    }
    
    /////////////////////   BREND KRAJ  //////////////////////
    
    /////////////////////PROIZVOD START //////////////////////
    
   //na prosledjen idProizvoda vraca ostale podatke
    
    public function getProizvod($idProizvod) {
        $query= $this->db->select('idProizvod, datumKreiranja, barkod, p.title, p.description, modelOpis, opis, osobine, statusKolicinaVidljivost, statusPopust, p.status, cena, s.url, tp.nazivTip, b.naziv AS nazivBrend, k.nazivKategorija');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->join('tip_proizvoda tp', 'p.idTipProizvod = tp.idTipProizvod');
        $query= $this->db->join('brend b', 'b.idBrend = p.idBrend');
        $query= $this->db->join('kategorija k', 'k.idKategorija = p.idKategorija');
        $query= $this->db->where('idProizvod', $idProizvod);
        $query= $this->db->where('p.status>', -1);
        $query= $this->db->get('proizvod p');
        return $query->result_array();
    }
    ///////////// -iz proizvod_model
    public function getProizvodiT($idTabela, $tabela, $limit=0, $offset=0, $kolSort='modelOpis', $tipSort='asc') {
        $query= $this->db->select('p.idProizvod,p.idKategorija, datumKreiranja, barkod, p.title, p.description, modelOpis, opis, osobine, statusKolicinaVidljivost, statusPopust, p.status, cena, s.url, tp.nazivTip, b.naziv, k.nazivKategorija');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->join('tip_proizvoda tp', 'p.idTipProizvod = tp.idTipProizvod');
        $query= $this->db->join('brend b', 'b.idBrend = p.idBrend');
        $query= $this->db->join('kategorija k', 'k.idKategorija = p.idKategorija');
        $query= $this->db->where($idTabela['nazivId'], $idTabela['vrednostId']);
        $query= $this->db->where('p.status>', -1);
        $query= $this->db->order_by($kolSort, $tipSort);
        $query= $this->db->get('proizvod p', $limit, $offset);
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
        $query= $this->db->where('vpo.status>', -1);
        $query= $this->db->get('osobina o');
        return $query->result_array();
    }
    
    
    //  STATUSI VREDNOSTI!!!!!?
    //  ZESCE NETESTIRANO
    //  JEDAN WHERE ZA VISE UPDATE-A?
    //  KADA SE ZAVRSAVA VAZENJE ISTOG?
    //  WTF?
    public function deleteProizvod($idProizvod) {
        $this->db->where('idProizvod', $idProizvod);
        $this->db->update('proizvod', array('status'=> '0')); 
        $this->db->update('komentar', array('status'=> '0')); 
        $this->db->update('proizvod_grupa', array('status'=> '0')); 
        $this->db->update('proizvod_popust', array('status'=> '0')); 
        $this->db->update('proizvod_relacija', array('status'=> '0')); 
        $this->db->update('vrednost_proizvod_osobina', array('status'=> '0')); 
        
        //?
        $this->db->where('`idVrednost` IN (select idVrednost from vrednost_proizvod_osobina where idProizvod={$idProizvod})', NULL, FALSE);
        $this->db->update('vrednost',array('status'=> '-1'));
        
    }
    
    ///////////////////// PROIZVOD KRAJ /////////////////////////////
    
    ///////////////////// GRUPA START //////////////////////////////
    
    public function getGrupe($limit=0, $offset=0) {
        $query= $this->db->select('idGrupa, nazivGrupa, url');
        $query= $this->db->join('slika s', 's.idSlika = g.idSlika');
        $query= $this->db->where('g.status>', -1);
        $query= $this->db->get('grupa g', $limit, $offset);
        return $query->result_array();
    }
    
    public function getGrupa($idGrupa) {
        $query= $this->db->select('idGrupa, nazivGrupa, g.title, description, g.status, g.idSlika, s.url ');
        $query= $this->db->join('slika s', 's.idSlika = g.idSlika');
        $query= $this->db->where('g.idGrupa', $idGrupa);
        $query= $this->db->where('g.status>', -1);
        $query= $this->db->get('grupa g');
        return $query->result_array();
    }
    
    
  
    public function deleteGrupa($idGrupa) {
        $this->db->where('idGrupa', $idGrupa);
        $this->db->update('grupa', array('status'=> '-1'));
        
        $this->db->where('idGrupa', $idGrupa);
        $this->db->update('proizvod_grupa', array('status'=> '1'));
    }
    
    ///////////////////// KRAJ GRUPA ////////////////////////////////
    
    ////////////////// RELACIJE PROIZVODA START /////////////////////
    
    public function getPovezaniProizvodi($limit=0, $offset=0) {
        $query= $this->db->select('p1.idProizvod as idP1, p1.modelOpis as opis1, s1.url as url1, p2.idProizvod as idP2, p2.modelOpis as opis2, s2.url as url2, tr.idTipRelacija, nazivTipRelacija');
        
        $query= $this->db->join('slika s1', 'p1.idSlika = s1.idSlika');
        $query= $this->db->join('proizvod_relacija pr', 'pr.idProizvod = p1.idProizvod');
        $query= $this->db->join('proizvod p2', 'pr.idSlicanProizvod = p2.idProizvod');
        $query= $this->db->join('slika s2', 'p2.idSlika = s2.idSlika');
        $query= $this->db->join('tip_relacija tr', 'tr.idTipRelacija = pr.idTipRelacija');
        $query= $this->db->where('pr.status>', -1);
        $query= $this->db->get('proizvod p1', $limit, $offset);
        return $query->result_array();
    }
    
    public function getTipoviRelacija() {
        $query= $this->db->select('idTipRelacija, nazivTipRelacija');
        $query= $this->db->where('status>', -1);
        $query= $this->db->get('tip_relacija');
        return $query->result_array();
    }
    
    public function getTipRelacije($idTipRelacija) {
        $query= $this->db->select('idTipRelacija, nazivTipRelacija');
        $query= $this->db->where('idTipRelacija', $idTipRelacija);
        $query= $this->db->where('status>', -1);
        $query= $this->db->get('tip_relacija');
        return $query->result_array();
    }
    
    
    // DIZANJE STATUSA NA "AKTIVAN" PRETHODNO IZBRISANE RELACIJE (INACE INSERT)
    //netestiran
    //proba update-a, pa ako update ne uspe (ne postoji ID), uraditi insert?
    public function updateProizvodRelacija($uneseno) {
        $this->db->where('idTipRelacija', $uneseno['idTipRelacija']);
        $this->db->where('idProizvod', $uneseno['idProizvod']);
        $this->db->where('idSlicanProizvod', $uneseno['idSlicanProizvod']);
        $this->db->update('proizvod_relacija', array('status'=> '1')); 
    }
   
     public function deleteTipRelacija($idTipRelacija) {
        $this->db->where('idTipRelacija', $idTipRelacija);
        $this->db->update('tip_relacija', array('status'=> '-1')); 
        $this->db->where('idTipRelacija', $idTipRelacija);
        $this->db->update('proizvod_relacija', array('status'=> '-1')); 
    }
   
    public function deleteProizvodRelacija($uneseno) {
        $this->db->where('idTipRelacija', $uneseno['idTipRelacija']);
        $this->db->where('idProizvod', $uneseno['idProizvod']);
        $this->db->where('idSlicanProizvod', $uneseno['idSlicanProizvod']);
        $this->db->update('proizvod_relacija', array('status'=> '-1')); 
    }
    
   //////////////// RELACIJE PROIZVODA KRAJ ///////////////////////////////////
    
    
}