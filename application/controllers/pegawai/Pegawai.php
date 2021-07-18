<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Pegawai extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
  }

	public function index()
	{
		$data['content']  = 'Pegawai/dashboard_pegawai';
		$this->load->view('Pegawai/temp_pegawai', $data);
	}

  public function data_lhp()
  {
    $data['data']     = $this->M_SPD->getbyIdPegawai();
    $data['content']	= 'pegawai/v_dataLHP';
    $this->load->view('pegawai/temp_pegawai', $data);
    }

  public function data_realisasibiaya($id_spd)
  {
    if ($this->input->post()) {
      $config['upload_path']    = './assets/';
      $config['allowed_types']  = 'jpg|png|jpeg';
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('bukti')) {
        $this->session->flashdata('pesan', '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> gagal mengupload bukti realisasi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
      } else {
        $bukti  = $this->upload->data('file_name');
      }
      $this->db->insert('realisasi_biaya', [
        'id_spd'            => $id_spd,
        'nama_pengeluaran'  => $this->input->post('nama_pengeluaran'),
        'jumlah'            => $this->input->post('jumlah'),
        'bukti'             => $bukti,
        'keterangan'        => $this->input->post('keterangan'),
        'jenis'             => $this->input->post('jenis')
      ]);
      $this->session->flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah realisasi.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('pegawai/pegawai/data_realisasibiaya/' . $id_spd);
    }
    $data = $this->M_SPD->getByIdSPD($id_spd);
    $this->db->join('spd', 'realisasi_biaya.id_spd = spd.id_spd');
    $data['detail']   = $this->db->get_where('realisasi_biaya', ['realisasi_biaya.id_spd' => $id_spd])->result();
    $data['content']  = 'pegawai/v_realisasibiaya';
    $this->load->view('pegawai/temp_pegawai', $data);
    }


  public function lihat_Lhp ($id_spd){
    $data             = $this->M_SPD->getByIdSPD($id_spd);
    $data['data']     = $this->M_Lhp->get_lhp($id_spd);
    $data['content']  = 'Pegawai/v_lihatlhp';
    $this->load->view('Pegawai/temp_pegawai', $data);
  }

  public function inputLhp(){
    $id_spd       = $_POST ['id_spd'];
    $id_pegawai   = $_POST ['id_pegawai'];
    $jam          = $_POST ['jam'];
    $kegiatan     = $_POST ['kegiatan'];
    $permasalahan = $_POST ['permasalahan'];
    $solusi       = $_POST ['solusi'];
    $keterangan   = $_POST ['keterangan'];
    $tanggal      = date('Y-m-d');
    
    $config['upload_path']    = './assets/file_lhp';
    $config['allowed_types']  = 'pdf|jpg|jpeg|png';

    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('bukti_kegiatan')) {
      print_r($this->upload->display_errors());
      die();
    } else {
      $bukti_kegiatan = $this->upload->data('file_name');
    }

    $data = [
      'id_spd'          => $id_spd, 
      'id_pegawai'      => $id_pegawai, 
      'jam'             => $jam, 
      'kegiatan'        => $kegiatan, 
      'permasalahan'    => $permasalahan, 
      'solusi'          => $solusi, 
      'keterangan'      => $keterangan, 
      'bukti_kegiatan'  => $bukti_kegiatan,
      'tanggal'         => $tanggal
    ];

    $res  = $this->M_Lhp->Insertdata('lhp', $data);
    if ($res >= 1){
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    } 
    redirect('pegawai/pegawai/lihat_lhp/' . $id_spd);
  }

  public function editLhp ($id_lhp){
    if ($this->input->post()) {
      $this->M_Lhp->edit($id_lhp);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil edit data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('pegawai/pegawai/lihat_lhp/' . $this->input->post('id_spd'));
    }
    $data             = $this->M_Lhp->getlhp2($id_lhp);
    $data['content']  = 'Pegawai/v_editlhp';
    $this->load->view('Pegawai/temp_pegawai', $data);
  }

  public function hapusLhp ($id_spd, $id_lhp){
    $this->M_Lhp->hapus($id_lhp);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible show" role="alert">
        <strong>Sukses!</strong> Berhasil hapus data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('pegawai/pegawai/lihat_lhp/' . $id_spd);
  }

  public function cetak_Lhp($id_spd)
  {
    $data['lhp'] = $this->M_Lhp->get_lhp($id_spd);
    // ob_start();
      $this->load->view('Pegawai/LhpPdf.php', $data);
    //   $html = ob_get_contents();
    // ob_end_clean();
    // ob_clean();
    // $filename   = uniqid();
    // $options    = new Options();
    // $options->set('isRemoteEnabled', TRUE);
    // $dompdf = new Dompdf($options);
    // $dompdf->loadHtml($html);
    // $dompdf->setPaper('legal', 'landscape');
    // $dompdf->render();
    // $dompdf->stream($filename, array("Attachment" => 0) );

  }
  public function tingkat()
  {
    $data = $this->M_Pegawai->getById($this->input->post('id'));
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
  }
    public function data_realisasi()
  {
    $data['data']     = $this->M_SPD->getbyIdPegawai();
    $data['content']  = 'Pegawai/realisasiBiaya';
    $this->load->view('Pegawai/temp_pegawai', $data);
  }

  public function detail_realisasi($id_spd)
  {
    if ($this->input->post()) {
      $config['upload_path']    = './assets/file_realisasi';
      $config['allowed_types']  = 'jpg|png|jpeg';
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('bukti')) {
        $this->session->flashdata('pesan', '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> gagal mengupload bukti realisasi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
      } else {
        $bukti  = $this->upload->data('file_name');
      }
      $this->db->insert('realisasi_biaya', [
        'id_spd'            => $id_spd,
        'nama_pengeluaran'  => $this->input->post('nama_pengeluaran'),
        'jumlah'            => $this->input->post('jumlah'),
        'bukti'             => $bukti,
        'keterangan'        => $this->input->post('keterangan'),
        'tanggal'           => date('Y-m-d')
      ]);
      $this->session->flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah realisasi.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('pegawai/pegawai/detail_realisasi/' . $id_spd);
    }
    $data = $this->M_SPD->getByIdSPD($id_spd);
    $this->db->join('spd', 'realisasi_biaya.id_spd = spd.id_spd');
    $data['detail']   = $this->db->get_where('realisasi_biaya', ['realisasi_biaya.id_spd' => $id_spd])->result();
    $data['content']  = 'Pegawai/detailRealisasiBiaya';
    $this->load->view('Pegawai/temp_pegawai', $data);
  }

  public function editrealisasi($id_spd, $id_realisasi)
  {
    if ($_FILES['bukti']['name'] !== '') {
      $config['upload_path']    = './assets/file_realisasi';
      $config['allowed_types']  = 'jpg|png|jpeg';
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('bukti')) {
        $this->session->flashdata('pesan', '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> gagal mengupload bukti realisasi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
      } else {
        $bukti  = $this->upload->data('file_name');
      }
      if (file_exists('./assets/' . $this->input->post('buktiLama'))) unlink('./assets/' . $this->input->post('buktiLama'));
    } else {
      $bukti  = $this->input->post('buktiLama');
    }
    $this->db->update('realisasi_biaya', [
      'nama_pengeluaran'  => $this->input->post('nama_pengeluaran'),
      'jumlah'            => $this->input->post('jumlah'),
      'bukti'             => $bukti,
      'keterangan'        => $this->input->post('keterangan')
    ], ['id_realisasi'  => $id_realisasi]);
    $this->session->flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil edit realisasi.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('pegawai/pegawai/detail_realisasi/' . $id_spd);
  }

  public function hapus_realisasi($id_spd, $id_realisasi)
  {
    $data = $this->db->get_where('realisasi_biaya', ['id_realisasi' => $id_realisasi])->row_array();
    if (file_exists('./assets/file_realisasi' . $data['bukti'])) unlink('./assets/file_realisasi' . $data['bukti']);
    $this->db->delete('realisasi_biaya', ['id_realisasi'  => $id_realisasi]);
    $this->session->flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil hapus realisasi.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('pegawai/pegawai/data_realisasibiaya/' . $id_spd);
  }

  public function cetak_realisasi($id_spd)
  {
    $this->db->join('spd', 'realisasi_biaya.id_spd = spd.id_spd');
    $this->db->join('pegawai', 'spd.id_pegawai = pegawai.id');
    $data['realisasi'] = $this->db->get_where('realisasi_biaya', ['realisasi_biaya.id_spd'  => $id_spd])->result_array();
    ob_start();
      $this->load->view('Pegawai/realisasi_biaya_pdf.php', $data);
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

    $tanggalBerangkat   = new DateTime($data['spd']['tanggalBerangkat']);
    $tanggalKembali     = new DateTime($data['spd']['tanggalKembali']);
    $data['lama_hari']  = $tanggalKembali->diff($tanggalBerangkat)->format("%a")+1;

    $data['transportasi'] = $this->db->get_where('transportasi', ['id_kabupaten'  => $data['spd']['kabupaten_tujuan']])->row_array();

    $sbm  = $this->db->get_where('sbm', [
      'provinsi'  => $data['spd']['provinsi_tujuan']
    ])->row_array();
    if ($data['spd']['kabupaten_berangkat'] == $data['spd']['kabupaten_tujuan']) {
      switch ($this->session->eselon) {
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
      switch ($this->session->eselon) {
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
    
    switch ($this->session->eselon) {
      case 'I':
        $data['uangHarian'] = $sbm['i'];
        break;
      case 'II':
        $data['uangHarian'] = $sbm['ii'];
        break;
      case 'III':
        $data['uangHarian'] = $sbm['iii'];
        break;
      case 'IV':
        $data['uangHarian'] = $sbm['iv'];
        break;
      
      default:
        # code...
        break;
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
  }
  public function upload()
  {
    $this->M_Realisasi->upload();
    redirect('pegawai/pegawai/data_realisasi');
  }

}

