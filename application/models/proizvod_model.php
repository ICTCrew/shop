<?php

/**
 * Description of admin_model
 *
 * @author Matic
 */
class Proizvod_model extends CI_Model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
    
    /**
     * 
     * prikaz svih proizvoda za datu kategoriju/brend/grupu... - sintaksa ista
     * indeksi povratnog niza:
     * idProizvod, modelOpis, opis, prikazCenaStatus, statusPopust, cena, url
     * 
     * @param type $idKategorija, $idBrend, itd...
     * @param type $limit - limit na broju zapisa vracenih iz baze
     * @param type $offset - broj od kog se racunaju zapisi
     * @return type - asoc niz grupa proizvoda
     */
    public function getProizvodiKategorije($idKategorija, $limit=0, $offset=0, $kolSort='modelOpis', $tipSort='asc') {
        $query= $this->db->select('idProizvod, modelOpis, osobine, opis, statusPopust, cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where('idKategorija', $idKategorija);
        $query= $this->db->where('p.status', 1);
        $query= $this->db->order_by($kolSort, $tipSort);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    
    public function getProizvodiBrenda($idBrend, $limit=0, $offset=0, $kolSort='modelOpis', $tipSort='asc') {
        $query= $this->db->select('idProizvod, modelOpis, osobine,  opis, statusPopust, cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where('idBrend', $idBrend);
        $query= $this->db->where('p.status', 1);
        $query= $this->db->order_by($kolSort, $tipSort);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    
    // DRUGI NACIN ZA PRETHODNE DVE TABELE!!!!! (+catalogue_model)
     public function getProizvodiT($idZapisa, $tabela, $limit=0, $offset=0, $kolSort='modelOpis', $tipSort='asc') {
        $query= $this->db->select('idProizvod,p.idBrend, modelOpis, osobine, opis, statusPopust, cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where($idZapisa['nazivId'], $idZapisa['vrednostId']);
        $query= $this->db->where('p.status', 1);
        $query= $this->db->order_by($kolSort, $tipSort);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    /////////////////////////////////////////////////////
    
    public function getProizvodiGrupe($idGrupa, $limit=0, $offset=0, $kolSort='modelOpis', $tipSort='asc') {
        $query= $this->db->select('p.idProizvod, modelOpis, osobine, opis, statusPopust, cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->join('proizvod_grupa pg', 'pg.idProizvod = p.idProizvod');
        $query= $this->db->join('grupa g', 'g.idGrupa = pg.idGrupa');
        $query= $this->db->where('g.idGrupa', $idGrupa);
        $query= $this->db->where('p.status', 1);
        $query= $this->db->where('pg.status', 1);
        $query= $this->db->order_by($kolSort, $tipSort);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    
    /**
     * kraj metoda za grupne proizvode
     */
    
    
    //na prosledjen idProizvoda vraca ostale podatke
    public function getProizvod($idProizvod) {
        $query= $this->db->select('idTipProizvod, idBrend, idKategorija, p.title AS Ptitle, description, modelOpis, opis, osobine, statusPopust, cena, s.url, s.title AS Stitle, s.alt');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where('idProizvod', $idProizvod);
        $query= $this->db->where('p.status', 1);
        $query= $this->db->get('proizvod p');
        return $query->result_array();
    }
    
    /**
     * 
     * @param type $idKategorija
     * @return type asoc niz - brendovi zadate kategorije
     */
    public function getBrendoviKategorije($idKategorija) {
        $query= $this->db->select('b.idBrend, b.naziv');
        $query= $this->db->join('brend b', 'kb.idBrend = b.idBrend');
        $query= $this->db->where('kb.idKategorija', $idKategorija);
        $query= $this->db->where('b.status', 1);
        $query= $this->db->get('kategorija_brend kb');
        return $query->result_array();
    }
    
    /**
     * 
     * @param type $idBrend
     * @return type asoc niz - kategorije zadatog brenda
     */
    public function getKategorijeBrendova($idBrend) {
        $query= $this->db->select('k.idKategorija, k.nazivKategorija');
        $query= $this->db->join('kategorija k', 'kb.idBrend = k.idKategorija');
        $query= $this->db->where('kb.idKategorija', $idBrend);
        $query= $this->db->where('k.status', 1);
        $query= $this->db->get('kategorija_brend kb');
        return $query->result_array();
    }
    
    /**
     * 
     * @param type $id - Id kategorije ili brenda
     * @param type $tabela - 0 ako je kategorija, 1 ako je brend
     * @return type
     */
    public function getOsobineKategorijeBrenda($id, $tabela) {
        $query= $this->db->select('o.idOsobina, o.nazivOsobina');
        $query= $this->db->join('kategorija_brend_osobina kbo', 'kbo.idOsobina = o.idOsobina');
        $query= $this->db->where('status', 1);
        if($tabela==0){
            $query= $this->db->where('kbo.idKategorija', $id);
        }
        else {
            $query= $this->db->where('kbo.idBrend', $id);
        }
        $query= $this->db->get('osobina o');
        return $query->result_array();
    }
    
    
    

    
    
    //univerzalni test SELECT
    /**
     * 
     * @param type $tabela - naziv tabele
     * @param type $niz - niz sa nazivima trazenih kolona
     * @param type $limit - koliko
     * @param type $offset - odakle
     * @return type - asoc niz
     */
    public function getKolone($tabela, $niz, $limit=0, $offset=0) {
        $length=  count($niz);
        $columns="";
        for($i=0; $i<$length; $i++)
        {
            $columns.=$niz[$i].",";
        }
        $query= $this->db->select($columns);
        $query= $this->db->get($tabela, $limit, $offset);
        return $query->result_array();
    }
    
    
    /**     SEARCH po zadatom stringu za kolone 'modelOpis', 'opis', 'osobine' iz tebele proizvod
     * 
     * @param type $search
     * @return type asoc array proizvoda
     */
    public function search($search) {
        $query= $this->db->select('idProizvod, idTipProizvod, idBrend, idKategorija, p.title AS Ptitle, description, modelOpis, opis, statusPopust, cena, s.url, s.title AS Stitle, s.alt');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where('p.status', 1);
        $query= $this->db->like('modelOpis', $search);
        $query= $this->db->or_like('opis', $search); 
        $query= $this->db->or_like('osobine', $search);
        $query= $this->db->get('proizvod p');
        return $query->result_array();
    }
    
    public function getPovezaniProizvodi($idProizvod, $limit=0, $offset=0) {
        $query= $this->db->select('p.idProizvod, p.modelOpis, p.osobine, p.opis, p.statusPopust, p.cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->join('proizvod_relacija pr', 'pr.idSlicanProizvod = p.idProizvod');
        $query= $this->db->join('tip_relacija tr', 'tr.idTipRelacija = pr.idTipRelacija');
        $query= $this->db->where('pr.idProizvod', $idProizvod);
        $query= $this->db->where('pr.status', 1);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    
    public function getKomentari($idProizvod, $limit=0, $offset=0) {
        $query= $this->db->select('idKomentar, datum, sadrzaj, ime, prezime, email');
        $query= $this->db->join('korisnik k', 'k.idKorisnik = kom.idKorisnik');
        $query= $this->db->where('kom.idProizvod', $idProizvod);
        $query= $this->db->where('kom.status', 1);
        $query= $this->db->order_by('datum', 'asc');
        $query= $this->db->get('komentar kom', $limit, $offset);
        return $query->result_array();
    }
     
    
    
    
    
}