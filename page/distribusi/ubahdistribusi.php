<?php
 $kode_distribusi = $_GET['kode_distribusi'];
 $sql2 = $koneksi->query("select * from distribusi where kode_distribusi = '$kode_distribusi'");
 $tampil = $sql2->fetch_assoc();
  
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Distribusi Barang </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Distribusi Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="kode_distribusi" value="<?php echo $tampil['kode_distribusi']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>
                           
							<label for="">Jumlah Distribusi Barang </label>
							<input type="number" name="jumlah" class="form-control" value='<?=$tampil['jumlah']?> 'required>
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
								

			$kode_distribusi= $_POST['kode_distribusi'];
			$kode_barang= $_POST['kode_barang'];
			$jumlah= $_POST['jumlah'];
			

    
            $lihatstock = mysqli_query($conn,"SELECT * FROM barang where kode_barang='$kode_barang' ");
            $stocknya= mysqli_fetch_array($lihatstock);
            $stockskrg = $stocknya['stok_barang'];
    
    
            $qtyskrg = mysqli_query($conn,"SELECT * FROM distribusi where kode_distribusi='$kode_distribusi' ");
            $qtynya = mysqli_fetch_array($qtyskrg);
            $qtyskrg= $qtynya['jumlah'];
    
    
    
            if($jumlah>$qtyskrg){
                $selisih= $jumlah-$qtyskrg;
                $kurangin= $stockskrg - $selisih;
                $kurangistocknya = mysqli_query($conn,"UPDATE barang set stok_barang = '$kurangin' where kode_barang='$kode_barang'");
    
    
                $updatenya = mysqli_query($conn,"UPDATE distribusi set jumlah='$jumlah' where 	kode_distribusi='$kode_distribusi' ");
    
    
                if($kurangistocknya&&$updatenya){
                    ?>
				
                    <script type="text/javascript">
                    alert("Data Batal Diubah");
                    window.location.href="?page=distribusi";
                    </script>
                        
                <?php
                         }else{
                          echo 'Gagall';
                  header('location:masuk.php');
                    }
    
                }else{
                $selisih= $qtyskrg-$jumlah;
                $kurangin= $stockskrg+$selisih;
                $kurangistocknya = mysqli_query($conn,"UPDATE barang set stok_barang = '$kurangin' where kode_barang='$kode_barang' ");
    
    
                $update = mysqli_query($conn,"UPDATE distribusi set jumlah='$jumlah' where kode_distribusi='$kode_distribusi' ");
                if($kurangistocknya&&$update){
                    ?>
				
                    <script type="text/javascript">
                    alert("Data Batal Diubah");
                    window.location.href="?page=distribusi";
                    </script>
                        
                <?php
                     }else{
                      echo 'GAgall';
              header('location:masuk.php');
                }
    
                }
        };
		if (isset($_POST['batal'])) {
			?>
				
				<script type="text/javascript">
				alert("Data Batal Diubah");
				window.location.href="?page=distribusi";
				</script>
					
			<?php
			}	





							?>
										
										
										
								
								
								
								
								
