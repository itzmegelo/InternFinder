<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }
  function createData() {
    $data = array (
      'fullname' => $this->input->post('fullname'),
      'age' => $this->input->post('age'),
      'gender' => $this->input->post('gender')
    );
   return $this->db->insert('tbl_students', $data);
  }
  function getAllData() {
    $query = $this->db->query('Select * from tbl_students');
    return $query->result();
  }
  function getData($id) {
    $query = $this->db->query('Select * from tbl_students Where `id` =' .$id);
    return $query->row();
  }
  function updateData($id) {
    $data = array (
      'fullname' => $this->input->post('fullname'),
      'age' => $this->input->post('age'),
      'gender' => $this->input->post('gender')
      );
      $this->db->where('id', $id);
      $this->db->update('tbl_students', $data);
  }
  function deleteData($id) {
    $this->db->where('id',$id);
    $this->db->delete('tbl_students');
  
  }

}