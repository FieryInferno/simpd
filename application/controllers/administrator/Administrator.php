<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['content']		= 'administrator/dashboard_admin';
		$this->load->view('administrator/temp_admin',$data);

	}

	public function data_pegawai ()
	{
		$data['data'] = $this->db->get('pegawai');
		$data['content']		= 'administrator/datapegawai_admin';
		$this->load->view('administrator/temp_admin',$data);
	}

	public function data_jabatan ()
	{
		$data['data'] = $this->db->get('jabatan');
		$data['content']		= 'administrator/datajabatan_admin';
		$this->load->view('administrator/temp_admin',$data);
	}

	public function data_golongan ()
	{
		$data['data'] = $this->db->get('golongan');
		$data['content']		= 'administrator/datagolongan_admin';
		$this->load->view('administrator/temp_admin',$data);
	}

	public function input_pegawai ()
	{
		$data['content']		= 'administrator/inputpegawai_admin';
		$this->load->view('administrator/temp_admin',$data);	
	}

	public function input_jabatan ()
	{
		$data['content']		= 'administrator/inputjabatan_admin';
		$this->load->view('administrator/temp_admin',$data);	
	}

	public function input_golongan ()
	{
		$data['content']		= 'administrator/inputgolongan_admin';
		$this->load->view('administrator/temp_admin',$data);	
	}

	

	public function doinputpegawai(){
		$nip = $_POST ['nip'];
		$nama = $_POST ['nama'];
		$jenis_kelamin = $_POST ['jenis_kelamin'];
		$alamat = $_POST ['alamat'];
		$tempatlahir = $_POST ['tempatlahir'];
		$tanggallahir = $_POST ['tanggallahir'];
		$jabatan = $_POST ['jabatan'];
		$namagolongan = $_POST ['namagolongan'];
		$agama = $_POST ['agama'];
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$akses = $_POST ['akses'];
		
               $foto = $_FILES['foto'];
                

                IF ($foto=''){}ELSE{
                    $config['upload_path'] = './assets/images';
                    $config['allowed_types'] = 'jpg|png|gif';

                    $this->load->library('upload', $config);
                    if(!$this->upload->do_upload('foto')){
                        echo "upload gagal"; die();
                    }else{
                        $foto=$this->upload->data('file_name');
                    }


                }   


			$data = array('nip'=> $nip, 'nama' => $nama, 'jenis_kelamin' => $jenis_kelamin, 'alamat' => $alamat, 'tempatlahir' => $tempatlahir, 'tanggallahir ' => $tanggallahir, 'jabatan' => $jabatan, 'namagolongan' => $namagolongan, 'agama' => $agama, 'username' => $username, 'password' => $password, 'akses' => $akses, 'foto' => $foto );
		$res = $this->M_Pegawai->Insertdata('pegawai',$data);
		if ($res >= 1){
	echo "<script>
	alert ('Tambah data berhasil');
	window.location.href='data_pegawai'
	</script>";
	}else {
		echo "<script>
	alert ('Tambah Data Gagal');
	window.location.href='data_pegawai'
	</script>";
	} 
	}

	public function doinputjabatan(){
		$id = $_POST ['id'];
		$jabatan = $_POST ['jabatan'];
		
			$data = array('id'=> $id, 'jabatan' => $jabatan);
		$res = $this->M_Jabatan->Insertdata('jabatan',$data);
		if ($res >= 1){
	echo "<script>
	alert ('Tambah data berhasil');
	window.location.href='data_jabatan'
	</script>";
	}else {
		echo "<script>
	alert ('Tambah Data Gagal');
	window.location.href='data_jabatan'
	</script>";
	} 
	}

	public function doinputgolongan(){
		$id = $_POST ['id'];
		$golongan = $_POST ['golongan'];
		$pangkat = $_POST ['pangkat'];
		
			$data = array('id'=> $id, 'golongan' => $golongan, 'pangkat' => $pangkat);
		$res = $this->M_Golongan->Insertdata('golongan',$data);
		if ($res >= 1){
	echo "<script>
	alert ('Tambah data berhasil');
	window.location.href='data_golongan'
	</script>";
	}else {
		echo "<script>
	alert ('Tambah Data Gagal');
	window.location.href='data_golongan'
	</script>";
	} 
	}	

	public function edit_pegawai ($id){
	$pegawai= $this->M_Pegawai->Getpegawai("where id ='$id'");
	
	$data = array(
		'id'=> $pegawai[0] ['id'],
		'nip'=> $pegawai[0] ['nip'], 
		'nama' => $pegawai[0] ['nama'], 
		'jenis_kelamin' => $pegawai[0] ['jenis_kelamin'], 
		'alamat' => $pegawai[0] ['alamat'], 
		'tempatlahir' => $pegawai[0] ['tempatlahir'], 
		'tanggallahir ' => $pegawai[0] ['tanggallahir'], 
		'jabatan' => $pegawai[0] ['jabatan'], 
		'namagolongan' => $pegawai[0]['namagolongan'],
		'agama' => $pegawai[0]['agama'], 
		'username' => $pegawai[0]  ['username'], 
		'password' => $pegawai[0] ['password'],
		'akses'=> $pegawai[0] ['akses'] ,
		'foto' => $pegawai[0] ['foto'] );
	$data['content'] = 'Administrator/editpegawai_admin';
		$this->load->view('Administrator/temp_admin', $data);
}

	public function edit_jabatan ($id){
	$jabatan= $this->M_Jabatan->Getjabatan("where id ='$id'");
	
	$data = array(
		'id'=> $jabatan[0] ['id'],
		'jabatan'=> $jabatan[0] ['jabatan'] ); 
	$data['content'] = 'Administrator/editjabatan_admin';
		$this->load->view('Administrator/temp_admin', $data);
}

	public function edit_golongan ($id){
	$golongan= $this->M_Golongan->Getgolongan("where id ='$id'");
	
	$data = array(
		'id'=> $golongan[0] ['id'],
		'golongan'=> $golongan[0] ['golongan'],
		'pangkat'=> $golongan[0] ['pangkat'] ); 
	$data['content'] = 'Administrator/editgolongan_admin';
		$this->load->view('Administrator/temp_admin', $data);
}

public function do_editpegawai(){
		$id = $_POST ['id'];
		$nip = $_POST ['nip'];
		$nama = $_POST ['nama'];
		$jenis_kelamin = $_POST ['jenis_kelamin'];
		$alamat = $_POST ['alamat'];
		$tempatlahir = $_POST ['tempatlahir'];
		$tanggallahir = $_POST ['tanggallahir'];
		$jabatan = $_POST ['jabatan'];
		$namagolongan = $_POST ['namagolongan'];
		$agama = $_POST ['agama'];
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$akses = $_POST ['akses'];
	
               $foto = $_FILES['foto'];

                IF ($foto=''){}ELSE{
                    $config['upload_path'] = './assets/images';
                    $config['allowed_types'] = 'jpg|png|gif';

                    $this->load->library('upload', $config);
                    if(!$this->upload->do_upload('foto')){
                        echo "upload gagal"; die();
                    }else{
                        $foto=$this->upload->data('file_name');
                    }
                }   
			$data = array('id'=> $id, 'nip'=> $nip, 'nama' => $nama, 'jenis_kelamin' => $jenis_kelamin, 'alamat' => $alamat, 'tempatlahir' => $tempatlahir, 'tanggallahir ' => $tanggallahir, 'jabatan' => $jabatan, 'namagolongan' => $namagolongan, 'agama' => $agama, 'username' => $username, 'password' => $password, 'akses' => $akses, 'foto' => $foto );
		
		$where= array('id' => $id );
		$res= $this->M_Pegawai->Updatedata('pegawai',$data,$where);
		if ($res >= 1){
	echo "<script>
	alert ('Edit data berhasil');
	window.location.href='data_pegawai'
	</script>";
	}else {
		echo "<script>
	alert ('Edit Data Gagal');
	window.location.href='data_pegawai'
	</script>";

}
}

public function do_editjabatan(){
		$id = $_POST ['id'];
		$jabatan = $_POST ['jabatan'];
		$data = array('id'=> $id, 'jabatan'=> $jabatan);
		$where= array('id' => $id );
		$res= $this->M_Jabatan->Updatedata('jabatan',$data,$where);
		if ($res >= 1){
	echo "<script>
	alert ('Edit data berhasil');
	window.location.href='data_jabatan'
	</script>";
	}else {
		echo "<script>
	alert ('Edit Data Gagal');
	window.location.href='data_jabatan'
	</script>";

}
}

public function do_editgolongan(){
		$id = $_POST ['id'];
		$golongan = $_POST ['golongan'];
		$pangkat = $_POST ['pangkat'];
		$data = array('id'=> $id, 'golongan'=> $golongan, 'pangkat'=> $pangkat,);
		$where= array('id' => $id );
		$res= $this->M_Golongan->Updatedata('golongan',$data,$where);
		if ($res >= 1){
	echo "<script>
	alert ('Edit data berhasil');
	window.location.href='data_golongan'
	</script>";
	}else {
		echo "<script>
	alert ('Edit Data Gagal');
	window.location.href='data_golongan'
	</script>";

}
}



public function hapus_pegawai($id){
$where  = array('id' => $id );
$res= $this->M_Pegawai->Deletedata('pegawai', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan','Delete data'.$id.'berhasil');
	redirect ('administrator/Administrator/data_pegawai');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}

public function hapus_jabatan($id){
$where  = array('id' => $id );
$res= $this->M_Jabatan->Deletedata('jabatan', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan','Delete data'.$id.'berhasil');
	redirect ('administrator/Administrator/data_jabatan');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}

public function hapus_golongan($id){
$where  = array('id' => $id );
$res= $this->M_Golongan->Deletedata('golongan', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan','Delete data'.$id.'berhasil');
	redirect ('administrator/Administrator/data_golongan');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}

public function profil ()
	{
		
		$data['content']		= 'administrator/v_profil';
		$this->load->view('administrator/temp_admin',$data);
	}

	/** public function logout()
	{
		$username = $_SESSION['username'];
		$user = $this->db-get_where('user',array('username'=>$username)) ->row_array();
		echo "<script>
		alert ('Anda telah logout');
		</script>"
		header('location:'.base_url().'index.php/C_awal/index');

	} */

}