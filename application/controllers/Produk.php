<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->load->model('ModelProduk');
        $this->load->library('session');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['produk'] = $this->ModelProduk->getAll();

        if (!empty($data['user'])) {
            $data['title'] = 'Data produk';
            $this->load->view('template/templateAdmin/headerAdmin', $data);
            $this->load->view('content/produkData/dataProduk', $data);
            $this->load->view('template/templateAdmin/footerAdmin');
        } else {
            redirect('auth');
        }
    }
    public function print()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['produk'] = $this->ModelProduk->getAll();

        if (!empty($data['user'])) {
            $data['title'] = 'Data produk';
            $this->load->view('content/reportData/reportProduk', $data);
        } else {
            redirect('auth');
        }
    }
    public function created()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['produk'] = $this->ModelProduk->getAll();

        if (!empty($data['user'])) {
            $data['title'] = 'Data produk';
            $this->load->view('template/templateAdmin/headerAdmin', $data);
            $this->load->view('content/produkData/tambahProdukView', $data);
            $this->load->view('template/templateAdmin/footerAdmin');
        } else {
            redirect('auth');
        }
    }
    //save data 
    public function save()
    {
        $nama_produk                = $this->input->post('nama_produk');
        $jenis_produk               = $this->input->post('jenis_produk');
        $gambar                     = $_FILES['gambar'];
        $harga_produk               = $this->input->post('harga_produk');
        $stok                       = $this->input->post('stok');
        $date_created               = $this->input->post('date_created');

        if ($gambar = '') {
        } else {
            $config['upload_path'] = "./assets/images/gambar";
            $config['allowed_types'] = "jpg|png|gif";
            $config['max_size']             = 1000000;
            $config['max_width']            = 1080;
            $config['max_height']           = 1080;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Upload Gagal";
                die();
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }


        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required', ['required'   => 'Nama Produk tidak boleh kosong!']);
        $this->form_validation->set_rules('jenis_produk', 'jenis_produk', 'trim|required', ['required'   => 'Jenis produk tidak boleh kosong!']);

        $this->form_validation->set_rules('harga_produk', 'harga_produk', 'trim|required|numeric', [
            'numeric'    => 'Isi Harga Produk dengan angka!',
            'required'   => 'Harga tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('stok', 'stok', 'trim|required|numeric', [
            'numeric'    => 'Isi stok dengan angka!',
            'required'   => 'stok tidak boleh kosong!'
        ]);



        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('users', ['username' =>
            $this->session->userdata('username')])->row_array();
            if (!empty($data['user'])) {
                $data['title'] = 'Data Produk';
                $this->load->view('template/templateAdmin/headerAdmin', $data);
                $this->load->view('content/produkData/tambahProdukView',);
                $this->load->view('template/templateAdmin/footerAdmin');
            } else {
                redirect('auth');
            }
        } else {
            $data = array(
                'nama_produk'       => $nama_produk,
                'jenis_produk'      => $jenis_produk,
                'harga_produk'      => $harga_produk,
                'stok'              => $stok,
                'date_created'      => time(),
                'gambar'            => $gambar
            );
            $this->ModelProduk->input_data($data, 'produk');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Produk berhasil di Tambahkan.</div>');
            redirect('Produk/');
        }
    }
    //edit data produk
    public function edit($id_produk)
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $dtt['edit'] = $this->ModelProduk->getById($id_produk);

        if (!empty($data['user'])) {
            $dt['title'] = 'Admin data';
            $this->load->view('template/templateAdmin/headerAdmin', $data, $dt);
            $this->load->view('content/produkData/editProdukView', $dtt);
            $this->load->view('template/templateAdmin/footerAdmin');
        } else {
            redirect('auth');
        }
    }

    public function update()
    {
        $id_produk               = $this->input->post('id_produk');
        $nama_produk             = $this->input->post('nama_produk');
        $jenis_produk            = $this->input->post('jenis_produk');
        $gambar                  = $_FILES['gambar'];
        $harga_produk            = $this->input->post('harga_produk');
        $stok                    = $this->input->post('stok');
        $date_created            = $this->input->post('date_created');

        if ($gambar = '') {
        } else {
            $config['upload_path'] = "./assets/images/gambar";
            $config['allowed_types'] = "jpg|png|gif";
            $config['max_size']             = 50000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Upload Gagal";
                die();
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required', ['required'   => 'Nama Produk tidak boleh kosong!']);
        $this->form_validation->set_rules('jenis_produk', 'jenis_produk', 'trim|required', ['required'   => 'Jenis produk tidak boleh kosong!']);

        $this->form_validation->set_rules('harga_produk', 'harga_produk', 'trim|required|numeric', [
            'numeric'    => 'Isi Harga Produk dengan angka!',
            'required'   => 'Harga tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('stok', 'stok', 'trim|required|numeric', [
            'numeric'    => 'Isi stok dengan angka!',
            'required'   => 'stok tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('users', ['username' =>
            $this->session->userdata('username')])->row_array();
            $dtt['edit'] = $this->ModelProduk->getById($id_produk);
            if (!empty($data['user'])) {
                $data['title'] = 'Data Produk';
                $this->load->view('template/templateAdmin/headerAdmin', $data);
                $this->load->view('content/produkData/editProdukView', $dtt);
                $this->load->view('template/templateAdmin/footerAdmin');
            } else {
                redirect('auth');
            }
        } else {
            $data = array(
                'nama_produk'       => $nama_produk,
                'jenis_produk'      => $jenis_produk,
                'harga_produk'      => $harga_produk,
                'stok'              => $stok,
                'date_created'      => time(),
                'gambar'            => $gambar
            );
            $this->ModelProduk->update($data, $id_produk);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Produk berhasil di update.</div>');
            redirect('Produk/');
        }
    }

    // delete user
    public function delete($id_produk)
    {
        $this->ModelProduk->delete($id_produk);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Produk berhasil di Delete.</div>');
        redirect('Produk/');
    }

    //search data
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['key'] = $keyword;
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['produk'] = $this->ModelProduk->get_product_keyword($keyword);
        if (!empty($data['user'])) {
            $data['title'] = 'Data produk';
            $this->load->view('template/templateAdmin/headerAdmin', $data);
            $this->load->view('content/produkData/searchProduk', $data);
            $this->load->view('template/templateAdmin/footerAdmin');
        } else {
            redirect('auth');
        }
    }
}
