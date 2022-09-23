 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Toko</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Toko</th>
                                  <th>Nama Toko</th>
                                  <th>Alamat Toko</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from toko");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['kode_toko'] ?></td>
                                  <td><?php echo $data['nama_toko'] ?></td>
                                  <td><?php echo $data['alamat_toko'] ?></td>
                                  <td>
                                  <a href="?page=pengguna&aksi=ubahtokoa&id_user=<?php echo $data['id_user'] ?>" class="btn btn-success" >Ubah</a>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=toko&aksi=hapustokoa&id_user=<?php echo $data['id_user'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=toko&aksi=tambahtoko" class="btn btn-primary" >Tambah</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












