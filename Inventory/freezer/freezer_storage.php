<!DOCTYPE html>
<html lang="en">

<?php
include '../../database.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DCB - INVENTORY</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
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
                <div class="sidebar-brand-text mx-3">DCB - Inventory</div>
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

                        <a class="collapse-item" href="../produksi/produksi.php">Data produksi</a>
                        <a class="collapse-item" href="../produksi/jenis_produksi.php">Jenis produksi</a>
                    </div>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="freezer_storage.php">
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
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                    <h1 class="h3 mb-2 text-gray-800">Freezer storage</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data freezer storage</h6>
                            <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Input Data Keluar</span>
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produksi</th>
                                            <th>Berat (kg)</th>
                                            <th>Pcs</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // take data from table freezerstorage
                                        // explode string to array from table freezerstorage
                                        $query = "SELECT * FROM freezerstorage";
                                        $result = mysqli_query($db, $query);
                                        $no = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $nama_produksi = $row['jenisproduksi'];
                                            $berat = $row['berat'];
                                            $pcs = $row['qty'];
                                            $array_nama_produksi = explode(",", $nama_produksi);
                                            $array_berat = explode(",", $berat);
                                            $array_pcs = explode(",", $pcs);
                                            for ($i = 0; $i < count($array_nama_produksi); $i++) {
                                                echo "<tr>";
                                                echo "<td>" . $no . "</td>";
                                                echo "<td>" . $array_nama_produksi[$i] . "</td>";
                                                echo "<td>" . $array_berat[$i] . " Kg</td>";
                                                echo "<td>" . $array_pcs[$i] . " Pcs</td>";
                                                echo "</tr>";
                                                $no++;
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <h3>
                                    <?php
                                    //sum all totalassetfreezer from table tempcoldstorage and show it in money format
                                    $query = "SELECT SUM(totalassetfreezer) AS total FROM tempcoldstorage";
                                    $result = mysqli_query($db, $query);
                                    $row = mysqli_fetch_array($result);
                                    $total = $row['total'];

                                    //sum all modal from freezerkeluar as modalkeluar
                                    $query = "SELECT SUM(modal) AS modal FROM freezerkeluar";
                                    $result = mysqli_query($db, $query);
                                    $row = mysqli_fetch_array($result);
                                    $modalkeluar = $row['modal'];

                                    //substract total and modalkeluar
                                    $totalmodal = $total - $modalkeluar;
                                    echo "Total Modal : Rp. " . number_format($totalmodal, 0, ',', '.');

                                    ?>
                                </h3>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
                            

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
                                            <th>Jenis Produksi</th>
                                            <th>Berat</th>
                                            <th>Jumlah Pcs</th>
                                            <th>Modal Keluar</th>
                                            <th>Keterangan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //get data from table freezerkeluar
                                        $query = "SELECT * FROM freezerkeluar";
                                        $result = mysqli_query($db, $query);
                                        $no = 1;
                                        //loop for no
                                        while ($row = mysqli_fetch_array($result)) {
                                            $foto = $row['foto'];
                                            $operator = $row['operator'];
                                            $tanggal = $row['tanggalwaktu'];
                                            $jenisproduksi = $row['jenisproduksi'];
                                            $berat = $row['berat'];
                                            $qty = $row['qty'];
                                            $modal = $row['modal'];
                                            $keterangan = $row['keterangan'];
                                            echo "<tr>";
                                            echo "<td>" . $no . "</td>";
                                            echo "<td><img src='../../assets/img/freezer/" . $foto . "' width='100px' height='100px'></td>";
                                            echo "<td>" . $operator . "</td>";
                                            echo "<td>" . $tanggal . "</td>";
                                            echo "<td>" . $jenisproduksi . "</td>";
                                            echo "<td>" . $berat . " Kg</td>";
                                            echo "<td>" . $qty . " Pcs</td>";
                                            echo "<td>Rp. " . number_format($modal, 0, ',', '.') . "</td>";
                                            echo "<td>" . $keterangan . "</td>";
                                            echo "</tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
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
                        <span>Copyright &copy; <a href="http://harkovnet.manhost.my.id">powered by HARKOVNET</a></span>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Data Keluar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="proseskeluar.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Input Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Pilih Item</label>
                                <?php
                                //select option from table freezerstorage
                                $query = "SELECT * FROM freezerstorage";
                                $result = mysqli_query($db, $query);
                                //select option name is item
                                echo "<select name='jenisproduksi' class='form-control'>";
                                while ($row = mysqli_fetch_array($result)) {
                                    //echo option value jenisproduksi from table freezerstorage
                                    echo "<option value='" . $row['jenisproduksi'] . "'>" . $row['jenisproduksi'] . "</option>";
                                }
                                echo "</select>";
                                ?>
                                </div>
                                <!-- input form for berat -->
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Berat (kg)</label>
                                    <input type="number" class="form-control" id="berat" name="berat" placeholder="Berat" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Jumlah Pcs</label>
                                    <input type="number" class="form-control" id="pcs" name="pcs" placeholder="Jumlah Pcs" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Modal Per Kg</label>
                                    <input type="number" class="form-control" id="modal" name="modal" placeholder="Modal per Kg" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
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
                        <span aria-hidden="true">??</span>
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
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../assets/js/demo/datatables-demo.js"></script>
    <script>
        $('select').select2({
            width: '100%',
            placeholder: "Select an Option",
            allowClear: true
        });
    </script>

</body>

</html>