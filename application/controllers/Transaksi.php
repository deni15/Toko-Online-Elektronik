<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->load->model('ModelTransaksi');
        $this->load->library('session');
        //load libary pagination
        $this->load->library('pagination');
        $this->load->library('cart');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        if (!empty($data['user'])) {
            $data['title'] = 'Pemesanan';
            $data['ekspedisi'] = $this->ModelEkspedisi->getAll();
            $data['carabayar'] = $this->ModelCarabayar->getAll();
            $this->load->view('template/templateMain/headerUser', $data);
            $this->load->view('content/dashboardUser/strukView', $data);
            $this->load->view('template/templateMain/footerUser');
        } else {
            redirect('auth');
        }
    }
}
