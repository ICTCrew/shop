<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of test_controller
 *
 * @author Matic
 */
class Test_Controller extends CI_Controller{
    
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
       /*
        $data['sve']=  $this->admin_model->get('proizvod');
        
        
        $data['sve']=  $this->proizvod_model->getProizvodiBrenda(1);
        
        
        $data1=array('idProizvod', 'modelOpis', 'opis');
        $data['sve']=  $this->proizvod_model->getKolone('proizvod', $data1, 2,1);
        
        
        
        $data['sve']=  $this->frontend_model->getKategorija();
        
        $niz=array('prvi', 'drugi', 'treci', 'cet', 'peti', 'sesti', 'sedmi', 'osmi', 'deveti', 'deseti');
        
        //$data=$niz;
        $data=  serialize($niz);
        $data=  unserialize($data);
        
        
        
        $data['sve']=  $this->korisnik_model->getKorisnik('bilja@bla.com', 'bilja86');
        
        $data['sve']=  $this->korisnik_model->getPorudzbine(1);
        
        $data['osobine']=  $this->catalogue_model->prepisiOsobine(1);
        
        $data['proizvod']=  $this->proizvod_model->getProizvod(1);
        
        $data['sve']=  $this->frontend_model->getGrupa();
        
        $data['sve']=  $this->frontend_model->getBrend();
        
        $data['sve']=  $this->frontend_model->getStranica('url stranica');
        
        $data['sve']=  $this->frontend_model->conf_shop();
        
        $data['sve']=  $this->frontend_model->getSlajder();
        
        $data['sve']=  $this->backend_model->getOpcije(1);
        
        $data['sve']=  $this->proizvod_model->search("opis2");
        
        $data['sve']=  $this->login_model->getKorisnik('bilja@bla.com', 'bilja86');
        
        $data['sve']=  $this->login_model->activateUser('123123123123');
        
        $data['sve']=  $this->proizvod_model->getProizvodiGrupe(1);
        
        $data['sve']=  $this->proizvod_model->getPovezaniProizvodi(1);
        
        $data['sve']=  $this->proizvod_model->getProizvodiKategorije(1, 'modelOpis', 'desc');
        
        $data['sve']=  $this->proizvod_model->getKomentari(1);
        
        $data['sve']=  $this->catalogue_model->getKategorije();
        
        $data['sve']=  $this->catalogue_model->getBrendovi();
        
        $data['sve']=  $this->catalogue_model->getProizvod(1);
        
        $data['sve']=  $this->catalogue_model->getProizvodiT(array('nazivId'=>'k.idKategorija', 'vrednostId'=>1), 'kategorija', 0, 0, 'modelOpis', 'asc');
        
        $data['sve']=  $this->catalogue_model->getPovezaniProizvodi();
        
        $data['sve']=  $this->catalogue_model->getKategorija(2);
        
        $data['sve']=  $this->catalogue_model->insertTabela('drzava',array('nazivDrzava'=>'Canada', 'status'=>'1'));
        
        $data['sve']=  $this->catalogue_model->idInsertTabela('proizvod_popust',array('idProizvod'=>'4', 'idPopust'=>'1', 'status'=>'1'));
        
        $data['sve']=  $this->catalogue_model->updateTabela('drzava', array('nazivId'=>'idDrzava', 'vrednostId'=>5), array('nazivDrzava'=>'Russia', 'status'=>'0'));
        
         
        * NETESTIRAN ZBOG KASKADNOG BRISANJA KATEGORIJA!!!!
         * 
         
        //$data['sve']=  $this->catalogue_model->deleteKategorija(2, 1, ?);
       
        $data['sve']=  $this->catalogue_model->deleteBrend(3, 0);
         
        $data['sve']=  $this->proizvod_model->getProizvodiT(array('nazivId'=>'idBrend', 'vrednostId'=>'3'), 'brend', 0, 0, 'modelOpis', 'asc');
       
        $data['sve']=  $this->catalogue_model->getProizvodiT(array('nazivId'=>'k.idKategorija', 'vrednostId'=>'3'), 'kategorija', 0, 0, 'modelOpis', 'asc');
      
        $data['sve']=  $this->catalogue_model->getGrupe();
        
        $data['sve']=  $this->catalogue_model->getGrupa(2);
         
        $data['sve']=  $this->catalogue_model->deleteGrupa(1);
        
        $data['sve']=  $this->catalogue_model->getTipoviRelacija();
        
        $data['sve']=  $this->catalogue_model->getTipRelacije(1);
        
        $data['sve']=  $this->catalogue_model->deleteTipRelacija(2);
        
        $data['sve']=  $this->catalogue_model->deleteProizvodRelacija(array('idProizvod'=>'1', 'idSlicanProizvod'=>'4', 'idTipRelacija'=>'1'));
        
        $data['sve']=  $this->proizvod_model->getBrendoviKategorije(3);
        
        $data['sve']=  $this->proizvod_model->getKategorijeBrendova(3);
        
        $data['sve']=  $this->proizvod_model->getOsobineKategorijeBrenda(2, 2);
        */
        $data['sve']=  $this->frontend_model->getMeni();
        
        
        
          //$data['title']='Home';
        
        //$data['ulogovan']=false;
        
        $this->load->view('test_view',$data);
    }
    
    
}