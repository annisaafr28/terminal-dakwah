<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Masjid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
        $CI = &get_instance();
        $username = $CI->session->username;

        if ($username == NULL) {
            $CI->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Masjid';
        $data['masjid'] = $this->inventory_model->get_data('masjid')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/masjid/masjid', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Masjid';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/masjid/tambah_masjid');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo 'Upload Gagal!';
                    die();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_masjid'   => $this->input->post('nama_masjid'),
                'alamat'        => $this->input->post('alamat'),
                'url_maps'      => $this->input->post('url_maps'),
                'foto'          => $foto
            );

            $this->inventory_model->insert_data($data, 'masjid');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/masjid');
        }
    }

    public function edit_data($id)
    {
        $data['title'] = 'Edit Masjid';
        $data['masjid'] = $this->db->query("SELECT * FROM masjid WHERE id_masjid='$id'")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/masjid/edit_masjid', $data);
        $this->load->view('templates/footer');
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|png|gif';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_masjid'   => $this->input->post('nama_masjid'),
                'alamat'        => $this->input->post('alamat'),
                'url_maps'      => $this->input->post('url_maps'),
            );

            $where = array(
                'id_masjid' => $this->input->post('id_masjid'),
            );

            $this->inventory_model->update_data('masjid', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/masjid');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_masjid', 'Nama Masjid', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('url_maps', 'URL Maps', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_masjid' => $id);

        $this->inventory_model->delete_data($where, 'masjid');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/masjid');
    }
}

/* End of file Masjid.php */
