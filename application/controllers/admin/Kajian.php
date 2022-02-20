<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kajian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
    }

    public function index()
    {
        $data['title'] = 'Kajian';
        $data['kajian'] = $this->inventory_model->get_data('kajian')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kajian/kajian', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kajian';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kajian/tambah_kajian');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'judul_kajian'    => $this->input->post('judul_kajian'),
            );

            $this->inventory_model->insert_data($data, 'kajian');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/kajian');
        }
    }

    public function edit_data($id)
    {
        $data['title'] = 'Edit Kajian';
        $data['kajian'] = $this->db->query("SELECT * FROM kajian WHERE id_kajian='$id'")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kajian/edit_kajian', $data);
        $this->load->view('templates/footer');
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'judul_kajian'    => $this->input->post('judul_kajian'),
            );

            $where = array(
                'id_kajian' => $this->input->post('id_kajian'),
            );

            $this->inventory_model->update_data('kajian', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/kajian');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul_kajian', 'Judul Kajian', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_kajian' => $id);

        $this->inventory_model->delete_data($where, 'kajian');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/kajian');
    }
}

/* End of file Kajian.php */
