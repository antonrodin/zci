<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->init_config();
    }
    
    public function index() {
        $this->redirect_home();
    }
    
    public function login() {
        $this->_data['view'] = 'login';
        echo Modules::run("template/admin", $this->_data);
    }
    
    public function is_logged_in() {
        if (!$this->session->userdata("is_logged_in")) {
            redirect($this->_login, "refresh");
        }
    }
    
    public function sign_in() {

        $error = false;
        $ok = false;
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $message = "<p>Wrong username or password!</p>";

        if (!ctype_alnum($username)) {
            $message = "<p>Username should contain only characters!</p>";
            $error = true;
        }

        if (!ctype_alnum($password)) {
            $message = "<p>Password should contain only alphanumeric characters!</p>";
            $error = true;
        }

        if (!$error) {
            $ok = $this->mdl_users->validate($username, $password);
        }

        if ($ok) {
            $data = array(
                'username' => $username,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            $this->session->set_flashdata('error', "<p>Bienvenido {$username}. Se ha logueado correctamente.</p>");
            redirect($this->_home, "refresh");
        } else {
            $this->session->set_flashdata('error', $message);
            redirect($this->_login, "refresh");
        }     
    }
    
    public function sign_out() {
        $data = array(
                'username' => '',
                'is_logged_in' => false
        );
        $this->session->unset_userdata($data);
        redirect($this->_login, 'refresh');
    }
    
    public function all() {
        Modules::run("user/is_logged_in");
        $this->_data['all'] = $this->get_all();
        $this->_data['view'] = 'all';
        echo Modules::run("template/admin", $this->_data);
    }
    
    public function show($id) {
        $this->_data['object'] = $this->get_by_id((int) $id);
        $this->load->view('show', $this->_data);
    }
    
    public function add() {
        Modules::run("user/is_logged_in");
        $this->_data['action'] = "insert";
        $this->_data['id'] = -1;
        $this->populate($array_data = array());
        $this->_data['view'] = 'form';
        echo Modules::run("template/admin", $this->_data);
    }
    
    public function delete($id) {
        Modules::run("user/is_logged_in");
        $this->mdl_users->delete_by_id($id);
        $this->redirect_home();
    }
    
    public function edit($id) {
        Modules::run("user/is_logged_in");
        $this->_data['id'] = (int) $id;
        $this->_data['action'] = "update";
        $object = $this->get_by_id($id);
        $this->populate(array_pop($object->result_array())); 
        $this->_data['view'] = 'form';
        echo Modules::run("template/admin", $this->_data);
    }
    
    public function insert() {
       Modules::run("user/is_logged_in");
       if ($this->validate()) {
           $object_data = $this->post_populate();
           if ( method_exists($this->mdl_users, $this->input->post('action')) ) {
                call_user_func_array( array($this->mdl_users, $this->input->post('action')), array($object_data));
           }
           $this->redirect_home();
       } else {
           if ($this->input->post('action') == 'insert') { $this->add(); }
           if ($this->input->post('action') == 'update') { $this->edit($this->input->post('id')); }
       }  
    }
    
    /* PRIVATE FUNCTIONS */
    
    private function get_by_id($id) {
        Modules::run("user/is_logged_in");
        return $this->mdl_users->get_by_id($id);
    }
    
    private function get_all() {
       return $this->mdl_users->get_all();
    }
    
    private function get_by_slug($slug) {
        return $this->mdl_users->get_by_slug($slug);
    }
    
    
    /* SHOULD TO BE MODIFIED */
    private function validate() {
         Modules::run("user/is_logged_in");
         $field = "username";
         $table = $this->mdl_users->get_table();
         $this->load->library('form_validation');
         $this->form_validation->set_rules('username', 'Username', "required|is_unique[{$table}.{$field}]");
         $this->form_validation->set_rules('password', 'Password', 'required');
         $this->form_validation->set_rules('confirm_password', 'Password', 'required|matches[password]');
         $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
         $this->form_validation->set_rules('action', 'Action', 'required');
         $this->form_validation->set_rules('id', 'Id', 'required|numeric');
         if ($this->form_validation->run()) {
            return true;
        } else {
            return false;
        }
    }
    
    private function populate($array_data) {
        Modules::run("user/is_logged_in");
        if (empty($array_data)) {
            $array_data = array(
                    'username' => 'Username',
                    'password' => 'Password',
                    'email_address' => 'Email Address'
            );
        }
        $this->_data = array_merge($array_data, $this->_data);
        $this->_data['confirm_password'] = 'Passw0rd';
    }
    
    private function post_populate() {
        Modules::run("user/is_logged_in");
        return $array = array(
               'id' => $this->input->post('id'),
               'username' => $this->input->post('username'),
               'password' => md5($this->input->post('password')),
               'email_address' => $this->input->post('email_address')
        );
    }
    
    private function redirect_home() {
        redirect("{$this->_home}", "refresh");
    }
    
    private function init_config() {
        $this->load->model("mdl_users");
        $this->_data['module'] = strtolower(get_class($this));
        $this->_data['admin_sidebar'] = "common/admin_sidebar";
    }
    
    private $_data = array();
    private $_home = "/admin/user/all";
    private $_login = "/admin";
    
}