<h1 class="mt-4">Data pengaduan/ masyarakat</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
</ol>
<div class="row">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengadu</th>
                <th>Telp</th>
                <th>Kategori</th>
                <th>Subkategori</th>
                <th>Aksi    </th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $no=1;

            foreach($pengaduan as $p): ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $p['nama']?></td>
                <td><?= $p['telpon']?></td>
                <td><?= $p['kategori']?></td>
                <td><?= $p['subkategori']?></td>
                <td>
                    <a class="btn btn-sm btn-warning" href="<?= base_url('c_admin/detail_pengaduan/'.$p['id_pengaduan']) ?>">detail</a>
                    <?php if($p['status']=='0') :?>
                    <a class="btn btn-sm btn-info ms-2" href="<?= base_url('c_admin/form_tanggapan/'.$p['id_pengaduan'])?>">Tanggapi</a>
                    <?php elseif($p['status']=='proses'): ?>
                        <a class="btn btn-sm btn-info ms-2"  href="<?= base_url('c_admin/form_selesai/'.$p['id_pengaduan'])?>">Selesai</a>
                    <?php else:?>
                        <button class="btn btn-sm btn-secondary ms-2">Sudah selesai</button>
                    <?php endif ?>
                </td>
            </tr>
            <?php 
            $no++;
            endforeach?>
        </tbody>
    </table>

</div>