<div class="container">
    <h1>Tambah Pengaduan</h1>
    <div class="form-container">
        <form action="<?= base_url('c_dashboard/tambahpengaduan')?>" method="post" enctype="multipart/form-data">
        <div class="row">

            <div class="col-md-6 col-12">
                <div class="input mt-2">
                <small><label for="">Nama</label></small>
                <input type="text" class="form form-control" value="<?= $user['nama']?>" name="nama">
                </div>
                <div class="input mt-2">
                <small><label for="">Nik</label></small>
                <input type="text" class="form form-control" value="<?= $user['nik']?>" name="nik">
                </div>
                <div class="input mt-2">
                <small><label for="">Telpon</label></small>
                <input type="text" class="form form-control" value="<?= $user['telpon']?>" name="telpon">
                </div>
            </div>
            <div class="col-md-6 col-12">
            <div class="input mt-2">
                <small><label for="">Kategori</label></small>
                <input type="text" class="form form-control" value="<?= $pengaduan['kategori']?>">
                </div>
                    
            <div class="input mt-2">
                <small><label for="">SubKategori</label></small>
                <input type="text" class="form form-control" value="<?= $pengaduan['subkategori']?>">
                
            </div>
            <div class="input mt-2">
                <small><label for="">Isi Pengaduan</label></small>
                <textarea name="isi_pengaduan" class="form form-control" id="isi_pengaduan" cols="30" rows="3"><?= $pengaduan['isi_laporan']?></textarea>
                
            </div>
            <div class="input mt-2">
                <small><label for="">Foto</label></small>
                <br>
                <img src="<?=base_url('assets/uploads/'.$pengaduan['foto']) ?>" class="ms-auto me-auto ml-auto me-auto"style="width:200px;height:200px;object-fit:cover;" alt="">
                
            </div>
        </div>
        <a class="btn btn-danger mt-3" href="<?= base_url('c_dashboard/riwayat_pengaduan') ?>">Kembali</a>
        </form>
    </div>
</div>