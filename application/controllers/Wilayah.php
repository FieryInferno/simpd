<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {
  
	public function kabupaten()
	{
		$data = $this->M_Wilayah->getKabupaten();
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
	}
  
	public function kecamatan()
	{
		$data = $this->M_Wilayah->getKecamatan();
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
	}
}
