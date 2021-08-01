<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->load->model('ModelAuth');
        $this->load->model('ModelTransaksi');
        $this->load->library('session');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['order'] = $this->ModelTransaksi->get_transaksi_data();
        if (!empty($data['user'])) {
            $data['title'] = 'Dashboard admin';
            $this->load->view('template/templateAdmin/headerAdmin', $data);
            $this->load->view('content/adminContent/dashboardAdmin', $data);
            $this->load->view('template/templateAdmin/footerAdmin');
        } else {
            redirect('auth');
        }
    }

    public function created()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        if (!empty($data['user'])) {
            $dt['title'] = 'Tambah data admin';
            $this->load->view('template/templateAdmin/headerAdmin', $data, $dt);
            $this->load->view('content/adminContent/addAdminView', $dt);
            $this->load->view('template/templateAdmin/footerAdmin');
        } else {
            redirect('auth');
        }
    }

    public function save()
    {
        $nama               = $this->input->post('nama');
        $username           = $this->input->post('username');
        $email              = $this->input->post('email');
        $no_telp            = $this->input->post('no_telp');
        $gender             = $this->input->post('gender');
        $password           = $this->input->post('password');
        $password2          = $this->input->post('confPassword');

        $this->form_validation->set_rules('nama', 'nama', 'trim|required', ['required'   => 'Nama tidak boleh kosong!']);
        $this->form_validation->set_rules('username', 'username', 'trim|required|alpha', [
            'required'   => 'Username tidak boleh kosong!',
            'alpha'   => 'Isi hanya dengan huruf!',
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', [
            'required'   => 'Email tidak boleh kosong!',
            'valid_email'   => 'Masukan email yang valid!',
            'is_unique'     => 'Email sudah terdaftar, gunakan email lain!'
        ]);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required|min_length[8]|max_length[13]|numeric', [
            'numeric'    => 'Isi No telphone dengan angka!',
            'required'   => 'Nomer Telphone tidak boleh kosong!',
            'min_length'    => 'Masukan minimal 8 angka!',
            'max_length'    => 'Masukan maksimal 13 angka!'
        ]);
        $this->form_validation->set_rules('gender', 'gender', 'required', ['required'   => 'Jenis Kelamin tidak boleh kosong!']);
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|max_length[16]|matches[confPassword]', [
            'matches'    => 'Password konfirmasi salah!',
            'min_length' => 'minimal password 8 karakter!',
            'max_length' => 'maksimal password 16 karakter!',
            'required'   => 'kolom password tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('confPassword', 'confPassword', 'trim|required|min_length[8]|max_length[16]|matches[password]', ['required'   => 'Konfirmasi password tidak boleh kosong!']);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('users', ['username' =>
            $this->session->userdata('username')])->row_array();

            if (!empty($data['user'])) {
                $dt['title'] = 'Tambah data admin';
                $this->load->view('template/templateAdmin/headerAdmin', $data, $dt);
                $this->load->view('content/adminContent/addAdminView', $dt);
                $this->load->view('template/templateAdmin/footerAdmin');
            } else {
                redirect('auth');
            }
        } else {
            $data = array(
                'nama'          => $nama,
                'username'      => $username,
                'email'         => $email,
                'no_telp'       => $no_telp,
                'level'         => 'admin',
                'alamat'        => 'PT.purple',
                'gender'        => $gender,
                'password'      => $password,
                //password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'       => 1,
                'image'        => 'default.png',
                'is_active'     => 1,
                'date_created'  => time()
            );
            $this->ModelAuth->input_data($data, 'users');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Akun baru berhasil di tambahkan.</div>');
            redirect('DataAdmin/');
        }
    }

    public function ordered()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['order'] = $this->ModelTransaksi->get_transaksi_data();
        // var_dump($data['order']);
        $data['title'] = 'Halaman Ordered';
        // die;
        if (!empty($data['user'])) {
            $this->load->view('template/templateAdmin/headerAdmin', $data);
            $this->load->view('content/adminContent/orderedView', $data);
            $this->load->view('template/templateAdmin/footerAdmin');
        } else {
            redirect('auth');
        }
    }
    public function print()
    {
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['order'] = $this->ModelTransaksi->get_transaksi_data();
        // var_dump($data['order']);
        // die;
        if (!empty($data['user'])) {
            $dt['title'] = 'Dashboard admin';
            $this->load->view('content/reportData/reportPenjualan', $data, $dt);
        } else {
            redirect('auth');
        }
    }
}
