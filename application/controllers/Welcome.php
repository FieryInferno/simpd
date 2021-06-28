<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('welcome_message');
	}

  function gantiIdKabupaten()
  {
    $data = $this->db->get('transportasi')->result_array();
    foreach ($data as $key) {
      $kabupaten  = $this->db->get_where('wilayah_kabupaten', ['nama' => $key['id_kabupaten']])->row_array();
      if ($kabupaten) $this->db->update('transportasi', ['id_kabupaten' => $kabupaten['id']], ['id' => $key['id']]);
      else print_r($key['id_kabupaten']);echo '<br/>';
    }
  }
}
