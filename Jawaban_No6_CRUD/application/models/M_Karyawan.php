<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Karyawan extends CI_Model {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function karyawan_list(){
        $this->db->select('nama.id,nama.name, work.nama, category.salary');    
        $this->db->from('nama');
        $this->db->join('work','nama.id_work=work.id_work');
        $this->db->join('category',' nama.id_salary=category.id_salary');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_work(){
        $this->db->select('*');
		$this->db->from('work'); 
    	$query = $this->db->get(); 
        return $query->result();
    }

    function get_salary(){
        $this->db->select('*');
		$this->db->from('category'); 
    	$query = $this->db->get(); 
        return $query->result();
    }

    public function get_edit($id)
	{
		$this->db->select('*');    
        $this->db->from('nama');
        $this->db->join('work','nama.id_work=work.id_work');
        $this->db->join('category',' nama.id_salary=category.id_salary');
        $this->db->where('nama.id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_hapus($id){
        $this->db->select('*');    
        $this->db->from('nama');
        $this->db->join('work','nama.id_work=work.id_work');
        $this->db->join('category',' nama.id_salary=category.id_salary');
        $this->db->where('nama.id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert($data){
		$this->db->insert('nama',$data);
	    return $this->db->insert_id();
    }
    
    public function update($where, $data)
	{
		$this->db->update('nama', $data, $where);
		return $this->db->affected_rows();
    }
    
    public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('nama');
	}
    
}
