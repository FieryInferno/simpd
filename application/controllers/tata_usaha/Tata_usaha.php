<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Tata_usaha extends CI_Controller {
  
	public function index()
	{
		$data['content']  = 'tata_usaha/dashboard_tu';
		$this->load->view('tata_usaha/temp_tu', $data);
	}
}
