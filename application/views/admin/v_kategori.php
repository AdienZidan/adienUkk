<h1 class="mt-4">Kategori dan Subkategori</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active"></li>
</ol>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Kategori
      </div>
      <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
          + Tambah kategori
        </button>

        <!-- Modal -->

        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>

              <th>Aksi</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($kategori as $k) : ?>
              <tr>
                <td>1</td>
                <td><?= $k['kategori'] ?></td>
                <td><small><button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editKategoriModal<?= $k['id_kategori'] ?>">Edit</button><button class="btn btn-sm btn-danger ms-2 " data-bs-toggle="modal" data-bs-target="#hapusKategoriModal<?= $k['id_kategori'] ?>">delete</button></small></td>
              </tr>
              <!-- modal edit kategori -->
              <div class="modal fade" id="editKategoriModal<?= $k['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('c_admin/edit_kategori/' . $k['id_kategori']) ?>" method="post">
                        <small><label for="">Nama Sub Kategori</label></small>
                        <input type="text" class="form form-control" name="nama_kategori" value="<?= $k['kategori'] ?>" required>
                       
                       

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal hapus kategori -->
              <div class="modal fade" id="hapusKategoriModal<?= $k['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-body">
                      <h5>Yakin ingin hapus kategori <?= $k['kategori'] ?> ?</h5>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?= base_url('c_admin/hapus_kategori/' . $k['id_kategori']) ?>" class="btn btn-danger">Hapus</a>

                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Subkategori
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#tambahSubKategoriModal">
          + Tambah Sub kategori
        </button>
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Sub Kategori</th>
              <th>Nama Kategori</th>
              <th>Aksi</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($join_subkategori as $s) : ?>
              <td>1</td>
              <td><?= $s['subkategori'] ?></td>
              <td><?= $s['kategori'] ?></td>
              <td><small><button class="btn btn-sm btn-warning " data-bs-toggle="modal" data-bs-target="#editSubKategoriModal<?= $s['id_subkategori'] ?>">Edit</button><button data-bs-toggle="modal" data-bs-target="#hapusSubKategoriModal<?= $s['id_subkategori'] ?>" class="btn btn-sm btn-danger ms-2 ">delete</button></small></td>


              <!-- modal edit subkategori -->
              <div class="modal fade" id="editSubKategoriModal<?= $s['id_subkategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('c_admin/edit_subkategori/' . $s['id_subkategori']) ?>" method="post">
                        <small><label for="">Nama Sub Kategori</label></small>
                        <input type="text" class="form form-control" name="nama_subkategori" value="<?= $s['subkategori'] ?>" required>
                        <small><label for="">Nama Sub Kategori</label></small>
                        <select name="kategori" class="form form-select form-control" id="">
                          <?php foreach ($kategori as $k) : ?>

                            <option value="<?= $k['id_kategori'] ?>" <?php if ($k['id_kategori'] == $s['id_kategori']) {
                                                                        echo 'selected';
                                                                      } else {
                                                                        echo '';
                                                                      } ?>><?= $k['kategori'] ?></option>
                          <?php endforeach ?>
                        </select>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal hapus subkategori -->
              <div class="modal fade" id="hapusSubKategoriModal<?= $s['id_subkategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-body">
                      <h5>Yakin ingin hapus subkategori <?= $s['subkategori'] ?> ?</h5>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?= base_url('c_admin/hapus_subkategori/' . $s['id_subkategori']) ?>" class="btn btn-danger">Hapus</a>

                    </div>
                  </div>
                </div>
              </div>


            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('c_admin/tambah_kategori') ?>" method="post">
          <small><label for="">Nama Kategori</label></small>
          <input type="text" class="form form-control" name="nama_kategori" required>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahSubKategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('c_admin/tambah_subkategori') ?>" method="post">
          <small><label for="">Kategori</label></small>
          <select name="kategori" id="" class="form form-control form-select">
            <?php foreach ($kategori as $k) : ?>
              <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
            <?php endforeach ?>
          </select>
          <small><label for="">Nama Sub Kategori</label></small>
          <input type="text" class="form form-control" name="nama_subkategori" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>