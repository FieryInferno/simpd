<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Surattugas extends CI_Model {
  
  protected $table  = 'surat_tugas';

	public function getAll()
	{
		$this->db->join('spd', $this->table . '.id_spd = spd.id_spd');
    return $this->db->get($this->table)->result_array();
	}
  
  public function insert( $filename)
  {
    $this->db->insert($this->table, [
      
       'id_spd'         => $this->input->post('id_spd'),
       'nomor_surattugas'         => $this->input->post('nomor_surattugas'),
      'file'              => $filename . '.pdf'
    ]);
  }
}