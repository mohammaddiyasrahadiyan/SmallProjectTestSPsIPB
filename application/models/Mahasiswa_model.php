<?php

class Mahasiswa_model extends CI_model{

	public function daftarMahasiswa()
	{
		return $this->db->get('mahasiswa');
	}

	public function getSingleMahasiswa($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('mahasiswa');
    }

    public function tambah_mahasiswa($dataMahasiswa)
    {
        $this->db->insert('mahasiswa', $dataMahasiswa);
        return $this->db->insert_id();
    }

    public function update_mahasiswa($nim, $data)
    {
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function hapus_mahasiswa($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('mahasiswa');
    }
}
