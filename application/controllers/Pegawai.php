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
		$title['title'] = "SIHORTI - Pegawai";
		$this->load->view('templates/header', $title);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/tampil_pegawai',$data);
        $this->load->view('templates/footer');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_pegawai','nama_pegawai','required');
		$this->form_validation->set_rules('nip_pegawai','nip_pegawai','required');
		$this->form_validation->set_rules('tanggal_lahir','tanggal_lahir','required');
		$this->form_validation->set_rules('tempat_lahir','tempat_lahir','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
	}

    public function tambah()
	{
		$title['title'] = "SIHORTI - Tambah Pegawai";
		$this->load->view('templates/header', $title);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/tambah_pegawai');
        $this->load->view('templates/footer');
	}

	// public function tambah_data_aksi()
	// {
	// 	$this->_rules();
	// 	if($this->form_validation->run() == FALSE){
	// 		$this->tambah();
	// 	}else{
	// 	$id			      = $this->input->post('id_pegawai');
    //     $nama_pegawai      = $this->input->post('nama_pegawai');
    //     $nip_pegawai   		  = $this->input->post('nip_pegawai');
    //     $tanggal_lahir 	          = $this->input->post('tanggal_lahir');
    //     $tempat_lahir 	          = $this->input->post('tempat_lahir');
    //     $foto 	          = $this->input->post('foto');
    //     $jenis_kelamin 	          = $this->input->post('jenis_kelamin');

	// 		$data = array(
	// 			'id_pegawai' => $id,
	// 			'nama_pegawai' => $nama_pegawai,
	// 			'nip_pegawai' => $nip_pegawai,
	// 			'tanggal_lahir' => $tanggal_lahir,
	// 			'tempat_lahir' => $tempat_lahir,
	// 			'foto' => $foto,
	// 			'jenis_kelamin' => $jenis_kelamin
	// 		);

	// 		$this->M_pegawai->insert_data($data, 'pegawai');
	// 		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
	// 		<strong>Data berhasil ditambahkan !</strong>
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 		  <span aria-hidden="true">&times;</span>
	// 		</button>
	// 	  </div>');
	// 	  redirect('pegawai');
	// 	}
	// }

	  public function ubah($id)
	{
		$where = array('id_pegawai' => $id);
		$data['pegawai'] = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai= '$id'")->result();
		$title['title'] = "SIHORTI - Ubah Pegawai";
		$this->load->view('templates/header', $title);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/ubah_pegawai',$data);
        $this->load->view('templates/footer');
	}

	// public function _rules()
	// {
	// 	$this->form_validation->set_rules('nama_pegawai','nama_pegawai','required');
	// 	$this->form_validation->set_rules('nip_pegawai','nip_pegawai','required');
	// 	// $this->form_validation->set_rules('','harga_eceran','required');
	// 	// $this->form_validation->set_rules('id_komoditas','id_komoditas','required');
	// }

public function tambah_data_aksi()
{
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $this->tambah();
    } else {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|PNG';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            echo "Gagal Tambah";
        } else {
            $foto = $this->upload->data('file_name');
            $id = $this->input->post('id_pegawai');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $nip_pegawai = $this->input->post('nip_pegawai');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            $data = array(
                'id_pegawai' => $id,
                'nama_pegawai' => $nama_pegawai,
                'nip_pegawai' => $nip_pegawai,
                'tanggal_lahir' => $tanggal_lahir,
                'tempat_lahir' => $tempat_lahir,
                'foto' => $foto,
                'jenis_kelamin' => $jenis_kelamin,
            );

            $this->M_pegawai->insert_data($data, 'pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('pegawai');
        }
    }
}


public function update_data_aksi()
{
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $this->edit();
    } else {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|PNG';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            echo "Gagal Update";
        } else {
            $foto = $this->upload->data('file_name');
            $id = $this->input->post('id_pegawai');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $nip_pegawai = $this->input->post('nip_pegawai');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            $data = array(
                'nama_pegawai' => $nama_pegawai,
                'nip_pegawai' => $nip_pegawai,
                'tanggal_lahir' => $tanggal_lahir,
                'tempat_lahir' => $tempat_lahir,
                'foto' => $foto,
                'jenis_kelamin' => $jenis_kelamin,
            );

            $where = array(
                'id_pegawai' => $id
            );

            $this->M_pegawai->update_data('pegawai', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('pegawai');
        }
    }
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