<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Kasi extends CI_Controller {
  
	public function index()
	{
		$data['content']  = 'kepala_seksi/dashboard_kasi';
		$this->load->view('kepala_seksi/temp_kasi', $data);
	}

  public function surat_tugas()
  {
    $data['data']     = $this->M_Surattugas->getAll();
		$data['content']	= 'kepala_seksi/v_dataST';
		$this->load->view('kepala_seksi/temp_kasi', $data);
  }

  public function input_surattugas()
  {
    if ($this->input->post()) {
      
      $data['spd']  = $this->M_SPD->getByIdSPD($this->input->post('id_spd'));
    
      ob_start();
        $this->load->view('kepala_seksi/surat_tugas/pdf.php', $data);
        $html = ob_get_contents();
      ob_end_clean();
      ob_clean();
      $filename   = uniqid();
      $options  	= new Options();
      $options->set('isRemoteEnabled', TRUE);
      $dompdf = new Dompdf($options);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('legal', 'portrait');
      $dompdf->render();
      $output = $dompdf->output();
      file_put_contents('./assets/' . $filename . '.pdf', $output);
      $this->M_Surattugas->insert( $filename);
      redirect('index.php/kepala_seksi/kasi/surat_tugas');
    }

   
    $data['content']	= 'kepala_seksi/v_inputST';
   
  
		$this->load->view('kepala_seksi/temp_kasi', $data);
  }

  public function spd()
  {
    $data['data']     = $this->db->get_where('spd', ['bagian' => $this->session->jabatan])->result();
		$data['content']	= 'kepala_seksi/spd';
		$this->load->view('kepala_seksi/temp_kasi', $data);
  }
}
