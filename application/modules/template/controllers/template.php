<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->init_config();
    }
    
    public function admin($data) {
        $this->_data = array_merge($this->_data, $data);
        $this->load->view('admin', $this->_data);
    }
    
    private function init_config() {
        $this->_data = $this->config->item('template');
    }
    
    private $_data;
}