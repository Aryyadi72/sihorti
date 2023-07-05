<?php
class M_rekapitulasi extends CI_Model
{
 public function show_data()
{
    $query = $this->db->query('SELECT r.id_rekapitulasi, r.kode, r.id_komoditas, r.id_kecamatan, r.hasil_produksi, r.luas_tanaman, r.luas_panen_habis, r.luas_panen_sisa, r.luas_rusak, r.luas_tambah_tanam, r.luas_laporan, r.produksi_habis, r.produksi_sisa, r.harga_jual, r.keterangan, r.id_kategori, r.tanggal, k.id_kecamatan, k.kecamatan, k.latitude, k.longitude, k.marker
        FROM rekapitulasi r
        JOIN kecamatan k ON r.id_kecamatan = k.id_kecamatan');
    
    return $query->result();
}
    public function show_data_kecamatan()
    {
        return $this->db->query('SELECT * FROM kecamatan');
    }

    public function show_data_tanggal()
    {
        return $this->db->query('SELECT DISTINCT tanggal FROM rekapitulasi');
    }

     public function show_data_bulan()
    {
        return $this->db->query('SELECT DISTINCT tanggal FROM rekapitulasi');
    }

    public function tampil_komoditas()
    {
        return  $this->db->query("SELECT * FROM komoditas");
    }

    public function tampil_kategori()
    {
        return  $this->db->query("SELECT * FROM kategori");
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function cek_data($username)
    {
    $this->db->select('username');
    $this->db->where('username',$username);		
    $query =$this->db->get('akun');
    $row = $query->row();
    if ($query->num_rows > 0){
         return $row->username; 
    }else{
         return "";
    }
    }

    public function insert_data($data, $table)
    {
       ($this->db->insert($table, $data));
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_data($id_akun)
    {
        $query = $this->db->query("SELECT * FROM akun")->row();
        // $query = $this->db->get_where('tb_akun', array('id_akun' => $id_akun))->row();
        return $query;
    }

    public function cek_login()
    {
        $username   = set_value('username');
        $password   = set_value('password');

        $result     = $this->db->where('username', $username)
            ->where('password', md5($password))
            ->limit(1)
            ->get('akun');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->join('level', 'level.id_level=akun.id_level');
        $this->db->like('level', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('akun.nip', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get()->result();
    }

  public function show_data_baru()
{
    $kecamatan = $this->input->post('kecamatan');
    $tahun = $this->input->post('tahun');
    $bulan = $this->input->post('bulan');

    $sql = "SELECT r.id_rekapitulasi,r.kode,  ko.nama, r.hasil_produksi, r.luas_tanaman, r.luas_panen_habis, r.luas_panen_sisa, r.luas_rusak, r.luas_tambah_tanam, r.luas_laporan, r.produksi_habis, r.produksi_sisa, r.harga_jual, r.keterangan, r.tanggal, k.kecamatan, ka.kategori
        FROM rekapitulasi r
        JOIN kecamatan k ON k.id_kecamatan = r.id_kecamatan
        JOIN komoditas ko ON ko.id_komoditas = r.id_komoditas
        JOIN kategori ka ON ka.id_kategori = r.id_kategori ";

    $query = $this->db->query($sql, array($kecamatan, $tahun));
    return $query->result();
}

public function show_data_semua()
{

    $sql = "SELECT r.id_rekapitulasi, r.kode, r.id_komoditas, r.id_kecamatan, r.hasil_produksi, r.luas_tanaman, r.luas_panen_habis, r.luas_panen_sisa, r.luas_rusak, r.luas_tambah_tanam, r.luas_laporan, r.produksi_habis, r.produksi_sisa, r.harga_jual, r.keterangan, r.id_kategori, r.tanggal, k.id_kecamatan, k.kecamatan, ka.id_kategori, ka.kategori, ko.id_komoditas, ko.nama
        FROM rekapitulasi r
        JOIN kategori ka ON ka.id_kategori = r.id_kategori
        JOIN komoditas ko ON ko.id_komoditas = r.id_komoditas
        JOIN kecamatan k ON k.id_kecamatan = r.id_kecamatan";

    $query = $this->db->query($sql);
    return $query->result();
}

public function insert_data_to_report()
{
    $sql = "INSERT INTO report (`id_rekapitulasi`, `kode`, `id_komoditas`, `id_kecamatan`, `hasil_produksi`, `luas_tanaman`, `luas_panen_habis`, `luas_panen_sisa`, `luas_rusak`, `luas_tambah_tanam`, `luas_laporan`, `produksi_habis`, `produksi_sisa`, `harga_jual`, `keterangan`, `id_kategori`, `tanggal`)
            SELECT `id_rekapitulasi`, `kode`, `id_komoditas`, `id_kecamatan`, `hasil_produksi`, `luas_tanaman`, `luas_panen_habis`, `luas_panen_sisa`, `luas_rusak`, `luas_tambah_tanam`, `luas_laporan`, `produksi_habis`, `produksi_sisa`, `harga_jual`, `keterangan`, `id_kategori`, `tanggal`
            FROM rekapitulasi";

    $this->db->query($sql);
}






}
