<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Golongan extends CI_Model {
	
public function Getgolongan($where="")
	{
		$data = $this->db->query('select * from golongan '.$where);
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



