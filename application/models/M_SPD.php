<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SPD extends CI_Model {
  
  protected $table  = 'spd';

  public function getAll()
  {
    return $this->db->get($this->table);
  }

  function idspd(){
    $q      = $this->db->query("select MAX(id_spd) as id_spd from spd");
    $hasil  = $q->row();
    return $hasil->id_spd;
  }

  public function getbyIdPegawai()
  {
    $this->db->where('id_pegawai', $this->session->id);
    $this->db->or_where('pengikut_1', $this->session->id);
    $this->db->or_where('pengikut_2', $this->session->id);
    $this->db->or_where('pengikut_3', $this->session->id);
    return $this->db->get('spd')->result();
  }

  public function getByIdSPD($id_spd)
  {
    return $this->db->get_where($this->table, [
      'id_spd'  => $id_spd
    ])->row_array();
  }
  
 public function insert($lama_hari)
  {
    $this->db->insert($this->table, [
      'nomor_spd'           => $this->input->post('nomor_spd'),
      'id_pegawai'          => $this->input->post('id_pegawai'),
      'tingkat_biaya'       => $this->input->post('tingkat_biaya'),
      'tujuan'              => $this->input->post('tujuan'),
      'kendaraan'           => $this->input->post('kendaraan'),
      'provinsi_berangkat'  => $this->input->post('tempat_berangkat_provinsi'),
      'kabupaten_berangkat' => $this->input->post('tempat_berangkat_kabupaten'),
      'kecamatan_berangkat' => $this->input->post('tempat_berangkat_kecamatan'),
      'provinsi_tujuan'     => $this->input->post('tempat_tujuan_provinsi'),
      'kabupaten_tujuan'    => $this->input->post('tempat_tujuan_kabupaten'),
      'kecamatan_tujuan'    => $this->input->post('tempat_tujuan_kecamatan'),
      'lama_hari'           => $lama_hari,
      'tanggalBerangkat'    => $this->input->post('tanggalBerangkat'),
      'tanggalKembali'      => $this->input->post('tanggalKembali'),
      'pengikut_1'          => $this->input->post('pengikut_1'),
      'pengikut_2'          => $this->input->post('pengikut_2'),
      'pengikut_3'          => $this->input->post('pengikut_3'),
      'id_kegiatan'         => $this->input->post('id_kegiatan'),
      'id_komponen'         => $this->input->post('id_komponen'),
      'id_anggaran'         => $this->input->post('id_anggaran'),
      'keterangan'          => $this->input->post('keterangan'),
      'bagian'              => $this->input->post('bagian')
    ]);
  }
  
  public function update($lama_hari, $id_spd)
  {
    $this->db->update($this->table, [
      'nomor_spd'           => $this->input->post('nomor_spd'),
      'id_pegawai'          => $this->input->post('id_pegawai'),
      'tingkat_biaya'       => $this->input->post('tingkat_biaya'),
      'tujuan'              => $this->input->post('tujuan'),
      'kendaraan'           => $this->input->post('kendaraan'),
      'provinsi_berangkat'  => $this->input->post('tempat_berangkat_provinsi'),
      'kabupaten_berangkat' => $this->input->post('tempat_berangkat_kabupaten'),
      'kecamatan_berangkat' => $this->input->post('tempat_berangkat_kecamatan'),
      'provinsi_tujuan'     => $this->input->post('tempat_tujuan_provinsi'),
      'kabupaten_tujuan'    => $this->input->post('tempat_tujuan_kabupaten'),
      'kecamatan_tujuan'    => $this->input->post('tempat_tujuan_kecamatan'),
      'lama_hari'           => $lama_hari,
      'tanggalBerangkat'    => $this->input->post('tanggalBerangkat'),
      'tanggalKembali'      => $this->input->post('tanggalKembali'),
      'pengikut_1'          => $this->input->post('pengikut_1'),
      'pengikut_2'          => $this->input->post('pengikut_2'),
      'pengikut_3'          => $this->input->post('pengikut_3'),
      'id_kegiatan'         => $this->input->post('id_kegiatan'),
      'id_komponen'         => $this->input->post('id_komponen'),
      'id_anggaran'         => $this->input->post('id_anggaran'),
      'keterangan'          => $this->input->post('keterangan')
    ], ['id_spd'  => $id_spd]);
  }

  public function upload()
  {
    $config['upload_path']          = './assets/file_spd_fix';
    $config['allowed_types']        = 'pdf';
    $config['max_size']             = 100000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('filettd')) {
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
        'file_ttd'  => $file
      ]);
    }
  }

  public function hapus($id_spd)
  {
    $data = $this->getByIdSPD($id_spd);
    if (file_exists('assets/file_spd' . $data['file'])) unlink('assets/file_spd' . $data['file']);
    if (file_exists('assets/file_spd_fix' . $data['file_ttd'])) unlink('assets/file_spd_fix' . $data['file_ttd']);
    $lhp  = $this->db->get_where('lhp', ['id_spd' => $id_spd])->result_array();
    foreach ($lhp as $key) {
      if (file_exists('assets/file_lhp' . $lhp['bukti_kegiatan'])) unlink('assets/file_lhp' . $lhp['bukti_kegiatan']);
    }
    $this->db->delete('spd', ['id_spd'  => $id_spd]);
    $this->db->delete('lhp', ['id_spd'  => $id_spd]);
  }
}
