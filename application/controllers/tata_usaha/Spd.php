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
      $data['lama_hari']            = $tanggalKembali->diff($tanggalBerangkat)->format("%a") + 1;
      $this->M_SPD->insert($data['lama_hari']);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('tata_usaha/spd');
    }

    $dariDB           = $this->M_SPD->idspd();
    $nourut           = $dariDB;
    $idspdskrng       = $nourut + 1 ;
    $data['id_spd']   = $idspdskrng;
    $data['content']	= 'tata_usaha/V_inputSPD';
    $data['pegawai']  = $this->M_Pegawai->getAll();
   
    $data['provinsi'] = $this->M_Wilayah->getProvinsi();
    $data['kegiatan'] = $this->M_Kegiatan->getAll();
    $data['komponen'] = $this->M_Komponen->getAll();
    $data['anggaran'] = $this->M_Anggaran->getAll();

		$this->load->view('tata_usaha/temp_tu', $data);
  }

  public function lihat($id_spd)
  {
    $data                         = $this->db->get_where('spd', ['id_spd' => $id_spd])->row_array();
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
    $sbm                          = $this->M_SBM->get($data['provinsi_tujuan']);
    if ($data['kabupaten_berangkat'] == $data['kabupaten_tujuan']) {
      $data['uangHarian'] = $sbm['dalam_kota'];
    } else {
      $data['uangHarian'] = $sbm['luar_kota'];
    }
    $data['totalUangHarian']  = $data['uangHarian'] * $data['lama_hari'];
    // $data['totalUangFull']    = $data['uangFull'] * $data['lama_hari'];
    // $data['totalUang']        = $data['uangHarian'] + $data['totalUangFull'];
    if ($data['lama_hari'] > 1) {
      switch ($data['pegawai']['eselon']) {
        case 'I':
          $data['pegawai']['uangFull'] = $sbm['i'];
          break;
        case 'II':
          $data['pegawai']['uangFull'] = $sbm['ii'];
          break;
        case 'III':
          $data['pegawai']['uangFull'] = $sbm['iii'];
          break;
        case 'IV':
          $data['pegawai']['uangFull'] = $sbm['iv'];
          break;
        
        default:
          # code...
          break;
      }
      $data['pegawai']['totalUangFull']    = $data['pegawai']['uangFull'] * $data['lama_hari'];
      $data['pegawai']['totalUang']   = $data['uangHarian'] + $data['pegawai']['totalUangFull'];

      if ($data['pegawai1']) {
        switch ($data['pegawai1']['eselon']) {
          case 'I':
            $data['pegawai1']['uangFull'] = $sbm['i'];
            break;
          case 'II':
            $data['pegawai1']['uangFull'] = $sbm['ii'];
            break;
          case 'III':
            $data['pegawai1']['uangFull'] = $sbm['iii'];
            break;
          case 'IV':
            $data['pegawai1']['uangFull'] = $sbm['iv'];
            break;
          
          default:
            # code...
            break;
        }
        $data['pegawai1']['totalUangFull']    = $data['pegawai1']['uangFull'] * $data['lama_hari'];
        $data['pegawai1']['totalUang']  = $data['uangHarian'] + $data['pegawai1']['totalUangFull'];
      }
      
      if ($data['pegawai2']) {
        switch ($data['pegawai2']['eselon']) {
          case 'I':
            $data['pegawai2']['uangFull'] = $sbm['i'];
            break;
          case 'II':
            $data['pegawai2']['uangFull'] = $sbm['ii'];
            break;
          case 'III':
            $data['pegawai2']['uangFull'] = $sbm['iii'];
            break;
          case 'IV':
            $data['pegawai2']['uangFull'] = $sbm['iv'];
            break;
          
          default:
            # code...
            break;
        }
        $data['pegawai2']['totalUangFull']    = $data['pegawai2']['uangFull'] * $data['lama_hari'];
        $data['pegawai2']['totalUang']  = $data['uangHarian'] + $data['pegawai2']['totalUangFull'];
      }
      
      if ($data['pegawai3']) {
        switch ($data['pegawai3']['eselon']) {
          case 'I':
            $data['pegawai3']['uangFull'] = $sbm['i'];
            break;
          case 'II':
            $data['pegawai3']['uangFull'] = $sbm['ii'];
            break;
          case 'III':
            $data['pegawai3']['uangFull'] = $sbm['iii'];
            break;
          case 'IV':
            $data['pegawai3']['uangFull'] = $sbm['iv'];
            break;
          
          default:
            # code...
            break;
        }
        $data['pegawai3']['totalUangFull']    = $data['pegawai3']['uangFull'] * $data['lama_hari'];
        $data['pegawai3']['totalUang']  = $data['uangHarian'] + $data['pegawai3']['totalUangFull'];
      }
    } else {
      $data['pegawai']['totalUangFull']   = 0;
      $data['pegawai1']['totalUangFull']  = 0;
      $data['pegawai2']['totalUangFull']  = 0;
      $data['pegawai3']['totalUangFull']  = 0;
    }
    $data['bendahara']        = $this->M_Pegawai->getBendahara();
    $data['ppk']              = $this->M_Pegawai->getPPK();
    $data['kepala']           = $this->M_Pegawai->getKepala();
    $data['transportasi']     = $this->db->get_where('transportasi', ['id_kabupaten'  => $data['kabupaten_tujuan']['id']])->row_array();
    $this->load->view('tata_usaha/spd/pdf', $data);
  }

  public function upload()
  {
    $this->M_SPD->upload();
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible show" role="alert">
        <strong>Sukses!</strong> Berhasil upload data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('tata_usaha/spd');
  }
  
  public function edit($id_spd)
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
      $data['kegiatan']             = $this->M_Kegiatan->getbykegiatan($this->input->post('id_kegiatan'));
      $data['komponen']             = $this->M_Komponen->getbykomponen($this->input->post('id_komponen'));
      $data['anggaran']             = $this->M_Anggaran->getbyanggaran($this->input->post('id_anggaran'));
      $sbm                          = $this->M_SBM->get();
      if ($this->input->post('tempat_berangkat_kabupaten') == $this->input->post('tempat_tujuan_kabupaten')) {
        $data['uangHarian'] = $sbm['dalam_kota'];
      } else {
        $data['uangHarian'] = $sbm['luar_kota'];
      }

      if ($data['lama_hari'] > 1) {
        $golongan = explode('/', $data['pegawai']['namagolongan']);
        switch ($golongan[0]) {
          case 'I':
            $data['uangFull'] = $sbm['i'];
            break;
          case 'II':
            $data['uangFull'] = $sbm['ii'];
            break;
          case 'III':
            $data['uangFull'] = $sbm['iii'];
            break;
          case 'IV':
            $data['uangFull'] = $sbm['iv'];
            break;
          
          default:
            # code...
            break;
        }
      } else {
        $data['uangFull'] = 0;
      }
      $data['totalUangHarian']  = $data['uangHarian'] * $data['lama_hari'];
      $data['totalUangFull']    = $data['uangFull'] * $data['lama_hari'];
      $data['totalUang']        = $data['uangHarian'] + $data['totalUangFull'];
      $data['bendahara']        = $this->M_Pegawai->getBendahara();
      $data['ppk']              = $this->M_Pegawai->getPPK();
      $data['kepala']           = $this->M_Pegawai->getKepala();
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
      $this->M_SPD->update($data['lama_hari'], $filename, $id_spd);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil edit data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('tata_usaha/spd');
    }
    $data             = $this->M_SPD->getByIdSpd($id_spd);
    $data['content']	= 'tata_usaha/editSpd';
    $data['pegawai']  = $this->M_Pegawai->getAll();
    $data['provinsi'] = $this->M_Wilayah->getProvinsi();
    $data['kegiatan'] = $this->M_Kegiatan->getAll();
    $data['komponen'] = $this->M_Komponen->getAll();
    $data['anggaran'] = $this->M_Anggaran->getAll();

		$this->load->view('tata_usaha/temp_tu', $data);
  }

  public function hapus($id_spd)
  {
    $this->M_SPD->hapus($id_spd);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible show" role="alert">
        <strong>Sukses!</strong> Berhasil hapus data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('tata_usaha/spd');
  }
}
