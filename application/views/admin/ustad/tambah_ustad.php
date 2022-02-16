<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/ustad') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <form action="<?= base_url('admin/ustad/tambah_aksi') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Ustad</label>
                <input type="text" name="nama_ustad" class="form-control">
                <?= form_error('nama_ustad', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Alamat Ustad</label>
                <textarea name="alamat_ustad" class="form-control"></textarea>
                <?= form_error('alamat_ustad', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>No Telp</label>
                <input type="text" name="no_hp" class="form-control">
                <?= form_error('no_hp', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
        </form>
    </div>
</div>