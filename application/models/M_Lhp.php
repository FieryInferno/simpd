<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Lhp extends CI_Model {
  
  protected $table  = 'lhp';

  public function get_lhp($id_spd){
    $this->db->join('spd', 'lhp.id_spd = spd.id_spd');
    $this->db->join('pegawai', 'spd.id_pegawai = pegawai.id');
    $this->db->join('wilayah_kecamatan', 'spd.kecamatan_tujuan = wilayah_kecamatan.id');
    $this->db->select('spd.*, lhp.*, wilayah_kecamatan.nama as nama_kecamatan, pegawai.nama as nama_pegawai');
    return $this->db->get_where('lhp', ['spd.id_spd' => $id_spd])->result();
  }

  public function get_spd($id_spd){
    $this->db->select('*');
    $this->db->from('lhp');
    $this->db->where('id_spd', $id_spd);
    return $this->db->get()->result();
  }

  public function getlhp2($id_lhp)
  {
    $this->db->join('spd', 'lhp.id_spd  = spd.id_spd');
    return $this->db->get_where('lhp', [
      'id_lhp'  => $id_lhp
    ])->row_array();
  }

	public function getAll($id_spd)
	{
		$this->db->join('spd', $this->table . '.id_spd = spd.id_spd');
    return $this->db->get($this->table)->result_array();
	}
  
  public function Insertdata($tableName,$data)
  {
    $res = $this->db->insert($tableName,$data);
    return $res ;
  }

  public function edit($id_lhp)
  {
    if ($_FILES['bukti_kegiatan']['name'] == '') {
      $bukti_kegiatan = $this->input->post('bukti_kegiatan_lama');
    } else {
      if (file_exists('assets/' . $this->input->post('bukti_kegiatan_lama'))) {
        unlink('assets/' . $this->input->post('bukti_kegiatan_lama'));
      }
      $config['upload_path']    = './assets/';
      $config['allowed_types']  = 'png|jpg|jpeg';

      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('bukti_kegiatan')) {
        print_r($this->upload->display_errors());
        die();
      } else {
        $bukti_kegiatan = $this->upload->data('file_name');
      }
    }
    
    $this->db->update('lhp', [
      'kegiatan'        => $this->input->post('kegiatan'),
      'jam'             => $this->input->post('jam'),
      'bukti_kegiatan'  => $bukti_kegiatan,
      'permasalahan'    => $this->input->post('permasalahan'),
      'solusi'          => $this->input->post('solusi'),
      'keterangan'      => $this->input->post('keterangan')
    ], ['id_lhp'  => $id_lhp]);
  }

  public function hapus($id_lhp)
  {
    $data = $this->getlhp2($id_lhp);
    if (file_exists('assets/' . $data['bukti_kegiatan'])) {
      unlink('assets/' . $data['bukti_kegiatan']);
    }
    $this->db->delete('lhp', ['id_lhp'  => $id_lhp]);
  }
}
