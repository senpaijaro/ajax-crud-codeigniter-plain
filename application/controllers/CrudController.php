<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudController extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('CrudModel');
	}
	public function index()
	{
		$this->load->view('crud/index');
	}

	public function add(){
		if(isset($_POST['txtfname']) && isset($_POST['txtmname']) && isset($_POST['txtlname'])){
			$res = $this->CrudModel->add();
			echo ($res) ? 'Successfully added data' : 'Something wrong in query';
		}else{
			echo 'Something Wrong in server';
		}
	}

	public function show(){
		$res = $this->CrudModel->show();
		echo json_encode($res);
	}

	public function edit($id){
		$res = $this->CrudModel->edit($id);
		echo json_encode($res);
	}

	public function update(){
		if(isset($_POST['txtfname']) && isset($_POST['txtmname']) && isset($_POST['txtlname']) && isset($_POST['txtid'])){
			$res = $this->CrudModel->update();
			echo ($res) ? 'Successfully updated data' : 'Something wrong in query';
		}else{
			echo 'Something Wrong in server';
		}
	}

	public function delete($id){
		if($id != "" && $id != null){
			$res = $this->CrudModel->delete($id);
			echo ($res) ? 'Successfully deleted data' : 'Something wrong in query';
		}else{
			echo 'Something Wrong in server';
		}
	}
}
