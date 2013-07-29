<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->init_config();
    }
    
    public function index() {
        
    }
    
    public function config() {
       $this->_data['default_config'] = $this->_data;
       $this->load->view('admin', $this->_data);
    }
    
    public function admin($data = array()) {
        $this->_data = array_merge($this->_data, $data);
        $this->load->view('admin', $this->_data);
    }
    
    private function init_config() {
        $this->_data = $this->config->item('template');
        $this->_data['module'] = strtolower(get_class($this));
        $this->_data['view'] = 'admin/default';
    }
    
    private $_data;
}