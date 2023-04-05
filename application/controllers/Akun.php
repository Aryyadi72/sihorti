<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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
		$data['akun'] = $this->M_akun->get_data('akun')->result();
		$data['akun'] = $this->M_akun->show_data()->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('akun/tampil_akun',$data);
        $this->load->view('templates/footer');
	}

    public function tambah()
	{
		$data['level'] = $this->M_akun->tampil_level()->result();
		$data['pegawai'] = $this->M_akun->tampil_pegawai()->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('akun/tambah_akun',$data);
        $this->load->view('templates/footer');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_akun','id_akun','required');
		$this->form_validation->set_rules('id_level','id_level','required');
		$this->form_validation->set_rules('id_pegawai','id_pegawai','required');
		$this->form_validation->set_rules('nip','nip','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		// $this->form_validation->set_rules('nip','nip','required');
	}

	public function tambah_data_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$id_akun	 		= $this->input->post('id_akun');
			$id_level	 		= $this->input->post('id_level');
			$id_pegawai	 		= $this->input->post('id_pegawai');
			$nip			  	= $this->input->post('nip');
			$nama				= $this->input->post('nama');
			$username   		= $this->input->post('username');
			$password   		= $this->input->post('password');
			$foto		  		= $_FILES['foto']['name'];
			if ($foto = '') {
			} else {
				$config['upload_path']		= './assets/foto';
				$config['allowed_types']		= 'jpg|jpeg|png|tiff';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					echo "Foto Gagal diupload !!!";
				} else {
					$foto = $this->upload->data('file_name');
				}
			}

			$data = array(
				'id_level'	=> $id_level,
				'id_pegawai'	=> $id_pegawai,
				'nip'			=> $nip,
				'nama'			=> $nama,
				'username'		=> $username,
				'password'		=> md5($password),
				'foto'			=> $foto,
			);

			$cek = $this->db->query("SELECT * FROM akun where username='".$this->input->post('username')."' AND  nama='".$this->input->post('nama')."' AND nip='".$this->input->post('nip')."' ");
if ($cek->num_rows()>=1){
  $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal ditambahkan !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('akun/tambah');
}else{
   $this->M_akun->insert_data($data, 'akun');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data berhasil ditambahkan !</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
					redirect('akun');
}	
		}
	}

    public function ubah($id)
	{
		$where = array('id_akun' => $id);
		$data['akun'] = $this->db->query("SELECT * FROM akun WHERE id_akun= '$id'")->result();
		$data['pegawai'] = $this->M_akun->tampil_pegawai()->result();
		$data['level'] = $this->M_akun->tampil_level()->result();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('akun/ubah_akun', $data);
        $this->load->view('templates/footer');
	}

	public function update_data_aksi()
	{
			$this->_rules();
	  		$id   	= $this->input->post('id_akun');
			$id_level    	= $this->input->post('id_level');
        	$id_pegawai   	= $this->input->post('id_pegawai');
        	$nip            = $this->input->post('nip');
        	$nama           = $this->input->post('nama');
        	$username       = $this->input->post('username');
        	$password       = $this->input->post('password');
			$foto		  		= $_FILES['foto']['name'];
			if($password == NULL){
				if ($foto = '') {
				} else {
					$config['upload_path']		= './assets/foto';
					$config['allowed_types']		= 'jpg|jpeg|png|tiff';
					$this->load->library('upload', $config);
	
					if (!$this->upload->do_upload('foto')) {
						 $data = array(
        				    'id_level'  => $id_level,
        				    'id_pegawai'  => $id_pegawai,
        				    'nip'           => $nip,
        				    'nama'          => $nama,
        				    'username'      => $username,
        				    'password'      => md5($password),
        				    'foto'          => $foto,
        				);

						$where = array(
							'id_akun' => $id
						);

						$this->M_akun->update_data('akun', $data, $where);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data berhasil diupdate !</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
						redirect('akun');
					} else {
						$foto = $this->upload->data('file_name');
						 $data = array(
        				    'id_level'  => $id_level,
        				    'id_pegawai'  => $id_pegawai,
        				    'nip'           => $nip,
        				    'nama'          => $nama,
        				    'username'      => $username,
        				    'password'      => md5($password),
        				    'foto'          => $foto,
        				);
	
						$where = array(
							'id_akun' => $id
						);

	
						$this->M_akun->update_data('akun', $data, $where);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Data berhasil diupdate !</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>');
						redirect('akun');
					}
				}
			}else{
				if ($foto = '') {
				} else {
					$config['upload_path']		= './assets/foto';
					$config['allowed_types']		= 'jpg|jpeg|png|tiff';
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('foto')) {
						 $data = array(
        				    'id_level'  => $id_level,
        				    'id_pegawai'  => $id_pegawai,
        				    'nip'           => $nip,
        				    'nama'          => $nama,
        				    'username'      => $username,
        				    'password'      => md5($password),
        				    'foto'          => $foto,
        				);

						$where = array(
							'id_akun' => $id
						);


						$this->M_akun->update_data('akun', $data, $where);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data berhasil diupdate !</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
						redirect('akun');
					} else {
						$foto = $this->upload->data('file_name');
						 $data = array(
       						'id_level' 		=> $id_level,
       						'id_pegawai'  	=> $id_pegawai,
       						'nip'           => $nip,
       						'nama'          => $nama,
       						'username'      => $username,
       						'password'      => md5($password),
       						'foto'          => $foto,
       					 );
						$where = array(
							'id_akun' => $id
						);

						$cek = $this->db->query("SELECT * FROM akun where username='".$this->input->post('username')."'");
				if ($cek->num_rows()>=1){
				  $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal ditambahkan !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('akun');
				}else{
					$this->M_akun->update_data('akun', $data, $where);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Data berhasil diupdate !</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>');
						redirect('akun');
				}
			}
			}
			
		}
	}

	public function hapus($id = null)
	{
    if($id == null){
        redirect('akun');
    }
    $where = array('id_akun' => $id);
    $this->M_akun->delete_data($where, 'akun');
    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('akun');
}

}