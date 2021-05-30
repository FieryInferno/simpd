<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Komponen extends CI_Model {
	protected $table  = 'komponen';
	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	
  public function getbykomponen($id_komponen)
  {
    return $this->db->get_where($this->table, [
      'id_komponen'  => $id_komponen
    ])->row_array();
  }
	}