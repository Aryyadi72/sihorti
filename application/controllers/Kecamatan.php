<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

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
		$data['kecamatan'] = $this->M_kecamatan->show_data()->result();
		$data['kecamatan'] = $this->M_kecamatan->get_data('kecamatan')->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kecamatan/tampil_kecamatan',$data);
        $this->load->view('templates/footer');
	}

    public function tambah()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kecamatan/tambah_kecamatan');
        $this->load->view('templates/footer');
	}

    public function ubah()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kecamatan/ubah_kecamatan');
        $this->load->view('templates/footer');
	}

    public function hapus()
	{
		
	}

}