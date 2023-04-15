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
		$title['title'] = "SIHORTI - Kecamatan";
		$this->load->view('templates/header', $title);
        $this->load->view('templates/sidebar');
        $this->load->view('kecamatan/tampil_kecamatan',$data);
        $this->load->view('templates/footer');
	}

    public function tambah()
	{
		$title['title'] = "SIHORTI - Tambah Kecamatan";
		$this->load->view('templates/header', $title);
        $this->load->view('templates/sidebar');
        $this->load->view('kecamatan/tambah_kecamatan');
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
			$id	  = $this->input->post('id_kecamatan');
			$nama  			  = $this->input->post('nama');
			$latitude 		  = $this->input->post('latitude');
			$longitude   	  = $this->input->post('longitude');

			$data = array(
				'id_kecamatan'	=> $id,
				'nama'			=> $nama,
				'latitude'		=> $latitude,
				'longitude'		=> $longitude,
			);

			$this->M_kecamatan->insert_data($data, 'kecamatan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('kecamatan');
		}
	}

    public function ubah($id)
	{
		$where = array('id_kecamatan' => $id);
		$data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$id'")->result();
		$title['title'] = "SIHORTI - Ubah Kecamatan";
		$this->load->view('templates/header', $title);
        $this->load->view('templates/sidebar');
        $this->load->view('kecamatan/ubah_kecamatan', $data);
        $this->load->view('templates/footer');
	}

	public function update_data_aksi()
	{
			$this->_rules();
	  		$id	  = $this->input->post('id_kecamatan');
			$nama  			  = $this->input->post('nama');
			$latitude 		  = $this->input->post('latitude');
			$longitude   	  = $this->input->post('longitude');

			$data = array(
				'id_kecamatan'	=> $id,
				'nama'			=> $nama,
				'latitude'		=> $latitude,
				'longitude'		=> $longitude,
			);
			
			$where = array(
				'id_kecamatan' => $id
			);

			$this->M_kecamatan->update_data('kecamatan', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('kecamatan');
	}

	public function hapus($id = null)
	{
    if($id == null){
        redirect('kecamatan');
    }
    $where = array('id_kecamatan' => $id);
    $this->M_kecamatan->delete_data($where, 'kecamatan');
    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('kecamatan');
}

}