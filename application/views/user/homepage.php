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
                    <h5 class="mb-4 text-gray-800 text-center">Cari Jadwal Dibawah Ini</h5>

                    <div class="container">
                        <div class="table-responsive">
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

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="text-gray-800 text-center">Hasil Pencarian</h5>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="result_kajian" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
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
                success: function(data) {
                    // $("#result_kajian tbody").html('<tr><td colspan="8" align="center">Tidak ada data</td></tr>')
                    // console.log(data);
                    $("#result_kajian tbody").html(data);
                    $(".table").dataTable();
                }
            })
            $(".table").dataTable();
        }
    </script>

</body>

</html>