$no = 1; foreach ($data as $jk) : ?>
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
        <?php endforeach ?> <?php