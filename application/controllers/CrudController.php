<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudController extends CI_Controller {
  public function __construct() {
    parent:: __construct();
    $this->load->model('Crud_model');
    $this->load->library('session');
    
  }
	public function index() {
	  $data['result'] = $this->Crud_model->getAllData();
		$this->load->view('crudView', $data);
	}
	public function create() {
	  if($this->Crud_model->createData()) {
	    $this->session->set_flashdata('success','Successfully Added!');
	  }else{
	    $this->session->set_flashdata('error','Something went wrong!');
	  }
	  redirect("CrudController");
	}
	public function update($id) {
	  $data['row'] = $this->Crud_model->getData($id);
    $this->load->view('crudEdit', $data);
  }
  public function updateDetails($id) {
    $this->Crud_model->updateData($id);
    redirect("CrudController");
  }
  public function deleteDetails($id) {
    $this->Crud_model->deleteData($id);
    redirect("CrudController");
  }
}
