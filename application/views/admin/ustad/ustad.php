<?= $this->session->flashdata('pesan') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/ustad/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Ustad</th>
                        <th>Alamat Ustad</th>
                        <th>No Telpon</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($ustad as $u) : ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $u->nama_ustad ?></td>
                            <td><?= $u->alamat_ustad ?></td>
                            <td><?= $u->no_hp ?></td>
                            <td><img src="<?= base_url('assets/foto/' . $u->foto) ?>" width="80px" height="80px"></td>
                            <td>
                                <a href="<?= base_url('admin/ustad/edit_data/' . $u->id_ustad) ?>" class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/ustad/delete_data/' . $u->id_ustad) ?>" class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin mengahpus data ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>