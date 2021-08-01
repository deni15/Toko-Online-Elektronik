<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->load->model('ModelProduk');
        $this->load->model('ModelEkspedisi');
        $this->load->model('ModelCarabayar');
        $this->load->model('ModelTransaksi');
        $this->load->library('session');
        //load libary pagination
        $this->load->library('pagination');
        $this->load->library('cart');
    }

    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('User/index'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->ModelProduk->get_produk_list($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();


        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->ModelProduk->getAll();
        if (!empty($data['user'])) {
            $data['title'] = 'Beranda';
            $this->load->view('template/templateMain/headerUser', $data);
            $this->load->view('content/dashboardUser/beranda', $data);
            $this->load->view('template/templateMain/footerUser');
        } else {
            redirect('auth');
        }
    }

    public function datafilter($id_produk)
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->ModelProduk->getAll();

        $data['datamodal'] = $this->ModelProduk->getById($id_produk);
        if (!empty($data['user'])) {
            $data['title'] = 'Detail Produk';
            $this->load->view('template/templateMain/headerUser', $data);
            $this->load->view('content/dashboardUser/detailProduk', $data);
            $this->load->view('template/templateMain/footerUser');
        } else {
            redirect('auth');
        }
    }

    public function katalog($jenis_produk)
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['key'] = $jenis_produk;
        $data['datajenis'] = $this->ModelProduk->getByJenis($jenis_produk);

        if (!empty($data['user'])) {
            $data['title'] = 'Menu katalog';
            $this->load->view('template/templateMain/headerUser', $data);
            $this->load->view('content/dashboardUser/katalogView', $data);
            $this->load->view('template/templateMain/footerUser');
        } else {
            redirect('auth');
        }
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['key'] =  $keyword;
        $data['datasearch'] = $this->ModelProduk->get_product_keyword($keyword);

        if (!empty($data['user'])) {
            $data['title'] = 'Pencarian data';
            $this->load->view('template/templateMain/headerUser', $data);
            $this->load->view('content/dashboardUser/searchKatalogView', $data);
            $this->load->view('template/templateMain/footerUser');
        } else {
            redirect('auth');
        }
    }

    public function addKeranjang($id_produk)
    {
        $barang = $this->ModelProduk->findKeranjang($id_produk);

        $data = array(
            'id'      => $barang->id_produk,
            'qty'     => 1,
            'price'   => $barang->harga_produk,
            'name'    => $barang->nama_produk,
            'gambar'    => $barang->gambar

        );

        $this->cart->insert($data);


        redirect('User/');
    }

    public function detailKeranjang()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        if (!empty($data['user'])) {
            $data['title'] = 'Detail Keranjang';
            $this->load->view('template/templateMain/headerUser', $data);
            $this->load->view('content/dashboardUser/detailKeranjang', $data);
            $this->load->view('template/templateMain/footerUserKeranjang');
        } else {
            redirect('auth');
        }
    }

    public function hapusKeranjang()
    {
        $this->cart->destroy();
        redirect('User/');
    }

    public function hapusItem($id)
    {
        $this->cart->remove($id);
        redirect('User/');
    }

    public function beliSekarang()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['ekspedisi'] = $this->ModelEkspedisi->getAll();
        $data['carabayar'] = $this->ModelCarabayar->getAll();

        if (!empty($data['user'])) {
            $data['title'] = 'Pemesanan';
            $this->load->view('template/templateMain/headerUser', $data);
            $this->load->view('content/dashboardUser/pemesananView', $data);
            $this->load->view('template/templateMain/footerUser');
        } else {
            redirect('auth');
        }
    }

    public function tambahPesanan()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $ekspedisi                  = $this->input->post('ekspedisi');
        $carabayar                  = $this->input->post('carabayar');
        $total_harga                = $this->input->post('total_harga');
        $total_item                  = $this->input->post('total_item');
        $data['pengiriman'] = $this->ModelEkspedisi->getById(intval($ekspedisi));
        $data['bayar'] = $this->ModelCarabayar->getById(intval($carabayar));
        $data['totalbayar'] = $data['bayar']->potongan + $data['pengiriman']->ongkir + $this->cart->total();

        $dt = array(
            'id_user'           => intval($this->session->userdata('id')),
            'id_ekspedisi'      => intval($ekspedisi),
            'id_carabayar'      => intval($carabayar),
            'total_harga'       => intval($total_harga),
            'total_item'        => intval($total_item),
            'date_created'      => time()

        );

        $this->ModelTransaksi->input_data($dt, 'transaksi');

        if (!empty($data['user'])) {
            $data['title'] = 'Struk pesanan';
            $this->load->view('content/dashboardUser/strukView', $data);
        } else {
            redirect('auth');
        }
    }

    public function backorder()
    {
        $this->cart->destroy();
        redirect('User/');
    }
}
