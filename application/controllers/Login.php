<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	// public function index()
	// {
	// 	$this->_rules();

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$data['title'] = "SIHORTI - LOGIN";
	// 		// $this->load->view('templates/header', $data);
	// 		$this->load->view('login', $data);
	// 	} else {
	// 		$username = $this->input->post('username');
	// 		$password = $this->input->post('password');
			
	// 		$cek = $this->M_akun->cek_login($username, $password);

	// 		if ($cek == FALSE) {
	// 			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	// 			<strong>Username atau Password salah !</strong>
	// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 		  	<span aria-hidden="true">&times;</span>
	// 			</button>
	// 	  		</div>');
	// 			redirect('login');
	// 		} else {
	// 			$this->session->set_userdata('username', $cek->username);
	// 			$this->session->set_userdata('password', $cek->password);
	// 			$this->session->set_userdata('level', $cek->level);
	// 			redirect('dashboard');
	// 			}
	// 		}
	// 	}
	

	// public function _rules()
	// {
	// 	$this->form_validation->set_rules('username', 'username', 'required');
	// 	$this->form_validation->set_rules('password', 'password', 'required');
	// }

	public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('login') == TRUE) {
        //     redirect(base_url());
        // }
        $this->load->library('form_validation');
        $this->load->model('m_akun');
    }
	
	public function index()
	{
		$data['title'] = "Login - SIHORTI";
        // $this->load->view('./login/v_login', $data);
		// $this->load->view('templates/header', $data);
		$this->load->view('login', $data);
	}

	public function auth()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        if ($this->form_validation->run() != false) {
            $data_login = array(
                'username' => htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES),
                'password' => md5(htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES)),
            );
            $user = $this->m_akun->login($this->security->xss_clean($data_login));
            if ($user->num_rows() > 0) {
                $data = $user->row_array();
                $this->session->set_userdata('login', TRUE);
                $this->session->set_userdata('username', $data['username']);
				$this->session->set_userdata('password', $data['password']);
                // $this->session->set_userdata('kd_unit', $data['kd_unit']);
                $this->session->set_userdata('id_level', $data['id_level']);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('gagal', 'Username atau password salah!');
                redirect(base_url('login'));
            }
        }
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}