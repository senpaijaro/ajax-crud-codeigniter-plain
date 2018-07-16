<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudModel extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function add(){
		$data = array(
			'tfname' => $this->input->post('txtfname'),
			'tmname' => $this->input->post('txtmname'),
			'tlname' => $this->input->post('txtlname')
		);
		$query = $this->db->insert('tbluser',$data);
		return ($query) ? true : false;
	}

	public function show(){
		$query = $this->db->get('tbluser');
		return ($query->num_rows() > 0 ) ? $query->result() : false;
	}

	public function edit($id){
		$this->db->where('tid',$id);
		$query = $this->db->get('tbluser');
		return ($query->num_rows() > 0 ) ? $query->row_array() : false;
	}

	public function update(){
		$data = array(
			'tfname' => $this->input->post('txtfname'),
			'tmname' => $this->input->post('txtmname'),
			'tlname' => $this->input->post('txtlname')
		);
		$this->db->where('tid',$this->input->post('txtid'));
		$query = $this->db->update('tbluser',$data);
		return ($query) ? true : false;
	}

	public function delete($id){
		$this->db->where('tid',$id);
		$query = $this->db->delete('tbluser');
		return ($query) ? true : false;
	}
}

