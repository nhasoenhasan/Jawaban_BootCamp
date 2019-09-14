<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('M_Karyawan');
	}

	public function index()
	{
        $this->load->view('v_header');
        $this->load->view('v_karyawan');
    }
    
    public function get_data()
	{
        $data=$this->M_Karyawan->karyawan_list();
		echo json_encode($data);
	}
	
	public function get_edit($id)
	{
        $data=$this->M_Karyawan->get_edit($id);
		echo json_encode($data);
    }
    
    public function work_select()
	{
        $data=$this->M_Karyawan->get_work();
		echo json_encode($data);
    }
    
    public function salary_select()
	{
        $data=$this->M_Karyawan->get_salary();
		echo json_encode($data);
    }
	
	public function get_delete($id){
		$this->M_Karyawan->get_hapus($id);
		echo json_encode(array("status" => TRUE));
	}
	
    public function insert(){
		$name=$this->input->post('name');
		$work=$this->input->post('work');
        $salary=$this->input->post('salary');

		
        $data = array(
			'name' => $name,
			'id_work' => $work,
			'id_salary' => $salary
		);
		$insert = $this->M_Karyawan->insert($data,$work,$salary);
		echo json_encode(array("status" => TRUE));
	}

	public function update(){
		$name=$this->input->post('name');
		$work=$this->input->post('work');
		$salary=$this->input->post('salary');
		
        $data = array(
			'name' => $name,
			'id_work' => $work,
			'id_salary' => $salary
		);
		$this->M_Karyawan->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete($id){
		$this->M_Karyawan->hapus($id);
		echo json_encode(array("status" => TRUE));
	}

}
