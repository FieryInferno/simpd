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
	public function data_kegiatan ()
	{
		$data['data'] = $this->db->get('kegiatan');
		$data['content']		= 'administrator/datakegiatan_admin';
		$this->load->view('administrator/temp_admin',$data);
	}
	public function data_komponen()
	{
		$data['data'] = $this->db->get('komponen');
		$data['content']		= 'administrator/datakomponen_admin';
		$this->load->view('administrator/temp_admin',$data);
	}
	public function data_anggaran ()
	{
		$data['data'] = $this->db->get('anggaran');
		$data['content']		= 'administrator/dataanggaran_admin';
		$this->load->view('administrator/temp_admin',$data);
	}
	public function data_provinsi ()
	{
		$data['data'] = $this->db->get('wilayah_provinsi');
		$data['content']		= 'administrator/dataprovinsi_admin';
		$this->load->view('administrator/temp_admin',$data);
	}
	public function data_kota ()
	{
		$data['data'] = $this->db->get('wilayah_kabupaten');
		$data['content']		= 'administrator/datakota_admin';
		$this->load->view('administrator/temp_admin',$data);
	}
	public function data_kecamatan ()
	{
		$data['data'] = $this->db->get('wilayah_kecamatan');
		$data['content']		= 'administrator/datakecamatan_admin';
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

    public function input_kegiatan ()
	{
		$data['content']		= 'administrator/inputkegiatan_admin';
		$this->load->view('administrator/temp_admin',$data);	
	}
	public function input_komponen ()
	{
		$data['content']		= 'administrator/inputkomponen_admin';
		$this->load->view('administrator/temp_admin',$data);	
	}
	public function input_anggaran()
	{
		$data['content']		= 'administrator/inputanggaran_admin';
		$this->load->view('administrator/temp_admin',$data);	
	}
	public function input_provinsi()
	{
		$data['content']		= 'administrator/inputprovinsi_admin';
		$this->load->view('administrator/temp_admin',$data);	
	}
	public function input_kota()
	{
		$data['content']		= 'administrator/inputkota_admin';
		$this->load->view('administrator/temp_admin',$data);	
	}
	public function input_kecamatan()
	{
		$data['content']		= 'administrator/inputkecamatan_admin';
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
		$eselon = $_POST ['eselon'];
		$agama = $_POST ['agama'];
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$akses = $_POST ['akses'];
		$bagian = $_POST ['bagian'];
		
               $foto = $_FILES['foto'];                
                IF ($foto=''){}ELSE{
                    $config['upload_path'] = './assets/images';
                    $config['allowed_types'] = 'jpg|png|gif';

                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('foto')){
                        echo "upload gagal"; die();
                    }else{
                        $foto=$this->upload->data('file_name');
                    }


                }   


			$data = array('nip'=> $nip, 'nama' => $nama, 'jenis_kelamin' => $jenis_kelamin, 'alamat' => $alamat, 'tempatlahir' => $tempatlahir, 'tanggallahir ' => $tanggallahir, 'jabatan' => $jabatan, 'namagolongan' => $namagolongan, 'eselon' => $eselon,'agama' => $agama, 'username' => $username, 'password' => $password, 'akses' => $akses, 'foto' => $foto,'bagian' => $bagian );
		$res = $this->M_Pegawai->Insertdata('pegawai',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_pegawai');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_pegawai');
	} 
	}

	public function doinputjabatan(){
	
		$jabatan = $_POST ['jabatan'];
		
			$data = array( 'jabatan' => $jabatan);
		$res = $this->M_Jabatan->Insertdata('jabatan',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_jabatan');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_jabatan');
	} 
	}

	public function doinputgolongan(){
		
		$golongan = $_POST ['golongan'];
		$pangkat = $_POST ['pangkat'];
		
			$data = array('golongan' => $golongan, 'pangkat' => $pangkat);
		$res = $this->M_Golongan->Insertdata('golongan',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_golongan');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_golongan');
	} 
	}	
	public function doinputkegiatan(){
		
		$nama_kegiatan = $_POST ['nama_kegiatan'];
				$kode_kegiatan = $_POST ['kode_kegiatan'];
		
		
			$data = array('nama_kegiatan' => $nama_kegiatan, 'kode_kegiatan' => $kode_kegiatan);
		$res = $this->M_Kegiatan->Insertdata('kegiatan',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_kegiatan');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_kegiatan');
}
}
	public function doinputkomponen(){
	
		$kode_komponen = $_POST ['kode_komponen'];
		$nama_komponen = $_POST ['nama_komponen'];
		
			$data = array( 'kode_komponen' => $kode_komponen, 'nama_komponen' => $nama_komponen);
		$res = $this->M_Komponen->Insertdata('komponen',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_komponen');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_komponen');
	} 
	}

	public function doinputanggaran(){
	$nomor_anggaran = $_POST ['nomor_anggaran'];
		$nama_anggaran = $_POST ['nama_anggaran'];
		
		
			$data = array( 'nomor_anggaran' => $nomor_anggaran, 'nama_anggaran' => $nama_anggaran);
		$res = $this->M_Anggaran->Insertdata('anggaran',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_anggaran');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_anggaran');
	} 
	}

	public function doinputprovinsi(){
	$id = $_POST ['id'];
		$nama = $_POST ['nama'];
		
		
			$data = array( 'id' => $id, 'nama' => $nama);
		$res = $this->M_Wilayah->Insertdata('wilayah_provinsi',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_provinsi');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_provinsi');
	} 
	}
	public function doinputkota(){
	$id = $_POST ['id'];
	$provinsi_id = $_POST ['provinsi_id'];
	$nama = $_POST ['nama'];
		
		
			$data = array( 'id' => $id, 'provinsi_id' => $provinsi_id, 'nama' => $nama);
		$res = $this->M_Wilayah->Insertdata('wilayah_kabupaten',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_kota');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_kota');
	} 
	}

	public function doinputkecamatan(){
	$id = $_POST ['id'];
	$kabupaten_id = $_POST ['kabupaten_id'];
	$nama = $_POST ['nama'];
		
		
			$data = array( 'id' => $id, 'kabupaten_id' => $kabupaten_id, 'nama' => $nama);
		$res = $this->M_Wilayah->Insertdata('wilayah_kecamatan',$data);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_kecamatan');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal tambah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_kecamatan');
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
		'eselon' => $pegawai[0]['eselon'], 
		'agama' => $pegawai[0]['agama'], 
		'username' => $pegawai[0]  ['username'], 
		'password' => $pegawai[0] ['password'],
		'akses'=> $pegawai[0] ['akses'] ,
		'foto' => $pegawai[0] ['foto'],
		'bagian' => $pegawai[0]['bagian'],  );
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
public function edit_kegiatan ($id_kegiatan){
	$kegiatan= $this->M_Kegiatan->Getkegiatan("where id_kegiatan ='$id_kegiatan'");
	
	$data = array(
		'id_kegiatan'=> $kegiatan[0] ['id_kegiatan'],
		'nama_kegiatan'=> $kegiatan[0] ['nama_kegiatan'],
		'kode_kegiatan'=> $kegiatan[0] ['kode_kegiatan']);
		
	$data['content'] = 'Administrator/editkegiatan_admin';
		$this->load->view('Administrator/temp_admin', $data);
}
public function edit_komponen ($id_komponen){
	$komponen= $this->M_Komponen->Getkomponen("where id_komponen ='$id_komponen'");
	
	$data = array(
		'id_komponen'=> $komponen[0] ['id_komponen'],
		'kode_komponen'=> $komponen[0] ['kode_komponen'],
		'nama_komponen'=> $komponen[0] ['nama_komponen']);
		
	$data['content'] = 'Administrator/editkomponen_admin';
		$this->load->view('Administrator/temp_admin', $data);
}
public function edit_anggaran ($id_anggaran){
	$anggaran= $this->M_Anggaran->Getanggaran("where id_anggaran ='$id_anggaran'");
	
	$data = array(
		'id_anggaran'=> $anggaran[0] ['id_anggaran'],
		'nama_anggaran'=> $anggaran[0] ['nama_anggaran'],
		'nomor_anggaran'=> $anggaran[0] ['nomor_anggaran'] ); 
	$data['content'] = 'Administrator/editanggaran_admin';
		$this->load->view('Administrator/temp_admin', $data);
}
public function edit_provinsi ($id){
	$wilayah_provinsi= $this->M_Wilayah->Getallprovinsi("where id ='$id'");
	
	$data = array(
		'id'=> $wilayah_provinsi[0] ['id'],
		'nama'=> $wilayah_provinsi[0] ['nama'],
		);
	$data['content'] = 'Administrator/editprovinsi_admin';
		$this->load->view('Administrator/temp_admin', $data);
}
public function edit_kota ($id){
	$wilayah_kabupaten= $this->M_Wilayah->Getallkota("where id ='$id'");
	
	$data = array(
		'id'=> $wilayah_kabupaten[0] ['id'],
		'provinsi_id'=> $wilayah_kabupaten[0] ['provinsi_id'],
		'nama'=> $wilayah_kabupaten[0] ['nama'] ); 
	$data['content'] = 'Administrator/editkota_admin';
		$this->load->view('Administrator/temp_admin', $data);
}
public function edit_kecamatan ($id){
	$wilayah_kecamatan= $this->M_Wilayah->Getallkecamatan("where id ='$id'");
	
	$data = array(
		'id'=> $wilayah_kecamatan[0] ['id'],
		'kabupaten_id'=> $wilayah_kecamatan[0] ['kabupaten_id'],
		'nama'=> $wilayah_kecamatan[0] ['nama'] ); 
	$data['content'] = 'Administrator/editkecamatan_admin';
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
		$eselon = $_POST ['eselon'];
		$agama = $_POST ['agama'];
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$akses = $_POST ['akses'];
		$bagian = $_POST ['bagian'];
	
               $foto = $_FILES['foto'];

                IF ($foto=''){}ELSE{
                    $config['upload_path'] = './assets/images';
                    $config['allowed_types'] = 'jpg|png|gif';

                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('foto')){
                        echo "upload gagal"; die();
                    }else{
                        $foto=$this->upload->data('file_name');
                    }


                }   
			$data = array('nip'=> $nip, 'nama' => $nama, 'jenis_kelamin' => $jenis_kelamin, 'alamat' => $alamat, 'tempatlahir' => $tempatlahir, 'tanggallahir ' => $tanggallahir, 'jabatan' => $jabatan, 'namagolongan' => $namagolongan, 'eselon' => $eselon,'agama' => $agama, 'username' => $username, 'password' => $password, 'akses' => $akses, 'foto' => $foto,'bagian' => $bagian );
		
		$where= array('id' => $id );
		$res= $this->M_Pegawai->Updatedata('pegawai',$data,$where);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_pegawai');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_pegawai');
}
}

public function do_editjabatan(){
		$id = $_POST ['id'];
		$jabatan = $_POST ['jabatan'];
		$data = array('id'=> $id, 'jabatan'=> $jabatan);
		$where= array('id' => $id );
		$res= $this->M_Jabatan->Updatedata('jabatan',$data,$where);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_jabatan');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_jabatan');

}
}

public function do_editkegiatan(){
		$id_kegiatan = $_POST ['id_kegiatan'];
		$nama_kegiatan = $_POST ['nama_kegiatan'];
		$data = array('id_kegiatan'=> $id_kegiatan, 'nama_kegiatan'=> $nama_kegiatan);
		$where= array('id_kegiatan' => $id_kegiatan );
		$res= $this->M_Kegiatan->Updatedata('kegiatan',$data,$where);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_kegiatanak');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_kegiatan');
}
}
public function do_editkomponen(){
		$id_komponen = $_POST ['id_komponen'];
		$nama_komponen = $_POST ['nama_komponen'];
		$data = array('id_komponen'=> $id_komponen, 'nama_komponen'=> $nama_komponen);
		$where= array('id_komponen' => $id_komponen );
		$res= $this->M_Komponen->Updatedata('komponen',$data,$where);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_komponen');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_komponen');

}
}
public function do_editanggaran(){
		$id_anggaran = $_POST ['id_anggaran'];
		$nomor_anggaran = $_POST ['nomor_anggaran'];
		$nama_anggaran = $_POST ['nama_anggaran'];
		$data = array('id_anggaran'=> $id_anggaran, 'nomor_anggaran'=> $nomor_anggaran, 'nama_anggaran'=> $nama_anggaran);
		$where= array('id_anggaran' => $id_anggaran );
		$res= $this->M_Anggaran->Updatedata('anggaran',$data,$where);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_anggaran');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_anggaran');

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
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_golongan');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_golongan');

}
}

public function do_editprovinsi(){
		$id = $_POST ['id'];
		$nama = $_POST ['nama'];
		$data = array('id'=> $id, 'nama'=> $nama);
		$where= array('id' => $id );
		$res= $this->M_Wilayah->Updatedata('wilayah_provinsi',$data,$where);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_provinsi');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_provinsi');
}
}
public function do_editkota(){
		$id = $_POST ['id'];
		$provinsi_id = $_POST ['provinsi_id'];
		$nama = $_POST ['nama'];
		$data = array('id'=> $id, 'provinsi_id'=> $provinsi_id, 'nama'=> $nama);
		$where= array('id' => $id );
		$res= $this->M_Wilayah->Updatedata('wilayah_kabupaten',$data,$where);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_kota');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_kota');
}
}
public function do_editkecamatan(){
		$id = $_POST ['id'];
		$kabupaten_id = $_POST ['kabupaten_id'];
		$nama = $_POST ['nama'];
		$data = array('id'=> $id, 'kabupaten_id'=> $kabupaten_id, 'nama'=> $nama);
		$where= array('id' => $id );
		$res= $this->M_Wilayah->Updatedata('wilayah_kecamatan',$data,$where);
		if ($res >= 1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect('administrator/administrator/data_kecamatan');
    }else {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Gagal!</strong> Gagal ubah data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
    redirect('administrator/administrator/data_kecamatan');
}
}
public function hapus_pegawai($id){
$where  = array('id' => $id );
$res= $this->M_Pegawai->Deletedata('pegawai', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
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
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
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
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect ('administrator/Administrator/data_golongan');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}
public function hapus_kegiatan($id_kegiatan){
$where  = array('id_kegiatan' => $id_kegiatan );
$res= $this->M_Kegiatan->Deletedata('kegiatan', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect ('administrator/Administrator/data_kegiatan');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}
public function hapus_anggaran($id_anggaran){
$where  = array('id_anggaran' => $id_anggaran );
$res= $this->M_Anggaran->Deletedata('anggaran', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect ('administrator/Administrator/data_anggaran');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}
public function hapus_komponen($id_komponen){
$where  = array('id_komponen' => $id_komponen );
$res= $this->M_Komponen->Deletedata('komponen', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect ('administrator/Administrator/data_komponen');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}
public function hapus_provinsi($id){
$where  = array('id' => $id );
$res= $this->M_Wilayah->Deletedata('wilayah_provinsi', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect ('administrator/Administrator/data_provinsi');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}

public function hapus_kota($id){
$where  = array('id' => $id );
$res= $this->M_Wilayah->Deletedata('wilayah_kabupaten', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect ('administrator/Administrator/data_kota');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}
public function hapus_kecamatan($id){
$where  = array('id' => $id );
$res= $this->M_Wilayah->Deletedata('wilayah_kecamatan', $where);

if ($res >=1){
	$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Sukses!</strong> Berhasil hapus data.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
	redirect ('administrator/Administrator/data_kecamatan');
}
else{
	echo "<h3> Hapus Data  Gagal </h3>";
}
}


}