<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomePasien_model');
    }

    public function detail($id)
    {
        // Ambil data pasien berdasarkan ID
        $data['pasien'] = $this->HomePasien_model->get_by_id($id);

        if (!$data['pasien']) {
            show_404(); // jika data tidak ditemukan
        }

        // Tampilkan tampilan detail
        $this->load->view('layouts/header');
        $this->load->view('home/detail_pasien', $data); // Pastikan file ini ada
        $this->load->view('layouts/footer');
    }
}
