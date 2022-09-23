 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Distribusi</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Distribusi</th>
                                  <th>Nama Barang</th>
                                  <th>Nama Toko</th>
                                  <th>Jumlah Distribusi</th>
                                  <th>Tanggal</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from distribusi k, barang s where s.kode_barang =k.kode_barang");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['kode_distribusi'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['nama_toko'] ?></td>
                                  <td><?php echo $data['jumlah'] ?></td>
                                  <td><?php echo $data['tanggal'] ?></td>
                                  <td>
                                  <a href="?page=distribusi&aksi=ubahdistribusi&kode_distribusi=<?php echo $data['kode_distribusi'] ?>" class="btn btn-success" >Ubah</a>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['kode_distribusi']?>">
                                                            Delete
                                                        </button>
                                  </td>
                              </tr>


                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete<?=$data['kode_distribusi']?>">
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
 
                                                <input type='hidden' name='kode_distribusi' value='<?=$data['kode_distribusi']?>'>
                                                <input type='hidden' name='kode_barang' value='<?=$data['kode_barang']?>'>
                                                <input type='hidden' name='jumlah' value='<?=$data['jumlah']?>'>
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
                      <a href="?page=distribusi&aksi=tambahdistribusi" class="btn btn-primary" >Tambah</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>






<?php
 $conn= mysqli_connect("localhost","root","","dazel");

//delete barang masuk
if(isset($_POST['delete'])){
  $jumlah = $_POST['jumlah'];
    $kode_barang = $_POST['kode_barang'];
    $kode_distribusi = $_POST['kode_distribusi'];

    $getdatastock= mysqli_query($conn,"SELECT * FROM barang where kode_barang='$kode_barang' ");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stok_barang'];

    $selisih=$stock-$jumlah;

    $update =mysqli_query($conn,"UPDATE barang SET stok_barang='$selisih' where kode_barang='$kode_barang' ");
    $hapus =mysqli_query($conn," DELETE FROM distribusi WHERE kode_distribusi ='$kode_distribusi' ");

    if($update&&$hapus){
      ?>
									
										<script type="text/javascript">
										alert("Data Berhasil Dihapuss");
										window.location.href="?page=distribusi";
										</script>
										
										<?php

                    
    }else{
       header('location:distribusi/.php');
    }


};

?>






