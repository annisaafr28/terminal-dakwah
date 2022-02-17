<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_kajian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
    }

    public function index()
    {
        $data['title'] = 'Jadwal Kajian';
        $data['jadwal_kajian'] = $this->inventory_model->get_jk('jadwal_kajian')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/jadwal_kajian/jadwal_kajian', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Jadwal_kajian.php */
