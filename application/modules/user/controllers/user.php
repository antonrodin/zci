<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Simple USER class with some basic CRUD operations
 */
class User extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->init_config();
    }
    
    /**
     * User index redirect home
     */
    public function index() {
        $this->redirect_home();
    }
    
    /**
     * Show login Form
     */
    public function login() {
        $this->_data['view'] = 'login';
        $this->_data['admin_sidebar'] = "user/common/no_sidebar";
        echo Modules::run("template/admin", $this->_data);
    }
    
    /**
     * Check if USER is logged IN
     */
    public function is_logged_in() {
        if (!$this->session->userdata("is_logged_in")) {
            redirect($this->_login, "refresh");
        }
    }

    /**
     * Sign IN. Get username and password from POST data. Get user by "slug" or "username" and check password
     */
    public function sign_in() {

        $error = false;
        $ok = false;
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $message = "Wrong username or password!";

        if (!ctype_alnum($username)) {
            $message = 'Username should contain only characters!';
            $error = true;
        }

        if (!ctype_alnum($password)) {
            $message = "Password should contain only alphanumeric characters!";
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
            success_flashdata("<p>Welcome {$username}!</p>");
            redirect($this->_home, "refresh");
        } else {
            error_flashdata("<p>{$message}</p>");
            redirect($this->_login, "refresh");
        }     
    }
    
    /**
     * Sign OUT. Delete Session Data and redirect to Login.
     */
    public function sign_out() {
        $data = array(
                'username' => '',
                'is_logged_in' => false
        );
        $this->session->unset_userdata($data);
        redirect($this->_login, 'refresh');
    }
    
    /**
     * Show ALL User
     */
    public function all() {
        Modules::run("security/is_logged_in");
        $this->_data['all'] = $this->mdl_users->get_all();
        $this->_data['view'] = 'all';
        echo Modules::run("template/admin", $this->_data);
    }
    
    /**
     * Show Add Form
     */
    public function add() {
        Modules::run("security/is_logged_in");
        $this->_data['action'] = "insert";
        $this->_data['id'] = -1;
        $this->_data['view'] = 'form';
        if (is_array($this->session->flashdata('post'))) {       
            $this->_data = array_merge( $this->_data, $this->session->flashdata('post'));
        }
        echo Modules::run("template/admin", $this->_data);
    }
    
    public function delete($id = -1) {
        if ($id != -1) {
            Modules::run("security/is_logged_in");
            $this->mdl_users->delete_by_id($id);
            success_flashdata("<p>User deleted</p>");
            $this->redirect_home();
        }
    }
    
    public function edit($id = -1) {
        if ($id != -1) {
            Modules::run("security/is_logged_in");
            $this->_data['id'] = (int) $id;
            $this->_data['action'] = "update";
            $object = $this->mdl_users->get_by_id($id);
            $this->_data = array_merge( $this->_data, array_pop($object->result_array()) );
            if (is_array($this->session->flashdata('post'))) {       
                $this->_data = array_merge( $this->_data, $this->session->flashdata('post'));
            }
            $this->_data['view'] = 'form';
            echo Modules::run("template/admin", $this->_data);
        }
    }
    
    /**
     * Insert 
     */
    public function insert() {
       Modules::run("security/is_logged_in");
       $object_data = $this->post_populate();
       if ($this->validate($this->input->post('action'))) {
           if ( method_exists($this->mdl_users, $this->input->post('action')) ) {
                call_user_func_array( array($this->mdl_users, $this->input->post('action')), array($object_data));
           }
           success_flashdata("<p>Ok!</p>");
           $this->redirect_home();
       } else {
           if ($this->input->post('action') == 'insert') { redirect("admin/user/add"); }
           if ($this->input->post('action') == 'update') { redirect("admin/user/edit/{$this->input->post('id')}"); }
       }  
    }
    
    /**
     * Validate post data from user form.
     * @return boolean true if validatino process OK. False otherwise.
     */
    private function validate($action) {
        $this->load->library('form_validation');
        if ($action == 'insert') {   
            $table = $this->mdl_users->get_table();    
            $this->form_validation->set_rules('username', 'Username', "required|is_unique[{$table}.username]");
            $this->form_validation->set_rules('email_address', 'Email Address', "required|valid_email|is_unique[{$table}.email_address]");
        } else {
            $this->form_validation->set_rules('username', 'Username', "required");
            $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
        }
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password', 'required|matches[password]');
        
        $this->form_validation->set_rules('action', 'Action', 'required');
        $this->form_validation->set_rules('id', 'Id', 'required|numeric');
        
        if ($this->form_validation->run()) {         
            return true;
        } else {
            error_flashdata(validation_errors("<p>", "</p>"));
            return false;
        }
    }
    
    /**
     * Populate array with USER data. Required for user model add and update functions
     * @return type <array> with user data
     */
    private function post_populate() {
        $this->session->set_flashdata('post', $this->input->post());
        return array(
               'id' => $this->input->post('id'),
               'username' => $this->input->post('username'),
               'password' => md5($this->input->post('password')),
               'email_address' => $this->input->post('email_address')
        );
    }
    
    /**
     * Redirect home, requiered for redirecting stuff
     */
    private function redirect_home() {
        redirect("{$this->_home}", "refresh");
    }
    
    /**
     * Init basic config for User Class
     * Load User Model
     * Define Module name. Required for loading views
     * Define Sidebar for User Admin Panel
     */
    private function init_config() {
        $this->load->model("mdl_users");
        $this->_data['module'] = strtolower(get_class($this));
        $this->_data['admin_sidebar'] = "user/common/admin_sidebar";
    }
    
    /**
     * @var <array> Data Array. Required for pass data to VIEWS.
     */
    private $_data = array();
    
    /**
     * Home Route.
     * @var <String> Route reuquiered for redirecting into user list
     */
    private $_home = "/admin/user/all";
    
    /**
     * Login Route.
     * @var <String> Route requiered for redirect to login page
     */
    private $_login = "/admin";
    
}