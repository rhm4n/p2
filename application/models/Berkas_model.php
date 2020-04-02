<?php

class Berkas_model extends CI_Model {

    private $table = 'berkas'; 

    public function get_data()
    {
       $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_detail($kode = null)
    {
        $this->db->select('berkas.*');
        $this->db->select('pelanggan.kode_booking as kode_booking');
        $this->db->from($this->table);
        $this->db->join('pelanggan pelanggan','pelanggan.id = berkas.id_pelanggan');
        $this->db->where('kode_booking', $kode);
        $query = $this->db->get(); 
        return $query->result();
    }        

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return TRUE;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return TRUE;       
    }

}