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
        $this->load->model('proizvod_model');
        $this->load->model('frontend_model');
        $this->load->model('backend_model');
        $this->load->model('korisnik_model');
        $this->load->model('login_model');
        $this->load->model('admin/catalogue_model');
        
    }
    
    public function index() {
       
        $data=  $this->admin_model->get('proizvod');
        
        
        $data=  $this->proizvod_model->getProizvodiBrenda(1);
        
        
        $data1=array('idProizvod', 'modelOpis', 'opis');
        $data=  $this->proizvod_model->getKolone('proizvod', $data1, 2,1);
        
        
        
        $data=  $this->frontend_model->getKategorija();
        
        $niz=array('prvi', 'drugi', 'treci', 'cet', 'peti', 'sesti', 'sedmi', 'osmi', 'deveti', 'deseti');
        
        //$data=$niz;
        $data=  serialize($niz);
        $data=  unserialize($data);
        
        
        
        $data=  $this->korisnik_model->getKorisnik('bilja@bla.com', 'bilja86');
        
        $data=  $this->korisnik_model->getPorudzbine(1);
        
        $data['osobine']=  $this->admin_model->prepisiOsobine(1);
        
        $data['proizvod']=  $this->proizvod_model->getProizvod(1);
        
        $data=  $this->frontend_model->getGrupa();
        
        $data=  $this->frontend_model->getBrend();
        
        $data=  $this->frontend_model->getStranica('url stranica');
        
        $data=  $this->frontend_model->conf_shop();
        
        $data=  $this->frontend_model->getSlajder();
        
        $data=  $this->frontend_model->getMeni();
        
        $data=  $this->backend_model->getOpcije(1);
        
        $data=  $this->proizvod_model->search("opis2");
        
        $data=  $this->login_model->getKorisnik('bilja@bla.com', 'bilja86');
        
        $data=  $this->login_model->activateUser('123123123123');
        
        $data=  $this->proizvod_model->getProizvodiGrupe(1);
        
        $data=  $this->proizvod_model->getPovezaniProizvodi(1);
        
        $data=  $this->proizvod_model->getProizvodiKategorije(1, 'modelOpis', 'desc');
        
        $data=  $this->proizvod_model->getKomentari(1);
        
        $data=  $this->catalogue_model->getKategorije();
        
        $data=  $this->catalogue_model->getBrend();
        //$data['title']='Home';
        //$data['ulogovan']=false;
        
        $this->load_view_test($data);
    }
    
    
}