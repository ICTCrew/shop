<?php

/**
 * Description of korisnik_model
 *
 * @author Matic
 */
class Korisnik_model extends CI_Model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
    
    public function getKorisnik($mail, $pass) {
        $this->db->select('idKorisnik, ime, prezime, u.nazivUloga');
        $this->db->join('uloga u', 'u.idUloga=k.idUloga');
        $this->db->where('email', $mail);
        $this->db->where('password', md5($pass));
        $query=$this->db->get('korisnik k');
        return $query->result_array();
    }
    
    public function getPorudzbine($idKorisnik) {
        $this->db->select('p.modelOpis, p.idProizvod, pp.cenaPJK, pp.kolicinaProizvod, por.datumPorudzbina');
        $this->db->join('proizvod_porudzbina pp', 'por.idPorudzbina=pp.idPorudzbina');
        $this->db->join('proizvod p', 'p.idProizvod=pp.idProizvod');
        $this->db->where('por.idKorisnik', $idKorisnik);
        $this->db->where('por.status', 2);
        $query=$this->db->get('porudzbina por');
        return $query->result_array();
    }
    
    
}