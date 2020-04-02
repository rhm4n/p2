<?php

class Rumah_model extends CI_Model {

    private $table = 'rumah'; 

    public function get_data($slug=null)
    {
        $this->db->select('rumah.id, rumah.id_projek, rumah.status_rumah, rumah.no_rumah');
        $this->db->select('projek.id as id_projek');
        $this->db->from($this->table);
        $this->db->join('projek projek','projek.id = rumah.id_projek');
        $this->db->where('status_rumah <=',1);
        $this->db->where('projek.slug', $slug);
        $this->db->order_by('id','ASC');
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_count_rumah($slug=null)
    {
        $this->db->select('rumah.*'); //COUNT(no_rumah) as jumlah_rumah
        $this->db->select('projek.id as id_projek');
        $this->db->select('pelanggan.id_rumah, pelanggan.nama');
        $this->db->from($this->table);
        $this->db->join('projek projek','projek.id = rumah.id_projek');
        $this->db->join('pelanggan pelanggan','pelanggan.id_rumah = rumah.id','LEFT');
        // $this->db->where('status_rumah !=',2);
        $this->db->where('projek.slug', $slug);
        $this->db->order_by('id','ASC');
        $this->db->group_by('no_rumah');
        $query = $this->db->get(); 
        return $query->result();
    }

    public function info_rumah($slug=null)
    {
        $this->db->select('rumah.status_rumah, rumah.id_projek, rumah.id, COUNT(rumah.id) as tersedia'); //COUNT(no_rumah) as jumlah_rumah
        $this->db->select('projek.id as id_projek');
        $this->db->select('pelanggan.id_rumah, pelanggan.nama');
        $this->db->from($this->table);
        $this->db->join('projek projek','projek.id = rumah.id_projek');
        $this->db->join('pelanggan pelanggan','pelanggan.id_rumah = rumah.id','LEFT');
        $this->db->where('projek.slug', $slug);
        $this->db->where('rumah.status_rumah', 0);        
        $query = $this->db->get(); 
        return $query->result();
    }

    public function info_terjual($slug=null)
    {
        $this->db->select('rumah.status_rumah, rumah.id_projek, rumah.id, COUNT(rumah.id) as tersedia'); //COUNT(no_rumah) as jumlah_rumah
        $this->db->select('projek.id as id_projek');
        $this->db->select('pelanggan.id_rumah, pelanggan.nama');
        $this->db->from($this->table);
        $this->db->join('projek projek','projek.id = rumah.id_projek');
        $this->db->join('pelanggan pelanggan','pelanggan.id_rumah = rumah.id','LEFT');
        $this->db->where('projek.slug', $slug);
        $this->db->where('rumah.status_rumah', 3);        
        $this->db->group_by('rumah.id_projek'); 
        $query = $this->db->get(); 
        return $query->result();
    }

    public function info_tanda_jadi($slug=null)
    {
        $this->db->select('rumah.status_rumah, rumah.id_projek, rumah.id, COUNT(rumah.id) as tersedia'); //COUNT(no_rumah) as jumlah_rumah
        $this->db->select('projek.id as id_projek');
        $this->db->select('pelanggan.id_rumah, pelanggan.nama');
        $this->db->from($this->table);
        $this->db->join('projek projek','projek.id = rumah.id_projek');
        $this->db->join('pelanggan pelanggan','pelanggan.id_rumah = rumah.id','LEFT');
        $this->db->where('projek.slug', $slug);
        $this->db->where('rumah.status_rumah',2); 
        $this->db->group_by('rumah.id');        
        $query = $this->db->get(); 
        return $query->result();
    }

    public function info_terbooking($slug=null)
    {
        $this->db->select('rumah.status_rumah, rumah.id_projek, rumah.id, COUNT(rumah.id) as tersedia'); //COUNT(no_rumah) as jumlah_rumah
        $this->db->select('projek.id');
        $this->db->select('pelanggan.id_rumah');
        $this->db->from($this->table);
        $this->db->join('projek projek','projek.id = rumah.id_projek');
        $this->db->join('pelanggan pelanggan','pelanggan.id_rumah = rumah.id','LEFT');
        $this->db->where('projek.slug', $slug);
        $this->db->where('rumah.status_rumah', 1);        
        $this->db->group_by('rumah.id'); 
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_no_rumah($no, $projek)
    {
        $this->db->select('no_rumah');
        $this->db->from($this->table);
        $this->db->where('no_rumah', $no);
        $this->db->where('id_projek', $projek);
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_detail($id=null)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get(); 
        return $query->result();
    }


    public function get_posting()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('posting', TRUE);
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

    public function delete_rumah($id)
    {
        $this->db->where('id_projek', $id);
        $this->db->delete($this->table);
        return TRUE;       
    }

}