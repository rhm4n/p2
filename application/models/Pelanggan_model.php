<?php

class Pelanggan_model extends CI_Model {

    private $table = 'pelanggan'; 

    /*use in Project View in List Siteplan
        N pelanggan index admin
    */
    public function get_data()
    {
        $this->db->select('pelanggan.id, pelanggan.batas_waktu, pelanggan.email, pelanggan.status_berkas, pelanggan.id_rumah, pelanggan.nama as pelanggan, pelanggan.no_hp as no_kontak, pelanggan.id as id_pelanggan');
        $this->db->select('dtrumah.id_projek, dtrumah.no_rumah, dtrumah.klaim');
        $this->db->select('dtprojek.lokasi, dtprojek.id as projek_id, dtprojek.fee');
        $this->db->select('dtuser.referral, dtuser.level , dtuser.nama as nama_marketing');
        $this->db->from($this->table);
        $this->db->join('rumah dtrumah','dtrumah.id = pelanggan.id_rumah','LEFT');
        $this->db->join('projek dtprojek','dtprojek.id = dtrumah.id_projek','LEFT');
        $this->db->join('user dtuser','dtuser.referral = pelanggan.referral');
        $this->db->order_by('id','DESC');
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_kode($kode)
    {
       
        $this->db->select('*');
        $this->db->from($this->table); 
        $this->db->where('kode_booking', $kode);
        $query = $this->db->get(); 
        return $query->result();
    } 

    public function get_detail($id_user)
    {
         $this->db->select('pelanggan.id, pelanggan.email, pelanggan.status_berkas, pelanggan.id_rumah, pelanggan.nama as pelanggan, pelanggan.no_hp as no_kontak, pelanggan.id as id_pelanggan');
        $this->db->select('dtrumah.id_projek, dtrumah.no_rumah, dtrumah.klaim');
        $this->db->select('dtprojek.lokasi, dtprojek.id as projek_id, dtprojek.fee');
        $this->db->select('dtuser.referral, dtuser.level , dtuser.nama as nama_marketing');
        $this->db->from($this->table);
        $this->db->join('rumah dtrumah','dtrumah.id = pelanggan.id_rumah','LEFT');
        $this->db->join('projek dtprojek','dtprojek.id = dtrumah.id_projek','LEFT');
        $this->db->join('user dtuser','dtuser.referral = pelanggan.referral');
        $this->db->where('dtuser.id', $id_user);
        $this->db->order_by('id','DESC');
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_booking($id_user)
    {
        $this->db->select('*, COUNT(pelanggan.nama) as jumlah_pelanggan');
        $this->db->from($this->table);
        $this->db->join('user dtuser','dtuser.referral = pelanggan.referral');
        $this->db->where('dtuser.id', $id_user);
        $this->db->where('pelanggan.status_berkas <', '4');
        $query = $this->db->get(); 
        return $query->result();
    }   

    public function get_pelanggan_selesai($id_user)
    {
        $this->db->select('*, COUNT(pelanggan.nama) as jumlah_pelanggan');
        $this->db->from($this->table);
        $this->db->join('user dtuser','dtuser.referral = pelanggan.referral');
        $this->db->where('dtuser.id', $id_user);
        $this->db->where('pelanggan.status_berkas', '4');
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_fee($id_user){
        $this->db->select('pelanggan.id_rumah, pelanggan.referral, pelanggan.nama as pelanggan, pelanggan.no_hp as no_kontak, pelanggan.id as id_pelanggan');
        $this->db->select('dtrumah.id, dtrumah.id_projek, dtrumah.klaim');
        $this->db->select('SUM(dtprojek.fee) as jumlah_fee');
        $this->db->select('dtuser.referral, dtuser.id');
        $this->db->from($this->table);
        $this->db->join('rumah dtrumah','dtrumah.id = pelanggan.id_rumah','LEFT');
        $this->db->join('projek dtprojek','dtprojek.id = dtrumah.id_projek');
        $this->db->join('user dtuser','dtuser.referral = pelanggan.referral');
        $this->db->where('status_berkas', 5);
        $this->db->where('dtrumah.klaim', 0);
        $this->db->where('dtuser.id', $id_user);
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_fee_marketing()
    {
        $this->db->select('pelanggan.id, pelanggan.email, pelanggan.status_berkas, pelanggan.id_rumah, pelanggan.nama as pelanggan, pelanggan.no_hp as no_kontak, pelanggan.id as id_pelanggan');
        $this->db->select('dtrumah.id_projek, dtrumah.no_rumah, dtrumah.klaim');
        $this->db->select('dtprojek.lokasi, dtprojek.id as projek_id, SUM(dtprojek.fee) as fee');
        $this->db->select('dtuser.referral, dtuser.level, dtuser.bank, dtuser.no_rek, dtuser.an_rek, dtuser.nama as nama_marketing');
        $this->db->from($this->table);
        $this->db->join('rumah dtrumah','dtrumah.id = pelanggan.id_rumah','LEFT');
        $this->db->join('projek dtprojek','dtprojek.id = dtrumah.id_projek','LEFT');
        $this->db->join('user dtuser','dtuser.referral = pelanggan.referral');
        $this->db->where('status_berkas', 5);
        $this->db->group_by('nama_marketing');
        $this->db->group_by('dtrumah.klaim');
        $query = $this->db->get(); 
        return $query->result();
    }


    public function get_verifikasi($kode){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('kode_booking', $kode);
        $this->db->where('status_berkas >=', 2);
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