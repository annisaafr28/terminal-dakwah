<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ustad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');

        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda belum login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Ustad';
        $data['ustad'] = $this->inventory_model->get_data('ustad')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/ustad/ustad', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Ustad';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/ustad/tambah_ustad');
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
                'nama_ustad'    => $this->input->post('nama_ustad'),
                'alamat_ustad'  => $this->input->post('alamat_ustad'),
                'no_hp'         => $this->input->post('no_hp'),
                'foto'          => $foto
            );

            $this->inventory_model->insert_data($data, 'ustad');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/ustad');
        }
    }

    public function edit_data($id)
    {
        $data['title'] = 'Edit Data';
        $data['ustad'] = $this->db->query("SELECT * FROM ustad WHERE id_ustad='$id'")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/ustad/edit_ustad', $data);
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

                if($this->upload->do_upload('foto')){
                    $foto = $this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_ustad'    => $this->input->post('nama_ustad'),
                'alamat_ustad'  => $this->input->post('alamat_ustad'),
                'no_hp'         => $this->input->post('no_hp'),
            );

            $where = array(
                'id_ustad' => $this->input->post('id_ustad'),
            );

            $this->inventory_model->update_data('ustad', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/ustad');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_ustad', 'Nama Ustad', 'required');
        $this->form_validation->set_rules('alamat_ustad', 'Alamat Ustad', 'required');
        $this->form_validation->set_rules('no_hp', 'No Telp', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_ustad' => $id);

        $this->inventory_model->delete_data($where, 'ustad');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/ustad');
    }
}

/* End of file Barang.php */
