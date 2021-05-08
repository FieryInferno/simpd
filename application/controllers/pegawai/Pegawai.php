<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Pegawai extends CI_Controller {
  
	public function index()
	{
		$data['content']  = 'Pegawai/dashboard_pegawai';
		$this->load->view('Pegawai/temp_pegawai', $data);
	}

  public function dd()
  {
    $data['data']     = $this->M_SPD->getAll();
		$data['content']	= 'tata_usaha/V_dataSPD';
		$this->load->view('tata_usaha/temp_tu', $data);
  }
}