<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS DCB</title>

    <!-- Custom fonts for this template -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">POS DCB</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="penjualan.php">
                    <i class="fa-solid fa-money-bill"></i>
                    <span>Penjualan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../laporan/laporanpenjualan.php">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Laporan penjualan</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between  align-items-center mb-3">
                        <h1 class="h3 mb-2 text-gray-800">Data penjualan</h1>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi keranjang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>12123</td>
                                            <td>Knuckle</td>
                                            <td>20</td>
                                            <td>70.000</td>
                                        </tr>
                                        <tr>
                                            <td>12123</td>
                                            <td>Knuckle</td>
                                            <td>20</td>
                                            <td>70.000</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <h1 class="h3 mb-2 text-gray-800">Data penjualan</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="#">
                                <label>Nama barang</label>
                                <select class="form-control js-example-basic-single mb-2" name="state">
                                    <option value="AL">Alabama</option>
                                    ...
                                    <option value="WY">Wyoming</option>
                                </select>

                                <div class="form-group">
                                    <label>Jumlah barang</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group d-flex">
                                    <button type="submit" class="btn btn-primary btn-icon-split mr-2">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah item</span>
                                    </button>
                                    <button type="submit" class="btn btn-success btn-icon-split mr-2">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-money-bill"></i>
                                        </span>
                                        <span class="text">Pembayaran</span>
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- DataTales Example -->
                    <a href="?page=tambah" class="btn btn-primary btn-icon-split mb-2">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                        <span class="text">Tambah Transaksi</span>
                    </a>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Transaksi</th>
                                            <th>Petugas</th>
                                            <th>Tanggal pembelian</th>
                                            <th>Jumlah Pembelian</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>12123</td>
                                            <td>System Architect</td>
                                            <td>2022-07-18</td>
                                            <td>61</td>
                                            <td>Qris</td>
                                            <td>Lunas</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" class="mr-2 btn btn-sm btn-primary"><i class="fa-solid fa-print"></i> Cetak Invoice</a>
                                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12123</td>
                                            <td>System Architect</td>
                                            <td>2022-07-18</td>
                                            <td>61</td>
                                            <td>Qris</td>
                                            <td>Lunas</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" class="mr-2 btn btn-sm btn-primary"><i class="fa-solid fa-print"></i> Cetak Invoice</a>
                                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                                </div>
                                            </td>

                                        </tr>

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
                        <span>Copyright &copy; Your Website 2019</span>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../assets/js/demo/datatables-demo.js"></script>

</body>

</html>