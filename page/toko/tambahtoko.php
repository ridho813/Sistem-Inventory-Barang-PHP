<?php

$koneksi = new mysqli("localhost","root","","dazel");
$no = mysqli_query($koneksi, "select kode_toko from toko order by kode_toko desc");
$idsup = mysqli_fetch_array($no);
$kode = $idsup['kode_toko'];

$urut = substr($kode,-4);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1){
	$format = "TOKO"."000".$tambah;
} else if(strlen($tambah) == 2){
	$format = "TOKO"."00".$tambah;	
} else{
	$format = "TOKO".$tambah;
}

?>
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Toko</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							<label for="">ID Toko</label>
                            <div class="form-group">
                               <div class="form-line">
                             <input type="text" name="kode_toko" class="form-control" id="kode_toko" value="<?php echo $format; ?>" readonly />
							</div>
                            </div>
							<label for="">Nama Toko</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_toko" class="form-control" />	 
							</div>
                            </div>
							<label for="">Alama Tokot</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat_toko" class="form-control" />
                          	 	</div>
                            </div>
								<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

								<input type="submit" name="batal" value="Batal" class="btn btn-primary">
							
							</form>
						
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$kode_toko= $_POST['kode_toko'];
								$nama_toko= $_POST['nama_toko'];
								$alamat_toko= $_POST['alamat_toko'];
							
			
								
								$sql = $koneksi->query("insert into toko (kode_toko, nama_toko, alamat_toko) values ('$kode_toko','$nama_toko','$alamat_toko')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=toko";
										</script>
										
										<?php
								}
								else {
									?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=toko";
										</script>
										
										<?php
								}
									
								}
							
							
							?>
										
										
										
								
								
								
								
								
