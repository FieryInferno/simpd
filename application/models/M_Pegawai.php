<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pegawai extends CI_Model {
	protected $table  = 'pegawai';
	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	
  public function getById($id_pegawai)
  {
    return $this->db->get_where($this->table, [
      'id'  => $id_pegawai
    ])->row_array();
  }
	 public function getByP1($pengikut_1)
  {
    return $this->db->get_where($this->table, [
      'id'  => $pengikut_1
    ])->row_array();
  }
 public function getByP2($pengikut_2)
  {
    return $this->db->get_where($this->table, [
      'id'  => $pengikut_2
    ])->row_array();
  }
   public function getByP3($pengikut_3)
  {
    return $this->db->get_where($this->table, [
      'id'  => $pengikut_3
    ])->row_array();
  }
public function Getpegawai($where="")
	{
		$data = $this->db->query('select * from pegawai '.$where);
		return $data->result_array();
	}


		public function Insertdata($tableName,$data)
	{
		
		$res = $this->db->insert($tableName,$data);
		return $res ;
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

		public function getPPK()
  {
    return $this->db->get_where('pegawai', [
      'bagian'  => 'ppk'
    ])->row_array();
  }

  public function getBendahara()
  {
    return $this->db->get_where('pegawai', [
      'bagian'  => 'bendahara'
    ])->row_array();
  }

  public function getKepala()
  {
    return $this->db->get_where('pegawai', [
      'bagian'  => 'kepala'
    ])->row_array();
  }
}



