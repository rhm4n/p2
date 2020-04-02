<?php

class User_model extends CI_Model {

    private $table = 'user'; 

    public function get_user_login($username, $password)
    {
       
        $this->db->select('*');
        $this->db->from($this->table); 
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get(); 
        return $query->result();
    }  

    public function get_kode($referral)
    {
    
        $this->db->select('*');
        $this->db->from($this->table); 
        $this->db->where('referral', $referral);
        $query = $this->db->get(); 
        return $query->result();
    }  

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('level !=', 1);
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_akun()
    {
        $this->db->select('COUNT(username) as jumlah_akun');
        $this->db->from($this->table);
        $this->db->where('level !=', 1);
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_detail($id)
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

    public function update_pass($id, $password)
    {
        $this->db->where('id', $id);
        $this->db->set('password', md5($password));
        $this->db->update($this->table);
        return TRUE;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return TRUE;       
    }

}