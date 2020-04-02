<?php

class Slideshow_model extends CI_Model {

    private $table = 'slideshow'; 

    public function get_data($limit=null)
    {
       $this->db->select('*');
        $this->db->from($this->table);
        $this->db->limit($limit);
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