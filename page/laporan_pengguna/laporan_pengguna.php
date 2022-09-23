




 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DAFTAR PENGGUNA</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                              <th>No</th>
											<th>ID Users</th>
											<th>Nama Lengkap</th>
											<th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal lahir</th>
                                            <th>ID Unit</th>
                                            <th>Jabatan</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Foto</th>
                              
                               
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from pengguna");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                              <td><?php echo $no++; ?></td>
											<td><?php echo $data['idusers'] ?></td>
											<td><?php echo $data['nama_lengkap'] ?></td>
											<td><?php echo $data['username'] ?></td>
											<td><?php echo $data['password'] ?></td>
											<td><?php echo $data['level'] ?></td>
											<td><?php echo $data['jenis_kelamin'] ?></td>
											<td><?php echo $data['tanggal_lahir'] ?></td>
											<td><?php echo $data['idunit'] ?></td>
											<td><?php echo $data['jabatan'] ?></td>
											<td><?php echo $data['alamat'] ?></td>
											<td><?php echo $data['email'] ?></td>
											<td><img src="img/<?php echo $data['foto'] ?>"width="50" height="50" alt=""> </td>
										
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      
                      <a href="page/laporan/export_laporan_suplier_excel.php"  class="btn btn-primary" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












