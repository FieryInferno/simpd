<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class c_login extends CI_Controller {


public function index()
	{
    // $data = [];
    // ob_start();
    //   $this->load->view('tata_usaha/spd/pdf', $data);
    //   $html = ob_get_contents();
    // ob_end_clean();
    // ob_clean();
    // $filename   = uniqid();
    // $options  	= new Options();
    // $options->set('isRemoteEnabled', TRUE);
    // $dompdf = new Dompdf($options);
    // $dompdf->loadHtml($html);
    // $dompdf->setPaper('legal', 'portrait');
    // $dompdf->render();
    // $output = $dompdf->output();
    // $dompdf->stream($filename, array("Attachment" => 0) );
		$this->load->view('v_login');
	}

	public function cek(){
$username = $this->input->post('username');
$password= $this->input->post('password');
$cnt   = $this->db->get_where('pegawai',array('username'=> $username,'password' => $password))->num_rows();
$user = $this->db->get_where('pegawai', array('username' => $username ))->row_array();
	$this->username = $username ;
if ($cnt > 0 && $user ['akses'] == 'pegawai'){

			
			$_SESSION['nip'] = $user['nip'];
			$_SESSION['id'] = $user['id'];
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['pegawai'] = $user['pegawai'];
			$_SESSION['jabatan'] = $user['jabatan'];
			$_SESSION['golongan'] = $user['golongan'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['eselon'] = $user['eselon'];
			$_SESSION['akses'] = $user['akses'];
			$_SESSION['foto'] = $user['foto'];
			echo "<script> 
			alert ('login user pegawai')
			</script>" ;
			header ('location:'.base_url().'pegawai/pegawai');

	}else if ($cnt > 0 && $user ['akses'] == 'admin')
	{
			$_SESSION['nip'] = $user['nip'];
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['pegawai'] = $user['pegawai'];
			$_SESSION['jabatan'] = $user['jabatan'];
			$_SESSION['golongan'] = $user['golongan'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['eselon'] = $user['eselon'];
			$_SESSION['akses'] = $user['akses'];
			$_SESSION['foto'] = $user['foto'];
		echo "<script> 
		alert ('login user administrator')
		</script>" ;
		header ('location:'.base_url().'administrator/administrator');
		
	}else if ($cnt > 0 && $user ['akses'] == 'tu')
	{
			$_SESSION['nip'] = $user['nip'];
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['pegawai'] = $user['pegawai'];
			$_SESSION['jabatan'] = $user['jabatan'];
			$_SESSION['golongan'] = $user['golongan'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['eselon'] = $user['eselon'];
			$_SESSION['akses'] = $user['akses'];
			$_SESSION['foto'] = $user['foto'];
		echo "<script> 
		alert ('login user tata usaha')
		</script>" ;
		header ('location:'.base_url().'tata_usaha/tata_usaha');
	}else if ($cnt > 0 && $user ['akses'] == 'kasi')
	{
			$_SESSION['nip'] = $user['nip'];
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['pegawai'] = $user['pegawai'];
			$_SESSION['jabatan'] = $user['jabatan'];
			$_SESSION['golongan'] = $user['golongan'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['eselon'] = $user['eselon'];
			$_SESSION['akses'] = $user['akses'];
			$_SESSION['foto'] = $user['foto'];
		echo "<script> 
		alert ('login user kepala seksi')
		</script>" ;
		header ('location:'.base_url().'index.php/kepala_seksi/Kasi/index');
	}else{
		$this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible" role="alert">
          <strong>Gagal!</strong> Username atau password salah.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect();
    }

}

 function logout()
	{
		$this->session->sess_destroy();
    redirect('index.php/c_login');

	}
}
?>