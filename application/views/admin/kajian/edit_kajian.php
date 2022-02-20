<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/kajian') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <?php foreach ($kajian as $k) : ?>
            <form action="<?= base_url('admin/kajian/edit_aksi') ?>" method="POST">
                <div class="form-group">
                    <label>Judul Kajian</label>
                    <input type="hidden" name="id_kajian" value="<?= $k->id_kajian ?>">
                    <input type="text" name="judul_kajian" class="form-control" value="<?= $k->judul_kajian ?>">
                    <?= form_error('judul_kajian', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
            </form>
        <?php endforeach ?>
    </div>
</div>