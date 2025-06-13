<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class pasien extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->model('Dokter_model');
    }
public function index()
{
    $user_id = $this->session->userdata('user_id');
    $role = $this->session->userdata('role');

    if ($role == 'admin') {
        // Jika admin, ambil semua data pasien
        $data['pasien'] = $this->Pasien_model->get_all_pasien();
    } else {
        // Jika user biasa, ambil data pasien berdasarkan user_id
        $data['pasien'] = $this->Pasien_model->get_pasien_by_user($user_id);
    }

    $this->load->view('templates/header');
    $this->load->view('pasien/index', $data);
    $this->load->view('templates/footer');
}

    
    public function tambah(){
        $this->load->model('Dokter_model');
        $data['dokter'] = $this->Dokter_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('pasien/form_pendaftaran', $data); // Pass $data here
        $this->load->view('templates/footer');
    }
    public function insert(){
    $nama= $this->input->post('nama');
    $tgl_lahir= $this->input->post('tgl_lahir');
    $alamat= $this->input->post('alamat');
    $no_telpon= $this->input->post('no_telpon');
    $id_dokter= $this->input->post('id_dokter');
    $keluhan= $this->input->post('keluhan');
    $tgl_kunjungan= $this->input->post('tgl_kunjungan');
    $jam_kunjungan= $this->input->post('jam_kunjungan');

    $user_id = $this->session->userdata('user_id'); 
    $role = $this->session->userdata('role'); // Tambahkan ini

    $data=array(
        'id' => $user_id,
        'nama'=>$nama,
        'tgl_lahir'=>$tgl_lahir,
        'alamat'=>$alamat,
        'no_telpon'=>$no_telpon,
        'id_dokter'=>$id_dokter,
        'keluhan'=>$keluhan,
        'tgl_kunjungan'=>$tgl_kunjungan,
        'jam_kunjungan'=>$jam_kunjungan
    );

    $result=$this->Pasien_model->insert_pasien($data);

    if($result){
        $this->session->set_flashdata('success', 'Data Pasien berhasil disimpan');

        // Cek role: admin ke index, user ke status
        if ($role == 'admin') {
            redirect('pasien');
        } else {
            redirect('pasien/status');
        }
    }else{
        $this->session->set_flashdata('error', 'Data Pasien gagal disimpan');
        redirect('pasien/form_pendaftaran');
    }
}

    public function edit($id_pasien){
        $data['dokter'] = $this->Dokter_model->get_all_dokter(); // pastikan dapat data
        $data['pasien']=$this->Pasien_model->get_pasien_by_id($id_pasien);
        $this->load->view('templates/header');
        $this->load->view('pasien/edit_pasien', $data);
        $this->load->view('templates/footer');
    }
    public function update($id){
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('tgl_lahir','tgl_lahir','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('no_telpon','no_telpon','required');
        $this->form_validation->set_rules('id_dokter','id_dokter','required');
        $this->form_validation->set_rules('keluhan','keluhan','required');
        $this->form_validation->set_rules('tgl_kunjungan','tgl_kunjungan','required');
        $this->form_validation->set_rules('jam_kunjungan','jam_kunjungan','required');

        if ($this->form_validation->run() === FALSE){
            $this->index($id);
        }else{
            $data=[
                'nama' => $this->input->post('nama'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_telpon' => $this->input->post('no_telpon'),
                'id_dokter' => $this->input->post('id_dokter'),
                'keluhan' => $this->input->post('keluhan'),
                'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
                'jam_kunjungan' => $this->input->post('jam_kunjungan')
            ];
            $this->Pasien_model->update_pasien($id,$data);
            redirect('pasien');
        }
    }
    public function laporan_daftar()
    {
        $this->load->view('templates/header');
        $this->load->view('pasien/laporan_pasien_mendaftar');
        $this->load->view('templates/footer');
    }
    public function cetak_laporan_daftar()
    {
        $tanggal_dari= $this->input->post('tanggal_dari');
        $tanggal_sampai= $this->input->post('tanggal_sampai');

        $data['pasien']= $this->Pasien_model->get_laporan_pasien($tanggal_dari, $tanggal_sampai);
        $data['tanggal_dari']= $tanggal_dari;
        $data['tanggal_sampai']= $tanggal_sampai;
        // print_r($data);
        $this->load->view('templates/header');
        $this->load->view('pasien/laporan_hasil_daftar', $data);
        $this->load->view('templates/footer');
    }
    public function laporan_disetujui()
{
        $this->load->view('templates/header');
        $this->load->view('pasien/laporan_pasien_disetujui');
        $this->load->view('templates/footer');
}

    public function cetak_laporan_disetujui()
    {
        $tanggal_dari= $this->input->post('tanggal_dari');
        $tanggal_sampai= $this->input->post('tanggal_sampai');

        $data['pasien']= $this->Pasien_model->get_laporan_disetujui($tanggal_dari, $tanggal_sampai);
        $data['tanggal_dari']= $tanggal_dari;
        $data['tanggal_sampai']= $tanggal_sampai;
        // print_r($data);
        $this->load->view('templates/header');
        $this->load->view('pasien/laporan_hasil_disetujui', $data);
        $this->load->view('templates/footer');
    }
        public function laporan_ditolak()
{
     $this->load->view('templates/header');
        $this->load->view('pasien/laporan_pasien_ditolak');
        $this->load->view('templates/footer');
}
    public function cetak_laporan_ditolak()
    {
        $tanggal_dari= $this->input->post('tanggal_dari');
        $tanggal_sampai= $this->input->post('tanggal_sampai');

        $data['pasien']= $this->Pasien_model->get_laporan_ditolak($tanggal_dari, $tanggal_sampai);
        $data['tanggal_dari']= $tanggal_dari;
        $data['tanggal_sampai']= $tanggal_sampai;
        // print_r($data);
        $this->load->view('templates/header');
        $this->load->view('pasien/laporan_hasil_ditolak', $data);
        $this->load->view('templates/footer');
    }
    public function hapus($id_pasien){
        $this->Pasien_model->delete_pasien($id_pasien);
        redirect('pasien');
    }
    public function status()
{
    $user_id = $this->session->userdata('user_id'); // Ini ID dari tabel users
    $data['pasien'] = $this->Pasien_model->get_pasien_by_user($user_id); // Ambil pasien milik user

    $this->load->view('templates/header');
    $this->load->view('pasien/status_pendaftaran', $data);
    $this->load->view('templates/footer');
}
public function ditolak($id_pasien) {
    // update status pasien jadi 'Ditolak'
    $this->Pasien_model->update_pasien($id_pasien, ['status' => 'ditolak']);
    redirect('pasien'); // arahkan kembali ke daftar pasien
}

public function disetujui($id_pasien) {
    // update status pasien jadi 'disetujui'
    $this->Pasien_model->update_pasien($id_pasien, ['status' => 'disetujui']);
    redirect('pasien');
}


    
}