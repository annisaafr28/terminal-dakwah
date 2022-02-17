<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/masjid') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <form action="<?= base_url('admin/masjid/tambah_aksi') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Masjid</label>
                <input type="text" name="nama_masjid" class="form-control">
                <?= form_error('nama_masjid', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
                <?= form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>URL Maps</label>
                <input type="text" name="url_maps" class="form-control">
                <?= form_error('url_maps', '<div class="text-small text-danger">', '</div>') ?>
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