<?php

/**
 * Description of login_model
 *
 * @author Matic
 */
class Login_model extends CI_Model{
    
    /**
     * konstruktor za konekciju sa bazom
     */
    public function __construct() {
        $this->load->database();
    }
 
    /**         f-ja za logovanje 
     * 
     * @param type $email
     * @param type $pass
     * @return type asoc. array
     */
    public function getKorisnik($email, $pass) {
        $this->db->select('idKorisnik, k.idUloga, u.nazivUloga, ime, prezime');
        $this->db->join('uloga u', 'k.idUloga=u.idUloga');
        $this->db->where('email', $email);
        $this->db->where('password', md5($pass));
        $this->db->where('k.status>', 1);
        $query=$this->db->get('korisnik k');
        return $query->result_array();
    }
    
    public function registrate($uneseno){
        $this->db->insert('korisnik',$uneseno);
    }
    
    public function activateUser($code) {
        $this->db->where('aktivacioniKod', $code);
        $this->db->update('korisnik', array('status'=> '2')); 
    }
    
}