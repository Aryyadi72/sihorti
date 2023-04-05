<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_Komoditas extends CI_Controller {

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
		$data['lokasi'] = $this->M_lokasi->show_data()->result();
		$data['lokasi'] = $this->M_lokasi->get_data('lokasi_komoditas')->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lokasi_komoditas/tampil_lokasi',$data);
		$this->load->view('templates/footer');
	}

    public function tambah()
	{
		$data['komoditas'] = $this->M_lokasi->tampil_komoditas()->result();
		$data['kecamatan'] = $this->M_lokasi->tampil_kecamatan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('lokasi_komoditas/tambah_lokasi',$data);
		$this->load->view('templates/footer');
	}
		public function _rules()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('latitude','latitude','required');
		$this->form_validation->set_rules('longitude','longitude','required');
		// $this->form_validation->set_rules('id_komoditas','id_komoditas','required');
	}

	public function tambah_data_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->tambah();
		}else{
			$id_lokasi	  		= $this->input->post('id_lokasi');
			$id_kecamatan	  = $this->input->post('id_kecamatan');
			$id_komoditas	  = $this->input->post('id_komoditas');
			$latitude 		  = $this->input->post('latitude');
			$longitude   	  = $this->input->post('longitude');

			$data = array(
				'id_lokasi'	=> $id_lokasi,
				'id_kecamatan'			=> $id_kecamatan,
				'id_komoditas'			=> $id_komoditas,
				'latitude'		=> $latitude,
				'longitude'		=> $longitude,
			);

			$this->M_lokasi->insert_data($data, 'lokasi_komoditas');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('lokasi_komoditas');
		}
	}

    public function ubah($id)
	{
		$where = array('id_lokasi' => $id);
		$data['lokasi_komoditas'] = $this->db->query("SELECT * FROM lokasi_komoditas WHERE id_lokasi= '$id'")->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lokasi_komoditas/ubah_lokasi', $data);
		$this->load->view('templates/footer');
	}

    public function hapus()
	{
		
	}
}