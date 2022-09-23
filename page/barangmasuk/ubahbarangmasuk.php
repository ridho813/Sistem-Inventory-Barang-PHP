<?php
 $idbrg_masuk = $_GET['idbrg_masuk'];
 $sql2 = $koneksi->query("select * from barang_masuk where idbrg_masuk = '$idbrg_masuk'");
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
                                <input type="text" name="idbrg_masuk" value="<?php echo $tampil['idbrg_masuk']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>
							
							<label for="">Jumlah Barang Keluar</label>
							<input type="number" name="jumlah_masuk" class="form-control" value='<?=$tampil['jumlah_masuk']?> 'required>
<br>
                              <input type='hidden' name='kode_barang' value='<?=$tampil['kode_barang']?>'>
                                             
                                                <br>
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
                            <?php
							
							if (isset($_POST['simpan'])) {
								
    //mengubah data barang masuk

        $kode_barang =$_POST['kode_barang'];
        $idbrg_masuk =$_POST['idbrg_masuk'];
        $jumlah_masuk = $_POST ['jumlah_masuk'];


      
		$lihatstock = mysqli_query($conn,"SELECT * FROM barang where kode_barang='$kode_barang' ");
		$stocknya= mysqli_fetch_array($lihatstock);
		$stockskrg = $stocknya['stok_barang'];


		$qtyskrg = mysqli_query($conn,"SELECT * FROM barang_masuk where idbrg_masuk='$idbrg_masuk' ");
		$qtynya = mysqli_fetch_array($qtyskrg);
		$qtyskrg= $qtynya['jumlah_masuk'];



		if($jumlah_masuk>$qtyskrg){
			$selisih= $jumlah_masuk-$qtyskrg;
			$kurangin= $stockskrg - $selisih;
			$kurangistocknya = mysqli_query($conn,"UPDATE barang set stok_barang = '$kurangin' where kode_barang='$kode_barang'");


			$updatenya = mysqli_query($conn,"UPDATE barang_masuk set jumlah_masuk='$jumlah_masuk' where 	idbrg_masuk='$idbrg_masuk' ");


			if($kurangistocknya&&$updatenya){
				?>
			
				<script type="text/javascript">
				alert("Data Batal Diubah");
				window.location.href="?page=barangmasuk";
				</script>
					
			<?php
					 }else{
					  echo 'Gagall';
			  header('location:masuk.php');
				}

			}else{
			$selisih= $qtyskrg-$jumlah_masuk;
			$kurangin= $stockskrg+$selisih;
			$kurangistocknya = mysqli_query($conn,"UPDATE barang set stok_barang = '$kurangin' where kode_barang='$kode_barang' ");


			$update = mysqli_query($conn,"UPDATE barang_masuk set jumlah_masuk='$jumlah_masuk' where idbrg_masuk='$idbrg_masuk' ");
			if($kurangistocknya&&$update){
				?>
			
				<script type="text/javascript">
				alert("Data Batal Diubah");
				window.location.href="?page=barangmasuk";
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
									window.location.href="?page=barangmasuk";
									</script>
										
								<?php
								}	
							?>
										
										