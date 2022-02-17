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

    public function tambah()
    {
        $data['title'] = 'Tambah Jadwal Kajian';
        $data['masjid'] = $this->inventory_model->get_data('masjid')->result();
        $data['ustad'] = $this->inventory_model->get_data('ustad')->result();
        $data['kajian'] = $this->inventory_model->get_data('kajian')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/jadwal_kajian/tambah_jadwal_kajian', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'id_masjid'   => $this->input->post('id_masjid'),
                'id_ustad'        => $this->input->post('id_ustad'),
                'id_kajian'        => $this->input->post('id_kajian'),
                'tanggal'      => $this->input->post('tanggal'),
                'waktu'      => $this->input->post('waktu'),
                'keterangan'      => $this->input->post('keterangan'),
                'flyer_kajian'      => $this->input->post('flyer_kajian'),
            );

            $this->inventory_model->insert_data($data, 'jadwal_kajian');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/jadwal_kajian');
        }
    }

    public function edit_data($id)
    {
        $data['title'] = 'Edit Jadwal Kajian';
        $data['jadwal_kajian'] = $this->db->query("SELECT * FROM jadwal_kajian WHERE id_jadwal_kajian='$id'")->result();
        $data['masjid'] = $this->inventory_model->get_data('masjid')->result();
        $data['ustad'] = $this->inventory_model->get_data('ustad')->result();
        $data['kajian'] = $this->inventory_model->get_data('kajian')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/jadwal_kajian/edit_jadwal_kajian', $data);
        $this->load->view('templates/footer');
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'id_masjid'   => $this->input->post('id_masjid'),
                'id_ustad'        => $this->input->post('id_ustad'),
                'id_kajian'        => $this->input->post('id_kajian'),
                'tanggal'      => $this->input->post('tanggal'),
                'waktu'      => $this->input->post('waktu'),
                'keterangan'      => $this->input->post('keterangan'),
                'flyer_kajian'      => $this->input->post('flyer_kajian'),
            );

            $where = array(
                'id_jadwal_kajian' => $this->input->post('id_jadwal_kajian'),
            );

            $this->inventory_model->update_data('jadwal_kajian', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/jadwal_kajian');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_masjid', 'Nama Masjid', 'required');
        $this->form_validation->set_rules('id_ustad', 'Nama Ustad', 'required');
        $this->form_validation->set_rules('id_kajian', 'Judul Kajian', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('flyer_kajian', 'Flyer Kajian', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_jadwal_kajian' => $id);

        $this->inventory_model->delete_data($where, 'jadwal_kajian');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/jadwal_kajian');
    }
}

/* End of file Jadwal_kajian.php */
