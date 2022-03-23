<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ustad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
    }

    public function index()
    {
        $data['ustad'] = $this->inventory_model->get_data('ustad')->result();
        $this->load->view('user/ustad', $data);
    }

    public function load_ustad()
    {
        $ustad = $_GET['id_ustad'];
        $bulan = $_GET['bulan'];
        $data = $this->db->select('*')
                         ->from('jadwal_kajian jk')
                         ->join('masjid m', 'jk.id_masjid = m.id_masjid', 'left')
                         ->join('ustad u', 'jk.id_ustad = u.id_ustad', 'left')
                         ->join('kajian k', 'jk.id_kajian = k.id_kajian', 'left')
                         ->where('jk.id_ustad', $ustad)
                         ->where('jk.tanggal LIKE', $bulan."%")
                         ->get()->result();
        if(!$data){ ?>
            <tr>
                <td colspan="8" class="text-center">Data Kosong</td>
            </tr>
        <?php }else{
        $no = 1; foreach ($data as $jk) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $jk->nama_masjid ?></td>
                <td id="nUstad"><?= $jk->nama_ustad ?></td>
                <td><?= $jk->judul_kajian ?></td>
                <td><?= $jk->tanggal ?></td>
                <td><?= $jk->waktu ?></td>
                <td><?= $jk->keterangan ?></td>
                <td><img src="<?= base_url('assets/foto/' . $jk->flyer_kajian) ?>" width="80px" height="80px"></td>
            </tr>
            <input type="hidden" id="fotoUstad" value="<?= base_url('assets/foto/' . $jk->foto) ?>" >
            <?php }
        }
    }
}
