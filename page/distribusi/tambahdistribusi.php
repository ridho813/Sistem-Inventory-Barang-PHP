<div class="container-fluid">

<?php 
	 $conn= mysqli_connect("localhost","root","","dazel");


	 $no = mysqli_query($koneksi, "select kode_distribusi from distribusi order by kode_distribusi desc");
	 $id = mysqli_fetch_array($no);
	 $kode = $id['kode_distribusi'];
	 $urut = substr($kode, -3);
	 $tambah = (int) $urut + 1;
		 if(strlen($tambah) == 1){
			 $format = "DIS"."00".$tambah;
		 } else if(strlen($tambah) == 2){
			 $format = "DIS"."0".$tambah;
		 } else{
			 $format = "DIS".$tambah;
		 }
?>

  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah  Distribusi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Distribusi </label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="kode_distribusi" class="form-control" value="<?php echo $format; ?>" readonly />	 
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
							<label for="">Jumlah Masuk</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="jumlah" class="form-control" />
                          	 
								</div>
                            </div>
                           
							<label for="">Nama Toko</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_toko" class="form-control" />
                          	 
								</div>
                            </div>
                           
                            
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if(isset($_POST['simpan'])){
								$kode_barang = $_POST['kode_barang'];
								$kode_distribusi = $_POST['kode_distribusi'];
								$jumlah =$_POST['jumlah'];
								$nama_toko =$_POST['nama_toko'];
						 
								 $cekstocksekarang = mysqli_query($conn,"SELECT * FROM barang where kode_barang  ='$kode_barang' ");
								 $ambildatanya = mysqli_fetch_array($cekstocksekarang);
						 
								  $stocksekarang = $ambildatanya['stok_barang'];
						
						
								//barang cukup
						
						
								 $tambahkanstocksekarang = $stocksekarang + $jumlah;
						 
								 $addkeluar = mysqli_query($conn,"INSERT INTO distribusi (kode_distribusi,kode_barang, jumlah, nama_toko) VALUES('$kode_distribusi','$kode_barang','$jumlah', '$nama_toko')");
								 $updetstockmasuk =mysqli_query($conn,"UPDATE barang SET stok_barang ='$tambahkanstocksekarang' where kode_barang ='$kode_barang'");
								 if($addkeluar&&$updetstockmasuk){
									?>
															
									<script type="text/javascript">
									alert("Data Berhasil Diubah");
									window.location.href="?page=distribusi";
									</script>
									
									<?php
									 }else{
									  echo 'GAgall';
						 header('location:distribusi/distribusi.php');
							 } 
						 
						};				
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=distribusi";
										</script>
										
										<?php
									}

							
							?>
										
										
										
								
								
								
								
								
