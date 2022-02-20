<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/kajian') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <form action="<?= base_url('admin/kajian/tambah_aksi') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Kajian</label>
                <input type="text" name="judul_kajian" class="form-control">
                <?= form_error('judul_kajian', '<div class="text-small text-danger">', '</div>') ?>
            </div>

            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
        </form>
    </div>
</div>