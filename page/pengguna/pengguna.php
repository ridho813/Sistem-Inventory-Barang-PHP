 
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                						<thead>
                                        <tr>
											<th>No</th>
				
											<th>Nama Lengkap</th>
											<th>Username</th>
                                            <th>Password</th>
                                            <th>Jabatan</th>
                                          
                                            <th>No Tlp</th>
                                            <th>Foto</th>
											<th>Aksi</th>
											
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from user");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
									
											<td><?php echo $data['nama'] ?></td>
											<td><?php echo $data['username'] ?></td>
											<td><?php echo $data['password'] ?></td>
								
											<td><?php echo $data['jabatan'] ?></td>
											<td><?php echo $data['no_tlp'] ?></td>
			
											<td><img src="img/<?php echo $data['foto'] ?>"width="50" height="50" alt=""> </td>
										
											<td>
											<a href="?page=pengguna&aksi=ubahpengguna&id_user=<?php echo $data['id_user'] ?>" class="btn btn-success" >Ubah</a>
											<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=pengguna&aksi=hapuspengguna&id_user=<?php echo $data['id_user'] ?>" class="btn btn-danger" >Hapus</a>
											</td>
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=pengguna&aksi=tambahpengguna" class="btn btn-primary" >Tambah</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












