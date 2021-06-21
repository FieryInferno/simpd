<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RealisasiBiaya extends CI_Controller {
  
	public function index()
	{
    $data['data']     = $this->M_SPD->getbyIdPegawai();
		$data['content']  = 'Pegawai/realisasiBiaya';
		$this->load->view('Pegawai/temp_pegawai', $data);
	}

  public function detail($id_spd)
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
        'keterangan'        => $this->input->post('keterangan')
      ]);
      $this->session->flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah realisasi.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('pegawai/realisasi_biaya/detail/' . $id_spd);
    }
    $data = $this->M_SPD->getByIdSPD($id_spd);
    $this->db->join('spd', 'realisasi_biaya.id_spd = spd.id_spd');
    $data['detail']   = $this->db->get_where('realisasi_biaya', ['realisasi_biaya.id_spd' => $id_spd])->result();
		$data['content']  = 'Pegawai/detailRealisasiBiaya';
		$this->load->view('Pegawai/temp_pegawai', $data);
  }

  public function edit($id_spd, $id_realisasi_biaya)
  {
    if ($_FILES['bukti']['name'] !== '') {
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
      if (file_exists('./assets/' . $this->input->post('buktiLama'))) unlink('./assets/' . $this->input->post('buktiLama'));
    } else {
      $bukti  = $this->input->post('buktiLama');
    }
    $this->db->update('realisasi_biaya', [
      'nama_pengeluaran'  => $this->input->post('nama_pengeluaran'),
      'jumlah'            => $this->input->post('jumlah'),
      'bukti'             => $bukti,
      'keterangan'        => $this->input->post('keterangan')
    ], ['id_realisasi_biaya'  => $id_realisasi_biaya]);
    $this->session->flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil edit realisasi.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('pegawai/realisasi_biaya/detail/' . $id_spd);
  }

  public function hapus($id_spd, $id_realisasi_biaya)
  {
    $data = $this->db->get_where('realisasi_biaya', ['id_realisasi_biaya' => $id_realisasi_biaya])->row_array();
    if (file_exists('./assets/' . $data['bukti'])) unlink('./assets/' . $data['bukti']);
    $this->db->delete('realisasi_biaya', ['id_realisasi_biaya'  => $id_realisasi_biaya]);
    $this->session->flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil hapus realisasi.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('pegawai/realisasi_biaya/detail/' . $id_spd);
  }
}
