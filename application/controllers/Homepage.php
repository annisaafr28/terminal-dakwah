<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
    }

    public function index()
    {
        $data['jadwal_kajian'] = $this->inventory_model->get_jk('jadwal_kajian')->result();
        $this->load->view('user/homepage', $data);
    }

    // adding new fitur
    public function load_kajian()
    {
        $tanggal = $_GET['tanggal'];
        $data = $this->db->get_where('jadwal_kajian', ['tanggal' => $tanggal])->result();
        $no = 1; foreach ($data as $jk) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $jk->id_masjid ?></td>
                <td><?= $jk->id_ustad ?></td>
                <td><?= $jk->id_kajian ?></td>
                <td><?= $jk->tanggal ?></td>
                <td><?= $jk->waktu ?></td>
                <td><?= $jk->keterangan ?></td>
                <td><?= $jk->flyer_kajian ?></td>
            </tr>
        <?php endforeach ?> <?php
    }
}

/* End of file Homepage.php */
