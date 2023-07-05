<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller {

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
		// $data['rekapitulasi'] = $this->M_rekapitulasi->show_data();
		$data['rekapitulasi'] = $this->M_rekapitulasi->show_data_semua();
		$data['kecamatan'] = $this->M_rekapitulasi->show_data_kecamatan()->result();
		$data['tanggal'] = $this->M_rekapitulasi->show_data_tanggal()->result();
		$data['bulan'] = $this->M_rekapitulasi->show_data_bulan()->result();
		$title['title'] = "SIHORTI - Rekapitulasi";
		$this->load->view('templates/header',$title);
        $this->load->view('templates/sidebar');
        $this->load->view('rekapitulasi/tampil_rekapitulasi',$data);
        $this->load->view('templates/footer');
	}

    public function tambah()
	{
		$data['komoditas'] = $this->M_rekapitulasi->tampil_komoditas()->result();
		$data['kategori'] = $this->M_rekapitulasi->tampil_kategori()->result();
		$data['kecamatan'] = $this->M_rekapitulasi->show_data_kecamatan()->result();
		$title['title'] = "SIHORTI - Tambah Rekapitulasi";
		$this->load->view('templates/header', $title);
        $this->load->view('templates/sidebar');
        $this->load->view('rekapitulasi/tambah_rekapitulasi',$data);
        $this->load->view('templates/footer');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode','kode','required');
		$this->form_validation->set_rules('id_komoditas','id_komoditas','required');
		$this->form_validation->set_rules('hasil_produksi','hasil_produksi','required');
		$this->form_validation->set_rules('luas_tanaman','luas_tanaman','required');
		$this->form_validation->set_rules('luas_panen_habis','luas_panen_habis','required');
		$this->form_validation->set_rules('luas_panen_sisa','luas_panen_sisa','required');
		$this->form_validation->set_rules('luas_rusak','luas_rusak','required');
		$this->form_validation->set_rules('luas_tambah_tanam','luas_tambah_tanam','required');
		$this->form_validation->set_rules('luas_laporan','luas_laporan','required');
		$this->form_validation->set_rules('produksi_habis','produksi_habis','required');
		$this->form_validation->set_rules('produksi_sisa','produksi_sisa','required');
		$this->form_validation->set_rules('harga_jual','harga_jual','required');
		$this->form_validation->set_rules('keterangan','keterangan','required');
	
	}

	public function tambah_data_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->tambah();
		}else{
			$id			  = $this->input->post('id_rekapitulasi');
			$kode 		  = $this->input->post('kode');
			$id_komoditas  = $this->input->post('id_komoditas');
			$id_kategori  = $this->input->post('id_kategori');
			$id_kecamatan  = $this->input->post('id_kecamatan');
			$hasil_produksi   	  = $this->input->post('hasil_produksi');
			$luas_tanaman   	  = $this->input->post('luas_tanaman');
			$luas_panen_habis   	  = $this->input->post('luas_panen_habis');
			$luas_panen_sisa   	  = $this->input->post('luas_panen_sisa');
			$luas_rusak   	  = $this->input->post('luas_rusak');
			$luas_tambah_tanam   	  = $this->input->post('luas_tambah_tanam');
			$luas_laporan   	  = $this->input->post('luas_laporan');
			$produksi_habis   	  = $this->input->post('produksi_habis');
			$produksi_sisa   	  = $this->input->post('produksi_sisa');
			$harga_jual   	  = $this->input->post('harga_jual');
			$keterangan   	  = $this->input->post('keterangan');
			$tanggal = date('Y-m-d');

			$data = array(
				'kode' => $kode,
    			'id_komoditas' => $id_komoditas,
				'id_kategori' => $id_kategori,
				'id_kecamatan' => $id_kecamatan,
    			'hasil_produksi' => $hasil_produksi,
    			'luas_tanaman' => $luas_tanaman,
    			'luas_panen_habis' => $luas_panen_habis,
    			'luas_panen_sisa' => $luas_panen_sisa,
    			'luas_rusak' => $luas_rusak,
    			'luas_tambah_tanam' => $luas_tambah_tanam,
    			'luas_laporan' => $luas_laporan,
    			'produksi_habis' => $produksi_habis,
    			'produksi_sisa' => $produksi_sisa,
    			'harga_jual' => $harga_jual,
    			'keterangan' => $keterangan,
				'tanggal' => $tanggal

			);

			$this->M_komoditas->insert_data($data, 'rekapitulasi');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('rekapitulasi');
		}
	}


    public function ubah($id)
	{
		$where = array('id_rekapitulasi' => $id);
		$data['rekapitulasi'] = $this->db->query("SELECT * FROM rekapitulasi WHERE id_rekapitulasi = '$id'")->result();
		$data['komoditas'] = $this->M_rekapitulasi->tampil_komoditas()->result();
		$data['kategori'] = $this->M_rekapitulasi->tampil_kategori()->result();
		$title['title'] = "SIHORTI - Ubah Rekapitulasi";
		$this->load->view('templates/header', $title);
        $this->load->view('templates/sidebar');
        $this->load->view('rekapitulasi/ubah_rekapitulasi', $data);
        $this->load->view('templates/footer');
	}

public function ubah_data_aksi()
{
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $this->ubah();
    } else {
        $id = $this->input->post('id_rekapitulasi');
        $kode = $this->input->post('kode');
        $id_komoditas = $this->input->post('id_komoditas');
        $id_kategori = $this->input->post('id_kategori');
        $hasil_produksi = $this->input->post('hasil_produksi');
        $luas_tanaman = $this->input->post('luas_tanaman');
        $luas_panen_habis = $this->input->post('luas_panen_habis');
        $luas_panen_sisa = $this->input->post('luas_panen_sisa');
        $luas_rusak = $this->input->post('luas_rusak');
        $luas_tambah_tanam = $this->input->post('luas_tambah_tanam');
        $luas_laporan = $this->input->post('luas_laporan');
        $produksi_habis = $this->input->post('produksi_habis');
        $produksi_sisa = $this->input->post('produksi_sisa');
        $harga_jual = $this->input->post('harga_jual');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'kode' => $kode,
            'id_komoditas' => $id_komoditas,
            'id_kategori' => $id_kategori,
            'hasil_produksi' => $hasil_produksi,
            'luas_tanaman' => $luas_tanaman,
            'luas_panen_habis' => $luas_panen_habis,
            'luas_panen_sisa' => $luas_panen_sisa,
            'luas_rusak' => $luas_rusak,
            'luas_tambah_tanam' => $luas_tambah_tanam,
            'luas_laporan' => $luas_laporan,
            'produksi_habis' => $produksi_habis,
            'produksi_sisa' => $produksi_sisa,
            'harga_jual' => $harga_jual,
            'keterangan' => $keterangan
        );

        $where = array(
            'id_rekapitulasi' => $id
        );

        $this->M_rekapitulasi->update_data('rekapitulasi', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data berhasil diupdate !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('rekapitulasi');
    }
}

	public function hapus($id = null)
	{
    if($id == null){
        redirect('pegawai');
    }
    $where = array('id_rekapitulasi' => $id);
    $this->M_rekapitulasi->delete_data($where, 'pegawai');
    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('pegawai');
}

	public function detail()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('rekapitulasi/detail_rekapitulasi');
        $this->load->view('templates/footer');
	}

	public function filter_data()
{
		$data['rekapitulasi'] = $this->M_rekapitulasi->show_data_baru();
   		$data['kecamatan'] = $this->M_rekapitulasi->show_data_kecamatan()->result();
		$data['tanggal'] = $this->M_rekapitulasi->show_data_tanggal()->result();
		$data['bulan'] = $this->M_rekapitulasi->show_data_bulan()->result();
		$title['title'] = "SIHORTI - Rekapitulasi";
		$this->load->view('templates/header',$title);
        $this->load->view('templates/sidebar');
        $this->load->view('rekapitulasi/tampil_rekapitulasi',$data);
        $this->load->view('templates/footer');
}

}