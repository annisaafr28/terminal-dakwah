<?= $this->session->flashdata('pesan') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/jadwal_kajian/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Masjid</th>
                        <th>Nama Ustad</th>
                        <th>Kajian</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Keterangan</th>
                        <th>Flyer Kajian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($jadwal_kajian as $jk) : ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $jk->nama_masjid ?></td>
                            <td><?= $jk->nama_ustad ?></td>
                            <td><?= $jk->judul_kajian ?></td>
                            <td><?= $jk->tanggal ?></td>
                            <td><?= $jk->waktu ?></td>
                            <td><?= $jk->keterangan ?></td>
                            <td><img src="<?= base_url('assets/foto/' . $jk->flyer_kajian) ?>" width="80px" height="60px"></td>
                            <td>
                                <a href="<?= base_url('admin/jadwal_kajian/edit_data/' . $jk->id_jadwal_kajian) ?>" class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/jadwal_kajian/delete_data/' . $jk->id_jadwal_kajian) ?>" class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin mengahpus data ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>