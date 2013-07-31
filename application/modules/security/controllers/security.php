<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Security Class.
 * Password encryption, session and other stuff
 */
class Security extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->init_config();
    }
    
    public function index() {
        redirect($this->_login, "refresh");
    }
    
    public function is_logged_in() {
        if (!$this->session->userdata("is_logged_in")) {
            redirect($this->_login, "refresh");
        }
    }
    
    public function encrypt($string) {
        return md5($string);
    }
    
    private function init_config() {
        $this->_login = "admin/login";
    }
    
    private $_login;
    
}