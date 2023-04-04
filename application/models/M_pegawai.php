<?php
    class M_pegawai extends CI_Model{
        public function show_data()
        {
            return $this->db->query('SELECT * FROM pegawai');
        }

    // menampilkan data bidang
        public function tampil_jabatan()
        {
          return  $this->db->query("SELECT * FROM tb_jabatan");
        }

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

        public function detail_data($id_petugas = NULL){
            $query = $this->db->get_where('tb_petugas',array('id_petugas'=> $id_petugas))->row();
            return $query;
        }

        public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan=tb_petugas.id_jabatan');
        $this->db->like('nama_jabatan', $keyword);
        $this->db->or_like('nip_p', $keyword);
        $this->db->or_like('nama_petugas', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('tempat_lahir', $keyword);
        return $this->db->get()->result();
    }
    } 
?>