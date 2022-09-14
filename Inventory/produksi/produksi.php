<!DOCTYPE html>
<?php
include '../../database.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DCB - Inventory</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">DCB - Inventory </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Cold storage</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="../cold storage/importir.php">Importir</a>
                        <a class="collapse-item" href="../cold storage/merek.php">Merek</a>
                        <a class="collapse-item" href="../cold storage/jenis_daging.php">Jenis daging</a>
                        <a class="collapse-item" href="../cold storage/data_barang.php">Data barang</a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Produksi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="produksi.php">Data produksi</a>
                        <a class="collapse-item" href="jenis_produksi.php">Jenis produksi</a>
                    </div>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="../freezer/freezer_storage.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Freezer storage</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>




                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../../assets/img/static/avatar1.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../forogotpassword.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Ubah Password
                                </a>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Produksi</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data produksi</h6>
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Produksi</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Operator</th>
                                            <th>Tanggal</th>
                                            <th>Importir</th>
                                            <th>Merek</th>
                                            <th>Jenis Daging</th>
                                            <th>Qty</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT * FROM tempcoldstorage";
                                    $result = mysqli_query($db, $sql);
                                    $no = 1;
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $no . "</td>";
                                            echo "<td><img src='../../assets/img/produksi/" . $row['foto'] . "' width='100px' height='100px'></td>";
                                            echo "<td>" . $row['operator'] . "</td>";
                                            echo "<td>" . $row['tanggalwaktu'] . "</td>";
                                            echo "<td>" . $row['importir'] . "</td>";
                                            echo "<td>" . $row['merek'] . "</td>";
                                            echo "<td>" . $row['jenisdaging'] . "</td>";
                                            echo "<td>" . $row['qty'] . " Kg</td>";

                                            if ($row['status'] == 0) {
                                                echo "<td>Dalam Produksi</td>";
                                            } elseif ($row['status'] == 1) {
                                                echo "<td>Menunggu Hasil Produksi</td>";
                                            } else {
                                                echo "<td>Produksi Selesai</td>";
                                            }

                                            if ($row['status'] == 0) {
                                                echo "<td class='d-flex flex-row'><a href='produksiselesai.php?id=" . $row['id'] . "' class='btn btn-primary btn-icon-split btn-sm mr-2'>
                                                    <span class='icon text-white-50'>
                                                        <i class='fas fa-check'></i>
                                                    </span>
                                                    <span class='text'>Selesai</span>
                                                    </a>
                                                    <a href='deleteproduksi.php?id=" . $row['id'] . "' class='btn btn-danger btn-icon-split btn-sm'>
                                                    <span class='icon text-white-50'>
                                                        <i class='fas fa-trash'></i>
                                                    </span>
                                                    <span class='text'>Hapus</span>
                                                    </a></td>";
                                            } elseif ($row['status'] == 1) {
                                                echo "<td><a href='inputhasilproduksi.php?id=" . $row['id'] . "' class='btn btn-success btn-icon-split btn-sm'>
                                                    <span class='icon text-white-50'>
                                                        <i class='fas fa-plus'></i>
                                                    </span>
                                                    <span class='text'>Input Hasil</span>
                                                    </a>
                                                    </td>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<td><a href='detailhasilproduksi.php?id=" . $row['id'] . "' class='btn btn-warning btn-icon-split btn-sm'>
                                                    <span class='icon text-white-50'>
                                                        <i class='fas fa-eye'></i>
                                                    </span>
                                                    <span class='text'>Lihat Detail</span>
                                                    </a>
                                                    </td>";
                                            }
                                            $no++;
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                    ?>
                                </table>



                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="harkovnet.manhost.my.id">powered by HARKOVNET</a></span>
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Produksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="inputproduksi.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Pilih Produksi</label>
                                <select id='myselect form-control' name="coldstorage">
                                    <?php
                                    //create option based on table datacoldstorage, option value is id and option text is importir, merek, jenisdaging, qty
                                    $sql = "SELECT * FROM datacoldstorage";
                                    $result = mysqli_query($db, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        //put each row in ()
                                        echo "<option value='" . $row['id'] . "'> (" . $row['importir'] . ") (" . $row['merek'] . ") (" . $row['jenisdaging'] . ") (" . $row['qty'] . "Kg)</option>";
                                    }

                                    ?>


                                </select>
                            </div>

                            <div class="form-group">
                                <label>Masukkan Foto Saat Produksi</label>
                                <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../js/demo/datatables-demo.js"></script>

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        $('select').select2({
            width: '100%',
            placeholder: "Select an Option",
            allowClear: true
        });
    </script>

</body>

</html>