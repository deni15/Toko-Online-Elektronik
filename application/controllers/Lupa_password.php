<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupa_password extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Account');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
    }
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Lupa password';
            $this->load->view('v_lupa_password', $data);
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->M_Account->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">email salah silahkan coba lagi</div>');
                redirect(site_url('Auth'), 'refresh');
            }

            //build token   

            $token = $this->M_Account->insertToken($userInfo->id);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . '/lupa_password/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';

            $message = '';
            $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.</strong><br>';
            $message .= '<strong>Silakan klik link ini:</strong> ' . $link;

            echo $message; //send this through mail  
            exit;
        }
    }

    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->M_Account->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">token tidak valid atau kadaluarsa</div>');
            redirect(site_url('Auth'), 'refresh');
        }

        $data = array(
            'title' => 'lupa password',
            'nama' => $user_info->nama,
            'email' => $user_info->email,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_reset_password', $data);
        } else {

            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = $cleanPost['password'];
            $cleanPost['password'] = $hashed;
            $cleanPost['id'] = $user_info->id;
            unset($cleanPost['passconf']);
            if (!$this->M_Account->updatePassword($cleanPost)) {
                $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">update password gagal</div>');
            } else {
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">password anda berhasil di perbarui.</div>');
            }
            redirect(site_url('Auth'), 'refresh');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
