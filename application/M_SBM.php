<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SBM extends CI_Model {
  
  protected $table  = 'sbm';

	public function get()
	{
		return $this->db->get_where($this->table, [
      'provinsi'  => $this->input->post('tempat_tujuan_provinsi')
    ])->row_array();
	}
}
