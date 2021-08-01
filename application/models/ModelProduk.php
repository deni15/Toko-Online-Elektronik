<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelProduk extends CI_Model
{
    private $table = "produk";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    public function getById($id_produk)
    {
        return $this->db->get_where($this->table, ["id_produk" => $id_produk])->row();
    }

    public function update($data, $id_produk)
    {
        return $this->db->update($this->table, $data, array('id_produk' => $id_produk));
    }

    public function delete($id_produk)
    {
        return $this->db->delete($this->table, array("id_produk" => $id_produk));
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    //pencarian
    public function get_product_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('harga_produk', $keyword);
        $this->db->or_like('id_produk', $keyword);
        $this->db->or_like('jenis_produk', $keyword);
        $this->db->or_like('date_created', $keyword);
        return $this->db->get()->result();
    }

    function get_produk_list($limit, $start)
    {
        $query = $this->db->get('produk', $limit, $start);
        return $query;
    }

    public function getByJenis($jenis_produk)
    {
        return $this->db->get_where($this->table, ["jenis_produk" => $jenis_produk])->result();
    }

    public function findKeranjang($id_produk)
    {
        $result = $this->db->where('id_produk', $id_produk)
            ->limit(1)
            ->get('produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
