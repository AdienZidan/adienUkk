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
                <select name="kategori" class="form form-control form-select" id="kategori">
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategori as $k):?>    
                <option value="<?=$k['id_kategori']?>"><?= $k['kategori']?></option>
                <?php endforeach ?>
                </select>
                </div>
                    
            <div class="input mt-2">
                <small><label for="">SubKategori</label></small>
                <select name="subkategori" class="form form-control form-select" id="subkategori">
                <option value="">Pilih Sub Kategori</option>
                <?php foreach ($subkategori as $sk):?>    
                <option value="<?=$sk['id_subkategori']?>"><?= $sk['subkategori']?></option>
                <?php endforeach ?>
                </select>
                
            </div>
            <div class="input mt-2">
                <small><label for="">Isi Pengaduan</label></small>
                <textarea name="isi_pengaduan" class="form form-control" id="isi_pengaduan" cols="30" rows="3"></textarea>
                
            </div>
            <div class="input mt-2">
                <small><label for="">Foto</label></small>
              <input type="file" name="foto" class="form form-control">
                
            </div>
        </div>
        <button class="btn btn-primary mt-3" type="submit">Kirim</button>
        </form>
    </div>
</div>