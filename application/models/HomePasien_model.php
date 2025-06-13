<?php
class HomePasien_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('pasien')->result();
    }
public function get_by_id($id)
{
    $this->db->select('pasien.*, dokter.nama_dokter, dokter.specialist');
    $this->db->from('pasien');
    $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter', 'left');
    $this->db->where('id_pasien', $id);
    return $this->db->get()->row_array();
}


}
