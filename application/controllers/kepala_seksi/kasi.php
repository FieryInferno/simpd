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

  public function lihatSpd($id_spd)
  {
    $data             = $this->db->get_where('spd', ['id_spd' => $id_spd])->row_array();
    $data['pegawai']              = $this->M_Pegawai->getById($data['id_pegawai']);
    $data['pegawai1']             = $this->M_Pegawai->getByP1($data['pengikut_1']);
    $data['pegawai2']             = $this->M_Pegawai->getByP2($data['pengikut_2']);
    $data['pegawai3']             = $this->M_Pegawai->getByP3($data['pengikut_3']);
    $data['provinsi_berangkat']   = $this->M_Wilayah->getProvinsi($data['provinsi_berangkat']);
    $data['kabupaten_berangkat']  = $this->M_Wilayah->getKabupaten($data['kabupaten_berangkat']);
    $data['kecamatan_berangkat']  = $this->M_Wilayah->getKecamatan($data['kecamatan_berangkat']);
    $data['provinsi_tujuan']      = $this->M_Wilayah->getProvinsi($data['provinsi_tujuan']);
    $data['kabupaten_tujuan']     = $this->M_Wilayah->getKabupaten($data['kabupaten_tujuan']);
    $data['kecamatan_tujuan']     = $this->M_Wilayah->getKecamatan($data['kecamatan_tujuan']);
    $data['kegiatan']             = $this->M_Kegiatan->getbykegiatan($data['id_kegiatan']);
    $data['komponen']             = $this->M_Komponen->getbykomponen($data['id_komponen']);
    $data['anggaran']             = $this->M_Anggaran->getbyanggaran($data['id_anggaran']);
		$data['content']	= 'kepala_seksi/lihatSpd';
		$this->load->view('kepala_seksi/temp_kasi', $data);
  }
}
