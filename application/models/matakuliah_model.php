<?php

class Matakuliah_model extends CI_model{

	public function daftarMataKuliah()
	{
		return $this->db->get('matakuliah');
	}

	public function getSingleMataKuliah($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('matakuliah');
    }

	public function tambah_matakuliah($datamatakuliah)
    {
        $this->db->insert('matakuliah', $datamatakuliah);
        return $this->db->insert_id();
    }

    public function update_matakuliah($kode_matakuliah, $data)
    {
        $this->db->where('kode_matakuliah',$kode_matakuliah);
        $this->db->update('matakuliah',$data);
        return $this->db->affected_rows();
    }

    public function hapus_matakuliah($kode_matakuliah)
    {
        $this->db->where('kode_matakuliah',$kode_matakuliah);
        $this->db->delete('matakuliah');
    }
}