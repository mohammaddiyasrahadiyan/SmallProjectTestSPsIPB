<?php

class Transkrip_model extends CI_Model
{
    public function daftarTranskrip()
    {
        $query_join = "SELECT mahasiswa.nim, mahasiswa.nama_mahasiswa,
            matakuliah.kode_matakuliah, matakuliah.nama_matakuliah, transkrip.id_transkrip,
            transkrip.mutu_matakuliah, transkrip.semester FROM transkrip
            INNER JOIN mahasiswa ON mahasiswa.nim = transkrip.nim
            INNER JOIN matakuliah ON matakuliah.kode_matakuliah = transkrip.kode_matakuliah";
        
        return $this->db->query($query_join);
    }

    public function getSingleTranskrip($field, $value)
    {
        $query_join = "SELECT mahasiswa.nim, mahasiswa.nama_mahasiswa,
            matakuliah.kode_matakuliah, matakuliah.nama_matakuliah, transkrip.id_transkrip,
            transkrip.mutu_matakuliah, transkrip.semester FROM transkrip
            INNER JOIN mahasiswa ON mahasiswa.nim = transkrip.nim
            INNER JOIN matakuliah ON matakuliah.kode_matakuliah = transkrip.kode_matakuliah
            WHERE " . $field . " = " . $value;

        return $this->db->query($query_join);
    }

    public function tambah_transkrip($dataTranskrip)
    {
        $this->db->insert('transkrip', $dataTranskrip);
        return $this->db->insert_id();
    }

     public function update_transkrip($id_transkrip, $dataBaru)
    {
        $this->db->where('id_transkrip', $id_transkrip);
        $this->db->update('transkrip', $dataBaru);
        return $this->db->affected_rows();
    }

    public function hapus_transkrip($id_transkrip)
    {
        $this->db->where('id_transkrip', $id_transkrip);
        $this->db->delete('transkrip');
    }
}
