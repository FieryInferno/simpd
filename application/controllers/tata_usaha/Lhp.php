<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lhp extends CI_Controller {
  
	public function index()
	{
    $data['lhp']      = $this->M_SPD->getAll();
    $data['content']  = 'tata_usaha/lhp';
		$this->load->view('tata_usaha/temp_tu', $data);
	}
}
