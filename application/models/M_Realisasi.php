<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Realisasi extends CI_Model {
  
  protected $table  = 'realisasi_biaya';

  public function get_realisasi($id_spd){
    $this->db->join('spd', 'realisasi_biaya.id_spd = spd.id_spd');
    $this->db->join('pegawai', 'spd.id_pegawai = pegawai.id');
    $this->db->join('wilayah_kecamatan', 'spd.kecamatan_tujuan = wilayah_kecamatan.id');
    $this->db->select('spd.*, realisasi_biaya.*, wilayah_kecamatan.nama as nama_kecamatan, pegawai.nama as nama_pegawai');
    return $this->db->get_where('realisasi_biaya', ['spd.id_spd' => $id_spd])->result();
  }

  public function get_spd($id_spd){
    $this->db->select('*');
    $this->db->from('lhp');
    $this->db->where('id_spd', $id_spd);
    return $this->db->get()->result();
  }

public function upload()
  {
    $config['upload_path']          = './assets/file_pengembalian';
    $config['allowed_types']        = 'pdf';
    $config['max_size']             = 100000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('file_pengembalian')) {
      $this->session->flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Gagal!</strong> gagal mengupload file surat.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    } else {
      $file = $this->upload->data('file_name');
      $this->db->where('id_spd', $this->input->post('id_spd'));
      $this->db->update('spd', [
        'file_pengembalian'  => $file
      ]);
    }
  }
  }