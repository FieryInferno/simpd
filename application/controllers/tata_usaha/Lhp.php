<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Lhp extends CI_Controller {
  
	public function index()
	{
    $data['lhp']      = $this->M_SPD->getAll();
    $data['content']  = 'tata_usaha/lhp';
		$this->load->view('tata_usaha/temp_tu', $data);
	}

  public function lihat($id_spd)
  {
    $data             = $this->M_SPD->getByIdSPD($id_spd);
    $data['data']     = $this->M_Lhp->get_lhp($id_spd);
    $data['content']  = 'tata_usaha/lihatLhp';
    $this->load->view('tata_usaha/temp_tu', $data);
  }

  public function cetak($id_spd)
  {
    $data['lhp']  = $this->M_Lhp->get_lhp($id_spd);
    ob_start();
      $this->load->view('Pegawai/LhpPdf.php', $data);
      $html = ob_get_contents();
    ob_end_clean();
    ob_clean();
    $filename   = uniqid();
    $options  	= new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('legal', 'landscape');
    $dompdf->render();
    $dompdf->stream($filename, array("Attachment" => 0) );
  }
}
