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
    public function getProizvodiKategorije($idKategorija, $limit=0, $offset=0) {
        $query= $this->db->select('idProizvod, modelOpis, opis, prikazCenaStatus, statusPopust, cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where('idKategorija', $idKategorija);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    
    public function getProizvodiBrenda($idBrend, $limit=0, $offset=0) {
        $query= $this->db->select('idProizvod, modelOpis, opis, prikazCenaStatus, statusPopust, cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where('idBrend', $idBrend);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    
    /**
     * kraj metoda za grupne proizvode
     */
    
    //nekompletan, radi
    //na prosledjen idProizvoda vraca ostale podatke
    public function getProizvod($idProizvod) {
        $query= $this->db->select('idTipProizvod, idBrend, idKategorija, idSlika, title, description, modelOpis, opis, prikazCenaStatus, statusPopust, cena');
        $query= $this->db->from('proizvod');
        $query= $this->db->where('idProizvod', $idProizvod);
        $query= $this->db->get();
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
    
    
}