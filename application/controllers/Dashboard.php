<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$tk = $this->db->query("SELECT * FROM komoditas");
		$data['total_komoditas'] = $tk->num_rows();

		$tkk = $this->db->query("SELECT * FROM kecamatan");
		$data['total_kecamatan'] = $tkk->num_rows();

		$ta = $this->db->query("SELECT * FROM akun");
		$data['total_akun'] = $ta->num_rows();

		$tp = $this->db->query("SELECT * FROM pegawai");
		$data['total_pegawai'] = $tp->num_rows();

		// $data['total_komoditas'] = $this->M_dashboard->total_komoditas()->result();
		// $data['total_kecamatan'] = $this->M_dashboard->total_kecamatan()->result();
		// $data['total_akun'] = $this->M_dashboard->total_akun()->result();
		// $data['total_pegawai'] = $this->M_dashboard->total_pegawai()->result();
		
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
	}
}