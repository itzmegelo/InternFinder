<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
  
  public function getAllDataIntern() {
    $query = $this->db->query('SELECT * FROM tbl_interns');
    return $query->result();
  }

  public function getAllDataFiles() {
    $query = $this->db->query('SELECT * FROM tbl_files');
    return $query->result();
  }
}