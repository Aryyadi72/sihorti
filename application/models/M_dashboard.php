<?php
class M_dashboard extends CI_Model
{
    public function total_komoditas()
    {
        return $this->db->query('SELECT COUNT(id_komoditas) FROM komoditas');
    }

    public function total_kecamatan()
    {
        return $this->db->query('SELECT COUNT(id_kecamatan) FROM kecamatan');
    }

    public function total_akun()
    {
        return $this->db->query('SELECT COUNT(id_akun) FROM akun');
    }

    public function total_pegawai()
    {
        return $this->db->query('SELECT COUNT(id_pegawai) FROM pegawai');
    }



    // // menampilkan data level
    // public function tampil_komoditas()
    // {
    //     return  $this->db->query("SELECT * FROM komoditas");
    // }

    // public function tampil_kategori()
    // {
    //     return  $this->db->query("SELECT * FROM kategori");
    // }

    // public function get_data($table)
    // {
    //     return $this->db->get($table);
    // }

    // public function cek_data($username)
    // {
    // $this->db->select('username');
    // $this->db->where('username',$username);		
    // $query =$this->db->get('akun');
    // $row = $query->row();
    // if ($query->num_rows > 0){
    //      return $row->username; 
    // }else{
    //      return "";
    // }
    // }

    // public function insert_data($data, $table)
    // {
    //    ($this->db->insert($table, $data));
    // }

    // public function update_data($table, $data, $where)
    // {
    //     $this->db->update($table, $data, $where);
    // }

    // public function delete_data($where, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }

    // public function detail_data($id_akun)
    // {
    //     $query = $this->db->query("SELECT * FROM akun")->row();
    //     // $query = $this->db->get_where('tb_akun', array('id_akun' => $id_akun))->row();
    //     return $query;
    // }

    // public function cek_login()
    // {
    //     $username   = set_value('username');
    //     $password   = set_value('password');

    //     $result     = $this->db->where('username', $username)
    //         ->where('password', md5($password))
    //         ->limit(1)
    //         ->get('akun');

    //     if ($result->num_rows() > 0) {
    //         return $result->row();
    //     } else {
    //         return FALSE;
    //     }
    // }

    // public function get_keyword($keyword)
    // {
    //     $this->db->select('*');
    //     $this->db->from('akun');
    //     $this->db->join('level', 'level.id_level=akun.id_level');
    //     $this->db->like('level', $keyword);
    //     $this->db->or_like('nama', $keyword);
    //     $this->db->or_like('akun.nip', $keyword);
    //     $this->db->or_like('username', $keyword);
    //     return $this->db->get()->result();
    // }
}
