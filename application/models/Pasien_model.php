<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Pasien_model extends CI_Model{
    public function get_all_pasien(){
    $this->db->select('pasien.*, dokter.nama_dokter, dokter.specialist');
    $this->db->from('pasien');
    $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter', 'left'); // pakai left join agar tidak error meski data dokter kosong
    return $this->db->get()->result_array();
}

    public function insert_pasien($data){
        return $this->db->insert('pasien',$data);
    }
    public function delete_pasien($id_pasien){
        return $this->db->delete('pasien',['id_pasien'=>$id_pasien]);
    }
    public function get_pasien_by_id($id_pasien){
        return $this->db->get_where('pasien',['id_pasien'=>$id_pasien])->row_array();
    }
    public function update_pasien($id, $data){
        $this->db->where('id_pasien',$id);
        return $this->db->update('pasien', $data);
    }
    public function get_laporan_pasien($tanggal_dari, $tanggal_sampai)
{
    $this->db->select('pasien.*, dokter.nama_dokter, dokter.specialist');
    $this->db->from('pasien');
    $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter', 'left');
    $this->db->where('create_at >=', $tanggal_dari);
    $this->db->where('create_at <=', $tanggal_sampai);
    $query = $this->db->get();
    return $query->result(); // jangan pakai result_array() kalau di view pakai ->nama_dokter
}

    public function get_pasien_by_user($user_id)
{
    $this->db->select('pasien.*, dokter.nama_dokter, dokter.specialist');
    $this->db->from('pasien');
    $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter');
    $this->db->where('pasien.id', $user_id); // Kolom `id` adalah foreign key ke `users.id`
    return $this->db->get()->result_array();
}
public function get_laporan_disetujui($tanggal_dari, $tanggal_sampai)
{
    $this->db->select('pasien.*, dokter.nama_dokter, dokter.specialist');
    $this->db->from('pasien');
    $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter', 'left');
    $this->db->where('status', 'disetujui');

   
    $query = $this->db->get();
    return $query->result();
}


public function get_laporan_ditolak($tanggal_dari, $tanggal_sampai)
{
    $this->db->select('pasien.*, dokter.nama_dokter, dokter.specialist');
    $this->db->from('pasien');
    $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter', 'left');
    $this->db->where('status', 'ditolak');


    $query = $this->db->get();
    return $query->result();
}





}