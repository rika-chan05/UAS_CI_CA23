<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index() {
        $data['content'] = '<h1>Welcome to Rumah Sakit Harapan Semua</h1>';
        $this->load->view('templates/header');
        $this->load->view('templates/dashboard_admin', $data);
        $this->load->view('templates/footer');
    }
}
?>
