<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
    }

    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->inventory_model->cek_login($username, $password);

            if ($cek == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('auth');
            } else {
                $this->session->set_userdata('role', $cek->role);
                $this->session->set_userdata('no_telp', $cek->no_telp);
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('foto', $cek->foto);
                switch ($cek->role) {
                    case 'admin':
                        redirect('admin/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => '%s harus diisi !!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => '%s harus diisi !!'
        ]);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Berhasil Logout!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('auth');
    }
}

/* End of file Auth.php */
