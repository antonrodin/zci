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
    
    /**
     * If not logged IN redirect to HOME
     */
    public function is_logged_in() {
        if (!$this->session->userdata("is_logged_in")) {
            redirect($this->_login, "refresh");
        }
    }
    
    /**
     * If Usser is Logged, redirect TO $redirect
     * @param <string> $redirect PATH "admin/user/all" where to redirect
     */
    public function is_logged_in_redirect($redirect) {
        if ($this->session->userdata("is_logged_in")) {
            redirect($redirect, "refresh");
        }
    }
    
    /**
     * Encrypt PASSWORD. You should change this if you have better security. Check SHA1 or something like that
     * @param <stiong> $string String to encrypt
     * @return <strong> Encrypted password
     */
    public function encrypt($string) {
        return md5($string);
    }
    
    private function init_config() {
        $this->_login = "admin/login";
    }
    
    private $_login;
    
}