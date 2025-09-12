<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }
  public function login() {
    $email_username = htmlspecialchars($this->input->post('email-username', TRUE), ENT_QUOTES, 'UTF-8');
    $password = $this->input->post('password', TRUE);

    $query = $this->db->get_where('tbl_users', array('email' => $email_username), 1);

    if ($query->num_rows() === 1) {
      $user = $query->row();
      if (password_verify($password, $user->password)) {
        return $user;
      }
    }
    return FALSE;
  }

  public function register() {
    $data = [
      'fullname' => htmlspecialchars($this->input->post('fullname', TRUE), ENT_QUOTES, 'UTF-8'),
      'username' => htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES, 'UTF-8'),
      'email' => htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES, 'UTF-8'),
      'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT)
    ];

    return $this->db->insert('tbl_users', $data);
  }

}