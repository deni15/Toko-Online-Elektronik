<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->load->model('ModelAuth');
        $this->load->library('session');
    }

    public function index()
    {
        //$username               = $this->input->post('username');
        //$password               = $this->input->post('password');

        $this->form_validation->set_rules('username', 'username', 'trim|required|alpha', [
            'required'   => 'username tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'matches'    => 'Password konfirmasi salah!',
            'min_length' => 'minimal password 8 karakter!',
            'max_length' => 'maksimal password 16 karakter!',
            'required'   => 'password tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('template/templateAuth/headerAuth', $data);
            $this->load->view('Auth/login');
            $this->load->view('template/templateAuth/footerAuth');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        if ($user) {
            // user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if ($password == $user['password']) {
                    if ($user['role_id'] == 1) {
                        //masuk admin
                        $data = [
                            'username'     =>  $user['username'],
                            'role_id'      =>   $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('Admin/');
                    } else {
                        //masuk ke user
                        $data = [
                            'id'            => $user['id'],
                            'username'     =>  $user['username'],
                            'role_id'      =>   $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('User/');
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">username atau password salah</div>');
                    redirect('Auth/');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Akun belum di aktivasi</div>');
                redirect('Auth/');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">username atau password salah!</div>');
            redirect('Auth/');
        }
    }

    public function register()
    {
        $nama               = $this->input->post('nama');
        $username           = $this->input->post('username');
        $email              = $this->input->post('email');
        $no_telp            = $this->input->post('no_telp');
        $alamat             = $this->input->post('alamat');
        $gender             = $this->input->post('gender');
        $level              = $this->input->post('level');
        $password           = $this->input->post('password');
        $password2          = $this->input->post('confPassword');

        $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
            'required'   => 'kolom nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('username', 'username', 'trim|required|alpha', [
            'alpha' => 'isi username hanya dengan huruf!',
            'required'   => 'kolom username tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', [
            'valid_email' => 'email tidak valid!',
            'is_unique' => 'email sudah terdaftar, gunakan email lain!',
            'required'   => 'kolom email tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required|min_length[8]|max_length[13]|numeric', [
            'numeric'    => 'No Telphone hanya diisi dengan angka!',
            'min_length' => 'minimal No telphone 8 karakter!',
            'max_length' => 'maksimal No telphone 13 karakter!',
            'required'   => 'kolom No telphone tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
            'required'   => 'kolom alamat tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('gender', 'gender', 'required', [
            'required'   => 'kolom gender tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('level', 'level', 'trim|required', [
            'required'   => 'kolom level tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|max_length[16]|matches[confPassword]', [
            'matches'    => 'Password konfirmasi salah!',
            'min_length' => 'minimal password 8 karakter!',
            'max_length' => 'maksimal password 16 karakter!',
            'required'   => 'kolom password tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('confPassword', 'confPassword', 'trim|required|min_length[8]|max_length[16]|matches[password]', [
            'matches'   => 'password konfirmasi salah!!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Registration';
            $this->load->view('template/templateAuth/headerAuth', $data);
            $this->load->view('Auth/registration');
            $this->load->view('template/templateAuth/footerAuth');
        } else {
            $data = array(
                'nama'          => $nama,
                'username'      => $username,
                'email'         => $email,
                'no_telp'       => $no_telp,
                'level'         => $level,
                'alamat'        => $alamat,
                'gender'        => $gender,
                'password'      => $password,
                //password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'       => 2,
                'image'        => 'default.png',
                'is_active'     => 1,
                'date_created'  => time()
            );
            $this->ModelAuth->input_data($data, 'users');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Akun telah terdaftar, silahkan login.</div>');
            redirect('Auth/');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Kamu berhasil logged out!</div>');
        redirect('Auth/');
    }
}
