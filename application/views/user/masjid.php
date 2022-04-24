<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Terminal Dakwah</title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/template/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/template/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/template/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav">
                        <div class="container">
                            <a class="navbar-brand" href="<?= base_url() ?>"><i class="fas fa-mosque"></i></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <!-- <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a> -->
                                    <a class="nav-link" href="<?= base_url('homepage/masjid') ?>">Masjid</a>
                                    <a class="nav-link" href="<?= base_url('ustad') ?>">Ustad</a>
                                </div>
                            </div>
                        </div>
                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800 text-center">Selamat Datang Di Website Terminal Dakwah</h1>
                    <h5 class="mb-4 text-gray-800 text-center">Cari Jadwal Masjid Dibawah Ini</h5>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <select name="" style="width: 100%;" id="idMasjid" class="form-control select2">
                                    <option value="">Pilih Masjid</option>
                                    <?php foreach ($masjid as $u) : ?>
                                        <option value="<?= $u->id_masjid ?>"><?= $u->nama_masjid ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="month" id="bulan" class="form-control mb-3">
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 id="nameMasjid" class="text-gray-800 text-center">Hasil Pencarian</h5>
                                <br>
                                <div class="text-center">
                                    <img style="display: none;" id="imgMasjid" src="" width="160px" height="160px">
                                </div>
                                <br>
                                <h5 style="display: none;" id="alamat" class="text-gray-800 text-center"></h5>
                                <div class="text-center">
                                    <a style="display: none;" id="umap" href="" target="_blank">(Klik maps)</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive" id="allo">
                                    <table class="table table-bordered" id="result_kajian" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Ustad</th>
                                                <th>Kajian</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>URL Maps</th>
                                                <th>Keterangan</th>
                                                <th>Flyer Kajian</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Terminal Dakwah Apps 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/template/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/template/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/template/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/template/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/template/') ?>js/demo/datatables-demo.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            //table = $('#result_kajian').DataTable();
            $("#idMasjid").change(function() {
                $("#nameMasjid").html("Hasil Pencarian");
                $("#imgMasjid").fadeOut();
                $("#umap").fadeOut();
                $("#alamat").fadeOut();
                if ($("#idMasjid").val() && $("#bulan").val()) {
                    jadwal_masjid();
                }
            })
            $("#bulan").change(function() {
                $("#nameMasjid").html("Hasil Pencarian");
                $("#imgMasjid").fadeOut();
                $("#umap").fadeOut();
                $("#alamat").fadeOut();
                if ($("#idMasjid").val() && $("#bulan").val()) {
                    jadwal_masjid();
                }
            })

            function jadwal_masjid() {
                var idMasjid = $("#idMasjid").val();
                var bulan = $("#bulan").val();
                $.ajax({
                    url: "<?= base_url('Homepage/load_masjid') ?>",
                    data: {
                        "id_masjid": idMasjid,
                        "bulan": bulan
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        // $("#result_kajian tbody").html('<tr><td colspan="8" align="center">Tidak ada data</td></tr>')
                        // $("#result_kajian tbody").html(data);
                        // if ($("#idMasjid").val() && $("#fotoMasjid").val()) {
                        //     $("#imgMasjid").attr("src", $("#fotoMasjid").val());
                        //     $("#imgMasjid").fadeIn();
                        //     $("#nameMasjid").html("Hasil Pencarian Masjid " + $("#nMasjid").val());
                        //     $("#alamat").html($("#aMasjid").val());
                        //     $("#alamat").fadeIn();
                        //     $("#umap").attr("href", $("#urlMasjid").val());
                        //     $("#umap").fadeIn();
                        // }
                        var html = '';
                        var i, u = 0;
                        var baseurl = '<?php echo base_url('assets/foto/') ?>';
                        for (i = 0; i < data.length; i++) {
                            u++;
                            html += '<tr>' +
                                '<td>' + u + '</td>' +
                                '<td>' + data[i].nama_ustad + '</td>' +
                                '<td>' + data[i].judul_kajian + '</td>' +
                                '<td>' + data[i].tanggal + '</td>' +
                                '<td>' + data[i].waktu + '</td>' +
                                '<td>' + data[i].alamat + '</br><a href="' + data[i].url_maps + '" target="_blank">(Klik maps)</a></td>' +
                                '<td>' + data[i].keterangan + '</td>' +
                                '<td><img src="' + baseurl + data[i].flyer_kajian + '" width="80px" height="80px"></td>' +
                                '</tr>';
                        }
                        $('#tbody').html(html);
                        if ($("#idMasjid").val()) {
                            $("#imgMasjid").attr("src", baseurl + data[0].foto);
                            $("#imgMasjid").fadeIn();
                            $("#nameMasjid").html("Hasil Pencarian Masjid " + data[0].nama_masjid);
                            $("#alamat").html( data[0].alamat);
                            $("#alamat").fadeIn();
                            $("#umap").attr("href", data[0].url_maps);
                            $("#umap").fadeIn();
                        }
                    },
                });

            }
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        })
    </script>

</body>

</html>