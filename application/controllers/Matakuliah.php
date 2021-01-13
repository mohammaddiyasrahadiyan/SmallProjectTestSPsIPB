<?php

class Matakuliah extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('matakuliah_model');
    }

	public function index()
    {
        $query = $this->matakuliah_model->daftarMataKuliah();
        $arrDaftarMataKuliah['daftarMataKuliah'] = $query->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('matakuliah', $arrDaftarMataKuliah);
        $this->load->view('template/footer');
    }

	public function tambah_matakuliah()
    {
        $this->form_validation->set_rules('kode_matakuliah', 'Kode Mata Kuliah', 'required|alpha_numeric');
        $this->form_validation->set_rules('nama_matakuliah', 'Nama Mata Kuliah', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|regex_match[/^([a-z ])+$/i]');

        if ($this->form_validation->run() === TRUE) {
            $datamatakuliah = [
                'kode_matakuliah'   => $this->input->post('kode_matakuliah'),
                'nama_matakuliah'   => $this->input->post('nama_matakuliah'),
                'semester'       	=> $this->input->post('semester'),
                'jurusan'   		=> $this->input->post('jurusan')
            ];

            $id = $this->matakuliah_model->tambah_matakuliah($datamatakuliah);

            if ($id) {
                echo "Data Mata Kuliah Berhasil ditambahkan";
            } else {
                echo "Gagal menyimpan Data Mata Kuliah";
            }

            redirect('/matakuliah');
        }

        $this->load->view('matakuliah_tambah');
    }

    public function update_matakuliah($kode_matakuliah)
    {
        $query = $this->matakuliah_model->getSingleMataKuliah('kode_matakuliah', $kode_matakuliah);
        $arrDataMataKuliah['datamatakuliah'] = $query->row_array();

        if ($this->input->post()) {
            $data = [
                'kode_matakuliah'   => $this->input->post('kode_matakuliah'),
                'nama_matakuliah'   => $this->input->post('nama_matakuliah'),
                'semester'       => $this->input->post('semester'),
                'jurusan'   => $this->input->post('jurusan')
            ];

            $id = $this->matakuliah_model->update_matakuliah($kode_matakuliah, $data);

            if ($id) {
                echo "Data Mata Kuliah berhasil diupdate";
            } else {
                echo "Gagal memperbarui data";
            }

            redirect('/matakuliah');
        }

        $this->load->view('matakuliah_update', $arrDataMataKuliah);
    }

    public function hapus_matakuliah($kode_matakuliah)
    {
        $this->matakuliah_model->hapus_matakuliah($kode_matakuliah);
        redirect(site_url('matakuliah'));
    }
}
