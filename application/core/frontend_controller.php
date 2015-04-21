<?php
/**
 * Description of FrontEnd_Controller
 *
 * @author Aleksa Novakovic
 */
class frontend_controller extends MY_Controller {
    private $role;
    function __construct(){
        parent::__construct();
        $this->session->userdata('role')?$this->role = $this->session->userdata('role'):$this->role = null;
        $this->load->model('frontend_model');
    }
        
    public function loadView($view, $data = array()) {
        $data['menu'] = $this->_loadMenu();
        $data['slider'] = $this->_loadSlider();
        $this->load->view('templates/header', $data);
	$this->load->view($view, $data);
	$this->load->view('templates/footer', $data);
    }
    
    ///////////////////////LOAD MENU/////////////////////////////////////////
    
    private function _loadMenu() {
        $menu = $this->frontend_model->getMeni();
        $menus = $this->_createMenu($menu);
        return $menus;
    }
    
    private function _createMenu($menu) {
        $menus = array();
        foreach ($menu as $meni) {
            if($meni['idNadMeni'] == NULL)
            {
                $menus[] = array($meni['nazivMeni'] => array('MenuId' => $meni['idMeni'], 'SubMenu' => ''));
            }
        }
        return $this->_createSubMenuLinks($menu, $this->_createSubMenu($menu, $menus));
    }
    
    private function _createSubMenu($menu, $menus, $newmenus = '') {
        $currentMenu = $newmenus != ''?$newmenus:$menus;
        $logic = false;
        $valueMenus = array();
        foreach ($menu as $meni) {
            if($meni['idNadMeni'] != NULL && $meni['nazivMeni'] != NULL && $meni['url'] == NULL)
            {
                foreach ($currentMenu as &$curMenu)
                {
                    foreach ($curMenu as &$value) {
                        if($value['MenuId']==$meni['idNadMeni'])
                        {
                            $value['SubMenu'][] = array('MenuId' => $meni['idMeni'], 'idParentMenu' => $meni['idNadMeni'], 'menuName' => $meni['nazivMeni'], 'privilege' => $meni['privilegija'], 'SubMenu' => '');
                            $valueMenus[$value['MenuId']] = &$value['SubMenu'];
                            $logic = true;
                        }
                    }
                }
            }
        }
        if($logic){$this->_createSubMenu($menu, $menus, $valueMenus);}
        return $currentMenu;
    }
    
    private function _createSubMenuLinks($menu, $menus, $newmenus = '') {
        $currentMenu = $newmenus != ''?$newmenus:$menus;
        $logic = false;
        $valueMenus = array();
        foreach ($menu as $meni) {
            if($meni['idNadMeni'] != NULL && $meni['nazivMeni'] == NULL && $meni['url'] != NULL)
            {
                foreach ($currentMenu as &$curMenu)
                {
                    foreach ($curMenu as &$value) {
                        if(!empty($value['SubMenu']))
                        {
                            $valueMenus[$value['MenuId']] = &$value['SubMenu'];
                            $logic = true;
                        }
                        if($value['MenuId']==$meni['idNadMeni'])
                        {
                            $value['SubMenu'][] = array('MenuId' => $meni['idMeni'], 'idParentMenu' => $meni['idNadMeni'], 'url' => $meni['url'], 'anchor' => $meni['anchor'], 'target' => $meni['target'], 'privilege' => $meni['privilegija']);
                        }
                    }
                }
            }
        }
        if($logic){$this->_createSubMenuLinks($menu, $menus, $valueMenus);}
        return $currentMenu;
    }
    
    ///////////////////////END LOAD MENU/////////////////////////////////////////
    
    ///////////////////////LOAD SLIDER/////////////////////////////////////////
    
    private function _loadSlider() {
        $slider = $this->frontend_model->getSlajder();
        $returnValue = array();
        foreach ($slider as $value) {
            $returnValue[$value['nazivSlajder']] = array();
        }
        foreach ($slider as $value) {
            foreach ($returnValue as $key => &$rValue) {
                if($key == $value['nazivSlajder'])
                {
                    $rValue[] = array('PicSrc' => $value['putanjaSlika'], 'url' => $value['url'],'title' => $value['title']);
                }
            }
        }
        return $returnValue;
    }
    
    ///////////////////////END LOAD SLIDER/////////////////////////////////////////
    
    ///////////////////////LOAD BRAND/////////////////////////////////////////
    
    public function loadBrand() {
        $brend = $this->frontend_model->getBrend();
        $resultBrend = array();
        foreach ($brend as $value) {
            $resultBrend[] = array('idBrend' => $value['idBrend'], 'brendName' => $value['naziv'], 'url' => $value['url'], 'alt' => $value['alt'], 'picTitle' => $value['slikaTitle']);
        }
        return $resultBrend;
    }
    
    ///////////////////////END LOAD BRAND/////////////////////////////////////////
    
    ///////////////////////LOAD CATEGORY/////////////////////////////////////////
    
    public function loadCategory() {
        $category = $this->frontend_model->getKategorija();
        $resultCategory = array();
        foreach ($category as $value) {
            $resultCategory[] = array('idCategory' => $value['idKategorija'], 'idParentCategory' => $value['idNadKategorija'], 'categoryName' => $value['nazivKategorija'], 'url' => $value['url'], 'alt' => $value['alt'], 'picTitle' => $value['slikaTitle']);
        }
        return $resultCategory;
    }
    
    ///////////////////////END LOAD CATEGORY/////////////////////////////////////
    
    ///////////////////////LOAD GROUP/////////////////////////////////////////
    
    public function loadGroup() {
        
    }
    
    ///////////////////////END LOAD GROUP/////////////////////////////////////
    
    ///////////////////////SUBSCRIBE/////////////////////////////////////////
    
    public function subscribe() {
        
    }
    
    ///////////////////////END SUBSCRIBE/////////////////////////////////////////
    
}
