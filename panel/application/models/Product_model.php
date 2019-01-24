<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

    public $tableName = "products";

    public function __construct()
    {
        parent::__construct();
    }

    /** Tüm kayıtları view'e getirecek olan metot.. */
    public function get_all(){
        return $this->db->get($this->tableName)->result();
    }

    /** Tüm verileri veritabanına kayıy edecek olan metot.. */
    public function add($data = array()){
        return $this->db->insert($this->tableName, $data);
    }

}