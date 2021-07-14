<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Komponen extends CI_Model {
	protected $table  = 'komponen';
	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	
  public function getbykomponen($id_komponen)
  {
    return $this->db->get_where($this->table, [
      'id_komponen'  => $id_komponen
    ])->row_array();
  }
	public function Getkomponen($where="")
	{
		$data = $this->db->query('select * from komponen '.$where);
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