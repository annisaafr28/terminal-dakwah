<?= $this->session->flashdata('pesan') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/masjid/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Masjid</th>
                        <th>Alamat</th>
                        <th>URL Maps</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($masjid as $m) : ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $m->nama_masjid ?></td>
                            <td><?= $m->alamat ?></td>
                            <td><?= $m->url_maps ?></td>
                            <td><img src="<?= base_url('assets/foto/' . $m->foto) ?>" width="80px" height="60px"></td>
                            <td>
                                <a href="<?= base_url('admin/masjid/edit_data/' . $m->id_masjid) ?>" class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/masjid/delete_data/' . $m->id_masjid) ?>" class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin mengahpus data ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>