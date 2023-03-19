<h1 class="mt-4">Kategori dan Subkategori</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active"></li>
</ol>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Admin
      </div>
      <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#tambahAdminModal">
          + Tambah Admin
        </button>

        <!-- Modal -->

        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>

              <th>Aksi</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($admin as $adm) : ?>
              <tr>
                <td><?= 1 ?></td>
                <td><?= $adm['username'] ?></td>
                <td><button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editAdminModal<?= $adm['id_petugas'] ?>">Edit</button>
                 
                  <?php if ($adm['active'] == 'aktif') : ?>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#banAdminModal<?= $adm['id_petugas'] ?>">Ban</button>
                  <?php elseif ($adm['active'] == 'banned') : ?>
                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#aktifAdminnModal<?= $adm['id_petugas'] ?>">Aktifkan</button>
                  <?php endif ?>

                </td>
              </tr>


              <!-- edit admin modal -->

              <div class="modal fade" id="editAdminModal<?= $adm['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('c_admin/tambah_admin') ?>" method="post">
                        <small><label for="">Nama Petugas</label></small>
                        <input type="text" class="form form-control" name="nama_petugas" value="<?= $adm['nama_petugas'] ?>" required>
                        <small><label for="">Username</label></small>
                        <input type="text" class="form form-control" name="username" value="<?= $adm['username'] ?>" required>
                        <!-- <small><label for="">Password</label></small>
                        <input type="password" class="form form-control" name="password" required> -->
                        <small><label for="">telp</label></small>
                        <input type="number" class="form form-control" name="telp" value="<?= $adm['telp'] ?>" required>
                        <small><label for="">Level</label></small>
                        <select name="level" id="" class="form form-control form-select">
                          <?php if ($adm['level'] == 'admin') {
                            echo '<option value="admin" selected>Admin</option>';
                            echo '<option value="petugas" >Petugas</option>;';
                          } else {
                            echo '<option value="admin">Admin</option>';
                            echo '<option value="petugas"  selected >Petugas</option>';
                          } ?>


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
              <!-- modal banned admin -->
              <div class="modal fade" id="banAdminModal<?= $adm['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-body">
                      <h5>Klik OK untuk konfirmasi ban</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?= base_url('c_admin/ban_admin/' . $adm['id_petugas']) ?>" class="btn btn-primary">OK</a>

                    </div>
                  </div>
                </div>
              </div>
              <!-- aktif admin modal -->
              <div class="modal fade" id="aktifAdminnModal<?= $adm['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-body">
                      <h5>Klik OK untuk konfirmasi aktifkan akun</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?= base_url('c_admin/aktif_admin/' . $adm['id_petugas']) ?>" class="btn btn-primary">OK</a>

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
        Data Petugas
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#tambahAdminModal">
          + Tambah Petugas
        </button>
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Sub Kategori</th>

              <th>Aksi</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($petugas as $p) : ?>
              <tr>
                <td><?= 1 ?></td>
                <td><?= $p['username'] ?></td>
                <td>
                  <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPetugasModal<?= $p['id_petugas'] ?>">Edit</button>
                  <?php if ($p['active'] == 'aktif') : ?>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#banAdminModal<?= $p['id_petugas'] ?>">Ban</button>
                  <?php elseif ($p['active'] == 'banned') : ?>
                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#aktifAdminModal<?= $p['id_petugas'] ?>">Aktifkan</button>
                  <?php endif ?>
                </td>
              </tr>
              <!-- edit petugas modal -->

              <div class="modal fade" id="editPetugasModal<?= $p['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('c_admin/tambah_admin') ?>" method="post">
                        <small><label for="">Nama Petugas</label></small>
                        <input type="text" class="form form-control" name="nama_petugas" value="<?= $p['nama_petugas'] ?>" required>
                        <small><label for="">Username</label></small>
                        <input type="text" class="form form-control" name="username" value="<?= $p['username'] ?>" required>
                        <!-- <small><label for="">Password</label></small>
                        <input type="password" class="form form-control" name="password" required> -->
                        <small><label for="">telp</label></small>
                        <input type="number" class="form form-control" name="telp" value="<?= $p['telp'] ?>" required>
                        <small><label for="">Level</label></small>
                        <select name="level" id="" class="form form-control form-select">
                          <?php if ($p['level'] == 'admin') {
                            echo '<option value="admin" selected>Admin</option>';
                            echo '<option value="petugas" >Petugas</option>;';
                          } else {
                            echo '<option value="admin">Admin</option>';
                            echo '<option value="petugas"  selected >Petugas</option>';
                          } ?>


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
              <!-- ban petugas modal -->
              <div class="modal fade" id="banAdminModal<?= $p['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-body">
                      <h5>Klik OK untuk konfirmasi ban</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?= base_url('c_admin/ban_admin/' . $p['id_petugas']) ?>" class="btn btn-primary">OK</a>

                    </div>
                  </div>
                </div>
              </div>
              <!-- aktif petugas modal -->
              <div class="modal fade" id="aktifAdminModal<?= $p['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-body">
                      <h5>Klik OK untuk konfirmasi aktifkan akun</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?= base_url('c_admin/aktif_admin/' . $p['id_petugas']) ?>" class="btn btn-primary">OK</a>

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

<div class="modal fade" id="tambahAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('c_admin/tambah_admin') ?>" method="post">
          <small><label for="">Nama Petugas</label></small>
          <input type="text" class="form form-control" name="nama_petugas" required>
          <small><label for="">Username</label></small>
          <input type="text" class="form form-control" name="username" required>
          <small><label for="">Password</label></small>
          <input type="password" class="form form-control" name="password" required>
          <small><label for="">telp</label></small>
          <input type="number" class="form form-control" name="telp" required>
          <small><label for="">Level</label></small>
          <select name="level" id="" class="form form-control form-select">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
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