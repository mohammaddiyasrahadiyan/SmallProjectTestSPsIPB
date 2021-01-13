<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transkrip_model');
    }

    public function index()
    {   
        $this->load->library('pdfgenerator');
        $this->data['title_pdf'] = 'Transkrip Nilai';
        $file_pdf = 'transkrip_nilai';
        $paper = 'A4';
        $orientation = "portrait";
        $html = $this->load->view('transkrip_pdf', $this->data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
