<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Dokter_model extends CI_Model{
    public function get_all_dokter(){
    return $this->db->get('dokter')->result_array();
    }
    public function get_all(){
    return $this->db->get('dokter')->result();
    }
    public function insert_dokter($data){
        return $this->db->insert('dokter',$data);
    }
    public function delete_dokter($id_dokter){
        return $this->db->delete('dokter',['id_dokter'=>$id_dokter]);
    }
    public function get_dokter_by_id($id_dokter){
        return $this->db->get_where('dokter',['id_dokter'=>$id_dokter])->row_array();
    }
    public function update_dokter($id, $data){
        $this->db->where('id_dokter',$id);
        return $this->db->update('dokter', $data);
    }
}