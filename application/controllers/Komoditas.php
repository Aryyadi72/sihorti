<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komoditas extends CI_Controller {

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
		$data['komoditas'] = $this->M_komoditas->get_data('komoditas')->result();
		$data['komoditas'] = $this->M_komoditas->show_data()->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('komoditas/tampil_komoditas',$data);
        $this->load->view('templates/footer');
	}

    public function tambah()
	{
		$data['kategori'] = $this->M_komoditas->tampil_kategori()->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('komoditas/tambah_komoditas',$data);
        $this->load->view('templates/footer');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode','kode','required');
		$this->form_validation->set_rules('id_kategori','id_kategori','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('id_komoditas','id_komoditas','required');
	}

	public function tambah_data_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->tambah();
		}else{
			$id			  = $this->input->post('id_komoditas');
			$id_kategori  = $this->input->post('id_kategori');
			$kode 		  = $this->input->post('kode');
			$nama   	  = $this->input->post('nama');

			$data = array(
				'id_komoditas' 	=> $id,
				'id_kategori'	=> $id_kategori,
				'kode'			=> $kode,
				'nama'			=> $nama,
			);

			$this->M_komoditas->insert_data($data, 'komoditas');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('komoditas');
		}
	}


	public function ubah()
	{
		// $where = array('id_komoditas' => $id);
		// $data['komoditas'] = $this->db->query("SELECT * FROM komoditas WHERE id_komoditas = '$id'")->result(); 
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('komoditas/ubah_komoditas');
        $this->load->view('templates/footer');
	}

	public function ubah_data_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->ubah();
		}else{
  		$data = array(
    		'id_kategori' => $this->input->post('id_kategori'),
    		'kode' => $this->input->post('kode'),
    		'nama' => $this->input->post('nama')
  		);
  		$this->M_komoditas->update_data($id, $data);
		  $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Data berhasil diupdate !</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		  </button>
		  </div>');
		  redirect('komoditas');
		}
		
	}

    public function hapus()
	{
		$where = array('id_komoditas' => $id);
		$this->M_komoditas->delete_data($where, 'komoditas');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		redirect('komoditas');
	}

	public function lokasi_komoditas()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('komoditas/lokasi_komoditas');
	}
}