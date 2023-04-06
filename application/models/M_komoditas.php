<?php
    class M_komoditas extends CI_Model{

        public function show_data()
        {
            return $this->db->query('SELECT * FROM komoditas JOIN kategori on komoditas.id_kategori=kategori.id_kategori');
        }

        public function get_data($table){
            return $this->db->get($table);
        }

        public function insert_data($data, $table){
            $this->db->insert($table,$data);
        }

        public function tampil_kategori()
        {
             return  $this->db->query("SELECT * FROM kategori");
        }

        public function update_data($table, $data, $where)
        {
           $this->db->update($table,$data, $where);
        }

        // public function update_data($id, $data){
        // $this->db->where('id_komoditas', $id);
        // $this->db->update('komoditas', $data);
        // }

        public function delete_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function filter_rusak($bulan, $tahun)
        {
            $this->db->select('*');
            $this->db->from('tb_barangrusak');
            $this->db->join('tb_ruangan', 'tb_ruangan.id_ruangan=tb_barangrusak.id_ruangan');
            $this->db->join('tb_barang', 'tb_barang.id_barang=tb_barangrusak.id_barang');
            $this->db->where('YEAR(tanggal_rusak)', $tahun);
            $this->db->where('MONTH(tanggal_rusak)', $bulan);
            $query = $this->db->get();
            return $query->result();
        }

        public function get_keyword($keyword)
        {
            $this->db->select('*');
            $this->db->from('tb_barangrusak');
            $this->db->join('tb_ruangan', 'tb_ruangan.id_ruangan=tb_barangrusak.id_ruangan');
            $this->db->join('tb_barang', 'tb_barang.id_barang=tb_barangrusak.id_barang');
            $this->db->like('nama_barang', $keyword);
            $this->db->or_like('nama_ruangan', $keyword);
            $this->db->or_like('kerusakan', $keyword);
            return $this->db->get()->result();
        }

        public function tampil_lokasi_komoditas()
        {
            return $this->db->query('SELECT * FROM lokasi_komoditas JOIN komoditas on lokasi_komoditas.id_komoditas=komoditas.id_komoditas JOIN kategori on komoditas.id_kategori=kategori.id_kategori');
        }
    } 
?>