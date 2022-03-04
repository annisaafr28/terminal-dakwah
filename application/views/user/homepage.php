<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="<?= base_url('assets/template/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/template/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <table class="table">
                    <tr>
                        <td>
                            <!-- <select name="tanggal_kajian" id="tanggal_kajian" class="form-control">
                                <option value="">Show All</option>
                                <?php foreach ($jadwal_kajian as $kj) : ?>
                                    <option value="<?= $kj->tanggal ?>"><?= $kj->tanggal ?></option>
                                <?php endforeach ?>
                            </select> -->
                            <input type="date" id="tanggal_kajian" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-md-9">
                <table class="table table-hover table-striped table-hover" id="result_kajian">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Masjid</th>
                            <th>Ustad</th>
                            <th>Kajian</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Keterangan</th>
                            <th>Flyer Kajian</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/template/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            $("#tanggal_kajian").change(function() {
                // let a = $(this).val();
                // console.log(a);
                jadwal_kajian()
            })
        })

        function jadwal_kajian() {
            var tanggal_kajian = $("#tanggal_kajian").val();
            $.ajax({
                url: "<?= base_url('Homepage/load_kajian') ?>",
                data: "tanggal=" + tanggal_kajian,
                success: function(data){
                    // $("#result_kajian tbody").html('<tr><td colspan="8" align="center">Tidak ada data</td></tr>')
                    console.log(data);
                    $("#result_kajian tbody").html(data);
                }
            })
        }
    </script>

</body>

</html>