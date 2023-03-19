<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Adien - catatan perjalan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url('assets') ?>/css/styless.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../inc/css/bootstrap.css">
	<script type="text/javascript" src="../inc/js/jquery.js"></script>
	<script type="text/javascript" src="../inc/js/bootstrap.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= base_url('c_Dashboard') ?>"> Pengaduan masyarakat</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url() ?>c_NewLogin/logout">Logout</a></li>
                </ul>
            </li>
        </ul>drop
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= base_url('c_Dashboard') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Master Data</div>
                        <a class="nav-link collapsed" href="<?= base_url('c_admin/kategori') ?>" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-database"></i></div>
                            Kategori
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        </div>
                        <a class="nav-link collapsed" href="<?= base_url('c_admin/masyarakat') ?>" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-database"></i></div>
                            Masyarakat
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        </div>
                        <a class="nav-link collapsed" href="<?= base_url('c_Dashboard/lihatperjalanan') ?>" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-database"></i></div>
                            Petugas
                        </a>

                        <div class="sb-sidenav-menu-heading">tambah user</div>
                        <a class="nav-link collapsed" href="<?= base_url('c_admin/tambahuser') ?>" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-pencil"></i></div>
                            tambah user
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        </div>
                        <a class="nav-link collapsed" href="<?= base_url('c_Dashboard/lihatperjalanan') ?>" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-database"></i></div>
                            lihat laporan
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                <br>
            <div class="row">

                <!-- Admin -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary card-header-masterdata">
                            USER ACCESS
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Sebagai</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>

                                <?php
                                $no = 1;
                                foreach ($masterdata_admin as $md_admin) : ?>
                                <?php $i = 1; ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $md_admin['full_name'] ?></td>
                                    <td><?php
                                            if ($md_admin['role_id'] == 1) {
                                                echo 'Admin';
                                            } else if ($md_admin['role_id'] == 2) {
                                                echo 'Operator';
                                            }
                                            ?>
                                    </td>
                                    <td><a class="btn bg-warning" data-bs-toggle="modal"
                                            data-bs-target="#editdata<?= $md_admin['id'] ?>"><i
                                                class="fa-solid fa-pen"></i></a></td>
                                    <td><a href="<?= base_url('C_Arsya_MasterData/delete_admin/') . $md_admin['id'] ?> "
                                            onclick="return confirm('Yakin DECC??')">
                                            <button class="btn bg-danger" type='submit'><i
                                                    class="fa-solid fa-trash"></i></button></a></td>
                                </tr>
                                <?php $i++ ?>
                                <div class="modal fade" id="editdata<?= $md_admin['id'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editdata">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form method='post'
                                                    action='<?= base_url('C_Arsya_MasterData/edit_admin/' . $md_admin['id']) ?>'>
                                                    <div class="mb-3">
                                                        <label for="editalias" class="form-label">Nama</label>
                                                        <input type="text" name='name'
                                                            value='<?= $md_admin['full_name'] ?>' class="form-control"
                                                            id="editalias">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editkompetensi" class="form-label">Role</label>
                                                        <select type="text" name='role_id'
                                                            class="form-control"
                                                            id="editkompetensi">
                                                            <option value="1">Admin</option>
                                                            <option value="2">Operator</option>
                                                        </select>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Selesai</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </thead>
                        </table>

                        <!-- Button trigger modal -->
                    </div>
                    <a href="<?= base_url('C_Arsya_Auth/register') ?>"><button type="submit"
                            class="btn btn-primary btn-block btn-tambahdata">Tambah Data</button></a>
                    <br>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Adien_Ubx 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets') ?>/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets') ?>/assets/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets') ?>/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets') ?>/js/datatables-simple-demo.js"></script>
</body>

</html>