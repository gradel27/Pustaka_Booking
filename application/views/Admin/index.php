<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Row for UX metrics -->
    <div class="row">
        <!-- Card for "Jumlah Anggota" metric -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Anggota</div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?= $this->ModelUser->getUserWhere(['role_id' => 1])->num_rows(); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-3x text-warning"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card for "Stok Buku Terdaftar" metric -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Stok Buku Terdaftar</div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ['stok != 0'];
                                $totalstok = $this->ModelBuku->total('stok', $where);
                                echo $totalstok;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('buku'); ?>"><i class="fas fabook fa-3x text-primary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card for "Buku yang dipinjam" metric -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Buku yang dipinjam</div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ['dipinjam != 0'];
                                $totaldipinjam = $this->ModelBuku->total('dipinjam', $where);
                                echo $totaldipinjam;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user'); ?>"><i class="fas fa-user-tag fa-3x text-success"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card for "Buku yang dibooking" metric -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Buku yang dibooking</div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ['dibooking !=0'];
                                $totaldibooking = $this->ModelBuku->total('dibooking', $where);
                                echo $totaldibooking;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user'); ?>"><i class="fas fa-shopping-cart fa-3x text-danger"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Row for tables -->
    <div class="row">
        <!-- User data table -->
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-users text-primary mt-2"> Data User</span>
                <a class="text-danger" href="<?php echo base_url('user/data_user'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Role ID</th>
                        <th>Aktif</th>
                        <th>Member Sejak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($anggota as $a) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['role_id']; ?></td>
                            <td><?= $a['is_active']; ?></td>
                            <td><?= date('Y', $a['tanggal_input']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Book data table -->
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-book text-warning mt
