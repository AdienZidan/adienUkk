<h1 class="mt-4">Data pengguna / masyarakat</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
</ol>

<div class="row">
    <div class="col-12 col-md-12">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Nik</th>
                    <th>Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($masyarakat as $m) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $m['nama'] ?></td>
                        <td><?= $m['username'] ?></td>
                        <td><?= $m['nik'] ?></td>
                        <td><?= $m['telpon'] ?></td>
                        <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailMasyarakatModal<?= $m['id_masyarakat'] ?>">Detail</button>
                        
                     
                        <?php if($m['active']=='aktif'):?>
                            <button class="btn btn-sm btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#banMasyarakatModal<?= $m['id_masyarakat'] ?>">Ban</button>
                        <?php elseif($m['active']=='banned'):?>
                        <button class="btn btn-sm btn-success ms-2" data-bs-toggle="modal" data-bs-target="#aktifMasyarakatModal<?= $m['id_masyarakat'] ?>">Aktifkan</button>
                        <?php endif?>
                    </td>
                    </tr>
                    <!-- modal detail -->
                    <div class="modal fade" id="detailMasyarakatModal<?= $m['id_masyarakat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <small><label for="">Nama</label></small>
                                            <input type="text" class="form form-control mb-2" value="<?= $m['nama'] ?>">
                                            <small><label for="">Username</label></small>
                                            <input type="text" class="form form-control mb-2" value="<?= $m['username'] ?>">
                                            <small><label for="">NIK</label></small>
                                            <input type="text" class="form form-control mb-2" value="<?= $m['nik'] ?>">
                                            <small><label for="">Telepon</label></small>
                                            <input type="text" class="form form-control mb-2" value="<?= $m['telpon'] ?>">
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- modal ban -->
                        <div class="modal fade" id="banMasyarakatModal<?= $m['id_masyarakat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">

                                    <div class="modal-body">
                                       
                                        <h5>Klik ok untuk konfirmasi ban</h5>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                           
                                            <a href="<?= base_url('c_admin/ban_masyarakat/'.$m['id_masyarakat'])?>" class="btn btn-danger">OK</a>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal aktifkan -->
                            <div class="modal fade" id="aktifMasyarakatModal<?= $m['id_masyarakat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">

                                    <div class="modal-body">
                                       
                                        <h5>Klik ok untuk konfirmasi aktifkan</h5>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                           
                                            <a href="<?= base_url('c_admin/aktif_masyarakat/'.$m['id_masyarakat'])?>" class="btn btn-success">OK</a>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        $no++;

                    endforeach ?>

            </tbody>
        </table>
    </div>
</div>