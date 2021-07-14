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

public function Insertdata($tableName,$data)
  {
    
    $res = $this->db->insert($tableName,$data);
    return $res ;
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
  public function Getallprovinsi($where="")
  {
    $data = $this->db->query('select * from wilayah_provinsi '.$where);
    return $data->result_array();
  }
   public function Getallkota($where="")
  {
    $data = $this->db->query('select * from wilayah_kabupaten '.$where);
return $data->result_array();

}   
 public function Getallkecamatan($where="")
  {
    $data = $this->db->query('select * from wilayah_kecamatan '.$where);
return $data->result_array();
    
}  
 public function Updatedata($tableName,$data,$where)
  {
    $res = $this->db->update($tableName,$data, $where);
    return $res ;

    }
    public function Deletedata($tableName,$where)
  {
    $res = $this->db->delete($tableName,$where);
    return $res ;

    }
}