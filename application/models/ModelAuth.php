<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelAuth extends CI_Model
{
    private $table = "users";
    function cekUserDaftar($username)
    {
        $query = $this->db->query("SELECT * FROM users WHERE username = '$username'");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function dataUser()
    {
        $query = $this->db->query("SELECT * FROM users WHERE role_id = 2");
        if (!empty($query)) {
            return $query->result();
        } else {
            return false;
        }
    }
    function dataAdmin()
    {
        $query = $this->db->query("SELECT * FROM users WHERE role_id = 1");
        if (!empty($query)) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }

    function cekLogin($username, $password)
    {
        $query = $this->db->query("SELECT * FROM users WHERE username = '$username' and password = '$password' ");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //pencarian
    public function get_users_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->like('id', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('no_telp', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get()->result();
    }

    /*function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("users");
        if ($query != '') {
            $this->db->like('id', $query);
            $this->db->or_like('nama', $query);
            $this->db->or_like('username', $query);
            $this->db->or_like('no_telp', $query);
            $this->db->or_like('email', $query);
            $this->db->or_like('alamat', $query);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }*/
}
