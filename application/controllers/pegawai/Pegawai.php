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

  public function lihatLhp ($id_spd){
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
    
    $config['upload_path']    = './assets/';
    $config['allowed_types']  = 'pdf';

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
      'bukti_kegiatan'  => $bukti_kegiatan
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
    redirect('pegawai/lhp/lihat/' . $id_spd);
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
      redirect('pegawai/lhp/lihat/' . $this->input->post('id_spd'));
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
    redirect('pegawai/lhp/lihat/' . $id_spd);
  }

  public function cetakLhp($id_spd)
  {
    $data['lhp'] = $this->M_Lhp->get_lhp($id_spd);
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