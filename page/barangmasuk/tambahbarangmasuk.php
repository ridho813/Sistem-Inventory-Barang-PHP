<div class="container-fluid">

<?php 
	 $conn= mysqli_connect("localhost","root","","dazel");


	 $no = mysqli_query($koneksi, "select idbrg_masuk from barang_masuk order by idbrg_masuk desc");
	 $id = mysqli_fetch_array($no);
	 $kode = $id['idbrg_masuk'];
	 $urut = substr($kode, -3);
	 $tambah = (int) $urut + 1;
		 if(strlen($tambah) == 1){
			 $format = "MSK"."00".$tambah;
		 } else if(strlen($tambah) == 2){
			 $format = "MSK"."0".$tambah;
		 } else{
			 $format = "MSK".$tambah;
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
							
							<label for="">ID Barang Masuk</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_masuk" class="form-control" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>

							<label for="">Jumlah Masuk</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="jumlah_masuk" class="form-control" />
                          	 
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
							   <label for="color">Suplier Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="suplaier" id="suplaier"class="form-control" />
							   <option value="">-- Pilih Nama Suplier --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  suplier order by kode_sup");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[kode_sup]'> $data[nama_sup] </option>";
								}
								?>
								</select> 
							   </div>
							   </div>

                            </div>


                            
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if(isset($_POST['simpan'])){
								$kode_barang = $_POST['kode_barang'];
								$idbrg_masuk = $_POST['idbrg_masuk'];
								$jumlah_masuk =$_POST['jumlah_masuk'];
								$suplaier =$_POST['suplaier'];
						 
								 $cekstocksekarang = mysqli_query($conn,"SELECT * FROM barang where kode_barang  ='$kode_barang' ");
								 $ambildatanya = mysqli_fetch_array($cekstocksekarang);
						 
								  $stocksekarang = $ambildatanya['stok_barang'];
						
					
						
						
						
								 $tambahkanstocksekarang = $stocksekarang + $jumlah_masuk;
						 
								 $addkeluar = mysqli_query($conn,"INSERT INTO barang_masuk (idbrg_masuk,kode_barang, jumlah_masuk, suplaier) VALUES('$idbrg_masuk','$kode_barang','$jumlah_masuk', '$suplaier')");
								 $updetstockmasuk =mysqli_query($conn,"UPDATE barang SET stok_barang ='$tambahkanstocksekarang' where kode_barang ='$kode_barang'");
								 if($addkeluar&&$updetstockmasuk){
									?>
															
									<script type="text/javascript">
									alert("Data Berhasil Diubah");
									window.location.href="?page=barangmasuk";
									</script>
									
									<?php
									 }else{
									  echo 'GAgall';
						 header('location:barangkeluar/barangmasuk.php');
							 } 
							
						 
						};				
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=barangmasuk";
										</script>
										
										<?php
									}

							
							?>
										
										
										
								
								
								
								
								
