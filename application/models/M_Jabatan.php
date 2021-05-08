<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jabatan extends CI_Model {
	
	


public function Getjabatan($where="")
	{
		$data = $this->db->query('select * from jabatan '.$where);
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



