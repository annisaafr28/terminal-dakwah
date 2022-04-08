<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/jadwal_kajian') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <form action="<?= base_url('admin/jadwal_kajian/tambah_aksi') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Masjid</label>
                <select name="id_masjid" style="width: 100%;" class="form-control select2">
                    <option value="">-- Pilih Masjid --</option>
                    <?php foreach ($masjid as $m) : ?>
                        <option value="<?= $m->id_masjid ?>"><?= $m->nama_masjid ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('id_masjid', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Nama Ustad</label>
                <select  name="id_ustad" style="width: 100%;" class="form-control select2">
                    <option value="">-- Pilih Ustad --</option>
                    <?php foreach ($ustad as $u) : ?>
                        <option value="<?= $u->id_ustad ?>"><?= $u->nama_ustad ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('id_ustad', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Kajian</label>
                <select name="id_kajian" style="width: 100%;" class="form-control select2">
                    <option value="">-- Pilih kajian --</option>
                    <?php foreach ($kajian as $k) : ?>
                        <option value="<?= $k->id_kajian ?>"><?= $k->judul_kajian ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('id_kajian', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control">
                <?= form_error('tanggal', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Waktu</label>
                <input type="time" name="waktu" class="form-control">
                <?= form_error('waktu', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
                <?= form_error('keterangan', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Flyer Kajian</label>
                <input type="file" name="flyer_kajian" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
        </form>
    </div>
</div>