<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
  public function __construct() {
    parent:: __construct();
    $this->load->model('Home_model');
    $this->load->library('session');
    
  }
	
	public function index() {
    $data = [
        'interns' => $this->Home_model->getAllDataIntern(),
        'result_files' => $this->Home_model->getAllDataFiles()
    ];
    $this->load->view('home', $data);
}
}
