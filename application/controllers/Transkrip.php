<?php

class Transkrip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transkrip_model');
        $this->load->model('mahasiswa_model');
        $this->load->model('matakuliah_model');
    }

    public function index()
    {
        $query = $this->transkrip_model->daftarTranskrip();
        $arrDaftarTranskrip['daftarTranskrip'] = $query->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('transkrip', $arrDaftarTranskrip);
        $this->load->view('template/footer');
    }

    public function tambah_transkrip()
    {
        $query = $this->mahasiswa_model->daftarMahasiswa();
        $arrDataTranskrip['dataTaranskrip'] = $query->result_array();

        $this->form_validation->set_rules('nim', 'NIM', 'required|alpha_numeric');
        $this->form_validation->set_rules('smt', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('kode_matakuliah', 'Mata Kuliah', 'required|alpha_numeric');
        $this->form_validation->set_rules('mutu_matakuliah', 'Nilai Mutu Mata kuliah', 'required|alpha');

        if ($this->form_validation->run() === TRUE) {
            $dataTaranskrip = [
                'nim'           		=> $this->input->post('nim'),
                'kode_matakuliah'       => $this->input->post('kode_matakuliah'),
                'mutu_matakuliah'    	=> $this->input->post('mutu_matakuliah'),
                'semester'           	=> $this->input->post('semester')
            ];

            $id = $this->transkrip_model->tambah_transkrip($dataTaranskrip);

            if ($id) {
                echo "Transkrip berhasil ditambahkan";
            } else {
                echo "Gagal menambahkan data";
            }

            redirect('/transkrip');
        }

        $this->load->view('transkrip_tambah', $arrDataTranskrip);
    }

    public function update_transkrip($id_transkrip)
    {
        $query = $this->transkrip_model->getSingleTranskrip('transkrip.id_transkrip', $id_transkrip);
        $arrDataTranskrip['dataTaranskrip'] = $query->row_array();

        $this->form_validation->set_rules('nim', 'NIM', 'required|alpha_numeric');
        $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('kode_matakuliah', 'Mata Kuliah', 'required|alpha_numeric');
        $this->form_validation->set_rules('mutu_matakuliah', 'Nilai Mutu Mata kuliah', 'required|alpha');

        if ($this->form_validation->run() === TRUE) {
            $dataBaru = [
                'nim'           		=> $this->input->post('nim'),
                'semester'      	    => $this->input->post('semester'),
                'kode_matakuliah'       => $this->input->post('kode_matakuliah'),
                'mutu_matakuliah'    	=> $this->input->post('mutu_matakuliah')
            ];

            $id = $this->transkrip_model->update_transkrip($id_transkrip, $dataBaru);

            if ($id) {
                echo "Data transkrip berhasil diupdate";
            } else {
                echo "Gagal memperbarui data";
            }

            redirect('/transkrip');
        }

        $this->load->view('transkrip_update', $arrDataTranskrip);
    }

    public function hapus_transkrip($id_transkrip)
    {
        $this->transkrip_model->hapus_transkrip($id_transkrip);
        redirect(site_url('transkrip'));
    }
}
