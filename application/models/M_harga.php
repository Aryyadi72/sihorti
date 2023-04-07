<?php
    class M_harga extends CI_Model{

        public function show_data()
        {
            return $this->db->query('SELECT * FROM harga');
        }

        public function show_data_mingguan()
        {
            return $this->db->query('SELECT * FROM harga_mingguan');
        }

        // public function tampil_ruangan()
        // {
        //   return  $this->db->query("SELECT * FROM tb_ruangan");
        // }

        // public function tampil_barang()
        // {
        //   return  $this->db->query("SELECT * FROM tb_barang");
        // }

        public function get_data($table){
            return $this->db->get($table);
        }

        public function insert_data($data, $table){
            $this->db->insert($table,$data);
        }

        public function update_data($table, $data, $where){
            $this->db->update($table,$data, $where);
        }

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

        public function cetakexcel()
        {
            return $this->db->query('SELECT kategori, nama, harga_produsen, harga_eceran, harga_grosir FROM harga_mingguan JOIN kategori ON harga_mingguan.id_kategori=kategori.id_kategori JOIN harga ON harga_mingguan.id_harga=harga.id_harga JOIN komoditas ON harga_mingguan.id_komoditas=komoditas.id_komoditas');

        }

        public function counttotalharga()
        {
            return $this->db->query('SELECT COUNT(id_komoditas) FROM komoditas');

        }
    } 
?>