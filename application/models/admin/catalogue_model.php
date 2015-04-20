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
    
    //NETESTIRAN
    public function getKategorija($idKategorija) {
        $query= $this->db->select('idKategorija, idNadKategorija, k.idSlika, nazivKategorija, k.title, description, sortOrder, k.status,');
        $query= $this->db->join('slika s', 's.idSlika = k.idSlika');
        $query= $this->db->join('kategorija kk', 'k.idNadKategorija = kk.idKategorija');
        $query= $this->db->where('k.idKategorija', $idKategorija);
        $query= $this->db->get('kategorija k');
        return $query->result_array();
    }
    /**     unos kategorije
     * 
     * @param type $uneseno
     */
    //NETESTIRAN
    public function insertKategorija($uneseno){
        $this->db->insert('kategorija',$uneseno);
    }
    
    public function idInsertKategorija($uneseno){
        $this->db->insert('kategorija',$uneseno);
        return $this->db->insert_id();  
    }
    
    
    /**     update kategorije
     *      
     * @param type $uneseno
     */
    //NETESTIRAN
    public function updateKategorija($uneseno) {
        $this->db->where('idKategorija', $uneseno['idKategorija']);
        $this->db->update('kategorija', $uneseno); 
    }
    
    
    
    /**     "brisanje" kategorije i kaskadno prebacivanje proizvoda
     * 
     * @param int $idKategorija -id kategorije koja se brise
     * @param int $nacin - nacin kaskadnog brisanja
     */
    //NETESTIRAN
    public function deleteKategorija($idKategorija, $nacin) {
        $this->db->where('idKategorija', $idKategorija);
        $this->db->update('kategorija', array('status'=> '-1'));
        if($nacin==0 && $nacin==(-1)){
            $this->db->where('idKategorija', $idKategorija);
            $this->db->update('proizvod', array('status'=> $nacin));
        }
        else{
            $this->db->where('idKategorija', $idKategorija);
            $this->db->update('proizvod', array('idKategorija'=> $nacin));
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
        $query= $this->db->get('brend b');
        return $query->result_array();
    }
    
    /**     insert brend
     * 
     * @param type $uneseno
     */
    //NETESTIRAN
    public function insertBrend($uneseno){
        $this->db->insert('brend',$uneseno);
    }
    
    public function idInsertBrend($uneseno){
        $this->db->insert('brend',$uneseno);
        return $this->db->insert_id();  
    }
    /**     update brend
     * 
     * @param type $uneseno
     */
    //NETESTIRAN
    public function updateBrend($uneseno) {
        $this->db->where('idBrend', $uneseno['idBrend']);
        $this->db->update('brend', $uneseno); 
    }
    
    /**     "brisanje" brenda
     * 
     * @param type $idKategorija
     */
    //NETESTIRAN
    public function deleteBrend($idBrend, $nacin) {
        $this->db->where('idBrend', $idBrend);
        $this->db->update('brend', array('status'=> '-1')); 
        if($nacin==0 && $nacin==(-1)){
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
        $query= $this->db->get('proizvod p');
        return $query->result_array();
    }
    /////////////  PROVERI!!!!!!!!!!! -iz proizvod_model
    public function getProizvodiT($idTabela, $tabela, $limit=0, $offset=0, $kolSort='modelOpis', $tipSort='asc') {
        $query= $this->db->select('p.idProizvod, datumKreiranja, barkod, p.title, p.description, modelOpis, opis, osobine, statusKolicinaVidljivost, statusPopust, p.status, cena, s.url, tp.nazivTip, b.naziv, k.nazivKategorija');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->join('tip_proizvoda tp', 'p.idTipProizvod = tp.idTipProizvod');
        $query= $this->db->join('brend b', 'b.idBrend = p.idBrend');
        $query= $this->db->join('kategorija k', 'k.idKategorija = p.idKategorija');
        $query= $this->db->where($idTabela['nazivId'], $idTabela['vrednostId']);
        $query= $this->db->where('p.status', 1);
        $query= $this->db->order_by($kolSort, $tipSort);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    
    public function insertProizvod($uneseno){
        $this->db->insert('proizvod',$uneseno);
    }
    
    public function updateProizvod($uneseno) {
        $this->db->where('idProizvod', $uneseno['idProizvod']);
        $this->db->update('proizvod', $uneseno); 
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
        $query= $this->db->where('vpo.status', 1);
        $query= $this->db->get('osobina o');
        return $query->result_array();
    }
    
    public function insertVrednost($uneseno){
        $this->db->insert('vrednost',$uneseno);
    }
    
    public function insertVrednostProizvodOsobina($uneseno){
        $this->db->insert('vrednost_proizvod_osobina',$uneseno);
    }
    
    
    public function insertTipProizvoda($uneseno){
        $this->db->insert('tip_proizvoda',$uneseno);
    }
    
    
    public function insertTipOsobina($uneseno){
        $this->db->insert('tip_osobina',$uneseno);
    }
    
    public function insertOsobina($uneseno){
        $this->db->insert('osobina',$uneseno);
    }
    
    
    public function insertKomentar($uneseno){
        $this->db->insert('komentar',$uneseno);
    }
    
    
    public function insertCena($uneseno){
        $this->db->insert('cena',$uneseno);
    }
    
    
    public function idInsertVrednost($uneseno){
        $this->db->insert('vrednost',$uneseno);
        return $this->db->insert_id();  
    }
    
    
    public function idInsertTipProizvoda($uneseno){
        $this->db->insert('tip_proizvoda',$uneseno);
        return $this->db->insert_id();  
    }
    
    
    public function idInsertSlika($uneseno){
        $this->db->insert('slika',$uneseno);
        return $this->db->insert_id();  
    }
    
    
    public function idInsertProizvod($uneseno){
        $this->db->insert('proizvod',$uneseno);
        return $this->db->insert_id();  
    }
    
    
    public function idInsertOsobina($uneseno){
        $this->db->insert('osobina',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function insertSlika($uneseno){
        $this->db->insert('slika',$uneseno);
    }
    
    
    public function idInsertKomentar($uneseno){
        $this->db->insert('komentar',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function idInsertCena($uneseno){
        $this->db->insert('cena',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function insertProizvodPopust($uneseno){
        $this->db->insert('proizvod_popust',$uneseno);
    }
    
    
    //  STATUSI VREDNOSTI!!!!!?
    //  ZESCE NETESTIRANO
    //  JEDAN WHERE ZA VISE UPDATE-A?
    //  KADA SE ZAVRSAVA VAZENJE ISTOG?
    //  WTF?
    public function deleteProizvod($idProizvod) {
        $this->db->where('idProizvod', $idProizvod);
        $this->db->update('proizvod', array('status'=> '-1')); 
        $this->db->update('komentar', array('status'=> '-1')); 
        $this->db->update('proizvod_grupa', array('status'=> '-1')); 
        $this->db->update('proizvod_popust', array('status'=> '-1')); 
        $this->db->update('proizvod_relacija', array('status'=> '-1')); 
        $this->db->update('vrednost_proizvod_osobina', array('status'=> '-1')); 
        
        //?
        $this->db->where('`idVrednost` IN (select idVrednost from vrednost_proizvod_osobina where idProizvod=5)', NULL, FALSE);
        $this->db->update('vrednost',array('status'=> '-1'));
        
    }
    
    ///////////////////// PROIZVOD KRAJ /////////////////////////////
    
    ///////////////////// GRUPA START //////////////////////////////
    
    public function getGrupe($limit, $offset) {
        $query= $this->db->select('idGrupa, nazivGrupa, url');
        $query= $this->db->join('slika s', 's.idSlika = g.idSlika');
        $query= $this->db->where('g.status', 1);
        $query= $this->db->get('grupa g', $limit, $offset);
        return $query->result_array();
    }
    
    public function getGrupa($idGrupa) {
        $query= $this->db->select('idGrupa, nazivGrupa, title, description, status, idSlika, s.url, ');
        $query= $this->db->join('slika s', 's.idSlika = g.idSlika');
        $query= $this->db->where('g.status', 1);
        $query= $this->db->get('grupa g');
        return $query->result_array();
    }
    
    public function insertGrupa($uneseno){
        $this->db->insert('grupa',$uneseno);
    }
    
    
    public function insertProizvodGrupa($uneseno){
        $this->db->insert('proizvod_grupa',$uneseno);
    }
    
     public function idInsertGrupa($uneseno){
        $this->db->insert('grupa',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function updateGrupa($uneseno) {
        $this->db->where('idGrupa', $uneseno['idGrupa']);
        $this->db->update('grupa', $uneseno); 
    }
    
    public function deleteGrupa($idGrupa) {
        $this->db->where('idGrupa', $idGrupa);
        $this->db->update('grupa', array('status'=> '-1'));
        
        $this->db->where('idGrupa', $idGrupa);
        $this->db->update('proizvod_grupa', array('status'=> '-1'));
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
        
        $query= $this->db->where('pr.status', 1);
        $query= $this->db->get('proizvod p1', $limit, $offset);
        return $query->result_array();
    }
    
    public function getTipRelacija() {
        $query= $this->db->select('idTipRelacija, nazivTipRelacija');
        $query= $this->db->where('status', 1);
        $query= $this->db->get('tip_relacija');
        return $query->result_array();
    }
    
    public function insertProizvodRelacija($uneseno){
        $this->db->insert('proizvod_relacija',$uneseno);
    }
    
    public function insertTipRelacija($uneseno){
        $this->db->insert('tip_relacija',$uneseno);
    }
     
    public function idInsertTipRelacija($uneseno){
        $this->db->insert('tip_relacija',$uneseno);
        return $this->db->insert_id();  
    }
    
    public function updateTipRelacija($uneseno) {
        $this->db->where('idTipRelacija', $uneseno['idTipRelacija']);
        $this->db->update('tip_relacija', $uneseno);  
    }
    
    public function updateProizvodRelacija($uneseno) {
        $this->db->where('idTipRelacija', $uneseno['idTipRelacija']);
        $this->db->where('idProizvod', $uneseno['idProizvod']);
        $this->db->where('idSlicanProizvod', $uneseno['idSlicanProizvod']);
        $this->db->update('proizvod_relacija', array('status'=> '1')); 
    }
    
     public function deleteTipRelacija($idTipRelacija) {
        $this->db->where('idTipRelacija', $idTipRelacija);
        $this->db->update('tip_relacija', array('status'=> '-1'));  
    }
    
    public function deleteProizvodRelacija($uneseno) {
        $this->db->where('idTipRelacija', $uneseno['idTipRelacija']);
        $this->db->where('idProizvod', $uneseno['idProizvod']);
        $this->db->where('idSlicanProizvod', $uneseno['idSlicanProizvod']);
        $this->db->update('proizvod_relacija', array('status'=> '1')); 
    }
    
   //////////////// RELACIJE PROIZVODA KRAJ ///////////////////////////////////
    
    
}