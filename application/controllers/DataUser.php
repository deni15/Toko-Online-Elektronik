<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller
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
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $dtt['users'] = $this->ModelAuth->dataUser();

        if (!empty($data['user'])) {
            $data['title'] = 'User data';
            $this->load->view('template/templateAdmin/headerAdmin', $data);
            $this->load->view('content/userContent/dataUserView', $dtt);
            $this->load->view('template/templateAdmin/footerAdmin');
        } else {
            redirect('auth');
        }
    }
}
