<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['jadwal_kajian'] = $this->inventory_model->get_data('jadwal_kajian')->num_rows();
        $data['kajian'] = $this->inventory_model->get_data('kajian')->num_rows();
        $data['masjid'] = $this->inventory_model->get_data('masjid')->num_rows();
        $data['ustad'] = $this->inventory_model->get_data('ustad')->num_rows();
        $data['user'] = $this->inventory_model->get_data('user')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Dashboard.php */
