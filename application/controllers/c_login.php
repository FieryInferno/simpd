<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class c_login extends CI_Controller {


public function index()
	{
    // ob_start();
    //   $this->load->view('pdf');
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
    $password = $this->input->post('password');
    $user = $this->db->get_where('pegawai', [
      'username'  => $username,
      'password'  => $password
    ])->row_array();
    if ($user) {	
      $_SESSION['nip']      = $user['nip'];
			$_SESSION['id']       = $user['id'];
			$_SESSION['nama']     = $user['nama'];
			$_SESSION['pegawai']  = $user['pegawai'];
			$_SESSION['jabatan']  = $user['jabatan'];
			$_SESSION['golongan'] = $user['golongan'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['akses']    = $user['akses'];
			$_SESSION['foto']     = $user['foto'];
			$_SESSION['eselon']   = $user['eselon'];

      switch ($user['akses']) {
        case 'pegawai':
          echo "<script> 
          alert ('login user pegawai')
          </script>" ;
          header ('location:'.base_url().'pegawai/pegawai');
          break;
        case 'admin':
          echo "<script> 
          alert ('login user administrator')
          </script>" ;
          header ('location:'.base_url().'administrator/administrator');
          break;
        case 'tu':
          echo "<script> 
          alert ('login user tata usaha')
          </script>" ;
          header ('location:'.base_url().'tata_usaha/tata_usaha');
          break;
        case 'kasi':
          echo "<script> 
          alert ('login user kepala seksi')
          </script>" ;
          header ('location:'.base_url().'index.php/kepala_seksi/Kasi/index');
          break;
          
        default:
          # code...
          break;
      }
    } else {
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