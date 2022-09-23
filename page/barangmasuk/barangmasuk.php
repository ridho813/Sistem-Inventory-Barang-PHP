 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tanggal Masuk</th>
                                  <th>ID Barang Masuk</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Jumlah Masuk</th>
                                  <th>Nama Suplier</th>
                                 
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("
                          SELECT * FROM barang_masuk
                          INNER JOIN barang
                          ON barang.kode_barang = barang_masuk.kode_barang
                          INNER JOIN suplier
                          ON suplier.kode_sup = barang_masuk.suplaier ");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['tanggal'] ?></td>
                                  <td><?php echo $data['idbrg_masuk'] ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['jumlah_masuk'] ?></td>
                                  <td><?php echo $data['suplaier'] ?></td>
                                  <td>
                                  <a href="?page=barangmasuk&aksi=ubahbarangmasuk&idbrg_masuk=<?php echo $data['idbrg_masuk'] ?>" class="btn btn-success" >Ubah</a>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['idbrg_masuk']?>">
                                                            Delete
                                                        </button>
                                  </td>
                              </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?=$data['idbrg_masuk']?>">
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
 
                                                <input type='hidden' name='idbrg_masuk' value='<?=$data['idbrg_masuk']?>'>
                                                <input type='hidden' name='kode_barang' value='<?=$data['kode_barang']?>'>
                                                <input type='hidden' name='jumlah_masuk' value='<?=$data['jumlah_masuk']?>'>
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
                      <a href="?page=barangmasuk&aksi=tambahbarangmasuk" class="btn btn-primary" >Tambah</a>
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
  $jumlah_masuk = $_POST['jumlah_masuk'];
    $kode_barang = $_POST['kode_barang'];
    $idbrg_masuk = $_POST['idbrg_masuk'];

    $getdatastock= mysqli_query($conn,"SELECT * FROM barang where kode_barang='$kode_barang' ");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stok_barang'];

    $selisih=$stock-$jumlah;

    $update =mysqli_query($conn,"UPDATE barang SET stok_barang='$selisih' where kode_barang='$kode_barang' ");
    $hapus =mysqli_query($conn," DELETE FROM barang_masuk WHERE idbrg_masuk ='$idbrg_masuk' ");

    if($update&&$hapus){
      ?>
									
										<script type="text/javascript">
										alert("Data Berhasil Dihapuss");
										window.location.href="?page=barangmasuk";
										</script>
										
										<?php

                    
    }else{
       header('location:distribusi/.php');
    }


};

?>






