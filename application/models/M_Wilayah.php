<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Wilayah extends CI_Model {

	public function getProvinsi($id_provinsi = null)
	{
    if ($id_provinsi) {
      return $this->db->get_where('wilayah_provinsi', [
        'id'  => $id_provinsi
      ])->row_array();
    } else {
      return $this->db->get('wilayah_provinsi')->result_array();
    }
	}

	public function getKabupaten($id_kabupaten = null)
	{
    if ($id_kabupaten) {
      return $this->db->get_where('wilayah_kabupaten', [
        'id' => $id_kabupaten
      ])->row_array();
    } else {
      return $this->db->get_where('wilayah_kabupaten', [
        'provinsi_id' => $this->input->post('id')
      ])->result_array();
    }
	}

	public function getKecamatan($id_kecamatan = null)
	{
    if ($id_kecamatan) {
      return $this->db->get_where('wilayah_kecamatan', [
        'id' => $id_kecamatan
      ])->row_array();
    } else {
      return $this->db->get_where('wilayah_kecamatan', [
        'kabupaten_id' => $this->input->post('id')
      ])->result_array();
    }
	}
}