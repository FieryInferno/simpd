<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SBM extends CI_Model {
  
  protected $table  = 'sbm';

	public function get($provinsi_tujuan)
	{
		return $this->db->get_where($this->table, [
      'provinsi'  => $provinsi_tujuan['id']
    ])->row_array();
	}
}
