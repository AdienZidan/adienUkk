<h1 class="mt-4">Detail Pengaduan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
</ol>
<div class="row">
    <div class="col-md-6">
        <small><label for="">Nama</label></small>
        <input type="text" class="form form-control mb-2" value="<?= $data_pengaduan['nama'] ?>" readonly>
        <small><label for="">Username</label></small>
        <input type="text" class="form form-control mb-2" value="<?= $data_pengaduan['username'] ?>" readonly>
        <small><label for="">Telp</label></small>
        <input type="text" class="form form-control mb-2" value="<?= $data_pengaduan['telpon'] ?>" readonly>
        <small><label for="">NIK</label></small>
        <input type="text" class="form form-control mb-2" value="<?= $data_pengaduan['nik'] ?>" readonly>
    </div>
    <div class="col-md-6">
        <small><label for="">Kategori</label></small>
        <input type="text" class="form form-control mb-2" value="<?= $data_pengaduan['kategori'] ?>" readonly>
        <small><label for="">Subkategori</label></small>
        <input type="text" class="form form-control mb-2" value="<?= $data_pengaduan['subkategori'] ?>" readonly>
        <small><label for="">Isi Laporan</label></small>
        <input type="text" class="form form-control mb-2" value="<?= $data_pengaduan['isi_laporan'] ?>" readonly>
        <small><label for="">status</label></small>
        <input type="text" class="form form-control mb-2" value="<?php if ($data_pengaduan['status'] == "0") {
                                                                        echo "belum ditanggapi";
                                                                    } else {
                                                                        echo $data_pengaduan['status'];
                                                                    } ?>" readonly>
        <small><label for="">Foto</label></small>
        <br>
        <img src="<?= base_url('assets/uploads/' . $data_pengaduan['foto']) ?>" style="width:200px;height:200px;object-fit:cover;" alt="">
    </div>

</div>
<div class="row">
    <h3 class="text text-center mt-5 mb-3">Tanggapan</h3>
    <?php if ($data_tanggapan) : ?>
        <table class="table">


            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama petugas</th>
                    <th>Isi tanggapan</th>
                    <th>tgl_tanggapan</th>
                    <th>Nama Petugas</th>

                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>1</td>
                    <td><?= $data_tanggapan['nama_petugas'] ?></td>
                    <td><?= $data_tanggapan['tanggapan'] ?></td>
                    <td><?= $data_tanggapan['tgl_tanggapan'] ?></td>
                    <td><?= $data_tanggapan['nama_petugas'] ?></td>

                </tr>

            </tbody>
        </table>
        <a href="<?=base_url('c_admin/form_selesai/').$data_pengaduan['id_pengaduan']?>" class="btn btn-success w-100">Update Selesai</a>
    <?php else : ?>
        <div class="card text-center p-4">
            <h4>Belum ada tanggapan</h4>
        </div>
        <a href="<?= base_url('c_admin/form_tanggapan/' . $data_pengaduan['id_pengaduan']) ?>" class="btn btn-primary mt-2">Tambah Tanggapan</a>
    <?php endif ?>
</div>