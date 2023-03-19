<h1 class="mt-4">Form Tanggapan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
</ol>
<div class="row">
    <div class="col-md-6">
        <small><label for="">Nama</label></small>
        <input type="text" class="form form-control mb-2" value="<?=$data_pengaduan['nama']?>" readonly>
        <small><label for="">Username</label></small>
        <input type="text" class="form form-control mb-2" value="<?=$data_pengaduan['username']?>" readonly>
        <small><label for="">Telp</label></small>
        <input type="text" class="form form-control mb-2" value="<?=$data_pengaduan['telpon']?>" readonly>
        <small><label for="">NIK</label></small>
        <input type="text" class="form form-control mb-2" value="<?=$data_pengaduan['nik']?>" readonly>
    </div>
    <div class="col-md-6">
    <small><label for="">Kategori</label></small>
        <input type="text" class="form form-control mb-2" value="<?=$data_pengaduan['kategori']?>" readonly>
        <small><label for="">Subkategori</label></small>
        <input type="text" class="form form-control mb-2" value="<?=$data_pengaduan['subkategori']?>" readonly>
        <small><label for="">Isi Laporan</label></small>
        <input type="text" class="form form-control mb-2" value="<?=$data_pengaduan['isi_laporan']?>" readonly>
        <small><label for="">status</label></small>
        <input type="text" class="form form-control mb-2" value="<?php if($data_pengaduan['status']=="0"){echo "belum ditanggapi";}else{ echo $data_pengaduan['status'];}?>" readonly>
        <small><label for="">Foto</label></small>
        <br>
     <img src="<?= base_url('assets/uploads/'.$data_pengaduan['foto']) ?>" style="width:200px;height:200px;object-fit:cover;" alt=""> 
    </div>

</div>
<div class="row">
 <h3 class="text text-center mt-5 mb-3"> Form Tanggapan</h3>
    <form action="<?= base_url('c_admin/tambah_tanggapan/'.$data_pengaduan['id_pengaduan'])?>" method="post">
 <label for="">Tanggapan</label> 
    <br>    
    <textarea name="tanggapan" id="" cols="30" rows="3" class="form form-control">

        </textarea>
        <button class="btn btn-primary w-100" type="submit">Tambah tanggapan</button>
    </form>
</div>