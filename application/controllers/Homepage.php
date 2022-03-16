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
        $data = $this->db->select('*')
                         ->from('jadwal_kajian jk')
                         ->join('masjid m', 'jk.id_masjid = m.id_masjid', 'left')
                         ->join('ustad u', 'jk.id_ustad = u.id_ustad', 'left')
                         ->join('kajian k', 'jk.id_kajian = k.id_kajian', 'left')
                         ->where('tanggal', $tanggal)
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
                    <td><?= $jk->nama_ustad ?></td>
                    <td><?= $jk->judul_kajian ?></td>
                    <td><?= $jk->tanggal ?></td>
                    <td><?= $jk->waktu ?></td>
                    <td><?= $jk->keterangan ?></td>
                    <td><img src="<?= base_url('assets/foto/' . $jk->flyer_kajian) ?>" width="80px" height="60px"></td>
                </tr>
            <?php }
        }
    }
    public function masjid()
    {
        $data['masjid'] = $this->inventory_model->get_data('masjid')->result();
        $this->load->view('user/masjid', $data);
    }
    public function load_masjid()
    {
        $id_masjid = $_GET['id_masjid'];
        $data = $this->db->select('jk.*, u.nama_ustad, m.*, k.*')
                         ->from('jadwal_kajian jk')
                         ->join('masjid m', 'jk.id_masjid = m.id_masjid', 'left')
                         ->join('ustad u', 'jk.id_ustad = u.id_ustad', 'left')
                         ->join('kajian k', 'jk.id_kajian = k.id_kajian', 'left')
                         ->where('jk.id_masjid', $id_masjid)
                         ->get()->result();
        if(!$data){ ?>
            <tr>
                    <td colspan="8" class="text-center">Data Kosong</td>
            </tr>
        <?php }else{
            $no = 1; foreach ($data as $jk) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td id="nMasjid"><?= $jk->nama_masjid ?></td>
                    <td><?= $jk->nama_ustad ?></td>
                    <td><?= $jk->judul_kajian ?></td>
                    <td><?= $jk->tanggal ?></td>
                    <td><?= $jk->waktu ?></td>
                    <td><?= $jk->keterangan ?></td>
                    <td><img src="<?= base_url('assets/foto/' . $jk->flyer_kajian) ?>" width="80px" height="60px"></td>
                </tr>
                <input type="hidden" id="fotoMasjid" value="<?= base_url('assets/foto/' . $jk->foto) ?>" >
            <?php }
        }
    }
}

/* End of file Homepage.php */
