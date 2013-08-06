<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->init_config();
    }
    
    public function index() {
        $this->redirect_home();
    }
    
    public function all() {
        $this->_data['all'] = $this->mdl_examples->get_all();
        $this->_data['view'] = "all";
        echo Modules::run("template/admin", $this->_data);
    }
    
    public function show($slug) {
        $this->_data['object'] = $this->mdl_examples->get_by_slug($slug);
        $this->load->view('show', $this->_data);
    }
    
    public function add() {
        $this->_data['action'] = "insert";
        $this->_data['id'] = -1;
        $this->_data['view'] = "form";
        
        /* Is needed for repopulate the form when using flashdata */
        if (is_array($this->session->flashdata('post'))) {       
            $this->_data = array_merge( $this->_data, $this->session->flashdata('post'));
        }
        echo Modules::run("template/admin", $this->_data);
    }
    
    public function delete($id) {
        if (isset($id)) {
            $this->mdl_examples->delete_by_id($id);
            success_flashdata("<p>Example deleted</p>");
            $this->redirect_home();
        }
    }
    
    public function edit($id) {
        if(isset($id)) {
            $this->_data['id'] = (int) $id;
            $this->_data['action'] = "update";
            $this->_data['view'] = 'form';
            $object = $this->mdl_examples->get_by_id($id);
            $this->_data = array_merge( $this->_data, array_pop($object->result_array()) );
            
            /* Is needed for repopulate the form when using flashdata */
            if (is_array($this->session->flashdata('post'))) {       
                $this->_data = array_merge( $this->_data, $this->session->flashdata('post'));
            }
            echo Modules::run("template/admin", $this->_data);
        }
    }
    
    public function insert() {
       $object_data = $this->post_populate();
       if ($this->validate()) {
           if ( method_exists($this->mdl_examples, $this->input->post('action')) ) {
                call_user_func_array( array($this->mdl_examples, $this->input->post('action')), array($object_data));
           }
           success_flashdata("<p>Success!</p>");
           $this->redirect_home();
       } else {
           error_flashdata(validation_errors("<p>", "</p>"));
           if ($this->input->post('action') == 'insert') { redirect("admin/example/add"); }
           if ($this->input->post('action') == 'update') { redirect("admin/example/edit/{$this->input->post('id')}"); }
       }  
    }
    
    /* PRIVATE FUNCTIONS */
    /* SHOULD TO BE MODIFIED */
    private function validate() {
        
        $this->load->library('form_validation');
     
        if ($this->input->post("action") == "insert") {
            $field = "slug";
            $table = $this->mdl_examples->get_table();
            $this->form_validation->set_rules('slug', 'Slug', "required|is_unique[{$table}.{$field}]");
        } else {
            $this->form_validation->set_rules('slug', 'Slug', "required");
        }
         
        $this->form_validation->set_rules('name', 'Name', 'required');      
        $this->form_validation->set_rules('age', 'Age', 'required|numeric');
        $this->form_validation->set_rules('action', 'Action', 'required');
        $this->form_validation->set_rules('id', 'Id', 'required|numeric');
        
        if ($this->form_validation->run()) {
            return true;
        } else {
            return false;
        }
    }
    
    private function post_populate() {
        $this->session->set_flashdata('post', $this->input->post());
        return $array = array(
               'id' => $this->input->post('id'),
               'slug' => url_title($this->input->post('slug'), '-', TRUE),
               'age' => $this->input->post('age'),
               'name' => $this->input->post('name')
        );
    }
    
    private function redirect_home() {
        redirect("{$this->_home}", "refresh");
    }
    
    private function init_config() {
        $this->load->model("mdl_examples");
        $this->_data['module'] = strtolower(get_class($this));
        $this->_data['admin_sidebar'] = "example/common/admin_sidebar";
    }
    
    private $_data = array();
    private $_home = "admin/example/all";
    
}