<?php
 $idbrg_keluar = $_GET['idbrg_keluar'];
 $sql2 = $koneksi->query("select * from barang_keluar where idbrg_keluar = '$idbrg_keluar'");
 $tampil = $sql2->fetch_assoc();
  
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Barang Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Barang Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_keluar" value="<?php echo $tampil['idbrg_keluar']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>
                           
							<label for="">Jumlah Barang Keluar</label>
							<input type="number" name="jumlah_keluar" class="form-control" value='<?=$tampil['jumlah_keluar']?> 'required>
<br>
                                                <input type='hidden' name='kode_barang' value='<?=$tampil['kode_barang']?>'>
                                             
                                                <br>
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							<?php
							

			$conn= mysqli_connect("localhost","root","","dazel");
         //mengubah data barang keluar 
		 if (isset($_POST['simpan'])) {
								

			$idbrg_keluar= $_POST['idbrg_keluar'];
			$kode_barang= $_POST['kode_barang'];
			$jumlah_keluar= $_POST['jumlah_keluar'];
			

    
            $lihatstock = mysqli_query($conn,"SELECT * FROM barang where kode_barang='$kode_barang' ");
            $stocknya= mysqli_fetch_array($lihatstock);
            $stockskrg = $stocknya['stok_barang'];
    
    
            $qtyskrg = mysqli_query($conn,"SELECT * FROM barang_keluar where idbrg_keluar='$idbrg_keluar' ");
            $qtynya = mysqli_fetch_array($qtyskrg);
            $qtyskrg= $qtynya['jumlah_keluar'];

            
            
        if($jumlah_keluar>$qtyskrg){
            $selisih= $jumlah_keluar-$qtyskrg;
            $kurangin= $stockskrg - $selisih;
            $kurangistocknya = mysqli_query($conn,"UPDATE barang set stok_barang = '$kurangin' where kode_barang='$kode_barang'");


            $update = mysqli_query($conn,"UPDATE barang_keluar set jumlah_keluar='$jumlah_keluar' where idbrg_keluar='$idbrg_keluar' ");


            if($kurangistocknya&&$update){
				?>
									
				<script type="text/javascript">
				alert("Data Berhasil Diubah");
				window.location.href="?page=barangkeluar";
				</script>
				
				<?php
                     }else{
                      echo 'Gagall';
              header('location:keluar.php');
                }

            }else{
            $selisih= $qtyskrg-$jumlah_keluar;
            $dikurangin= $stockskrg+$selisih;
            $kurangistocknya = mysqli_query($conn,"UPDATE barang set stok_barang = '$dikurangin' where kode_barang='$kode_barang' ");


            $updatenya = mysqli_query($conn,"UPDATE barang_keluar set jumlah_keluar='$jumlah_keluar' where idbrg_keluar='$idbrg_keluar' ");
            if($kurangistocknya&&$updatenya){
				?>
									
				<script type="text/javascript">
				alert("Data Berhasil Diubah");
				window.location.href="?page=barangkeluar";
				</script>
				
				<?php
                 }else{
                  echo 'GAgall';
          header('location:keluar.php');
            }

            }
        };
		if (isset($_POST['batal'])) {
			?>
				
				<script type="text/javascript">
				alert("Data Batal Diubah");
				window.location.href="?page=barangkeluar";
				</script>
					
			<?php
			}	





							?>
										
										
										
								
								
								
								
								
