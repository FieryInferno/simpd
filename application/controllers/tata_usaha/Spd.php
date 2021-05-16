<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Spd extends CI_Controller {

  public function index()
  {
    $data['data']     = $this->M_SPD->getAll();
		$data['content']	= 'tata_usaha/V_dataSPD';
		$this->load->view('tata_usaha/temp_tu', $data);
  }
  
  public function tambah()
  {
    if ($this->input->post()) {
      $tanggalBerangkat             = new DateTime($this->input->post('tanggalBerangkat'));
      $tanggalKembali               = new DateTime($this->input->post('tanggalKembali'));
      $data['lama_hari']            = $tanggalKembali->diff($tanggalBerangkat)->format("%a");
      $data['pegawai']              = $this->M_Pegawai->getById($this->input->post('id_pegawai'));
      $data['pegawai1']             = $this->M_Pegawai->getByP1($this->input->post('pengikut_1'));
      $data['pegawai2']             = $this->M_Pegawai->getByP2($this->input->post('pengikut_2'));
      $data['pegawai3']             = $this->M_Pegawai->getByP3($this->input->post('pengikut_3'));
      $data['provinsi_berangkat']   = $this->M_Wilayah->getProvinsi($this->input->post('tempat_berangkat_provinsi'));
      $data['kabupaten_berangkat']  = $this->M_Wilayah->getKabupaten($this->input->post('tempat_berangkat_kabupaten'));
      $data['kecamatan_berangkat']  = $this->M_Wilayah->getKecamatan($this->input->post('tempat_berangkat_kecamatan'));
      $data['provinsi_tujuan']      = $this->M_Wilayah->getProvinsi($this->input->post('tempat_tujuan_provinsi'));
      $data['kabupaten_tujuan']     = $this->M_Wilayah->getKabupaten($this->input->post('tempat_tujuan_kabupaten'));
      $data['kecamatan_tujuan']     = $this->M_Wilayah->getKecamatan($this->input->post('tempat_tujuan_kecamatan'));
      ob_start();
        $this->load->view('tata_usaha/spd/pdf', $data);
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
      $this->M_SPD->insert($data['lama_hari'], $filename);
      redirect('tata_usaha/spd');
    }

    $dariDB           = $this->M_SPD->idspd();
    $nourut           = $dariDB;
    $idspdskrng       = $nourut + 1 ;
    $data['id_spd']   = $idspdskrng;
    $data['content']	= 'tata_usaha/V_inputSPD';
    $data['pegawai']  = $this->M_Pegawai->getAll();
    $data['provinsi'] = $this->M_Wilayah->getProvinsi();
		$this->load->view('tata_usaha/temp_tu', $data);
  }

  public function upload()
  {
    $this->M_SPD->upload();
    redirect('tata_usaha/spd');
  }
}
