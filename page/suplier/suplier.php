




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Suplier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
											<th>No</th>
											<th>ID Suplier</th>
											<th>Nama Suplier</th>
											<th>Alamat</th>
											<th>Nomor Telepon</th>
											<th>Aksi</th>
										
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									//	htmlentities() 

									$no = 1;
									$sql = $koneksi->query("select * from suplier");
									while ($data = $sql->fetch_assoc()) {
										
									?>
								
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $data['kode_sup'] ?></td>
											<td><?php echo$data['nama_sup']  ?></td>
											<td><?php echo $data['alamat'] ?></td>
											<td><?php echo $data['tlp'] ?></td>

											<td>
											<a href="?page=suplier&aksi=ubahsuplier&kode_sup=<?php echo $data['kode_sup'] ?>" class="btn btn-success" >Ubah</a>
											<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=suplier&aksi=hapussuplier&kode_sup=<?php echo $data['kode_sup'] ?>" class="btn btn-danger" >Hapus</a>
											</td>
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=suplier&aksi=tambahsuplier" class="btn btn-primary" >Tambah Data Suplier</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












