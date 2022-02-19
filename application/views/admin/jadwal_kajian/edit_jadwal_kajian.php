<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/jadwal_kajian') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <?php foreach ($jadwal_kajian as $jk) : ?>
            <form action="<?= base_url('admin/jadwal_kajian/edit_aksi') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Masjid</label>
                    <input type="hidden" name="id_jadwal_kajian" value="<?= $jk->id_jadwal_kajian ?>">
                    <select name="id_masjid" class="form-control">
                        <option value="<?= $jk->id_masjid ?>"><?= $jk->id_masjid ?></option>
                        <?php foreach ($masjid as $m) : ?>
                            <option value="<?= $m->id_masjid ?>"><?= $m->nama_masjid ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_masjid', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Nama Ustad</label>
                    <select name="id_ustad" class="form-control">
                        <option value="<?= $jk->id_ustad ?>"><?= $jk->id_ustad ?></option>
                        <?php foreach ($ustad as $u) : ?>
                            <option value="<?= $u->id_ustad ?>"><?= $u->nama_ustad ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_ustad', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Kajian</label>
                    <select name="id_kajian" class="form-control">
                        <option value="<?= $jk->id_kajian ?>"><?= $jk->id_kajian ?></option>
                        <?php foreach ($kajian as $k) : ?>
                            <option value="<?= $k->id_kajian ?>"><?= $k->judul_kajian ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_kajian', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= $jk->tanggal ?>">
                    <?= form_error('tanggal', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Waktu</label>
                    <input type="time" name="waktu" class="form-control" value="<?= $jk->waktu ?>">
                    <?= form_error('waktu', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?= $jk->keterangan ?>">
                    <?= form_error('keterangan', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Flyer Kajian</label>
                    <img src="<?= base_url('assets/foto/' . $jk->flyer_kajian) ?>" width="80px" height="60px">
                    <input type="file" name="flyer_kajian" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
            </form>
        <?php endforeach ?>
    </div>
</div>