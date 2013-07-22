<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Home Controller
 */
class Home extends MX_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->init_config();
    }
    
    public function index() {
        $this->_data['view'] = 'index';
        echo Modules::run("template/main", $this->_data );
    }
    
    public function redirect_home() {
        redirect($this->_home, 'refresh');
    }
    
    private function init_config() {
        $this->lang->load('common');
        $this->_data['module'] = strtolower(get_class($this));
    }
    
    private $_data = array();
    private $_home = "/home/";
    
}