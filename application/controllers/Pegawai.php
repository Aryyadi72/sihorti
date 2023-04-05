<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
		$data['pegawai'] = $this->M_pegawai->get_data('pegawai')->result();
		$data['pegawai'] = $this->M_pegawai->show_data()->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/tampil_pegawai',$data);
        $this->load->view('templates/footer');
	}

    public function tambah()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/tambah_pegawai');
        $this->load->view('templates/footer');
	}

    public function ubah()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/ubah_pegawai');
        $this->load->view('templates/footer');
	}

	public function hapus($id = null)
	{
    if($id == null){
        redirect('pegawai');
    }
    $where = array('id_pegawai' => $id);
    $this->M_pegawai->delete_data($where, 'pegawai');
    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('pegawai');
}	

}