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
        $query= $this->db->select('idProizvod, modelOpis, opis, statusPopust, cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where('idKategorija', $idKategorija);
        $query= $this->db->get('proizvod p', $limit, $offset);
        return $query->result_array();
    }
    
    public function getProizvodiBrenda($idBrend, $limit=0, $offset=0) {
        $query= $this->db->select('idProizvod, modelOpis, opis, statusPopust, cena, s.url,');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->where('idBrend', $idBrend);
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
        $query= $this->db->get('proizvod p');
        return $query->result_array();
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
    
    public function search($search) {
        $query= $this->db->select('idProizvod, idTipProizvod, idBrend, idKategorija, p.title AS Ptitle, description, modelOpis, opis, statusPopust, cena, s.url, s.title AS Stitle, s.alt');
        $query= $this->db->join('slika s', 'p.idSlika = s.idSlika');
        $query= $this->db->like('modelOpis', $search);
        $query= $this->db->or_like('opis', $search); 
        $query= $this->db->or_like('osobine', $search);
        $query= $this->db->get('proizvod p');
        return $query->result_array();
    }
    
     
    
    
    
    
}