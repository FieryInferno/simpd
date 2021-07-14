<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kegiatan extends CI_Model {
	protected $table  = 'kegiatan';
	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	
  public function getbykegiatan($id_kegiatan)
  {
    return $this->db->get_where($this->table, [
      'id_kegiatan'  => $id_kegiatan
    ])->row_array();
  }
  public function Getkegiatan($where="")
	{
		$data = $this->db->query('select * from kegiatan '.$where);
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
	}