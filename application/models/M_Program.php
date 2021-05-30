<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kegiatan extends CI_Model {
	protected $table  = 'kegiatan';
	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	
  public function getbyId($id_kegiatan)
  {
    return $this->db->get_where($this->table, [
      'id_program'  => $id_program
    ])->row_array();
  }
	}