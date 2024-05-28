<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (method_exists($this, 'cek_login')) {
            $this->cek_login();
        }
    }

    public function index()
    {
        // Load required models
        $this->load->model('ModelUser');
        $this->load->model('ModelBuku');

        // Fetch user data
        $userData = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        // Fetch limited user data
        $anggotaData = $this->ModelUser->getUserLimit()->result_array();

        // Fetch book data
        $bukuData = $this->ModelBuku->getBuku()->result_array();

        // Prepare data to be passed to views
        $data = [
            'judul' => 'Dashboard',
            'user' => $userData,
            'anggota' => $anggotaData,
            'buku' => $bukuData
        ];

        // Load views
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
}
