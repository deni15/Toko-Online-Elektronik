<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelTransaksi extends CI_Model
{
    private $table = "transaksi";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    function input_data($dt, $table)
    {
        $this->db->insert($table, $dt);
    }

    function get_transaksi_data()
    {
        $this->db->select('transaksi.*,users.*,ekspedisi.*,cara_bayar.*')
            ->from('transaksi as transaksi')
            ->join('users', 'users.id = transaksi.id_user')
            ->join('ekspedisi', 'ekspedisi.id_ekspedisi = transaksi.id_ekspedisi')
            ->join('cara_bayar', 'cara_bayar.id = transaksi.id_carabayar');
        $query = $this->db->get();
        return $query->result();
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
}
