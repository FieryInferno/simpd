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

  public function edit_spd($id_spd){
    if ($this->input->post()) {
      $tanggalBerangkat             = new DateTime($this->input->post('tanggalBerangkat'));
      $tanggalKembali               = new DateTime($this->input->post('tanggalKembali'));
      $data['lama_hari']            = $tanggalKembali->diff($tanggalBerangkat)->format("%a") + 1;
      $this->M_SPD->update($data['lama_hari'], $id_spd);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil edit data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('tata_usaha/tata_usaha/data_spd');
    }
     $data             = $this->M_SPD->getByIdSpd($id_spd);
    $data['content']  = 'tata_usaha/v_editSPD';
    $data['pegawai']  = $this->M_Pegawai->getAll();
    $data['provinsi'] = $this->M_Wilayah->getProvinsi();
    $data['kegiatan'] = $this->M_Kegiatan->getAll();
    $data['komponen'] = $this->M_Komponen->getAll();
    $data['anggaran'] = $this->M_Anggaran->getAll();

    $this->load->view('tata_usaha/temp_tu', $data);
  }


	public function data_spd(){
		$data['data']     = $this->M_SPD->getAll();
		$data['content']	= 'tata_usaha/V_dataSPD';
		$this->load->view('tata_usaha/temp_tu', $data);
	}
public function tambah_spd()
  {
   if ($this->input->post()) {
    // print_r($this->input->post());
    // die();
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
      redirect('tata_usaha/tata_usaha/data_spd');
    }

    $dariDB           = $this->M_SPD->idspd();
    $nourut           = $dariDB;
    $idspdskrng       = $nourut + 1 ;
    $data['id_spd']   = $idspdskrng;
    $data['content']  = 'tata_usaha/V_inputSPD';
    $data['pegawai']  = $this->M_Pegawai->getAll();
   
    $data['provinsi'] = $this->M_Wilayah->getProvinsi();
    $data['kegiatan'] = $this->M_Kegiatan->getAll();
    $data['komponen'] = $this->M_Komponen->getAll();
    $data['anggaran'] = $this->M_Anggaran->getAll();

    $this->load->view('tata_usaha/temp_tu', $data);
  }

  public function upload()
  {
    $this->M_SPD->upload();
    redirect('tata_usaha/tata_usaha/data_spd');
  }

 public function lihat_spd($id_spd)
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
   switch ($data['pegawai']['eselon']) {
        case 'I':
          $data['pegawai']['uangFull'] = 0;
          break;
        case 'II':
          $data['pegawai']['uangFull'] =0;
          break;
        case 'III':
          $data['pegawai']['uangFull'] = 0;
          break;
        case 'IV':
          $data['pegawai']['uangFull'] =0;
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
            $data['pegawai1']['uangFull'] = 0;
            break;
          case 'II':
            $data['pegawai1']['uangFull'] = 0;
            break;
          case 'III':
            $data['pegawai1']['uangFull'] = 0;
            break;
          case 'IV':
            $data['pegawai1']['uangFull'] = 0;
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
            $data['pegawai2']['uangFull'] = 0;
            break;
          case 'II':
            $data['pegawai2']['uangFull'] = 0;
            break;
          case 'III':
            $data['pegawai2']['uangFull'] = 0;
            break;
          case 'IV':
            $data['pegawai2']['uangFull'] = 0;
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
            $data['pegawai3']['uangFull'] = 0;
            break;
          case 'II':
            $data['pegawai3']['uangFull'] = 0;
            break;
          case 'III':
            $data['pegawai3']['uangFull'] = 0;
            break;
          case 'IV':
            $data['pegawai3']['uangFull'] =0;
            break;
          
          default:
            # code...
            break;
        }
        $data['pegawai3']['totalUangFull']    = $data['pegawai3']['uangFull'] * $data['lama_hari'];
        $data['pegawai3']['totalUang']  = $data['uangHarian'] + $data['pegawai3']['totalUangFull'];
      }
    } 
     
    $data['bendahara']        = $this->M_Pegawai->getBendahara();
    $data['ppk']              = $this->M_Pegawai->getPPK();
    $data['kepala']           = $this->M_Pegawai->getKepala();
    $data['transportasi']     = $this->db->get_where('transportasi', ['id_kabupaten'  => $data['kabupaten_tujuan']['id']])->row_array();
    $this->load->view('tata_usaha/spd/pdf', $data);
  }



  public function hapus_spd($id_spd)
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

    redirect('tata_usaha/tata_usaha/data_spd');
  }

  public function data_lhp()
  {
    $data['lhp']      = $this->M_SPD->getAll();
    $data['content']  = 'tata_usaha/v_lhp';
    $this->load->view('tata_usaha/temp_tu', $data);
  }

  public function lihat_lhp($id_spd)
  {
    $data             = $this->M_SPD->getByIdSPD($id_spd);
    $data['data']     = $this->M_Lhp->get_lhp($id_spd);
    $data['content']  = 'tata_usaha/v_lihatLhp';
    $this->load->view('tata_usaha/temp_tu', $data);
  }

  public function cetak_lhp($id_spd)
  {
    $data['lhp']  = $this->M_Lhp->get_lhp($id_spd);
    ob_start();
      $this->load->view('tata_usaha/LhpPdf.php', $data);
      $html = ob_get_contents();
    ob_end_clean();
    ob_clean();
    $filename   = uniqid();
    $options    = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('legal', 'landscape');
    $dompdf->render();
    $dompdf->stream($filename, array("Attachment" => 0) );
  }

  public function data_realisasi()
  {
    $data['data']      = $this->M_SPD->getAll();
    $data['content']  = 'tata_usaha/v_realisasi';
    $this->load->view('tata_usaha/temp_tu', $data);
  }

  public function lihat_realisasi($id_spd)
  {
    $data             = $this->M_SPD->getByIdSPD($id_spd);
    $data['data']     = $this->M_Realisasi->get_realisasi($id_spd);
    $data['content']  = 'tata_usaha/v_lihatrealisasi';
    $this->load->view('tata_usaha/temp_tu', $data);
  }

  public function cetak_realisasi($id_spd)
  {
    $data['realisasi']  = $this->M_Realisasi->get_realisasi($id_spd);
    ob_start();
      $this->load->view('tata_usaha/realisasipdf.php', $data);
      $html = ob_get_contents();
    ob_end_clean();
    ob_clean();
    $filename   = uniqid();
    $options    = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('legal', 'landscape');
    $dompdf->render();
    $dompdf->stream($filename, array("Attachment" => 0) );
  }

public function pengembalianBiaya($id_spd)
  {
     $this->db->join('spd', 'realisasi_biaya.id_spd = spd.id_spd');
    $this->db->join('pegawai', 'spd.id_pegawai = pegawai.id');
    $data['realisasi'] = $this->db->get_where('realisasi_biaya', ['realisasi_biaya.id_spd'  => $id_spd])->result_array();

    $this->db->join('wilayah_kecamatan', 'spd.kecamatan_tujuan = wilayah_kecamatan.id');
    $this->db->select('spd.*, wilayah_kecamatan.nama as nama_kecamatan');
    $data['spd']  = $this->db->get_where('spd', ['id_spd' => $id_spd])->row_array(); 

    $data['transportasi'] = $this->db->get_where('transportasi', ['id_kabupaten'  => $data['spd']['kabupaten_tujuan']])->row_array();

    $sbm  = $this->db->get_where('sbm', [
      'provinsi'  => $data['spd']['provinsi_tujuan']
    ])->row_array();
     

    if ($data['spd']['kabupaten_berangkat'] == $data['spd']['kabupaten_tujuan']) {
      $data['uangHarian']   = $sbm['dalam_kota'];
      switch ($spd['eselon']) {
        case 'I':
          $data['representasi'] = 100000;
          break;
        case 'II':
          $data['representasi'] = 75000;
          break;
        
        default:
          # code...
          break;
      }
    } else {
      $data['uangHarian'] = $sbm['luar_kota'];
      switch ($this->db->eselon) {
        case 'I':
          $data['representasi'] = 200000;
          break;
        case 'II':
          $data['representasi'] = 150000;
          break;
        
        default:
          # code...
          break;
      }
    }

    $data['realisasi_transportasi'] = 0;
    $data['realisasi_representasi'] = 0;
    $data['realisasi_penginapan']   = 0;

    $spd = $this->db->get_where('realisasi_biaya', ['id_spd'  => $id_spd])->result_array();

    foreach ($spd as $key) {
      switch ($key['jenis']) {
        case 'transportasi':
          $data['realisasi_transportasi'] += $key['jumlah'];
          break;
        case 'penginapan':
          $data['realisasi_penginapan'] += $key['jumlah'];
          break;
        case 'representasi':
          $data['realisasi_representasi'] += $key['jumlah'];
          break;
        
        default:
          # code...
          break;
      }
    }
    $this->load->view('pegawai/v_pengembalianbiaya', $data);

}  }




