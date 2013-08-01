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
        echo Modules::run("template/admin", $this->_data);
    }
    
    public function delete($id) {
        $this->mdl_examples->delete_by_id($id);
        $this->redirect_home();
    }
    
    public function edit($id) {
        $this->_data['id'] = (int) $id;
        $this->_data['action'] = "update";
        $object = $this->mdl_examples->get_by_id($id);
        $this->populate(array_pop($object->result_array())); 
        $this->load->view('form', $this->_data);
    }
    
    public function insert() {
       if ($this->validate()) {
           $object_data = $this->post_populate();
           if ( method_exists($this->objects, $this->input->post('action')) ) {
                call_user_func_array( array($this->objects, $this->input->post('action')), array($object_data));
           }
           $this->redirect_home();
       } else {
           error_flashdata(validation_errors("<p>", "</p>"));
           if ($this->input->post('action') == 'insert') { $this->add(); }
           if ($this->input->post('action') == 'update') { $this->edit($this->input->post('id')); }
       }  
    }
    
    /* PRIVATE FUNCTIONS */
    /* SHOULD TO BE MODIFIED */
    private function validate() {
         $field = "slug";
         $table = $this->mdl_examples->get_table();
         $this->load->library('form_validation');
         $this->form_validation->set_rules('name', 'Name', 'required');
         $this->form_validation->set_rules('slug', 'Slug', "required|is_unique[{$table}.{$field}]");
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
        return $array = array(
               'id' => $this->input->post('id'),
               'slug' => $this->input->post('slug'),
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
    private $_home = "/example/all";
    
}