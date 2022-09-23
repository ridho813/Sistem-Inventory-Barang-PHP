<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                              <th>No</th>
                                  <th>Kode Barang</th>
                                  <th>Kode Barang</th>
                                  <td>Nama Barang</td>
                                  <th>Jumlah Keluar</th>
                             
                                  <th>tanggal</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from barang_keluar  k, barang s where s.kode_barang =k.kode_barang");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                              <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['idbrg_keluar'] ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['jumlah_keluar'] ?></td>
                                  <td><?php echo $data['tanggal'] ?></td>
                                  <td>
                                  <a href="?page=barangkeluar&aksi=ubahbarangkeluar&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>" class="btn btn-success" >Ubah</a>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['idbrg_keluar']?>">
                                                            Delete
                                                        </button>
                                  </td>
                              </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?=$data['idbrg_keluar']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body"> 
                                                Apakah Anda Yakin ingin menghapus <?=$data['nama_barang']?>
 
                                                <input type='hidden' name='idbrg_keluar' value='<?=$data['idbrg_keluar']?>'>
                                                <input type='hidden' name='kode_barang' value='<?=$data['kode_barang']?>'>
                                                <input type='hidden' name='jumlah_keluar' value='<?=$data['jumlah_keluar']?>'>
                                                <br>
                                                <br>
                                            <button type="submit" class="btn btn-danger" name="delete">Hapus</button>
                                            </form>
                                            </div>                 
                                        </div>
                                    </div>
                                </div>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=barangkeluar&aksi=tambahbarangkeluar" class="btn btn-primary" >Tambah</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

<?php

$conn= mysqli_connect("localhost","root","","dazel");
//delete barang keluar   
             if(isset($_POST['delete'])){
                $idbrg_keluar = $_POST['idbrg_keluar'];
                $kode_barang = $_POST['kode_barang'];
                $jumlah_keluar = $_POST['jumlah_keluar'];
   
                $getdatastock= mysqli_query($conn,"SELECT * FROM barang where kode_barang='$kode_barang' ");
                $data = mysqli_fetch_array($getdatastock);
                $stock = $data['stok_barang'];
   
                $selisih=$stock+$jumlah_keluar;
   
                $update =mysqli_query($conn,"UPDATE barang SET stok_barang='$selisih' where kode_barang='$kode_barang' ");
                $hapus =mysqli_query($conn," DELETE FROM barang_keluar WHERE idbrg_keluar ='$idbrg_keluar' ");
   
                if($update&&$hapus){
                  ?>
									
                  <script type="text/javascript">
                  alert("Data Berhasil Dihapuss");
                  window.location.href="?page=barangkeluar";
                  </script>
                  
                  <?php
                }else{
                   header('location:keluar.php');
                }
   
   
            };




?>







