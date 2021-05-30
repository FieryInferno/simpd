<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Anggaran extends CI_Model {
	protected $table  = 'anggaran';
	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	
  public function getbyanggaran($id_anggaran)
  {
    return $this->db->get_where($this->table, [
      'id_anggaran'  => $id_anggaran
    ])->row_array();
  }
	}