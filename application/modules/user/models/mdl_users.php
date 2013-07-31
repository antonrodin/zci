<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_users extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Europe/Moscow");
    }
    
    /**
     * Check if there username and the password in the DB
     * @param <String> $username
     * @param <String> $password
     * @return <Boolean> user exists in the DB and the password matches
     */
    function validate($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', Modules::run("security/encrypt",$password));
        $query = $this->db->get($this->_table);

        if ($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_table() {
        return $this->_table;
    }
    
    public function get_by_id($id) {
        $this->db->where("id", $id);
        return $this->db->get($this->_table);
    }
    
    public function get_by_slug($slug) {
        $this->db->where("slug", $slug);
        return $this->db->get($this->_table);
    }
    
    public function get_all() {
        return $this->db->get($this->_table);
    }
    
    public function delete_by_id($id) {
        $this->db->where("id", $id);
        $this->db->delete($this->_table);
    }
    
    public function delete_by_slug($slug) {
        $this->db->where("slug", $slug);
        $this->db->delete($this->_table);
    }
    
    public function insert($array_data) {
        unset($array_data['id']);
        $array_data["inserted_date"] = date('Y-m-d H:i:s');
        $array_data["updated_date"] = date('Y-m-d H:i:s');
        $this->db->insert($this->_table, $array_data);
        return $this->db->insert_id();
    }
    
    public function update($array_data) {
        $this->db->where('id', $array_data['id']);
        $array_data["updated_date"] = date('Y-m-d H:i:s');
        unset($array_data['id']);
        $this->db->update($this->_table, $array_data);
    }
    
    /* SHOULD BE MODIFIED */
    private $_table = "users";
    
}