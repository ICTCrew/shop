<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of test_controller
 *
 * @author Matic
 */
class Test_Controller extends FrontEnd_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
        $this->load->model('proizvod/proizvod_model');
        $this->load->model('frontend_model');
        $this->load->model('backend_model');
        $this->load->model('korisnik_model');
        
    }
    
    public function index() {
       
        $data=  $this->admin_model->get('proizvod');
        
        $data=  $this->proizvod_model->getProizvod(1);
        
        $data=  $this->proizvod_model->getOsobine(1);
        
        $data=  $this->proizvod_model->getProizvodiBrenda(1);
        
        $data=  $this->proizvod_model->getProizvodiKategorije(1);
        
        $data1=array('idProizvod', 'modelOpis', 'opis');
        $data=  $this->proizvod_model->getKolone('proizvod', $data1, 2,1);
        
        $data=  $this->frontend_model->getSlajder(1);
        
        $data=  $this->frontend_model->getMeni();
        
        $data=  $this->frontend_model->getKategorija();
        
        $niz=array('prvi', 'drugi', 'treci', 'cet', 'peti', 'sesti', 'sedmi', 'osmi', 'deveti', 'deseti');
        
        //$data=$niz;
        $data=  serialize($niz);
        $data=  unserialize($data);
        
        $data=  $this->backend_model->search("pretraga");
        
        $data=  $this->korisnik_model->getKorisnik('bilja@bla.com', 'bilja86');
        
        $data=  $this->korisnik_model->getPorudzbine(1);
        
        //$data['title']='Home';
        //$data['ulogovan']=false;
        
        $this->load_view($data);
    }
    
    
}