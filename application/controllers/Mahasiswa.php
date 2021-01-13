<?php

class Mahasiswa extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
	}

	public function index()
    {
        $query = $this->mahasiswa_model->daftarMahasiswa();
        $arrDaftarMahasiswa['daftarMahasiswa'] = $query->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('mahasiswa', $arrDaftarMahasiswa);
        $this->load->view('template/footer');
    }

	public function tambah_mahasiswa()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|alpha_numeric');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required|regex_match[/^([a-z ])+$/i]');
        $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|regex_match[/^([a-z ])+$/i]');

        if ($this->form_validation->run() === TRUE) {
            $dataMahasiswa = [
                'nim'       		=> $this->input->post('nim'),
                'nama_mahasiswa'  	=> $this->input->post('nama_mahasiswa'),
                'semester'     		=> $this->input->post('semester'),
                'jurusan'   => $this->input->post('jurusan')
            ];

            $id = $this->mahasiswa_model->tambah_mahasiswa($dataMahasiswa);

            if ($id) {
                echo "Data Mahasiswa berhasil ditambahkan";
            }
            else {
                echo "Gagal menyimpan data mahasiswa baru";
            }

            redirect('mahasiswa');
        }

        $this->load->view('mahasiswa_tambah');
    }

    public function update_mahasiswa($nim)
    {
        $query = $this->mahasiswa_model->getSingleMahasiswa('nim', $nim);
        $arrDataMahasiswa['dataMahasiswa']= $query->row_array();

        if ($this->input->post()) {
            $data = [
                'nim'       		=> $this->input->post('nim'),
                'nama_mahasiswa'  	=> $this->input->post('nama_mahasiswa'),
                'semester' 	 	    => $this->input->post('semester'),
                'jurusan'   		=> $this->input->post('jurusan')
            ];

            $id = $this->mahasiswa_model->update_mahasiswa($nim, $data);

            if ($id) {
                echo "Data Mahasiswa berhasil diupdate";
            } else {
                echo "Gagal memperbarui data";
            }

            redirect('mahasiswa');
        }

        $this->load->view('mahasiswa_update', $arrDataMahasiswa);
    }

    public function hapus_mahasiswa($nim)
    {
        $this->mahasiswa_model->hapus_mahasiswa($nim);
        redirect(site_url('mahasiswa'));
    }
}
