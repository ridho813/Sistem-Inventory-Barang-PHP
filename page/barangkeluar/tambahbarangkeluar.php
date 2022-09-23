<div class="container-fluid">

<?php 
	 $conn= mysqli_connect("localhost","root","","dazel");


  $no = mysqli_query($koneksi, "select idbrg_keluar from barang_keluar order by idbrg_keluar desc");
  $id = mysqli_fetch_array($no);
  $kode = $id['idbrg_keluar'];
  $urut = substr($kode, -3);
  $tambah = (int) $urut + 1;
	  if(strlen($tambah) == 1){
		  $format = "KBR"."00".$tambah;
	  } else if(strlen($tambah) == 2){
		  $format = "KBR"."0".$tambah;
	  } else{
		  $format = "KBR".$tambah;
	  }
?>

  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Barang Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_keluar" class="form-control" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>
							
							<label for="color">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="kode_barang" id="kode_barang"class="form-control" />
							   <option value="">-- Pilih Nama Barang --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  barang order by kode_barang");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[kode_barang]'> $data[nama_barang] </option>";
								}
								?>
								</select> 
							   </div>
							   </div>
                            </div>
							<label for="">Jumlah Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="jumlah_keluar" class="form-control" />
                          	 
								</div>
                            </div>
						
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if(isset($_POST['simpan'])){
								$kode_barang = $_POST['kode_barang'];
								$idbrg_keluar = $_POST['idbrg_keluar'];
								$jumlah_keluar =$_POST['jumlah_keluar'];
						 
								 $cekstocksekarang = mysqli_query($conn,"SELECT * FROM barang where kode_barang  ='$kode_barang' ");
								 $ambildatanya = mysqli_fetch_array($cekstocksekarang);
						 
								  $stocksekarang = $ambildatanya['stok_barang'];
						
							if($stocksekarang>=$jumlah_keluar){
								//barang cukup
						
						
								 $tambahkanstocksekarang = $stocksekarang - $jumlah_keluar;
						 
								 $addkeluar = mysqli_query($conn,"INSERT INTO barang_keluar (idbrg_keluar,kode_barang, jumlah_keluar) VALUES('$idbrg_keluar','$kode_barang','$jumlah_keluar')");
								 $updetstockmasuk =mysqli_query($conn,"UPDATE barang SET stok_barang ='$tambahkanstocksekarang' where kode_barang ='$kode_barang'");
								 if($addkeluar&&$updetstockmasuk){
									?>
															
									<script type="text/javascript">
									alert("Data Berhasil Diubah");
									window.location.href="?page=barangkeluar";
									</script>
									
									<?php
									 }else{
									  echo 'GAgall';
						 header('location:barangkeluar/barangkeluar.php');
							 } 
							} else {
								//kalau tidak cukup
								?>
															
								<script type="text/javascript">
								alert("Data stock kurang");
								window.location.href="?page=barangkeluar";
								</script>
								
								<?php
						
							}
						 
						};						
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=barangkeluar";
										</script>
										
										<?php
									}

							
							?>
										
										
										
								
								
								
								
								
