<?php

class Spektek_model extends CI_Model {

    private $table = 'spektek'; 

    public function get_data($id=null)
    {
       $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id_projek', $id);
        $query = $this->db->get();  
        return $query->result();
    }

    public function get_data_edit($id=null)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();  
        return $query->result();
    }

    public function get_detail_id_projek($id=null)
    {
        $this->db->select('spektek.*, spektek.id as id_spektek');
        $this->db->from($this->table);
        $this->db->join('projek','projek.id = spektek.id_projek', 'LEFT');
        $this->db->where('projek.id_user', $id);
        $query = $this->db->get();  
        return $query->result();
    }

    public function get_detail($slug)
    {
        $this->db->select('*');
         $this->db->select('dtprojek.id as projek_id, dtprojek.slug as slug');
        $this->db->from($this->table);
        $this->db->join('projek dtprojek','dtprojek.id = spektek.id_projek');
        $this->db->where('slug', $slug);
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

}