<?php

class Projek_model extends CI_Model {

    private $table = 'projek'; 

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get(); 
        return $query->result();
    }

    //admin/projek/index
    // public function get_detail($id=null)
    // {
    //     $this->db->select('projek.*, projek.id as projek_id');
    //     $this->db->select('dtrumah.*, dtrumah.id as id_rumah, COUNT(dtrumah.id) as jumlah_rumah');
    //     $this->db->select('dtspektek.*');
    //     $this->db->from($this->table);
    //     $this->db->join('rumah dtrumah','dtrumah.id_projek = projek.id','LEFT');
    //     $this->db->join('spektek dtspektek','dtspektek.id_projek = projek.id','LEFT');
    //     $this->db->where('id_user', $id);
    //     $this->db->group_by('dtrumah.id_projek');
    //     $query = $this->db->get(); 
    //     return $query->result();
    // } 

    public function get_detail($id = null){
        $this->db->select('projek.*, projek.id as projek_id');
        $this->db->select('rumah.*, rumah.id as id_rumah, COUNT(rumah.id_projek) as jumlah_rumah');
        $this->db->from($this->table);
        $this->db->where('projek.id_user', $id);
        $this->db->join('rumah', 'rumah.id_projek = projek.id', 'LEFT');        
        $this->db->group_by('projek.id');
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_sum_rumah($id=null)
    {
        $this->db->select('projek.*, projek.id as id_projek');
        $this->db->select('dtrumah.id as id_rumah, COUNT(dtrumah.no_rumah) as jumlah_rumah');
        $this->db->from($this->table);
        $this->db->join('rumah dtrumah','dtrumah.id_projek = projek.id','LEFT');
        $this->db->where('id_user', $id);
        $this->db->group_by('projek.id');
        $query = $this->db->get(); 
        return $query->result();
    }    

    public function set_spektek($id=null)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get(); 
        return $query->result();
    }    

    public function get_edit($id=null)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get(); 
        return $query->result();
    }      

    public function get_spektek($id=null)
    {
        $this->db->select('projek.*');
        $this->db->select('spek.id as spek_id, spek.pekerjaan as pekerjaan, spek.bahan as bahan');
        $this->db->from($this->table);
        $this->db->join('spektek spek','spek.id = projek.spektek');
        $this->db->where('posting', TRUE);
        $query = $this->db->get(); 
        return $query->result();
    }        


    public function get_posting($slug)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('slug', $slug);
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