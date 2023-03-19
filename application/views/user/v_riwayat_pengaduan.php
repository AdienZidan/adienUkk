
<h1 class="mt-4">Riwayat Pengaduan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Pengaduan:
                                    <h3 class=" "><?= $jumlah_pengaduan?></h3>
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card
                                        <h3><?= $belum?></h3>
                                    </div>
                                   
                                </div>

                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card
                                        <h3><?= $proses?></h3>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card
                                        <h3><?= $selesai?></h3>
                                    </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data riwayat pengaduan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Subkategori</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php foreach($riwayat as $r): ?>
                                        <tr>
                                            <td><?= $r['tgl_pengaduan']?></td>
                                            <td><?= $r['kategori']?></td>
                                            <td><?= $r['subkategori']?></td>
                                            <td>
                                                <?php if($r['status']=='0'){
                                                    echo 'Belum Ditanggapi';
                                                }elseif($r['status']=='proses'){
                                                    echo 'Proses';
                                                }else{
                                                    echo 'error';
                                                } ?>
                                            
                                        
                                        
                                        </td>
                                            <td><a href="<?=base_url('c_dashboard/detail_pengaduan/'.$r['id_pengaduan'])?>" class="btn btn-sm btn-primary">Detail</a></td>
                                           
                                        </tr>
                                        <?php endforeach?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    