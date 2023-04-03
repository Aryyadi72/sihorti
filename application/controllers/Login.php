<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "SIHORTI - LOGIN";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('login', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$cek = $this->M_akun->cek_login($username, $password);

			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username atau Password salah !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  	<span aria-hidden="true">&times;</span>
				</button>
		  		</div>');
				redirect('login');
			} else {
				$this->session->set_userdata('id_level', $cek->id_level);
				$this->session->set_userdata('nama', $cek->nama);
				$this->session->set_userdata('nip', $cek->nip);
				$this->session->set_userdata('foto', $cek->foto);
				$this->session->set_userdata('id_akun', $cek->id_akun);
				switch ($cek->id_level) {
					case 1:
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('petugas/dashboard');
						break;
					case 3:
						redirect('user/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
